{{-- dashboard --}}


<li class="nav-item">
    <a href="{{Route('admin.dashboard')}}" class="nav-link ">
        <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
        {{-- <span class="badge badge-info right">2</span> --}}
      </p>
    </a>
</li>

{{-- QL-san pham --}}

    
<li class="nav-item">
    <a href="{{Route('admin.products')}}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Product
        {{-- <span class="badge badge-info right">2</span> --}}
      </p>
    </a>
</li>
{{-- QL đơn hàng --}}

   
<li class="nav-item">
  <a href="{{Route('admin.orders')}}" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Order
      <span class="badge badge-info right">2</span>
    </p>
  </a>
</li>