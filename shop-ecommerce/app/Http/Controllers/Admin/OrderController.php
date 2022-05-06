<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\StaffService;
use App\Http\Services\OrderService;
use Illuminate\Support\Facades\Session;



class OrderController extends Controller
{
    protected $staffService;
    protected $orderService;
    public $STATUS=[
        1=>'Chờ xác nhận',
        2=>'Đã xác nhận',
         3=>'Đang giao',
         4=>'Giao giao',
        5=>'Đã hủy',
        6=>'Đã thanh toán'
        ];
    public function __construct(StaffService $staffService, OrderService $orderService)
    {
        $this->staffService=$staffService;
        $this->orderService=$orderService;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $title='Order';
        $staff=$this->staffService->getInFo(Session::get('staff_id'));
        $orders=$this->orderService->getAll();
        // $status=$this->orderService->getStatus();
        // $new=count($status);
        
        // $request->session()->put('key', 'new');

        
        $a=$this->STATUS;
        
     // dd($status->toArray());
         return view('admin.orders.orders',compact('title','staff','orders','a'));
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
        $title='Order|Edit';
        $staff=$this->staffService->getInFo(Session::get('staff_id'));
        $order_ups=$this->orderService->getItem($id);
        $a=$this->STATUS;
        foreach($order_ups as $order_up){
            $id_order=$order_up->id;
            $status_number= $order_up->status_order;
        }
        
        return view('admin.orders.edit_orderDetail',compact('title','staff','status_number','id_order','a'));
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
        
        $result=$this->orderService->update($request->input('status_value'),$id);
        if($result){
            session()->flash('success','Cập nhập thành công');
            return redirect()->route('admin.orders');
        }

        session()->flash('error','Cập nhập thất bại');
        return redirect()->back();
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
    public function showDetail(Request $request){
           $title='Order';
            $staff=$this->staffService->getInFo(Session::get('staff_id'));
            $orderItems=$this->orderService->getItem($request->id);
       //   dd($orderItems->toArray());
        return view('admin.orders.order_details',compact('title','staff','orderItems'));
    }
}
