@extends('admin.layout.layout')
@section('title')
    {{ $title }}
@endsection

@section('main-content')

        <div class="card card-success  " style="padding:1em 8em;min-height: ">     
            <div class="card-body card-add row col-md-10 mb-sm-4 ml-sm-5">
                <div class="col-sm-12">
                    <h4><strong>Thông Tin Ảnh Trình Chiếu</strong></h4>
                    <p>Người dùng điền chủ đề ảnh, mô tả và tải ảnh lên:</p>
                    </div>
                @foreach($sliders as $slider)
                <form method="post" action="" id="form-edit-sliders" class="row" enctype="multipart/form-data">

                    <!-- text input -->
                    <input type="hidden" value="{{$slider->id}}" name="id" >
                    <div class="form-group col-sm-10">
                        <label>Tên Chủ Đề</label>
                        <input type="text" name='name' id="name" value="{{$slider->name}}" class="form-control" placeholder="Tên chủ đề...">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group col-sm-10">
                        <label>Mô Tả</label>
                        <textarea  name="description"  id="description" class="form-control" >{{$slider->description}}</textarea>
                        <span class="form-message"></span>
                    </div>
                    
            
                    <div class="form-group col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumb" name="thumb"   onchange="ImagesFileAsURL('thumb','displayImg');GetValuefile('thumb','js-show-file');">
                            <label class="custom-file-label"id="js-show-file" for="thumb">{{$slider->thumb}}</label>
                           </div>
                           <span class="form-message"></span>
                          <div id="displayImg">
                          
                            <a href="{{asset('storage/sliders/'.$slider->thumb)}}" target="_blank">
                              <img src="{{asset('storage/sliders/'.$slider->thumb)}}" width="100px">
                            </a>
                          </div>
                        <input type="hidden" value="{{$slider->thumb}}" name="img" >
                    </div>

                    
                    <div class="form-group col-sm-12">
                        <label>Trạng Thái</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{$slider->active ==1 ? 'checked':''}}>
                            <label for="active" class="custom-control-label">Hoạt Động</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" {{$slider->active ==0 ? 'checked':''}} >
                            <label for="no_active" class="custom-control-label">Vô Hiệu Hoá</label>
                        </div>
                    </div>                         
                    @csrf
                    <div class="col-sm-1"></div>
                    <button  onClick="backtoPage()" class="btn-cancel-add-admin col-sm-2"> Huỷ</button>
                    <div class="col-sm-2"></div>
                    <button type="submit" class="btn-add-admin col-sm-4"> Cập Nhật Ảnh Trình Chiếu</button>
                    <div class="col-sm-2"></div>
                </form>
                @endforeach
                        <!-- /.card-body -->
            </div>
            
           

        </div>
    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function() {
           /* Validator({
                form: '#form-add-sliders',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#name', 'Vui lòng nhập tên '),
                    Validator.isRequired('#description', 'Vui lòng nhập chi tiết'),
                  
                ],
            })*/
            $('#form-edit-sliders').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "/admin/sliders/edit/{id}",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    if (response) {
                        // this.reset();
                        console.log(response);
                        if (response.error === false) {
                            swal("Cập Nhật Thành Công", "Chủ Đề Đã Được Cập Nhật", "success");
                            setTimeout(() => {
                                window.location = "/admin/sliders/list"
                            }, 1200);
                        } else {
                            swal("Cập Nhật Thất Bại", "Cập Nhật Chủ Đề Và Ảnh Thất Bại", "error");

                        }
                    }
                },
               
            });
        });
        });
    </script>
