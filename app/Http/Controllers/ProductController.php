<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        return $this->productService->getAllProduct($request->all());
    }

    public function show($id)
    {
        return $this->productService->getProduct($id);
    }

    public function store(Request $request)
    {
        return $this->productService->postProduct($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->productService->putProduct($id, $request->all());
    }

    public function destroy($id)
    {
       $product = $this->productService->deleteProduct($id);
       return response('');
    }
}
