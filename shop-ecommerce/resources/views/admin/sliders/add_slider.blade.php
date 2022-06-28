@extends('admin.layout.layout')
@section('title')
    {{ $title }}
@endsection

@section('main-content')
      
        <div class="card card-success  " style="padding:1em 8em;min-height: ">
           
            <!-- /.card-header -->
            <div class="card-body card-add row col-md-10 mb-sm-4 ml-sm-5">
                <div class="col-sm-12">
                    <h4><strong>Thông Tin Ảnh Trình Chiếu</strong></h4>
                    <p>Người dùng điền chủ đề ảnh, mô tả và tải ảnh lên:</p>
                    </div>
                <form method="post" action="" id="form-add-sliders" class="row" enctype="multipart/form-data">
                    <div class="form-group col-sm-10">
                        <label>Tên Chủ Đề</label>
                        <input type="text" name='name' id="name" class="form-control" placeholder="Tên chủ đề ...">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group col-sm-10">
                        <label>Mô Tả</label>
                        <textarea name="description"  id="description" class="form-control" placeholder="Mô tả về chủ đề..."></textarea>
                        <span class="form-message"></span>
                    </div>
                    
                    <div class="form-group col-sm-10">
                        <label>Hình Ảnh</label>
                        <input type="file" name="thumb" onchange="ImagesFileAsURL('thumb','displayImg');"  id='thumb' class="form-control" placeholder="Enter ...">
                        <span class="form-message"></span>
                        <div id="displayImg">

                        </div>
                    </div>

                    
                    <div class="form-group col-sm-12">
                        <label>Trạng Thái</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                            <label for="active" class="custom-control-label">Hoạt Động</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                            <label for="no_active" class="custom-control-label">Vô Hiệu Hoá</label>
                        </div>
                    </div>                         

                    @csrf
                    <div class="col-sm-1"></div>
                    <button  onClick="backtoPage()" class="btn-cancel-add-admin col-sm-2"> Huỷ</button>
                    <div class="col-sm-2"></div>
                    <button type="submit" class="btn-add-admin col-sm-4"> Thêm Ảnh Trình Chiếu</button>
                    <div class="col-sm-2"></div>
                </form>
                        <!-- /.card-body -->
            </div>
            
           

        </div>
    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function() {
          
            Validator({
                form: '#form-add-sliders',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                  /*  Validator.isRequired('#name', 'Vui lòng nhập tên '),
                    Validator.isRequired('#description', 'Vui lòng nhập chi tiết'),
                    Validator.isRequired('#thumb', 'Vui lòng chọn ảnh'),*/
                ],
                onSubmit: function () {  
                    const namb={
                             name: $('#name').val(),
                            description: $('#description').val(),
                           active: $('#active').val(),
                        thumb: document.getElementById('thumb').files[0]
                    }
  
                  //  console.log(namb)
                     $.ajax({
                        processData: false,
                    contentType: false,
                     type: 'POST',
                     datatype: 'JSON',
                     contentType: "application/json; charset=utf-8",
                    data:{
                             name: $('#name').val(),
                            description: $('#description').val(),
                           active: $('#active').val(),
                        thumb: document.getElementById('thumb').files[0]
                    },
                    url: '/admin/sliders/add',
                     success: function (respond) {
                         console.log(respond.error)

                         if (respond.error == false ) {                       
                             swal("Thêm Thành Công", "Nhân Viên Đã Được Thêm", "success");
                           // setTimeout(() => {window.location="/admin/sliders/list"}, 1200);
                         } 
                         else  {
                             swal("Thêm Thất Bại", "Email Của Nhân Viên Đã Tồn Tại", "error");
                           
                        }
                    }})
               

                 }


            })
        });
    </script>
