{{-- {{dd($products->toArray())}} --}}
@extends('admin.layout.layout') 
@section('title')
{{$title}}
@endsection 
@section('infoStaff')
<a href="#" class="d-block">{{$staff->first_name }} {{ $staff->last_name }}</a>

@endsection
 {{-- content  --}}
 
@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- code --}}
    
    <table class="table">
      <thead>
        <tr>
          <th style="width:50px" scope="col">STT</th>
          <th scope="col">Category_Name</th>
          <th scope="col">#</th>
        </tr>
        
      </thead>
      <tbody>
        @foreach ($categories as $key => $cate)
        <tr>
          <th scope="row">{{++$key}}</th>
          <td>{{$cate->name}}</td>
        
       
          <td>
        <a class="btn btn-primary btn-sm" href="/admin/categorys/edit/{{ $cate->id }}">
            <i class="fas fa-edit"></i>
        </a>
            <a href="#" class="btn btn-danger btn-sm"
              onclick="removeRow({{ $cate->id }}, '/admin/categorys/destroy')">
                <i class="fas fa-trash"></i>
            </a>
          </td>
        </tr>
            
        @endforeach

      
      </tbody>
    </table>
  </div>
@endsection 