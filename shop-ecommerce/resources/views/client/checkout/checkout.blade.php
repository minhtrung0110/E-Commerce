@extends('client.main')

@section('content')

    @php

    $first_name=(is_null($customer_checkout->first_name))? "VD: Đăng Kiều": $customer_checkout->first_name ;
    $last_name=(is_null($customer_checkout->last_name))? "VD: Lan Nhi " :$customer_checkout->last_name ;
    $email=(is_null($customer_checkout->email))? "VD: email@domain.com" : $customer_checkout->email ;
    $phone=(is_null($customer_checkout->phone))? "VD: 0702******" :$customer_checkout->phone ;
   

    @endphp
    <div class="container checkout-container">

        <br><br><br>
        <div class="row m-t-63">
            <!-- Đơn hàng -->
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Đơn Hàng</span>
                </h4>
                <div class="bor10 p-lr-30 p-t-30 p-b-40   m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>


                    <div class="header-cart-content flex-w js-pscroll">
                        <ul class="header-cart-wrapitem w-full bor12">
                            @php $total=0; @endphp

                            @foreach ($product_cart as $cart)
                                @php
                                    $price = $cart->price;
                                    $price_product = $price * (int) $cart_qty[$cart->id];
                                    $total += $price_product;
                                    
                                @endphp
                                <li class="header-cart-item flex-w flex-t m-b-12">
                                    <div class="header-cart-item-img">
                                        <img src="/storage/uploads/{{ $cart->img }}" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt p-t-8">
                                        <a href="/detail-product/{{ $cart->id }}-{{ \Str::slug($cart->name_product, '-') }}.html"
                                            class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                            {{ $cart->name_product }}
                                        </a>

                                        <span class="header-cart-item-info">
                                            {{ $cart_qty[$cart->id] }} x {{ number_format($price) }} VNĐ
                                        </span>
                                    </div>
                                </li>
                            @endforeach



                        </ul>
                        <div class="flex-w flex-t bor12 p-b-13 h-100 size-100p">
                            <div class="size-40p">
                                <span class="stext-110 cl2   ">
                                    Tiền Đơn Hàng:
                                </span>
                            </div>

                            <div class="size-60p">
                                <span class="mtext-110 cl2 ">
                                    {{ number_format($total) }} VNĐ
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-b-13 h-100 size-100p">
                          <div class="size-40p">
                              <span class="stext-110 cl2 ">
                                  Giảm Giá:
                              </span>
                          </div>

                          <div class="size-60p">
                              <span class="mtext-110 cl2">
                                @php  
                                $sale=$discount->value;
                                $render_percent=$sale/100; 
                                @endphp
                                  {{  $sale}}  %
                              </span>
                              <input type="hidden" name="discount_id" value="{{ $discount->id}}">
                              <input type="hidden" name="discount_value" value="{{ $discount->value}}">
                          </div>
                      </div>
                      <div class="flex-w flex-t bor12 p-b-13 h-100 size-100p">
                        <div class="size-40p">
                            <span class="stext-110 cl2   ">
                                Sau Giảm Giá:
                            </span>
                        </div>

                        <div class="size-60p">
                            <span class="mtext-110 cl2 ">
                              @php  
                              $total_price=$total*(1-$render_percent);
                             
                              @endphp
                                {{ number_format($total_price) }}  VNĐ
                            </span>
                          
                        </div>
                    </div>


                    </div>
                    <div class="flex-w flex-t p-t-27 p-b-33 size-100p">
                        <div class="size-40p">
                            <span class="mtext-101 cl2">
                               Thanh Toán:
                            </span>
                        </div>
                        <div class="size-60p p-t-1">
                            <span class="mtext-110 cl2">
                              {{ number_format($total_price) }}  VNĐ
                            </span>
                            <input type="hidden" name="total_price" value="{{ $total_price}}">
                        </div>
                    </div>

                </div>



            </div>
            <!--- Thông Tin Nhận Hàng ----->
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Thông Tin Nhận Hàng</h4>
                <form method="POST"  action="" class="needs-validation row" novalidate id="form-checkout">

                  <!-- Thông Tin Giỏ Hàng --->
                  <input type="hidden" name="total" value="{{ $total}}">
                  <input type="hidden" name="total_price" value="{{ $total_price}}">
                  <input type="hidden" name="discount_id" value="{{ $discount->id}}">
                  <input type="hidden" name="discount_value" value="{{ $discount->value}}">

                  <!--- Thông Tin Khách Hàng Đặt Hàng -->
                    <div class="form-group col-md-6 mb-3">
                        <label for="first_name">Nhập Họ:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="VD: Nguyễn Văn" value="{{ $first_name }}" required>
                        <span class="form-message"></span>

                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="last_name">Nhập Tên</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="VD: Thinh"
                        value="{{$last_name}} " required>
                        <span class="form-message"></span>

                    </div>


                    <div class="form-group col-md-6 mb-3">
                        <label for="phone">Nhập Số Điện Thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="VD: 0707****"
                          value="{{$phone}}"  required>
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="email" class="form-label">Nhập Email</label>
                        <input id="email" name="email" type="text" placeholder="VD: email@domain.com"
                        value="{{ $email }}"  class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="provinces">Tỉnh/Thành Phố</label>
                        <select class="custom-select d-block w-100" name="calc_shipping_provinces" id="provinces" required>
                          <option value="">Choose...</option>
                        
                        </select>
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="district">Quận/Huyện</label>
                        <select class="custom-select d-block w-100 " name="calc_shipping_district" id="district" required>
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="wards">Phường/Xã</label>
                        <input type="text" class="form-control" id="wards" name="calc_shipping_wards"
                            placeholder="VD: Xã Lê Minh Xuân" required>
                        <!-- <select class="custom-select d-block w-100 " name="calc_shipping_wards" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>-->
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-md-10 mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="VD: 123 Lê Văn Qới" required>
                        <span class="form-message"></span>
                    </div>


                    <input class="billing_address_1" name="" type="hidden" value="">
                    <input class="billing_address_2" name="" type="hidden" value="">

                    <hr class="mb-4">

                    <!----------------------------- Thanh Toán ---------------------------------------------------------------->
                    <h4 class="mb-3">Phương Thức Thanh Toán</h4>
                    <input id="credit" name="payment_method_id" type="hidden" class="custom-control-input" value=1>
                    <div class="row">
                        <div class="d-block my-3 ">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="" type="radio" class="custom-control-input" checked
                                    required>
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="debit">Debit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="paypal">PayPal</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    @csrf
                    <input type="submit"
                        class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer "
                        value="Thanh Toán">
                </form>
            </div>
        </div>


    </div>
@endsection
<script type="text/javascript" src={{ asset('/template/js/load_address.js') }}></script>
