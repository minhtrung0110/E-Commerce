<?php

namespace App\Http\Controllers\client;
use App\Http\Services\RatingService;
use App\Http\Controllers\Controller;
use App\Http\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $ratingService;
    protected $orderService;
    public function __construct(RatingService $ratingService,OrderService $orderService)
    {
        $this->ratingService=$ratingService;
        $this->orderService=$orderService;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        if (Session::has('customer_id') && Session::get('customer_login') == true) {
            $id_cutomer=Session::get('customer_id');
            $check=$this->orderService->check($id_cutomer,$request->input('product_id'));
            
            if($check){
                $result=$this->ratingService->create($request,$id_cutomer);
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'Bạn chưa từng mua sản phẩm này'
                ]);
            }

            
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Đăng Nhập Để Bình luận'
            ]);
        }

            if($result){
                return response()->json([
                    'error' => false,
                    'message' => 'Bình luận thành công'
                ]);
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'Bình luận thất bại'
                ]);
            }
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
