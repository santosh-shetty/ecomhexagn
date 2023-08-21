<?php

namespace App\Controllers;

use App\Models\Carts;
use App\Models\OrderModel;
use CodeIgniter\Controller;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

use Config\PayPal;

class PaymentController extends BaseController
{

    public function initiatePayment()
    {
        // Get input values from the form
        $firstName = $this->request->getPost('first_name');
        $lastName = $this->request->getPost('last_name');
        $email = $this->request->getPost('email');
        $phoneNumber = $this->request->getPost('phone_number');
        $country = $this->request->getPost('country');
        $state = $this->request->getPost('state');
        $addressLine1 = $this->request->getPost('address_line_1');
        $addressLine2 = $this->request->getPost('address_line_2');
        $postalCode = $this->request->getPost('postal_code');
        $totalAmount = $this->request->getPost('totalAmount');
        $paymentMethod = $this->request->getPost('paymentMethod');


        // Store input data in a session
        $checkoutData = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone_number' => $phoneNumber,
            'country' => $country,
            'state' => $state,
            'address_line_1' => $addressLine1,
            'address_line_2' => $addressLine2,
            'postal_code' => $postalCode,
            'totalAmount' => $totalAmount,
            'payment_method' => $paymentMethod,
        ];

        // echo $totalAmount;
        // exit();

        // Store data in session
        $session = \Config\Services::session();
        $session->set('checkout_data', $checkoutData);

        // When COD is  
        if ($paymentMethod === 'cash') {
            // Handle Cash On Delivery logic here
            return redirect()->to('cash_payment_success');
        }
        // When Paypal is select
        elseif ($paymentMethod === 'paypal') {
            // Handle PayPal payment initiation logic here
            return redirect()->to('createPayment');
        }
    }
    // function for converting india rupees to USD ($doller)
    public function convertINRtoUSD($amountINR)
    {
        // Conversion rate: 1 USD = 73.5 INR (example rate, you can replace with actual rate)
        $conversionRate = 73.5;

        // Convert INR to USD
        $amountUSD = $amountINR / $conversionRate;

        // Return the converted amount rounded to 2 decimal places
        return round($amountUSD, 2);
    }


    public function createPayment()
    {
        $session = \Config\Services::session();
        $customer_id = $session->get('customer_id');

        if (!$customer_id) {
            return redirect()->to('customer/login'); // Redirect to login page or any other appropriate action
        }
        // Retrieve stored checkout data from session
        $checkoutData = $session->get('checkout_data');
        $cartModel = new Carts();
        $cartProducts = $cartModel->getCartProducts($customer_id);

        $apiContext = PayPal::apiContext();

        // Set up payer
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        // Conversion rate: 1 USD = 73.5 INR
        $conversionRate = 73.5;

        // echo $checkoutData['totalAmount'];
        // exit();
        // $totalINR = $checkoutData['totalAmount'];
        $totalINR = str_replace(',', '', $checkoutData['totalAmount']);
        // Convert INR to USD
        $amountUSD = round($totalINR / $conversionRate, 2);

        // Set up item list
        $productName = "";
        foreach ($cartProducts as $cartProduct) {
            $productName .= $cartProduct->product_name . ', '; // Concatenate with comma and space
        }

        $itemList = new ItemList();
        $item = new Item();
        $item->setName($productName)
            ->setCurrency("USD")
            ->setQuantity(1)
            ->setPrice($amountUSD);
        $itemList->addItem($item);


        // Set up amount
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($amountUSD); // Use the stored total amount from session

        // Set up transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Sample Transaction");

        // Set up redirect URLs
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(base_url("payment/success"))
            ->setCancelUrl(base_url("payment/cancel"));

        // Set up payment
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions([$transaction])
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($apiContext);
            // Redirect to PayPal for approval
            return redirect()->to($payment->getApprovalLink());
        } catch (Exception $ex) {
            // Handle error
            log_message('error', $ex->getMessage());
            return view('payment_error'); // Load a view with an error message
        }
    }

    // run when payment success fully
    public function executePayment()
    {
        // Retrieve customer ID from session
        $session = \Config\Services::session();
        $customer_id = $session->get('customer_id');
        $checkoutData = $session->get('checkout_data');
        // PayPal configuration
        $apiContext = PayPal::apiContext();
        $paymentId = $this->request->getGet('paymentId');
        $payerId = $this->request->getGet('PayerID');

        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);


        try {
            $result = $payment->execute($execution, $apiContext);

            $cartModel = new Carts();
            $cartProducts = $cartModel->getCartProducts($customer_id);

            $productName = "";
            $productId = "";
            $totalPrice = 0;
            // print_r($cartProducts) ;exit();
            foreach ($cartProducts as $cartProduct) {
                $productName .= $cartProduct->product_name . ', ';
                $productId .= $cartProduct->product_id . ', ';
                $totalPrice += $cartProduct->product_price * $cartProduct->quantity;
            }
            $orderModel = new OrderModel();
            $data = [
                'customer_id' => $session->get('customer_id'),
                'customer_name' => $session->get('customer_name'),
                'product_id' => $productId,
                'product_name' => $productName,
                'total_amount' =>$totalPrice,
                'payment_id' => $paymentId,
                'payer_id' => $payerId,
                'status' => 'Sucessfull',
            ];
            if ($data) {
                $orderModel->insert($data);
                // Delete cart data after payment success
                $cartModel = new Carts();
                $cartModel->deleteCartItemsByCustomerId($customer_id);
                return view('payment/success', $data);
            } else {
                return redirect()->to(base_url());

            }

        } catch (Exception $ex) {
            // Handle error
            log_message('error', $ex->getMessage());
            show_error("Error processing payment. Please try again later.");
        }
    }
    public function cancelPayment()
    {
        return view('payment/failed');
    }


}