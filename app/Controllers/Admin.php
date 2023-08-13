<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Brands;
use App\Models\Products;

class Admin extends BaseController
{
  public function dashboard()
  {
    return view('admin/dashboard');
  }

  // ========== Start Products Controller Function =========//

  public function all_products()
  {
    $productModel = new Products();
    $data['products'] = $productModel->getAllProduct();
    return view('admin/all_products', $data);
  }

  public function add()
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
      ];

      $productModel->insert($data);
      return redirect()->to(base_url('/admin/product/all_products'));
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
    return view('admin/add_product', $data);
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
    return view('admin/view_product', $data);
  }

  // ========== End Products Controller Function =========//

}