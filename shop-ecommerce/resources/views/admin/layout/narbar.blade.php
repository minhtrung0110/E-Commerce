{{-- dashboard --}}


<li class="nav-item">
    <a href="{{Route('admin.dashboard')}}" class="nav-link ">
        <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Tổng Quan
        {{-- <span class="badge badge-info right">2</span> --}}
      </p>
    </a>
</li>
{{-- danh mục --}}
<li class="nav-item nav-item-li" id="nav-item-group-products">
  <a href="#" class="nav-link ">
    <i class="nav-icon fas fa-tachometer-alt"></i>
  <p>
    Danh Mục Sản Phẩm
    {{-- <span class="badge badge-info right">2</span> --}}
  </p>
  <i class="fas fa-angle-left right"></i>
</a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{Route('admin.categories.list')}}" class="nav-link" id='group-products'>
        <i class="far fa-circle nav-icon"></i>
        <p>Danh Sách Danh Mục</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{Route('admin.categories.add')}}" class="nav-link" id='group-products' >
        <i class="far fa-circle nav-icon"></i>
        <p>Thêm Danh Mục</p>
      </a>
    </li>
  </ul>
</li>
{{-- QL-san pham --}}
<li class="nav-item nav-item-li " id="nav-item-products" >
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Sản Phẩm
      {{-- <span class="badge badge-info right">2</span> --}}
    </p>
    <i class="fas fa-angle-left right"></i>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{Route('admin.products.list')}}" class="nav-link" id='products'>
        <i class="far fa-circle nav-icon"></i>
        <p>Danh Sách Sản Phẩm</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{Route('admin.product.add')}}" class="nav-link" id='products'>
        <i class="far fa-circle nav-icon"></i>
        <p>Thêm Sản Phẩm</p>
      </a>
    </li>
  </ul>
</li>
    
{{-- QL-mã giảm giá --}}
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Mã giảm giá
      {{-- <span class="badge badge-info right">2</span> --}}
    </p>
    <i class="fas fa-angle-left right"></i>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{Route('admin.discount.list')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>danh sách mã giảm giá</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{Route('admin.discount.add')}}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>thêm mã giảm giá</p>
      </a>
    </li>
  </ul>
</li>
{{-- QL-nhap hang--}}

    
<li class="nav-item nav-item-li" id="nav-item-imports" >
  <a href="{{Route('admin.imports')}}" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Nhập Hàng
      {{-- <span class="badge badge-info right">2</span> --}}
    </p>
  </a>
</li>
{{-- QL đơn hàng --}}

   
<li class="nav-item nav-item-li" id="nav-item-orders">
  <a href="{{Route('admin.orders')}}" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Đơn Hàng
      <span class="badge badge-info right">@yield('notifications')</span>
    </p>
  </a>
</li>

{{-- QL-nhan vien --}}
<li class="nav-item nav-item-li " id="nav-item-staffs" >
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Nhân Viên
      {{-- <span class="badge badge-info right">2</span> --}}
    </p>
    <i class="fas fa-angle-left right"></i>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="/admin/staffs/list" class="nav-link" id='staffs'>
        <i class="far fa-circle nav-icon"></i>
        <p>Danh Sách Nhân Viên</p>
      </a>
    </li>
    <li class="nav-item ">
      <a href="/admin/staffs/add" class="nav-link" id='staffs'>
        <i class="far fa-circle nav-icon"></i>
        <p>Thêm Nhân Viên</p>
      </a>
    </li>
  </ul>
</li>
{{-- QL-khach hang --}}
<li class="nav-item nav-item-li " id="nav-item-customers" >
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Khách Hàng
      {{-- <span class="badge badge-info right">2</span> --}}
    </p>
    <i class="fas fa-angle-left right"></i>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="/admin/customers/list" class="nav-link" id='customers'>
        <i class="far fa-circle nav-icon"></i>
        <p>Danh Sách Khách Hàng</p>
      </a>
    </li>
    <li class="nav-item ">
      <a href="/admin/customers/add" class="nav-link" id='customers'>
        <i class="far fa-circle nav-icon"></i>
        <p>Thêm Khách Hàng</p>
      </a>
    </li>
  </ul>
</li>
















<li class="nav-item">
 <a type="button" class="btn btn-danger center btn-logout-admin" href="{{route('logout.admin')}}">Đăng Xuất</a>
</li>