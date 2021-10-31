<?php

namespace App\Services;
use App\Models\Product;

class ProductService
{
    private $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    public function getAllProduct($requestInfo)
    {
        return $this->product->get();
    }

    public function getProduct($id)
    {
      return $this->product->findOrFail($id);
    }

    public function postProduct($requestInfo)
    {
       $product = new Product;
       return $product->create($requestInfo);
    }

    public function putProduct($id, $requestInfo)
    {
        $product = $this->product->findOrFail($id);
        $product->fill($requestInfo)->save();
        return $product;
    }

    public function deleteProduct($id)
    {
      $this->product->findOrFail($id)->delete();
      return true;
    }
}
