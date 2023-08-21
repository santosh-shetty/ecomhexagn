<?php

namespace App\Models;

use CodeIgniter\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['product_name', 'product_price', 'quantity', 'product_desc', 'product_image', 'brand_id', 'category_id', 'feature_product', 'status', 'product_added_at'];

    // Function for get All Data
    public function getAllProduct()
    {
        return $this->select('products.*, brands.brand_name, categories.category_name')
            ->join('brands', 'brands.brand_id = products.brand_id')
            ->join('categories', 'categories.category_id = products.category_id')
            ->get()
            ->getResult();
    }
    // Function for get Product by id
    public function getProductById($id)
    {
        return $this->select('products.*, brands.brand_name, categories.category_name')
            ->join('brands', 'brands.brand_id = products.brand_id')
            ->join('categories', 'categories.category_id = products.category_id')
            ->where('products.product_id', $id)
            ->get()
            ->getRow();
    }
    // Function for get Product by Feature Status
    public function getFeatureProduct()
    {
        return $this->select('products.*, brands.brand_name, categories.category_name')
            ->join('brands', 'brands.brand_id = products.brand_id')
            ->join('categories', 'categories.category_id = products.category_id')
            ->where('products.feature_product', 1)
            ->get()
            ->getResult(); // Use getResult() instead of getRows() for get all records
    }

}