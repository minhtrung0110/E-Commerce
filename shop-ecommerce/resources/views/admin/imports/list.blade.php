@extends('admin.layout.layout') 
@section('title')
{{$title}}
@endsection 

@section('main-content')
<div class="content-wrapper">


  <div class="row">
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Chi tiết nhập hàng</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          
          <form id="form-add-import" method="post">

            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="name_provider">Tên nhà cung cấp</label>
                <select name="name_provider" class="form-control" id="name_provider">
                  <option value="">Chọn nhà cung cấp</option>
                    @foreach($providers as $provider)
                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                    @endforeach
                </select>
               <span class="form-message"></span>

              </div>
              <div class="form-group">
                <label for="category">Loại sản phẩm</label>
                <select name="category"  class="form-control" id="category" onchange="searchProduct(this.value);">
                  <option value="">Chọn loại sản phẩm</option>
                    @foreach($categorys as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
               <span class="form-message"></span>


              </div>
              <div class="form-group">
                <label for="product">Sản phẩm</label>
                <select name="product" class="dataload form-control" id="product">
               
                </select>
                <span class="form-message"></span>

              </div>
              <div class="form-group">
                <label for="amount">Số lượng</label>
               <input type="number" min="0"  class="form-control" id="amount" placeholder="Số lượng..." name="amount">
                <span class="form-message"></span>
              </div>
              
              <div class="form-group">
                <label for="price">Giá nhập về</label>
               <input type="text"  class="form-control" id="price" placeholder="Giá..." name="price">
               <span class="form-message"></span>
                
              </div>
           
            </div>
            <!-- /.card-body -->
            
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
          </form>
         
        </div>
       

      </div>
      <div class="card card-primary col-md-8">
        <div class="card-header">
          <h3 class="card-title">Hóa đơn nhập hàng</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">STT</th>
                <th>Tên nhà cung cấp</th>
                <th>Loại sản phẩm</th>
                <th >Tên sản phẩm</th>
                <th >Số lượng</th>
                <th >giá nhập</th>
                <th >#</th>
              </tr>
            </thead>
            <tbody id="js_show_import">
          
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td> 
                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{ $provider->id }}, '/admin/providers/destroy')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
              </tr>
            
          
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer float-right">
          <button type="submit" class="btn btn-primary">nhập hàng</button>
        </div>
      </div>
     
</div>


<script>  

const obj_product =JSON.parse('<?= $productsAll ; ?>')
const obj_category =JSON.parse('<?= $categorys ; ?>')
const obj_provider =JSON.parse('<?= $providers ; ?>')


const showImport=document.getElementById('js_show_import')

const product=document.getElementById('product')
var html=obj_product.map(o =>{
    return `<option value="${o.id}">${o.name}</option>`;
  });
 var str= html.join('');
 product.innerHTML=str;


function searchProduct(data) {
      var array=obj_product.filter(o =>o.group_id==data);
    if(array.length>0){
      var htmls=array.map(o =>{
        return `<option value="${o.id}">${o.name}</option>`;
      });
    var strs= htmls.join('');
    product.innerHTML=strs;
    }else{
      var htmls=`<option >không có sản phẩm</option>`;

    product.innerHTML=htmls;
    }

}

</script>

@endsection
<script>
  document.addEventListener('DOMContentLoaded', function() {
      Validator({
          form: '#form-add-import',
          formGroupSelector: '.form-group',
          errorSelector: '.form-message',
          rules: [
            Validator.isRequired('#name_provider', 'Vui lòng chọn nhà cung cấp'),
            Validator.isRequired('#category', 'Vui lòng chọn loại sản phẩm'),
            Validator.isRequired('#product', 'Vui lòng chọn sản phẩms'),
            Validator.isRequired('#amount', 'Vui lòng nhập số lượng'),
            Validator.isRequired('#price', 'Vui lòng nhập giá'),
            Validator.isNumber('#price','Vui lòng nhập giá không âm'),
          ],
          onSubmit: function (data) {    
              $.ajax({
              type: 'POST',
              datatype: 'JSON',
              data: $('#form-add-import').serialize(),
              url: '/admin/imports/add',
              success: function (respond) {
                  

                  if (respond.error !== true ) {                       
                      swal("Thêm Thành Công",respond.message, "success");
                     setTimeout(() => {location.reload()}, 1200);
                  } 
                  else  {
                      swal("Thêm Thất Bại", respond.message, "error");
                     
                  }
              }
          })

          }
      });
  });
</script>