<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Brands;

class ProductFilter extends BaseController
{

    public function filterProducts()
    {
        $selectedCategories = $this->request->getVar('categories');
        $selectedBrands = $this->request->getVar('brands');
        $selectedQuantity = $this->request->getVar('quantity');

        $productModel = new Products();
        $filteredProducts = $productModel->getProductsByCategoryAndBrand($selectedCategories, $selectedBrands, $selectedQuantity);
        return $this->response->setJSON($filteredProducts);
    }

    // // get all products
    // public function filterByAllProducts()
    // {
    //     $productModel = new Products();
    //     // $categoryModel = new Categories();
    //     // $brandsModel = new Brands();
    //     // $data['brands'] = $brandsModel->findall();
    //     // $data['categories'] = $categoryModel->findAll();

    //     $filteredProducts = $productModel->getAllProduct();
    //     return $this->response->setJSON($filteredProducts);

    // }
    // //  ========== Filter for Category =============
    // public function filterByCategory()
    // {

    //     $selectedCategory = $this->request->getVar('category');
    //     // echo "selected Category";
    //     // echo $selectedCategory;exit();
    //     $productModel = new Products();

    //     if (empty($selectedCategory)) {
    //         // No category selected, get all products
    //         $filteredProducts = $productModel->getAllProducts();
    //     } else {
    //         // Filter products by the selected category
    //         $filteredProducts = $productModel->getProductByCategory($selectedCategory);
    //     }
    //     $filteredProducts = $productModel->getProductByCategory($selectedCategory);
    //     return $this->response->setJSON($filteredProducts);

    // }

    // //  ========== Filter for Brands =============
    // public function filterByBrands()
    // {

    //     $selectedBrands = $this->request->getVar('brand');
    //     // echo "selected Category";
    //     // echo $selectedCategory;exit();
    //     $productModel = new Products();


    //     $filteredProducts = $productModel->getProductByBrands($selectedBrands);
    //     return $this->response->setJSON($filteredProducts);

    // }


}