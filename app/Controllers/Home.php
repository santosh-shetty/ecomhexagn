<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Brands;

class Home extends BaseController

{
    public function home()
    {
        $productModel = new Products();
        $categoryModel = new Categories();
        $data['products'] = $productModel->where('feature_product', 1)->find();
        $data['categories'] = $categoryModel->findAll();
        return view('frontEnd/home', $data);
    }
    public function allProducts()
    {
        $productModel = new Products();
        $categoryModel = new Categories();
        $brandsModel = new Brands();
        $data['brands'] = $brandsModel->findall();
        $data['categories'] = $categoryModel->findAll();
        $data['products'] = $productModel->getAllProduct();
        return view('frontEnd/allproducts', $data);
    }
    public function apply_filters()
    {
        $selectedCategories = $this->request->getPost('categories');
        $selectedBrands = $this->request->getPost('brands');
        $productModel = new Products();

        if (!empty($selectedCategories) || !empty($selectedBrands)) {
            $data['products'] = $productModel->applyFilters($selectedCategories, $selectedBrands);
        } else {
            $data['products'] = $productModel->getAllProducts();
        }

        return view('filtered_products', $data);
    }
}
