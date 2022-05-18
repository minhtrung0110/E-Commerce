<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\StaffService;
use App\Http\Services\OrderService;
use App\Http\Services\OrderDetailService;
use App\Models\Staff;
use App\Http\Services\CustomerService;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{
    protected $staffService;
    protected $orderDetailService;
    protected $orderService;
    protected $customerService;

    public function __construct(StaffService $staffService, OrderDetailService $orderDetailService,OrderService $orderService, CustomerService $customerService)
    {
        $this->staffService = $staffService;
        $this->orderDetailService = $orderDetailService;
        $this->customerService = $customerService;
        $this->orderService = $orderService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('admin.dashboard',[
            'title'=>'Quản Trị Website Bán Hàng',
            'staff'=>$this->staffService->getInFo(Session::get('staff_id')),
            'statisticsGroupProduct'=> $this->orderDetailService->statisTical()

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
