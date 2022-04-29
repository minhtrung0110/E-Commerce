<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CustomerService;
use App\Http\Services\GroupProduct_Service;
use App\Http\Services\ProductService;
use App\Http\Services\CartService;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    protected $customerService;
    protected $groupProductService;
    protected $cartService;
    protected $productService;

    public function __construct(CustomerService $customerService, GroupProduct_Service $groupProductService, CartService $cartService,ProductService $productService)
    {
        $this->customerService = $customerService;
        $this->groupProductService = $groupProductService;
        $this->cartService = $cartService;
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.home',[
                'title'=>'TRESOR',
                'customer'=>$this->customerService->getInFo(Session::get('customer_id')),
                'group_products'=>$this->groupProductService->getAll(),
                'new_arrival_products'=>$this->productService->getNewArrivalProducts(),
               // 'products'=>'products',
               // 'group_product'=>'category',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
