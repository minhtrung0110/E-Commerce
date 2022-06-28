@extends('admin.layout.layout')
@section('title')
    {{ $title }}
@endsection

@section('main-content')
    <div class="row">
        <div class="card col-md-12 card-warning pt-sm-2 ">
            <form action="" method="post" id="form-search-rating" class=" row">
                <div class="col-md-6 row pl-sm-5">
                    <div class="input-group form-group col-md-7">
                        <input type="text" name="search" class="form-control float-right" placeholder="Nhập dữ liệu tìm">
                    
    
                    </div>
                    <select class="form-control col-md-5" name="searchFor">
                        <option value="product_name">Tìm Theo Tên Sản Phẩm</option>
                        <option value="customer_name">Tìm Theo Tên Khách Hàng</option>
                        <option value="customer_id">Tìm Theo Mã Khách Hàng</option>
                        <option value="email">Tìm Theo Email Khách Hàng</option>
                        <option value="product_id">Tìm Theo Mã Sản Phẩm</option>
                    </select>
    
                    <label class="col-md-2 label-justify-center">Số Điểm:</label>
                    <select class="form-control col-md-8" value="" name="point">
                        <option value="">Tất cả</option>
                        <option @php
                            if ($point == 1) {
                                echo 'selected';
                            }
                        @endphp value="1">1 &#10025;</option>
                        <option @php
                            if ($point == 2) {
                                echo 'selected';
                            }
                        @endphp value="2">2 &#10025;</option>
                        <option @php
                            if ($point == 3) {
                                echo 'selected';
                            }
                        @endphp value="3">3 &#10025;</option>
                        <option @php
                            if ($point == 4) {
                                echo 'selected';
                            }
                        @endphp value="4">4 &#10025;</option>
                        <option @php
                            if ($point == 5) {
                                echo 'selected';
                            }
                        @endphp value="5">5 &#10025;</option>
                    </select>
                </div>
                <div class="col-md-6 row  ">
                    <label for="role_id" class="col-md-4 label-justify-center">Loại Sản Phẩm: </label>
                    <select name="category" class="form-control col-md-5" id="">
                        <option value="">Tất cả</option>
                        @foreach ($categorys as $category)
                            <option @php
                                if ($category_id == $category->id) {
                                    echo 'selected';
                                }
                            @endphp value="{{ $category->id }}">{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="col-md-1">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <label class="col-md-3 label-justify-center">Ngày Đánh Giá:</label>
                        <div class="row form-group col-sm-8">
                            <div class="col col-sm-6">
                                <input type="date" class="form-control " name="start_date" id="start_date">
                            </div>
                            <div class="col col-sm-6">
                                <input type="date" class="form-control " name="end_date" id="end_date">
                            </div>
                            <span class="form-message"></span>
                        </div>
                  
                </div>   
               @csrf
            </form>
        </div>
    </div>

    <div class="card col-md-12 card-info ">

        <div class="card-header">
            <h2 class="card-title"><strong>Danh Sách Đánh Giá Chất Lượng Sản Phẩm</strong></h2>
        </div>
        <div class="card-body table-responsive p-0 table-bordered" style="height: 650px;">
            <table class="table table-responsive table-head-fixed text-nowrap table-hover table-condensed">
                <thead style="background:rgba(0,0,0,.05); ">
                    <tr>

                        <th>STT</th>
                        <th>Khách Hàng Đánh Giá</th>
                        <th style="width:30%">Nội Dung Đánh Giá</th>
                        <th>Số Điểm </th>
                        <th>Sản Phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Thời Gian Đánh Giá</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($ratings) == 0)
                        <tr>
                            <td colspan="9" class="text-center">
                                <h5>Không có đánh giá</h5>
                            </td>
                        </tr>
                    @else
                        {!! \App\Helpers\Helper::renderListRatingsFormCustomer($ratings) !!}
                    @endif

                </tbody>
            </table>
            <!-- /.card-body -->
        </div>

    </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        Validator({
            form: '#form-searchas-rating',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [

                Validator.isTommorrow('#end_date', function() {
                    return document.querySelector('#form-search-rating #start_date').value;
                }, 'Ngày chọn không hợp lệ')

            ],

        })
    });
</script>
