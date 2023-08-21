<?php

namespace App\Controllers;

use App\Models\adminModel;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\Products;
use CodeIgniter\RESTful\Controller;
use CodeIgniter\API\Response;

class Admin extends BaseController
{
  public function generateDescription($productName)
  {
    $description = $this->callTuringAPI($productName);

    if ($description) {
      return $this->respond($description);
    } else {
      return $this->fail('Unable to generate product description');
    }
  }

  private function callTuringAPI($productName)
  {
    $apiKey = 'YOUR_API_KEY';
    $endpoint = 'https://api.turing.com/v2/engines/text-davinci-002/generate';

    $data = [
      'prompt' => "Generate a description for a product named '$productName'",
      'max_tokens' => 50, // Adjust the number of tokens as needed
    ];

    $headers = [
      'Content-Type: application/json',
      'Authorization: Bearer ' . $apiKey,
    ];

    $curl = curl_init($endpoint);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($curl);
    curl_close($curl);

    $responseBody = json_decode($response, true);

    if (isset($responseBody['generated'])) {
      return $responseBody['generated'];
    } else {
      return null;
    }
  }
  // public function generateDescription($productName)
  // {
  //   $apiKey = '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';
  //   $endpoint = 'https://api.openai.azure.com/v1/engines/gpt-3/completions';

  //   $data = [
  //     'prompt' => "Generate a description for a product named '$productName'",
  //     'max_tokens' => 50, // Adjust the number of tokens as needed
  //   ];

  //   $headers = [
  //     'Content-Type: application/json',
  //     'Authorization: Bearer ' . $apiKey,
  //   ];
  //   // Initialize cURL session
  //   $curl = curl_init($endpoint);
  //   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
  //   curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
  //   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //   curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

  //   // Execute cURL request
  //   $response = curl_exec($curl);

  //   // Close cURL session
  //   curl_close($curl);

  //   // Process the response
  //   $responseBody = json_decode($response, true);
  //   print_r($responseBody);
  //   exit();

  //   // Check if "choices" key exists in the response
  //   if (isset($responseBody['choices'][0]['text'])) {
  //     $description = $responseBody['choices'][0]['text'];
  //   } else {
  //     $description = 'Description not available';
  //   }

  //   print_r($description);
  //   exit();
  //   // return $description;
  // }

  public function login()
  {

    // $auth = service('auth');
    // $auth->logout();
    // return redirect()->to(base_url('dashboard'));
    return view('admin/login');
  }

