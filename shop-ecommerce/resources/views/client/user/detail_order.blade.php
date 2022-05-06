@extends('client.main')

@section('content')
<br><br><br>

<div class="detail-order-table">
    <div class="wrapper table-responsive-lg ">
        <table class="table table-bordered order_summary">
            <thead>
                <tr>
                    <th>STT</th>
                    <th class="order_product">HÌNH ẢNH</th>
                    <th>SẢN PHẨM</th>
                    <th>SỐ LƯỢNG</th>
                    <th>ĐƠN GIÁ</th>               
                    <th>TỔNG CỘNG</th>
    
                </tr>
            </thead>
            <tbody>
                            <tr>
                <td class="number_list"><span class="label label-success">1</span>
                    </td>
                    <td class="order_product">
                        <a href="index.php?quanly=detail&amp;id=7"><img class="img_order" src="./images/product-items/aniversary03.jpg" alt="Sản Phẩm">
                        </a>
                    </td>
                    <td class="order_description">
                        <p class="product-name"><a href="index.php?quanly=detail&amp;id=7">HappyAniversary Special Fire </a>
                        </p>
                        <small class="order_ref">MÃ SP: 7</small>
                        <br>
                        <br>
                        <small class="order_ref"> KÍCH THƯỚC :S</small>
                    </td>
                    <td class="order_avail">1                </td>
                    <td class="price"><span>600,000 VNĐ</span>
                    </td>    
                    <td class="price">
                        <span>600,000 VNĐ</span>
                    </td>
                    
                </tr>
                          
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" rowspan="3"></td>
                    <td colspan="2"><strong>Tổng Tiền Chưa Ưu Đãi: </strong></td>
                    <td colspan="2">600,000 VNĐ</td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Tiền Ưu Đãi (nếu có):</strong>
                    </td>
                   
                    <td colspan="2"><strong>0 VNĐ </strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Tiền Thanh Toán:</strong>
                    </td>
                    <td colspan="2"><strong>600,000 VNĐ </strong>
                    </td>
                </tr>
            </tfoot>
        </table>	
       
    </div>
    </div>



@endsection