<?php

namespace App\Controllers;

use App\Models\CustomersModel;
use App\Controllers\Services;

class Customer extends BaseController
{
    public function test()
    {
        echo "Test";
        // return view('FrontEnd/Customer/login');
    }

    public function register()
    {
        echo view('frontend/customer/register');
    }

    public function register_check()
    {
        $customerModel = new CustomersModel();
        $rules = [
            'customer_name'          => 'required|min_length[2]|max_length[255]',
            'customer_email'         => 'required|min_length[4]|max_length[255]|valid_email',
            'customer_password'      => 'required|min_length[4]|max_length[255]',
            'confirm_password'       => 'matches[customer_password]',
            'customer_address'       => 'required|min_length[10]|max_length[255]',
            'customer_phone_no'      => 'required|min_length[10]|max_length[255]'
        ];

        if ($this->validate($rules)) {
            $userModel = new CustomersModel();
            $data = [
                'customer_name'     => $this->request->getVar('customer_name'),
                'customer_password' => password_hash($this->request->getVar('customer_password'), PASSWORD_DEFAULT),
                'customer_email'    => $this->request->getVar('customer_email'),
                'customer_address'  => $this->request->getVar('customer_address'),
                'customer_phone_no' => $this->request->getVar('customer_phone_no'),
            ];
            // echo "Test";
            // exit();
            $userModel->insert($data);
            return redirect()->to('customer/login');
        } else {
            echo "Test 2";
            exit();
            //     $data['validation'] = $this->validator;
            //     echo view('frontend/customer/register', $data);
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        // echo view('frontend/customer/register', $data);
    }
















    public function login()
    {
        return view('FrontEnd/Customer/login');
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
    { {
            // Destroy customer session
            session()->remove('customer_id');
            session()->remove('customer_name');

            // Redirect to the login page or any desired page
            return redirect()->to(base_url('customer/login'))->with('success', 'Log Out Successfully');
        }
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
