
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Thanh Toán</title>
        <!-- Bootstrap core CSS -->
        <link href="{{asset('template/vnpay/bootstrap.min.css')}}" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="{{asset('template/vnpay/jumbotron-narrow.css')}}" rel="stylesheet">  
        <script src="{{asset('template/vnpay/jquery-1.11.3.min.js')}}"></script>
    </head>

    <body>
     
        <div class="container main">
            <div class="header clearfix">
                <br>
                <h3 class="title">THÔNG TIN THANH TOÁN VNPAY</h3>
            </div>
            <h3></h3>
            <div class="table-responsive">
                <form action="/checkoutVNPay" id="create_form" method="post" class=" ">       

                    <div class="form-group">
                        <label for="language">Loại Thanh Toán </label>
                        <select name="order_type" id="order_type" class="form-control un">
                            <option value="billpayment">Thanh toán hóa đơn</option>
                            <option value="other">Khác - Xem thêm tại VNPAY</option>
                        </select>
                           
                    </div>
                    <div class="form-group">
                        <label for="order_id" >Mã Hóa Đơn : <?php echo date("YmdHis") ?></label>
                        <input class="form-control un " id="order_id" name="order_id" type="hidden" value="<?php echo date("YmdHis") ?>" />
                    </div>
                    <div class="form-group">
                        <label for="amount">Số Tiền Thanh Toán : {{$data->total_price}}</label>
                        <input class="form-control un " id="amount"
                               name="amount" type="hidden" value="{{$data->total_price}} " />
                    </div>
                    <div class="form-group">
                        <label for="order_desc un ">Nội Dung Thanh Toán</label>
                        <textarea class="form-control un " cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
                    </div>
                    <div class="form-group">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control un ">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="language">Ngôn Ngữ</label>
                        <select name="language" id="language" class="form-control un">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                   @csrf
                   <div class="group-button">
                    <button type="submit" class=" button" id="btnPopup">Bước Tiếp Theo</button>
                    <button type="button" class=" button" onclick="history.back()">Quay Lại</button>
              
                   </div>
                </form>
                    
            </div>
            <p>
                &nbsp;
            </p>
        
        </div>  
       
         


    </body>
</html>
