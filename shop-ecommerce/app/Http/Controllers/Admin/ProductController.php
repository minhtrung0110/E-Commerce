<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\ProductService;
use App\Http\Services\GroupProduct_Service;
use App\Http\Services\ImagesService;
use App\Http\Services\ImageProductService;

use Illuminate\Support\Facades\Session;
use App\Http\Services\StaffService;


class ProductController extends Controller
{
    protected $productService;
    protected $staffService;
    protected $groupProductService;
    protected $imageProductService;
    protected $imagesService;
    public function __construct(ProductService $productService,
                                StaffService $staffService,
                                GroupProduct_Service $groupProductService,
                                ImageProductService $imageProductService,
                                ImagesService $imagesService)
    {
        $this->productService=$productService;
        $this->staffService=$staffService;
        $this->groupProductService=$groupProductService;
        $this->imageProductService=$imageProductService;
        $this->imagesService=$imagesService;
       
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Product';
        $products=$this->productService->getAllProduct();
  
        $staff=$this->staffService->getInFo(Session::get('staff_id'));

        return view('admin.products.products',compact('title','products','staff'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title='Products|Add';
        $staff=$this->staffService->getInFo(Session::get('staff_id'));
        $categorys=$this->groupProductService->getAll();

      
        return view('admin.products.add_product',compact('title','staff','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Product_name' => 'required|min:6',
            'Category' => 'required',
            'Amount' => 'required|integer',
            'Price' => 'required|integer',
            'Img_link' => 'required',
        ],[
            'Product_name.required'=>'Tên sản phẩm phải bắt buộc',
            'Product_name.min'=>'Tên sản phẩm không được nhỏ hơn 6 ký tự',
            'Category.required'=>'Tên danh mục phải bắt buộc',
            'Amount.required'=>'Số lượng sản phẩm phải bắt buộc',
            'Amount.integer'=>'Số lượng sản phẩm phải là chữ số',
            'Price.required'=>'Giá sản phẩm phải bắt buộc',
            'Price.integer'=>'Giá sản phẩm phải là chữ số',
            'Img_link.required'=>'Hình ảnh sản phẩm phải bắt buộc',

        ]);
        $result= $this->productService->create($request);
        // $this->imageProductService->create($request,$result);
        // $this->imagesService->create($request,$result);
      dd($result);
         //return redirect()->back();
        // dd($request->all());
       // dd($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title='Product-Detail';
        $staff=$this->staffService->getInFo(Session::get('staff_id'));
        $products=$this->productService->getProduct($id);
        return view('admin.products.products-detail',compact('title','products','staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
