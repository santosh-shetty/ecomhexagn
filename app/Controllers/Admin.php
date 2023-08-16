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
  public function login()
  {
    return view('admin/login');
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
      'category_name' => 'required',
      'category_desc' => 'required',
      'status' => 'required',
      'slug' => 'required',
    ];

    // Validate fields
    if ($this->validate($Rules)) {
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
      'category_name' => 'required',
      'category_desc' => 'required',
      'status' => 'required',
      'slug' => 'required',
    ];

    // Validate  fields
    if ($this->validate($Rules)) {
      $data = [
        'category_name' => $this->request->getVar('category_name'),
        'category_desc' => $this->request->getVar('category_desc'),
        'status' => $this->request->getVar('status'),
        'slug' => $this->request->getVar('slug'),
      ];
      $id = $this->request->getVar('category_id');

      $categoryModel->update(['category_id' => $id], $data);
      $successMessage = "Category has been Updated successfully.";
      return redirect()->to(base_url('/admin/category/all_categories'))->with('success', $successMessage);;
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
      'brand_name' => 'required',
      'brand_desc' => 'required',
      // 'status' => 'required',
      // 'slug' => 'required',
    ];

    // Validate fields
    if ($this->validate($Rules)) {
      $data = [
        'brand_name' => $this->request->getVar('brand_name'),
        'brand_desc' => $this->request->getVar('brand_desc'),
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
      'brand_name' => 'required',
      'brand_desc' => 'required',
      // 'status' => 'required',
      // 'slug' => 'required',
    ];

    // Validate  fields
    if ($this->validate($Rules)) {
      $data = [
        'brand_name' => $this->request->getVar('brand_name'),
        'brand_desc' => $this->request->getVar('brand_desc'),
        // 'status' => $this->request->getVar('status'),
        // 'slug' => $this->request->getVar('slug'),
      ];
      $id = $this->request->getVar('brand_id');

      $brandsModel->update(['brand_id' => $id], $data);
      $successMessage = "Brand has been Updated successfully.";
      return redirect()->to(base_url('/admin/brand/all_brands'))->with('success', $successMessage);;
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
