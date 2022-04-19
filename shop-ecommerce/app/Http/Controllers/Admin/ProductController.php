<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService=$productService;
    }
    public function index(){
        $title='Product';
        $products=$this->productService->getAllProduct();

        return view('admin.products',compact('title','products'));
    }
    public function show($id){
        $title='Product-Detail';
        $products=$this->productService->getProduct($id);
        return view('admin.products-detail',compact('title','products'));
    }
}