  public function adminAuth()
  {
    $adminModel = new adminModel();
    $Rules = [
      'admin_email' => 'required',
      'admin_password' => 'required',
    ];

    // Validate  fields
    if ($this->validate($Rules)) {
      $admin_email = $this->request->getVar('admin_email');
      $admin_password = $this->request->getVar('admin_password');

      $admin = $adminModel->where('admin_email', $admin_email)
        ->first(); // Use 'first()' to retrieve a single record

      // echo $admin_password;
      // echo $admin['admin_password'];
      // print_r($admin);
      // exit();
      if ($admin && password_verify($admin_password, $admin['admin_password'])) {
        // Authentication successful, store admin data in session
        $adminData = [
          'admin_id' => $admin['admin_id'],
          'admin_logged_in' => true,
          'admin_name' => $admin['admin_name'],
        ];

        session()->set($adminData);
        // Redirect to a protected page or perform any other action
        return redirect()->to('admin/dashboard');
      } else {

        // Authentication failed, redirect back with an error message
        return redirect()->back()->withInput()->with('error', 'Invalid email or password');
      }
    } else {
      // Validation failed, redirect back with validation errors
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }
  public function adminLogout()
  {
    // Clear the admin session data
    session()->remove('admin_id');
    session()->remove('admin_logged_in');
    session()->remove('admin_name');

    // Redirect to the login page or any other appropriate page
    return redirect()->to('/admin/login');
  }
  public function register()
  {
    return view('admin/register');
  }

  public function register_check()
  {
    $adminModel = new adminModel();
    $rules = [
      'admin_name' => 'required',
      'admin_email' => 'required',
      'admin_password' => 'required',
      'confirm_password' => 'matches[admin_password]',
    ];

    if ($this->validate($rules)) {
      $adminModel = new adminModel();
      $data = [
        'admin_name' => $this->request->getVar('admin_name'),
        'admin_password' => password_hash($this->request->getVar('admin_password'), PASSWORD_DEFAULT),
        'admin_email' => $this->request->getVar('admin_email'),
      ];
      // print_r($data);exit();
      $adminModel->insert($data);
      return redirect()->to('admin/dashboard');
    } else {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }


  public function dashboard()
  {
    return view('admin/dashboard');
  }
  // ========== Start Products Controller Function =========//

  public function all_products()
  {
    $productModel = new Products();
    $data['products'] = $productModel->getAllProduct();
    return view('admin/product/all_products', $data);
  }

  public function check_add_product()
  {
    $productModel = new Products();
    // Define validation rules for the image

    $Rules = [
      'file' => [
        'uploaded[product_image]',
        'ext_in[product_image,jpg,jpeg,png,webp]',
        'max_size[product_image,2048]',
      ],
      'product_name' => 'required',
      'product_price' => 'required|numeric',
      'quantity' => 'required|integer',
      'product_desc' => 'required',
      'category_id' => 'required',
      'brand_id' => 'required',
      'status' => 'required',
      'feature_product' => 'required'
    ];

    // Validate both the image and other fields
    if ($this->validate($Rules)) {
      $img = $this->request->getFile('product_image');
      $img_name = $img->getName();
      $img->move(ROOTPATH . 'public/assets/images/upload', $img_name);
      // echo $img_name;exit();
      $data = [
        'product_name' => $this->request->getVar('product_name'),
        'product_price' => $this->request->getVar('product_price'),
        'quantity' => $this->request->getVar('quantity'),
        'product_desc' => $this->request->getVar('product_desc'),
        'category_id' => $this->request->getVar('category_id'),
        'brand_id' => $this->request->getVar('brand_id'),
        'product_image' => $img_name,
        'status' => $this->request->getVar('status'),
        'feature_product' => $this->request->getVar('feature_product')
      ];

      $productModel->insert($data);
      return redirect()->to(base_url('/admin/product/all_products'));
    } else {
      // Validation failed, redirect back with validation errors
      return redirect()->back()->withInput()->with('errors', array_merge($this->validator->getErrors(), $this->validator->getErrors()));
    }
  }

  public function check_edit_product()
  {
    $productModel = new Products();
    $Rules = [
      'file' => [
        'uploaded[product_image]',
        'ext_in[product_image,jpg,jpeg,png,webp]',
        'max_size[product_image,2048]',
      ],
      'product_name' => 'required',
      'product_price' => 'required|numeric',
      'quantity' => 'required|integer',
      'product_desc' => 'required',
      'category_id' => 'required',
      'brand_id' => 'required',
      'status' => 'required',
      'feature_product' => 'required'
    ];

    // Validate  fields
    if ($this->validate($Rules)) {
      $img = $this->request->getFile('product_image');
      $img_name = $img->getName();
      $img->move(ROOTPATH . 'public/assets/images/upload', $img_name);
      $data = [
        'product_name' => $this->request->getVar('product_name'),
        'product_price' => $this->request->getVar('product_price'),
        'quantity' => $this->request->getVar('quantity'),
        'product_desc' => $this->request->getVar('product_desc'),
        'category_id' => $this->request->getVar('category_id'),
        'brand_id' => $this->request->getVar('brand_id'),
        'product_image' => $img_name,
        'status' => $this->request->getVar('status'),
        'feature_product' => $this->request->getVar('feature_product')
      ];

      $id = $this->request->getVar('product_id');

      $productModel->update(['product_id' => $id], $data);
      $successMessage = "Product has been Updated successfully.";
      return redirect()->to(base_url('/admin/product/all_products'))->with('success', $successMessage);
    } else {
      // Validation failed, redirect back with validation errors
      return redirect()->back()->withInput()->with('errors', array_merge($this->validator->getErrors(), $this->validator->getErrors()));
    }
  }

  public function add_product()
  {
    $categoriesModel = new Categories();
    $brandsModel = new Brands();
    $data['categories'] = $categoriesModel->findAll();
    $data['brands'] = $brandsModel->findAll();
    // $data['products'] = $productModel->getAllProduct();
    // print_r($data);exit();
    return view('admin/product/add_product', $data);
  }
  public function delete_product($id)
  {
    $productModel = new Products();
    $product = $productModel->find($id);

    if ($product) {
      $productModel->delete($id);
      $successMessage = "Product '{$product['product_name']}' has been deleted successfully.";
      return redirect()->to(base_url('admin/product/all_products'))->with('success', $successMessage);
    } else {
      $errorMessage = "Product with ID '{$id}' not found.";
      return redirect()->to(base_url('admin/product/all_products'))->with('error', $errorMessage);
    }
  }
  public function view_product($id)
  {
    $productModel = new Products();
    $data['product'] = $productModel->getProductById($id);
    // print_r($data);exit();
    return view('admin/product/view_product', $data);
  }

  //

  public function edit_product($id)
  {
    $productModel = new Products();
    $categoriesModel = new Categories();
    $brandsModel = new Brands();
    $data['product'] = $productModel->getProductById($id);
    $data['categories'] = $categoriesModel->findAll();
    $data['brands'] = $brandsModel->findAll();
    // print_r($data);exit();
    return view('admin/product/edit_product', $data);
  }

  // ========== End Products Controller Function =========//

  // ========== Start Categories Controller Function =========//
  public function all_categories()
  {
    $categoriesModel = new Categories();
    $data['categories'] = $categoriesModel->findAll();
    return view('admin/category/all_categories', $data);
  }


  public function add_category()
  {
    $categoriesModel = new Categories();
    return view('admin/category/add_category');
  }

  public function check_add_category()
  {
    $categoryModel = new Categories();
    $Rules = [
      'file' => [
        'uploaded[product_image]',
        'ext_in[product_image,jpg,jpeg,png,webp]',
        'max_size[product_image,2048]',
      ],
      'category_name' => 'required',
      'category_desc' => 'required',
      'status' => 'required',
      'slug' => 'required',
    ];

    // Validate fields
    if ($this->validate($Rules)) {
      $img = $this->request->getFile('category_image');
      $img_name = $img->getName();
      $img->move(ROOTPATH . 'public/assets/images/upload/category', $img_name);
      // echo $img_name;exit();
      $data = [
        'category_name' => $this->request->getVar('category_name'),
        'category_desc' => $this->request->getVar('category_desc'),
        'status' => $this->request->getVar('status'),
        'slug' => $this->request->getVar('slug'),
      ];

      $categoryModel->insert($data);
      $successMessage = "Category has been added successfully.";
      return redirect()->to(base_url('/admin/category/all_categories'))->with('success', $successMessage);
    } else {
      // Validation failed, redirect back with validation errors
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }

  public function view_category($id)
  {
    $categoryModel = new Categories();
    $data['category'] = $categoryModel->find($id);
    return view('admin/category/view_category', $data);
  }
  public function edit_category($id)
  {
    $categoryModel = new Categories();
    $data['category'] = $categoryModel->find($id);
    return view('admin/category/edit_category', $data);
  }
  public function check_edit_category()
  {
    $categoryModel = new Categories();
    $Rules = [
      'file' => [
        'uploaded[product_image]',
        'ext_in[product_image,jpg,jpeg,png,webp]',
        'max_size[product_image,2048]',
      ],
      'category_name' => 'required',
      'category_desc' => 'required',
      'status' => 'required',
      'slug' => 'required',
    ];

    // Validate  fields
    if ($this->validate($Rules)) {
      $img = $this->request->getFile('product_image');
      $img_name = $img->getName();
      $img->move(ROOTPATH . 'public/assets/images/upload/category', $img_name);
      $data = [
        'category_name' => $this->request->getVar('category_name'),
        'category_desc' => $this->request->getVar('category_desc'),
        'status' => $this->request->getVar('status'),
        'slug' => $this->request->getVar('slug'),
      ];
      $id = $this->request->getVar('category_id');

      $categoryModel->update(['category_id' => $id], $data);
      $successMessage = "Category has been Updated successfully.";
      return redirect()->to(base_url('/admin/category/all_categories'))->with('success', $successMessage);
      ;
    } else {
      // Validation failed, redirect back with validation errors
      return redirect()->back()->withInput()->with('errors', array_merge($this->validator->getErrors(), $this->validator->getErrors()));
    }
  }
  public function delete_category($id)
  {
    $categoryModel = new Categories();
    $category = $categoryModel->find($id);

    if ($category) {
      // Delete associated products first
      $productModel = new Products();
      $productModel->where('category_id', $id)->delete();

      // Then delete the category
      $categoryModel->delete($id);

      $successMessage = "Category '{$category['category_name']}' has been deleted successfully. and also delete that product which assign this category '{$category['category_name']}'";
      return redirect()->to(base_url('admin/category/all_categories'))->with('success', $successMessage);
    } else {
      $errorMessage = "Category with ID '{$id}' not found.";
      return redirect()->to(base_url('admin/category/all_categories'))->with('error', $errorMessage);
    }
  }
  // ========== End Categories Controller Function =========//

  // ========== Start Brand Controller Function =========//
  public function all_brands()
  {
    $brandsModel = new Brands();
    $data['brands'] = $brandsModel->findAll();
    return view('admin/Brand/all_brands', $data);
  }
  public function add_brands()
  {
    $brandsModel = new Brands();
    return view('admin/Brand/add_brands');
  }

  public function check_add_brands()
  {
    $brandsModel = new Brands();
    $Rules = [
      'file' => [
        'uploaded[product_image]',
        'ext_in[product_image,jpg,jpeg,png,webp]',
        'max_size[product_image,2048]',
      ],
      'brand_name' => 'required',
      'brand_desc' => 'required',
      'brand_image' => 'required',
      // 'status' => 'required',
      // 'slug' => 'required',
    ];

    // Validate fields
    if ($this->validate($Rules)) {
      $img = $this->request->getFile('brand_image');
      $img_name = $img->getName();
      $img->move(ROOTPATH . 'public/assets/images/upload/brand', $img_name);
      // echo $img_name;exit();
      $data = [
        'brand_name' => $this->request->getVar('brand_name'),
        'brand_desc' => $this->request->getVar('brand_desc'),
        'brand_image' => $this->request->getVar('brand_image'),
        // 'status' => $this->request->getVar('status'),
        // 'slug' => $this->request->getVar('slug'),
      ];

      $brandsModel->insert($data);
      $successMessage = "Brand has been added successfully.";
      return redirect()->to(base_url('/admin/brands/all_brands'))->with('success', $successMessage);
    } else {
      // Validation failed, redirect back with validation errors
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
  }
  public function view_brands($id)
  {
    $brandsModel = new Brands();
    $data['brands'] = $brandsModel->find($id);
    return view('admin/Brand/view_brands', $data);
  }

  public function edit_brands($id)
  {
    $brandsModel = new Brands();
    $data['brands'] = $brandsModel->find($id);
    return view('admin/Brand/edit_brands', $data);
  }
  public function check_edit_brands()
  {
    $brandsModel = new Brands();
    $Rules = [
      'file' => [
        'uploaded[product_image]',
        'ext_in[product_image,jpg,jpeg,png,webp]',
        'max_size[product_image,2048]',
      ],
      'brand_name' => 'required',
      'brand_desc' => 'required',
      'brand_image' => 'required'
      // 'status' => 'required',
      // 'slug' => 'required',
    ];

    // Validate  fields
    if ($this->validate($Rules)) {
      $img = $this->request->getFile('product_image');
      $img_name = $img->getName();
      $img->move(ROOTPATH . 'public/assets/images/upload/brand', $img_name);
      $data = [
        'brand_name' => $this->request->getVar('brand_name'),
        'brand_desc' => $this->request->getVar('brand_desc'),
        'brand_image' => $this->request->getVar('brand_image'),
        // 'status' => $this->request->getVar('status'),
        // 'slug' => $this->request->getVar('slug'),
      ];
      $id = $this->request->getVar('brand_id');

      $brandsModel->update(['brand_id' => $id], $data);
      $successMessage = "Brand has been Updated successfully.";
      return redirect()->to(base_url('/admin/brand/all_brands'))->with('success', $successMessage);
    } else {
      // Validation failed, redirect back with validation errors
      return redirect()->back()->withInput()->with('errors', array_merge($this->validator->getErrors(), $this->validator->getErrors()));
    }
  }

  public function delete_brands($id)
  {
    $brandsModel = new Brands();
    $brands = $brandsModel->find($id);

    if ($brands) {
      // Delete associated products first
      $productModel = new Products();
      $productModel->where('brand_id', $id)->delete();

      // Then delete the Brand
      $brandsModel->delete($id);

      $successMessage = "Brands '{$brands['brand_name']}' has been deleted successfully. and also delete that product which assign this brand '{$brands['brand_name']}'";
      return redirect()->to(base_url('admin/brands/all_brands'))->with('success', $successMessage);
    } else {
      $errorMessage = "Brand with ID '{$id}' not found.";
      return redirect()->to(base_url('admin/brands/all_brands'))->with('error', $errorMessage);
    }
  }
}