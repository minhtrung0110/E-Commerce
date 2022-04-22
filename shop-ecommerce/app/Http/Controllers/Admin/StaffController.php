<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staffs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Services\StaffService;
use App\Http\Services\RoleService;
class StaffController extends Controller
{
    protected $staffService;
    protected $roleService;

    public function __construct(StaffService $staffService,RoleService $roleService)
    {
        $this->staffService = $staffService;
        $this->roleService = $roleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.staffs.list',[
            'title'=> 'Danh Sách Nhân Viên',
            'staff'=>$this->staffService->getInFo(Session::get('staff_id')),
            'listStaffs'=>$this->staffService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staffs.add',[
            'title'=> 'Thêm Nhân Viên',
            'staff'=>$this->staffService->getInFo(Session::get('staff_id')),
            'roles'=>$this->roleService->getListRoles()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // validate
      // dd($request->all());
     // $this->staffService->create($request);
        if(!is_null($request)){
            $result=$this->staffService->create($request);
            
        }
       
        if($result) 
            return response()->json([
                'error'=>false,
                'message'=>'Thêm Thành Công'
            ]) ;
        else
            return response()->json([
                'error'=>true,
                'message'=>'Thêm Thất Bại'
            ]) ;
       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.staffs.edit',[
            'title'=> 'Sửa Nhân Viên',
            'staff'=>$this->staffService->getInFo(Session::get('staff_id')),
            'staff_edit'=>$this->staffService->getInFo($id)
        ]);
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
