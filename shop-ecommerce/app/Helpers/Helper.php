<?php
namespace App\Helpers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class Helper{

    public static function renderGroupProducts($menus ){
        $html='';
        if(is_null($menus)) return $html;
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

    public static function renderGroupProductBanners($menus ){
        $html='';
        if(is_null($menus)) return $html;
        foreach ($menus as $key => $menu) {

                $images=(is_null($menu->images))?'':' <img src="images/banner-01.jpg" alt="IMG-BANNER">';

                $html .= '
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">

                    <img src="/storage/categories/'.$menu->thumb.'" alt="IMG-BANNER">

                    <a href="/products/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                               '.$menu->name.'
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

    public static function renderUserLogin(){
        $html='';
       $customer_id= Session::get('customer_id');
       $checkLogin= Session::get('customer_login');
       if($checkLogin==true && !is_null($customer_id) ){
           $data=\App\Http\Services\CustomerService::getInFo($customer_id);
           $customer_firstname=$data->first_name;
           $customer_lastname=$data->last_name;
            $html='
  
            <div class="dropdown">
                <button class="dropbtn">
                     
                        <span>'. $customer_firstname.' '.$customer_lastname.'</span>                
                        
                </button>
            <div class="dropdown-content">
                <a href="/myprofile">Thông Tin Tài Khoản</a> </a>
                <a href="/logout">Đăng Xuât</a> </a>
            </div>
            </div>
            ';
       }
       else $html='
       <a href="/login" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
             <i class="zmdi zmdi-account-circle"></i>
       </a>
       ';
       return $html;
    }

    public static function renderSlider($sliders){
        $html='';
        if(is_null($sliders)) return $html;
        foreach ($sliders as $key => $slider) {
           
                $html .= '
                <div class="item-slick1" style="background-image: url(/storage/sliders/'.$slider->thumb.');">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                               '.$slider->description.'
                            </span>
                        </div>
                            
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                            '.$slider->name.'
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

    public static function renderProductNewArrival($new_arrival_products) {
        $html='';
        if(is_null($new_arrival_products)) return $html;
        foreach ($new_arrival_products as $key => $product) {
                /*get value*/
         if($product->active==1){
                $id=$product->id;
                $name=$product->name_product;
                $price=$product->price;
                $image=$product->img;

                $html .= '
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="/storage/uploads/'.$image.'"alt="IMG-PRODUCT">

                        <a href="/detail-product/'.$id. '-' . Str::slug($name, '-') .'.html" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="/detail-product/'.$id. '-' . Str::slug($name, '-') .'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    '.$name.'
                                </a>

                                <span class="stext-105 cl3">
                                '.number_format($price).' VNĐ
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

    public static function renderListViewStaff($listStaffs){
        $html='';
        foreach ($listStaffs as $key => $staff) {
            $html .='
              <tr>
              <td>'.$staff->id.'</td>
              <td>'.$staff->first_name.' '. $staff->last_name.'</td>
              <td>'.$staff->role_id.'</td>
              <td>'.$staff->phone.'</td>
              <td>'.$staff->email.'</td>
              <td style="width:10%">'.$staff->password.'</td>
              <td>'.$staff->address.'</td>
              <td>'.self::active($staff->status).'</td>
              <td>
              <a  class="btn btn-primary btn-sm" href="/admin/staffs/edit/'.$staff->id.'"><i class="fas fa-edit"></i></a>
                    <a  class="btn btn-danger btn-sm" onclick="removeRow(' . $staff->id . ', \'/admin/staffs/destroy\')")" ><i class="fas fa-trash"></i></a></td>
            </tr>';
            }        

        return $html;
    }

    public static function renderClassNameForNavItem( $request){
        $html='';
        if ($request->is('admin/staffs/*')) {
            $html='menu-is-opening menu-open ';
        }

        return $html;
    }
    public static function getNumberCart(){
        $carts = Session::get('carts');
        if(is_null($carts)) return 0;
        return count($carts);
    }

    /*------Product Details --------------------------------*/
    public static function renderRelativeProducts($relative_products){
        $html='';
        if(is_null($relative_products)) return $html;
        foreach ($relative_products as $item){
            $html.='
            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="/storage/uploads/'.$item->img.'" alt="IMG-PRODUCT">

                    <a href="/detail-product/'.$item->id. '-' . Str::slug($item->name_product, '-') .'.html"
                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                        Quick View
                    </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/detail-product/'.$item->id. '-' . Str::slug($item->name_product, '-') .'.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        '.$item->name_product.'
                        </a>

                        <span class="stext-105 cl3">
                        '.number_format($item->price).' VNĐ
                        </span>
                    </div>

                    
                </div>
            </div>
        </div>
            ';
        }
        return $html;
    }
}