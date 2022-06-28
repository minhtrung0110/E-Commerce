@extends('admin.layout.layout')
@section('title')
    {{ $title }}
@endsection

@section('main-content')


    <div class="card">
        <div class="card-header row">
            <h3 class="card-title col-md-4"><strong>Danh Sách Ảnh Trình Chiếu</strong></h3>
            <div class="col-md-3"></div>
            <form action="" method="post" id="form-search-slider" class="col-md-3">
                <div class="input-group " style="width: 250px;">
                    @csrf
                    <input type="text" name="search" class="form-control float-right" placeholder="Tìm Theo Chủ Đề">

                    <div class="input-group-append input-group-sm ">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <button class=" col-md-1 btn btn-dark ml-2 hg-button-filter"><a href="/admin/sliders/add" class="cl-white">Thêm
              Ảnh
          </a></button>
        </div>

        <div class="card-body table-responsive p-0 pl-sm-4  pr-sm-4" style="height: 550px;">

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>

                        <th style="width:5%">STT</th>
                        <th style="width:10%">Chủ Đề</th>
                        <th style="width:12%">Mô Tả</th>
                        <th style="width:10%">Hình Ảnh</th>
                        <th style="width:5%">Trạng Thái</th>
                        <th style="width:5%">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($sliders) == 0)
                        <tr>
                            <td colspan="9" class="text-center">
                                <h5>Không có thanh trược nào </h5>
                            </td>
                        </tr>
                    @else
                        @foreach ($sliders as $key => $slider)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $slider->name }}</td>
                                <td>{{ $slider->description }}</td>
                                <td><a href="{{ asset('storage/sliders/' . $slider->thumb) }}" target="_blank">
                                        <img src="{{ asset('storage/sliders/' . $slider->thumb) }}" width="100px">
                                    </a></td>

                                <td>{!! App\Helpers\helper::active($slider->active) !!}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{ $slider->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm"
                                        onclick="removeRow({{ $slider->id }}, '/admin/sliders/destroy')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif


                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>



@endsection
