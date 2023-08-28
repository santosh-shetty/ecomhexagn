<?php

namespace App\Models;

use CodeIgniter\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $allowedFields = ['category_name','category_image','category_desc','status','slug','category_added_at'];

    // Function for get All Data
    // public function getAllProduct()
    // {
    //     return $this->select('products.*, brands.brand_name, categories.category_name')
    //         ->join('brands', 'brands.brand_id = products.brand_id')
    //         ->join('categories', 'categories.category_id = products.category_id')
    //         ->get()
    //         ->getResult();
    // }

}