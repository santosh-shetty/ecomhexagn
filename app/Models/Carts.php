<?php

namespace App\Models;

use CodeIgniter\Model;

class Carts extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['user_id', 'customer_id', 'customer_name', 'product_id', 'product_name', 'quantity', 'created_at'];

    // public function getCartProducts(){
    //     return $this->select('carts.*, products.product_id, products.product_image,products.product_price, customers.customer_id')
    //         ->join('products', 'products.product_id = carts.product_id')
    //         ->join('customers', 'customers.customer_id = carts.customer_id')
    //         ->get()
    //         ->getResult();
    // }
    public function getCartProducts($customer_id)
    {
        return $this->select('carts.*, products.product_id, products.product_image, products.product_price, customers.customer_id')
            ->join('products', 'products.product_id = carts.product_id')
            ->join('customers', 'customers.customer_id = carts.customer_id')
            ->where('carts.customer_id', $customer_id) // Filter by customer_id
            ->get()
            ->getResult();
    }
    public function deleteCartItemsByCustomerId($customer_id)
    {
        return $this->where('customer_id', $customer_id)
            ->delete();
    }


}