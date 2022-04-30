<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Http\Services\CustomerService;
use App\Http\Services\GroupProduct_Service;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    protected $customerService;
    protected $groupProductService;
    public function __construct(CustomerService $customerService, GroupProduct_Service $groupProductService, CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->customerService = $customerService;
        $this->groupProductService = $groupProductService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $result = $this->cartService->create($request);
        if ($result)
            return response()->json([
                'error' => false,
                'message' => 'Thêm Thành Công'
            ]);
        else
            return response()->json([
                'error' => true,
                'message' => 'Thêm Thất Bại'
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
    public function show()
    {
        $product = $this->cartService->getProduct();
        return view('client.carts.list', [
            'title' => 'Giỏ Hàng',
            'group_products'=>$this->groupProductService->getAll(),
            'products' => $product,
            'cart_qty' => Session::get('carts'),
        ]);
    }

    public function addCart(Request $request)
    {
       // $this->cartService->addCart($request);
        return redirect()->back();
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
    public function update(Request $request)
    {
        $this->cartService->update($request);
        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);
        return redirect('/carts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
