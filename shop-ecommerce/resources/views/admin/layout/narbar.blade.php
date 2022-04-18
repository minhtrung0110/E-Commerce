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

{{-- QL-san pham --}}

    
<li class="nav-item">
    <a href="{{Route('admin.products')}}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Sản Phẩm
        {{-- <span class="badge badge-info right">2</span> --}}
      </p>
    </a>
</li>
{{-- QL-nhap hang--}}

    
<li class="nav-item">
  <a href="{{Route('admin.imports')}}" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Nhập Hàng
      {{-- <span class="badge badge-info right">2</span> --}}
    </p>
  </a>
</li>
{{-- QL đơn hàng --}}

   
<li class="nav-item">
  <a href="{{Route('admin.orders')}}" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Đơn Hàng
      <span class="badge badge-info right">2</span>
    </p>
  </a>
</li>