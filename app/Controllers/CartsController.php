<?php

namespace App\Controllers;

use App\Models\Carts;

class CartsController extends BaseController
{
    public function cart()
    {
        return view('frontEnd/cart');
    }
    public function add($id)
    {
        $cartModel = new Carts();
        
        // $cartModel->insert($data);
        //     return view('frontEnd/cart');
    }
}