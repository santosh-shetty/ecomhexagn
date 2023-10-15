<?php

namespace App\Controllers;

use App\Models\CustomersModel;
use App\Controllers\Services;
use App\Models\Products;

class Customer extends BaseController
{

    public function register()
    {
        return view('frontend/customer/register');
    }

    public function register_check()
    {
        $customerModel = new CustomersModel();
        $rules = [
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_password' => 'required',
            'confirm_password' => 'matches[customer_password]',
            'customer_address' => 'required',
            'customer_phone_no' => 'required'
        ];

        if ($this->validate($rules)) {
            $userModel = new CustomersModel();
            $data = [
                'customer_name' => $this->request->getVar('customer_name'),
                'customer_password' => password_hash($this->request->getVar('customer_password'), PASSWORD_DEFAULT),
                'customer_email' => $this->request->getVar('customer_email'),
                'customer_address' => $this->request->getVar('customer_address'),
                'customer_phone_no' => $this->request->getVar('customer_phone_no'),
            ];
            // print_r($data);exit();
            $userModel->insert($data);
            return redirect()->to('customer/login');
        } else {
            // echo "Tes";exit();
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function login()
    {
        return view('FrontEnd/Customer/login');
    }
    public function google_login()
    {
        // Client Secret = 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
        // Client ID =745093585128-26ktiei7phc5fhea9j3571oc343r223d.apps.googleusercontent.com

        // /Create a new instance of Google API client
        // include_once APPPATH . "libraries/vendor/autoload.php";

        // $google_client = new Google_Client();

        // $google_client->setClientId('745093585128-26ktiei7phc5fhea9j3571oc343r223d.apps.googleusercontent.com');
        // $google_client->setClientSecret('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');
        // $google_client->setRedirectUri('http://localhost:8080/customer/google-login');
        // $google_client->addScope('email');
        // $google_client->addScope('profile');
        // if ($this->request->getVar('code')) {
        //     $token = $google_client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));

        //     if (!isset($token["error"])) {
        //         $google_client->setAccessToken($token['access_token']);

        //         $this->session->set('access_token', $token['access_token']);

        //         $google_service = new Google_Service_Oauth2($google_client);

        //         $data = $google_service->userinfo->get();
        //         echo "<pre>";
        //         print_r($data);

        //         // $current_datetime = date('Y-m-d H:i:s');
        //         if ($this->session->get('access_token')) {
        //             $data['loginButton'] = $google_client->createAuthUrl();
        //         }

        //         // if ($this->google_login_model->Is_already_register($data['id'])) {
        //         //     //update data
        //         //     $user_data = array(
        //         //         'first_name' => $data['given_name'],
        //         //         'last_name' => $data['family_name'],
        //         //         'email_address' => $data['email'],
        //         //         'profile_picture' => $data['picture'],
        //         //         'updated_at' => $current_datetime
        //         //     );

        //         //     $this->google_login_model->Update_user_data($user_data, $data['id']);
        //         // } else {
        //         //     //insert data
        //         //     $user_data = array(
        //         //         'login_oauth_uid' => $data['id'],
        //         //         'first_name' => $data['given_name'],
        //         //         'last_name' => $data['family_name'],
        //         //         'email_address' => $data['email'],
        //         //         'profile_picture' => $data['picture'],
        //         //         'created_at' => $current_datetime
        //         //     );

        //         //     $this->google_login_model->Insert_user_data($user_data);
        //         // }
        //         // $this->session->set_userdata('user_data', $user_data);
        //     }
        // }
        // $login_button = '';
        // if (!$this->session->userdata('access_token')) {
        //     $login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="' . base_url() . 'asset/sign-in-with-google.png" /></a>';
        //     $data['login_button'] = $login_button;
        //     $this->load->view('google_login', $data);
        // } else {
        //     $this->load->view('google_login', $data);
        // }


        return view('FrontEnd/Customer/google_login');
    }
    public function customerAuth()
    {
        $customerModel = new CustomersModel();
        $Rules = [
            'customer_email' => 'required',
            'customer_password' => 'required',
        ];

        // Validate  fields
        if ($this->validate($Rules)) {
            $customer_email = $this->request->getVar('customer_email');
            $customer_password = $this->request->getVar('customer_password');

            $customer = $customerModel->where('customer_email', $customer_email)
                ->first(); // Use 'first()' to retrieve a single record

            // echo $customer_email;
            // echo $customer_password;
            // print_r($customer);
            // exit();
            if ($customer && password_verify($customer_password, $customer['customer_password'])) {
                // Authentication successful, store user data in session
                session()->set('customer_id', $customer['customer_id']);
                session()->set('customer_name', $customer['customer_name']);

                // Redirect to a protected page or perform any other action
                return redirect()->to('/');
            } else {
                // Authentication failed, redirect back with an error message
                return redirect()->back()->withInput()->with('error', 'Invalid email or password');
            }
        } else {
            // Validation failed, redirect back with validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function logout()
    {
        // Destroy customer session
        session()->remove('customer_id');
        session()->remove('customer_name');

        // Redirect to the login page or any desired page
        return redirect()->to(base_url('customer/login'))->with('success', 'Log Out Successfully');

    }


    //     public function customerAuth()
    // {
    //     $auth = \CodeIgniter\Shield\Config\Services::auth('customer');
    //     $result = $auth->attempt($this->request->getPost('email'), $this->request->getPost('password'));

    //     if ($result) {
    //         // Successful login
    //     } else {
    //         // Failed login
    //     }
    // }
    // public function attemptLogin()
    // {
    //     $auth = Services::auth('customer'); // Use 'customer' guard

    //     $email = $this->request->getPost('email');
    //     $password = $this->request->getPost('password');

    //     if ($auth->attempt($email, $password)) {
    //         return redirect()->to(base_url('/customer/dashboard'));
    //     } else {
    //         // Handle failed login
    //         return redirect()->back()->with('error', 'Invalid credentials.');
    //     }
    // }

    // public function logout()
    // {
    //     $auth = Services::auth('customer'); // Use 'customer' guard
    //     $auth->logout();
    //     return redirect()->to(base_url('/customer/auth/login'));
    // }
}