<?php

namespace App\Controllers;

use App\Models\Carts;

class CartsController extends BaseController
{
    public function cart()
    {
        $cartModel = new Carts();
        $data['cartProducts'] = $cartModel->getCartProducts();
        // Calculate total price
        $totalPrice = 0;
        foreach ($data['cartProducts'] as $product) {
            $totalPrice += $product->product_price * $product->quantity;
        }
        $data['totalPrice'] = $totalPrice;
        // print_r($data);
        // exit();
        return view('frontEnd/cart', $data);
    }
    public function add($id)
    {
        $cartModel = new Carts();
        $customer_id = $this->request->getVar('customer_id');
        $product_id = $this->request->getVar('product_id');

        // Check if the same product already exists in the cart for the customer
        $existingCart = $cartModel->where(['customer_id' => $customer_id, 'product_id' => $product_id])->first();

        if ($existingCart) {
            // If the product already exists, update the quantity
            $data = [
                'quantity' => $existingCart['quantity'] + 1,
            ];
            $cartModel->update($existingCart['cart_id'], $data);
        } else {
            // If the product does not exist, insert a new cart entry
            $data = [
                'customer_id' => $customer_id,
                'customer_name' => $this->request->getVar('customer_name'),
                'product_id' => $product_id,
                'product_name' => $this->request->getVar('product_name'),
                'quantity' => 1
            ];
            $cartModel->insert($data);
        }

        return redirect()->to('/cart')->with('success', "Product added successfully");
    }
    
    public function remove($id)
    {
        $cartModel = new Carts();
        $cartEntry = $cartModel->where('cart_id', $id)->first();

        if ($cartEntry) {
            $cartModel->where('cart_id', $id)->delete(); // Delete the cart entry
            return redirect()->to('/cart')->with('success', "Product removed successfully");
        } else {
            return redirect()->to('/cart')->with('error', "Cart entry not found");
        }
    }
    public function update($id)
    {
        $cartModel = new Carts();
        $data = [
            'quantity' => $this->request->getVar('quantity'),
        ];

        $cartModel->update($id, $data);

        return redirect()->to('/cart')->with('success', "Cart updated successfully");
    }
}