@extends('admin.layout.layout') 
@section('title')
{{$title}}
@endsection 

@section('main-content')
<div class="content-wrapper">

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh Sách đánh giá</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <form action="" method="post" id="form-search-rating">

              <div class="input-group-append">
                  <Select style="width:100px" value="" name="point">
                      <option @php if($point==0) echo 'selected'; @endphp value="0">All</option>
                      <option @php if($point==1) echo 'selected'; @endphp value="1">1 &#10025;</option>
                      <option @php if($point==2) echo 'selected'; @endphp value="2">2 &#10025;</option>
                      <option @php if($point==3) echo 'selected'; @endphp value="3">3 &#10025;</option>
                      <option @php if($point==4) echo 'selected'; @endphp value="4">4 &#10025;</option>
                      <option @php if($point==5) echo 'selected'; @endphp value="5">5 &#10025;</option>
                  </Select>
                  @csrf
                <button id="search_rating" type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
          </form>

        </div>
      </div>
    </div>
  
    <div class="card-body table-responsive p-0" style="height: 550px;">
        @if(Session::has('success'))
        <div class="text-center">
          <p class="alert alert-success">{{Session::get('success')}}</p>
        </div>
        @endif
      <table class="table">
        <thead >
          <tr>
           
            <th >STT</th>
            <th >Tên</th>
            <th >Nội dung</th>
            <th >Sao</th>
            <th >Sản phẩm</th>
            <th >Hình ảnh</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($ratings as $key => $rating)
            <tr>
              <th scope="row">{{++$key}}</th>
              <td>{{$rating->first_name.' '.$rating->last_name}}</td>
              <td>{{$rating->context}}</td>
              <td>{{$rating->point}}&#10025;</td>
              <td>{{$rating->name}}</td>
              <td><a href="{{asset('storage/uploads/'.$rating->img)}}" target="_blank">
                <img src="{{asset('storage/uploads/'.$rating->img)}}" width="100px">
              </a></td>
             
              
            </tr>
                
            @endforeach
            
         
        </tbody>
      </table>
      
    </div>
    <!-- /.card-body -->
  </div>
  
</div>

@endsection

