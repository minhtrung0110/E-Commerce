<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\OrderService;
use App\Http\Services\PaymentMethodService;

class Helper
{
    protected $orderService;


    public static function renderGroupProducts($menus)
    {
        $html = '';
        if (is_null($menus)) return $html;
        foreach ($menus as $key => $menu) {

            $html .= '
                    <li>
                        <a href="/products/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                            ' . $menu->name . '
                        </a>';


            $html .= '</li>';
        }
        return $html;
    }

    public static function renderGroupProductBanners($menus)
    {
        $html = '';
        if (is_null($menus)) return $html;
        foreach ($menus as $key => $menu) {

            $images = (is_null($menu->images)) ? '' : ' <img src="images/banner-01.jpg" alt="IMG-BANNER">';

            $html .= '
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">

                    <img src="/storage/categories/' . $menu->thumb . '" alt="IMG-BANNER">

                    <a href="/products/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                               ' . $menu->name . '
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                               Xem Ngay
                            </div>
                        </div>
                    </a>
                </div>
            </div>';
        }
        return $html;
    }

    public static function renderUserLogin()
    {
        $html = '';
        $customer_id = Session::get('customer_id');
        $checkLogin = Session::get('customer_login');
        if ($checkLogin == true && !is_null($customer_id)) {
            $data = \App\Http\Services\CustomerService::getInFo($customer_id);
            $customer_firstname = $data->first_name;
            $customer_lastname = $data->last_name;
            $html = '
  
            <div class="dropdown">
                <button class="dropbtn">
                     
                        <span>' . $customer_firstname . ' ' . $customer_lastname . '</span>                
                        
                </button>
            <div class="dropdown-content">
                <a href="/myprofile">Thông Tin Tài Khoản</a> </a>
                <a href="/logout">Đăng Xuât</a> </a>
            </div>
            </div>
            ';
        } else $html = '
       <a href="/login" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
             <i class="zmdi zmdi-account-circle"></i>
       </a>
       ';
        return $html;
    }

    public static function renderSlider($sliders)
    {
        $html = '';
        if (is_null($sliders)) return $html;
        foreach ($sliders as $key => $slider) {

            $html .= '
                <div class="item-slick1" style="background-image: url(/storage/sliders/' . $slider->thumb . ');">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                               ' . $slider->description . '
                            </span>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                            ' . $slider->name . '
                            </h2>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                           
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
        return $html;
    }

    public static function renderProductNewArrival($new_arrival_products)
    {
        $html = '';
        if (is_null($new_arrival_products)) return $html;
        foreach ($new_arrival_products as $key => $product) {
            /*get value*/
            if ($product->active == 1) {
                $id = $product->id;
                $name = $product->name_product;
                $price = $product->price;
                $image = $product->img;

                $html .= '
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="/storage/uploads/' . $image . '"alt="IMG-PRODUCT">
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="/detail-product/' . $id . '-' . Str::slug($name, '-') . '.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    ' . $name . '
                                </a>

                                <span class="stext-105 cl3">
                                ' . number_format($price) . ' VNĐ
                                </span>
                            </div>

                           
                        </div>
                    </div>
                </div>
            ';
            }
        }
        return $html;
    }
    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">HUỶ</span>'
            : '<span class="btn btn-success btn-xs">KÍCH HOẠT</span>';
    }

    public static function renderListViewStaff($listStaffs)
    {
        $html = '';
        foreach ($listStaffs as $key => $staff) {
            $html .= '
              <tr>
              <td>' . $staff->id . '</td>
              <td>' . $staff->first_name . ' ' . $staff->last_name . '</td>
              <td>' . $staff->role_id . '</td>
              <td>' . $staff->phone . '</td>
              <td>' . $staff->email . '</td>
              <td style="width:10%">' . $staff->password . '</td>
              <td>' . $staff->address . '</td>
              <td>' . self::active($staff->status) . '</td>
              <td>
              <a  class="btn btn-primary btn-sm" href="/admin/staffs/edit/' . $staff->id . '"><i class="fas fa-edit"></i></a>
                    <a  class="btn btn-danger btn-sm" onclick="removeRow(' . $staff->id . ', \'/admin/staffs/destroy\')")" ><i class="fas fa-trash"></i></a></td>
            </tr>';
        }

