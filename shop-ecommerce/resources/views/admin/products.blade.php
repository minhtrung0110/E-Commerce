@extends('admin.layout.layout') 
@section('tilte')
{{$tilte}}
@endsection 
 {{-- itemt navbar --}}
{{-- @section('product')

  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="pages/layout/top-nav.html" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Product</p>
      </a>
    </li>
  </ul>
@endsection  --}}
 
 
 {{-- content  --}}
 
@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- code --}}
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button type="button" class="btn btn-success">Add</button> 
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Product_Name</th>
          <th scope="col">Description</th>
          <th scope="col">#</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"></th>
          <td>Mark</td>
          <td>Otto</td>
          <td><button type="button" class="btn btn-primary">Primary</button>
            <button type="button" class="btn btn-danger">Danger</button>
          </td>
        </tr>
        
      </tbody>
    </table>
  </div>
@endsection 