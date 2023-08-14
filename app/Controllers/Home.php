<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Products;

class Home extends BaseController
{
    public function index(): string
    {
        return view('frontEnd/index');
    }
    public function cart()
    {
        return view('frontEnd/cart');
    }
    public function singleproduct()
    {
        return view('frontEnd/singleproduct');
    }
    public function allproducts()
    {
        return view('frontEnd/allproducts');
    }




    public function home()
    {
        $productModel = new Products();
        $categoryModel = new Categories();
        $data['products'] = $productModel->where('feature_product',1)->find();
        $data['categories'] = $categoryModel->findAll();
        return view('frontEnd/home',$data);
    }
}