        return $html;
    }

    public static function renderClassNameForNavItem($request)
    {
        $html = '';
        if ($request->is('admin/staffs/*')) {
            $html = 'menu-is-opening menu-open ';
        }

        return $html;
    }
    public static function getNumberCart()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return 0;
        return count($carts);
    }

    /*------Product Details --------------------------------*/
    public static function renderRelativeProducts($relative_products)
    {
        $html = '';
        if (is_null($relative_products)) return $html;
        foreach ($relative_products as $item) {
            $html .= '
            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="/storage/uploads/' . $item->img . '" alt="IMG-PRODUCT">

                    <a href="/detail-product/' . $item->id . '-' . Str::slug($item->name_product, '-') . '.html"
                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                        Quick View
                    </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/detail-product/' . $item->id . '-' . Str::slug($item->name_product, '-') . '.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        ' . $item->name_product . '
                        </a>

                        <span class="stext-105 cl3">
                        ' . number_format($item->price) . ' VNĐ
                        </span>
                    </div>

                    
                </div>
            </div>
        </div>
            ';
        }
        return $html;
    }

    /* Profile */
    public static function renderListOrderCustomer($orders)
    {
        $STATUS = [
            1 => 'Chờ xác nhận',
            2 => 'Đã xác nhận',
            3 => 'Đang giao',
            4 => 'Giao giao',
            5 => 'Đã hủy',
            6 => 'Đã thanh toán'
        ];

        $html = '';
        if (is_null($orders)) return $html;
        foreach ($orders as $item) {
            $date = date_format($item->created_at, 'd-m-Y H:i:s');
            $info_product = \App\Helpers\Helper::renderListProductOrder($item->order_id);
            $payment_method = \App\Helpers\Helper::getpaymentMethod($item->payment_method_id);
            $html .= '
            
            <tr class="order-item" data-redirect="/myprofile/invoices/' . $item->order_id . '">

            <td class="items id_order">TR' . $item->order_id . '</td>
            <td class="items">' . $date . '</td>
            <td class="items name-product">
             ' . $info_product . '
            </td>
            <td class="items">' . $item->total_price . '</td>
            <td class="items">' . $payment_method . '</td>
            <td class="items">' . $STATUS[$item->status_order] . '</td>
           
        </tr>
       
            ';
        }
        return $html;
    }
    public function renderListProductOrder($order_id)
    {
        $list_product = \App\Http\Services\OrderService::getListProductOrderDetails($order_id);
        $html = '';
        foreach ($list_product as $item) {
            $html .= '
            <a class="name_product_content"  href="/detail-product/' . $item->product_id . '-' . Str::slug($item->product_name, '-') . '.html">
           
            ' . $item->product_name . '  -  Số Lượng: ' . $item->amount_detail . '<br> </a>
            ';
        }

        return $html;
    }
    public static function getpaymentMethod($id)
    {
        $html = \App\Http\Services\PaymentMethodService::getpaymentMethod($id);
        return $html->name;
    }

    public function renderOrderDetailsCustomer($order_details)
    {
        $html = '';
        $tr = '';
        $total_price=0;
        $discount_value = 0;
        if (is_null($order_details)) return $html;
        foreach ($order_details as $key => $item) {
            $key += 1;
            $total_price += $item->product_price*$item->amount_detail;
            $discount_value = $item->discount_value;
            $tr .= '
            <tr>
            <td class="number_list txt-center"><span class="label label-success">' . $key . '</span>
                </td>
                <td class="order_product txt-center">
                    <a href="/detail-product/' . $item->product_id . '-' . Str::slug($item->name, '-') . '.html">
                    <img class="img_order" src="/storage/uploads/' . $item->img . '" alt="Sản Phẩm">
                    </a>
                </td>
                <td class="order_description ">
                    <p class="product-name"><a href="/detail-product/' . $item->product_id . '-' . Str::slug($item->name, '-') . '.html">' . $item->name . ' </a>
                    </p>
                    <small class="order_ref">MÃ SP: ' . $item->product_id . '</small>
                    <br>
                   
                </td>
                <td class="order_avail txt-center">' . $item->amount_detail . '                </td>
                <td class="price txt-center">' . $item->product_price . '
                </td>    
                <td class="price txt-center">
                  ' . number_format($item->amount_detail * $item->product_price) . ' VNĐ
                </td>
                
            </tr>
            ';
        }
        $html .= '
            <tbody>
              '.$tr.'
                          
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" rowspan="3"></td>
                    <td colspan="2"><strong>Tổng Tiền Chưa Giảm Giá: </strong></td>
                    <td colspan="2">'.number_format($total_price).' VNĐ</td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Tiền Giảm Giá (nếu có):</strong>
                    </td>
                   
                    <td colspan="2"><strong>'.number_format($total_price*($discount_value/100)).' VNĐ </strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Tiền Thanh Toán:</strong>
                    </td>
                    <td colspan="2"><strong>'.number_format($total_price*(1-($discount_value/100))).' VNĐ </strong>
                    </td>
                </tr>
            </tfoot>
        
        ';
        return $html;
    }

    /* --------------------------------List Product--------------------------------*/
    public static function renderListProducts($products)
    {
        $html = '';
        if (is_null($products)) return $html;
        foreach ($products as $key => $product) {
            /*get value*/
            if ($product->active == 1) {
                $id = $product->id;
                $name = $product->name_product;
                $price = $product->price;
                $image = $product->img;

                $html .= '
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$product->group_products_id.'">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="/storage/uploads/' . $image . '"alt="IMG-PRODUCT">

                      
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="/detail-product/' . $id . '-' . Str::slug($name, '-') . '.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    ' . $name . '
                                </a>

                                <span class="stext-105 cl3">
                                ' . number_format($price) . ' VNĐ
                                </span>
                            </div>

                           
                        </div>
                    </div>
                </div>
            ';
            }
        }
        return $html;
    }
    public function renderOrderDetailsCustomerSendMail($order_details)
    {
        $html = '';
        $tr = '';
        $total_price=0;
        $discount_value = 0;
        $payment_method='Thanh Toán Khi Nhận Hàng ';
        if (is_null($order_details)) return $html;
        foreach ($order_details as $key => $item) {
            $key += 1;
            $total_price += $item->product_price*$item->amount_detail;
            $discount_value = $item->discount_value;
            if($item->payment_method_id == 2) $payment_method="Thanh Toán Qua VNPay";
            $tr .= '
            <tr>
                <td style="text-align:center"><span >' . $key . '</span></td>               
                <td style="text-align:center"><p >'. $item->name . ' </p>
                    <small class="order_ref">MÃ SP: ' . $item->product_id . '</small>
                    <br>                 
                </td>
                <td style="text-align:center">' . $item->amount_detail . '                </td>
                <td style="text-align:center">' . $item->product_price . '</td>    
                <td style="text-align:center">
                  ' . number_format($item->amount_detail * $item->product_price) . ' VNĐ
                </td>
                
            </tr>
            ';
        }
        $html .= '
            <tbody>
              '.$tr.'
                          
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="1" rowspan="4"></td>
                    <td colspan="2" style="text-align:center"><strong>Tổng Tiền Chưa Giảm Giá: </strong></td>
                    <td colspan="2" style="text-align:center">'.number_format($total_price).' VNĐ</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center" ><strong>Tiền Giảm Giá (nếu có):</strong>
                    </td>
                   
                    <td colspan="2" style="text-align:center" ><strong>'.number_format($total_price*($discount_value/100)).' VNĐ </strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center" ><strong>Tiền Thanh Toán:</strong>
                    </td>
                    <td colspan="2" style="text-align:center" ><strong>'.number_format($total_price*(1-($discount_value/100))).' VNĐ </strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center" ><strong>Phương Thức Thanh Toán:</strong>
                    </td>
                    <td colspan="2" style="text-align:center" ><strong>'.$payment_method.'  </strong>
                    </td>
                </tr>
            </tfoot>
        
        ';
        return $html;
    }
}
