<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Interfaces\Backend\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function allProduct()
    {
        return $this->productRepository->allProduct();
    }

    public function addProduct()
    {
        return $this->productRepository->addProduct();
    }

    public function storeProduct(ProductRequest $request)
    {
        return $this->productRepository->storeProduct($request);
    }

    public function editproduct($id)
    {
        return $this->productRepository->editproduct($id);
    }

    public function updateProduct(ProductRequest $request)
    {
        return $this->productRepository->updateProduct($request);
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->deleteProduct($id);
    }
}
