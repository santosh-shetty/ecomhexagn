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

    // // Function for get Product by Category ID
    // public function getProductByCategory($selectedCategoriesId)
    // {
    //     return $this->select('products.*, brands.brand_name, categories.category_name')
    //         ->join('brands', 'brands.brand_id = products.brand_id')
    //         ->join('categories', 'categories.category_id = products.category_id')
    //         // ->where('products.category_id', $categoryId)
    //         ->whereIn('products.category_id', $selectedCategoriesId)
    //         ->get()
    //         ->getResult();
    // }
    // // Function for get Product by Brand ID
    // public function getProductByBrands($selectedBrandId)
    // {
    //     return $this->select('products.*, brands.brand_name, categories.category_name')
    //         ->join('brands', 'brands.brand_id = products.brand_id')
    //         ->join('categories', 'categories.category_id = products.category_id')
    //         ->whereIn('products.brand_id', $selectedBrandId)
    //         ->get()
    //         ->getResult();
    // }
    public function getProductsByCategoryAndBrand($selectedCategories, $selectedBrands, $quantity)
    {
        $query = $this->select('products.*, brands.brand_name, categories.category_name')
            ->join('brands', 'brands.brand_id = products.brand_id')
            ->join('categories', 'categories.category_id = products.category_id');

            if (!empty($quantity)) {
                if ($quantity == 1) {
                    $query->where('products.quantity >=', 1);
                }
                if ($quantity == 0) {
                    $query->where('products.quantity', 0);
                }
            }
        
        if (!empty($selectedBrands)) {
            $query->whereIn('products.brand_id', $selectedBrands);
        }
        if (!empty($selectedCategories)) {
            $query->whereIn('products.category_id', $selectedCategories);
        }

        return $query->get()->getResult();
    }

}