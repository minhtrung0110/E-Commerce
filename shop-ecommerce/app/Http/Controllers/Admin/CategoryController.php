<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\StaffService;
use Illuminate\Support\Facades\Session;
use App\Http\Services\ProductService;
use App\Http\Services\GroupProduct_Service;
use App\Http\Services\ImagesService;
use App\Http\Services\ImageProductService;
use App\Http\Services\ProductDetailService;
class CategoryController extends Controller
{
    //protected $productService;
    protected $staffService;
     protected $groupProductService;
    // protected $imageProductService;
    // protected $imagesService;
    // protected $productDetailService;
    public function __construct(StaffService $staffService, GroupProduct_Service $groupProductService)
    {
        // $this->productService=$productService;
        $this->staffService=$staffService;
        $this->groupProductService=$groupProductService;
        // $this->groupProductService=$groupProductService;
        // $this->imageProductService=$imageProductService;
        // $this->imagesService=$imagesService;
        // $this->productDetailService=$productDetailService;
    }/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Category';
        $staff=$this->staffService->getInFo(Session::get('staff_id'));
        $categories=$this->groupProductService->getAll();

        return view('admin.categories.category',compact('title','staff','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Category|Add';
        $staff=$this->staffService->getInFo(Session::get('staff_id'));
        return view('admin.categories.add_cate',compact('title','staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $valadate=$request->validate([
            'Cate_name'=>'required|min:4'
        ],[
            'required'=>'Tên danh mục bắt buộc phải nhập',
            'min'=>'Tên danh mục không được nhỏ hơn 6 chữ số'
        ]);
        $result=$this->groupProductService->add_Cate($request);
        if($result){
            Session()->flash('success','Thêm danh mục thành công');
             return redirect()->route('admin.categories.list');
        }
        Session()->flash('error','Thêm danh mục thất bại');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Request $request)
    {
        $result=$this->groupProductService->delete($request);
        if($result){
           return response()->json([
                'error'=>false,
                'message'=>'Xóa thành công danh mục'
            ]);
        }
        return response()->json([
            'error'=>true
        ]);
    }
}
