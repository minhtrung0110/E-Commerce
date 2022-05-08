<div style="width:700px; margin:0 auto;">
    <div style="color:blue; text-align:center">
        <h2>ĐẶT HÀNG THÀNH CÔNG</h2>
    </div>

    <div style="text-align:center; margin-botton:5px; font-size:15px; color:black">
        <h4> Xin Chào {{ $customer['last_name'] }}. Bạn có đặt 1 đơn hàng với thông tin cá nhân sau:</h4>
    </div>
    <div style="text-align:center; margin-botton:5px; font-size:15px; color:black">
        Số Điện Thoại: {{ $customer['phone'] }}
    </div>
    <div style="text-align:center; margin-botton:5px; font-size:15px; color:black">
        Email: {{ $customer['email'] }} .
    </div>
    <div style="text-align:center; margin-botton:5px; font-size:15px; color:black">
        Địa chỉ: {{ $customer['address'] }} .
    </div>
    <table cellspacing="0" cellpadding="10" border="1" style="width:100%; margin-bottom:9px; margin-top:15px">
        <thead>
            <tr>
                <th style="text-align:center">STT</th>
                <th style="text-align:center">SẢN PHẨM</th>
                <th style="text-align:center">SỐ LƯỢNG</th>
                <th style="text-align:center">ĐƠN GIÁ</th>
                <th style="text-align:center">TỔNG TIỀN</th>

            </tr>
        </thead>
        {!! \App\Helpers\Helper::renderOrderDetailsCustomerSendMail($orders) !!}

      
    </table>

</div>
