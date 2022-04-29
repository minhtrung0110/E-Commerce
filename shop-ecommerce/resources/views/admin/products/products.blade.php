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
    @if(Session::has('success'))
    <div class="text-center">
      <p class="alert alert-success">{{Session::get('success')}}</p>
    </div>
    @endif
    <table class="table">
      <thead>
        <tr>
          <th style="width:50px" scope="col">STT</th>
          <th scope="col">Category</th>
          <th scope="col">Product_Name</th>
          <th scope="col">Description</th>
          <th scope="col">Amount</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th style="width:50px" scope="col">Active</th>
          <th scope="col">#</th>
        </tr>
        
      </thead>
      <tbody>
        @foreach ($products as $key => $product)
        <tr>
          <th scope="row">{{++$key}}</th>
          <td>{{$product->name}}</td>
          <td>{{$product->name_product}}</td>
          <td>{{$product->description}}</td>
          <td>{{$product->amount}}</td>
          <td>{{$product->price}}</td>
          <td><a href="{{asset('storage/uploads/'.$product->img)}}" target="_blank">
            <img src="{{asset('storage/uploads/'.$product->img)}}" width="100px">
          </a></td>
      
          <td>{!! App\Helpers\helper::active($product->active) !!}</td>
          <td><a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
            <i class="fas fa-edit"></i>
        </a>
           {{-- <a href="#" class="btn btn-danger btn-sm"
              onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
         <i class="fas fa-trash"></i>
     </a> --}}
          </td>
        </tr>
            
        @endforeach

      
      </tbody>
    </table>
  </div>
@endsection 