<?php

namespace App\Controllers;

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
}
