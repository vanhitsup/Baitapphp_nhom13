
<?php
$content=\Gloudemans\Shoppingcart\Facades\Cart::content();

?>
@extends('layout')
@section('content')
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Thanh toán</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="{{\Illuminate\Support\Facades\URL::to('index')}}">Home</a></li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS SETCTION END -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper section">

        <!-- SHOP SECTION START -->
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- checkout start -->
                            <div class="tab-pane active" id="checkout">
                                <div class="checkout-content box-shadow p-30">
                                    <form action="{{\Illuminate\Support\Facades\URL::to('save-checkout')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <!-- billing details -->
                                            <div class="col-md-6">
                                                <div class="billing-details pr-10">
                                                    <h6 class="widget-title border-left mb-20">Chi tiết hóa đơn</h6>
                                                    <input type="text" name="shipping_name" placeholder="Họ tên bạn...">
                                                    <input type="text" name="shipping_email" placeholder="Địa chỉ email...">
                                                    <input type="text" name="shipping_phone" placeholder="Số điện thoại...">
                                                    <input type="text" name="shipping_address" placeholder="Địa chỉ...">
                                                    <textarea class="custom-textarea" name="shipping_note" placeholder="Ghi chú..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- our order -->
                                                <div class="payment-details pl-10 mb-50">
                                                    <h6 class="widget-title border-left mb-20">Đơn hàng</h6>
                                                    <table>
                                                        @foreach($content as $key=>$value)
                                                        <tr>
                                                            <td class="td-title-1">{{$value->name}} x {{$value->qty}}</td>
                                                            <td class="td-title-2">{{number_format($value->price*$value->qty).' VND'}}</td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td class="td-title-1">Tổng tiền</td>
                                                            <td class="td-title-2">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal().' VNĐ'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Phí vận chuyển </td>
                                                            <td class="td-title-2">0 VND</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Thuế VAT</td>
                                                            <td class="td-title-2">0 VNĐ</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="order-total">Tổng tiền thanh toán</td>
                                                            <td class="order-total-price">$2425.00</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!-- payment-method -->
                                                <div class="payment-method">
                                                    <h6 class="widget-title border-left mb-20">phương thức thanh toán</h6>
                                                    <div id="accordion">
                                                        <div class="panel">
                                                            <h4 class="payment-title box-shadow">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#bank-transfer" >
                                                                    direct bank transfer
                                                                </a>
                                                            </h4>
                                                            <div id="bank-transfer" class="panel-collapse collapse in" >
                                                                <div class="payment-content">
                                                                    <p>Lorem Ipsum is simply in dummy text of the printing and type setting industry. Lorem Ipsum has been.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel">
                                                            <h4 class="payment-title box-shadow">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                                    cheque payment
                                                                </a>
                                                            </h4>
                                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                                <div class="payment-content">
                                                                    <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel">
                                                            <h4 class="payment-title box-shadow">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" >
                                                                    paypal
                                                                </a>
                                                            </h4>
                                                            <div id="collapseThree" class="panel-collapse collapse" >
                                                                <div class="payment-content">
                                                                    <p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                                                    <ul class="payent-type mt-10">
                                                                        <li><a href="#"><img src="{{asset('../public/frontend/img/payment/1.png')}}" alt=""></a></li>
                                                                        <li><a href="#"><img src="{{asset('../public/frontend/img/payment/2.png')}}" alt=""></a></li>
                                                                        <li><a href="#"><img src="{{asset('../public/frontend/img/payment/3.png')}}" alt=""></a></li>
                                                                        <li><a href="#"><img src="{{asset('../public/frontend/img/payment/4.png')}}" alt=""></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- payment-method end -->
{{--                                                <input class="submit-btn-1 mt-30 btn-hover-1" name="send_order" value="Đặt hàng" type="submit">--}}
                                            </div>
                                        </div>
                                        <input class="submit-btn-1 mt-30 btn-hover-1" name="send_order" value="Đặt hàng" type="submit">

                                    </form>
                                </div>
                            </div>
                            <!-- checkout end -->
                            <!-- order-complete start -->
                            <div class="tab-pane" id="order-complete">
                                <div class="order-complete-content box-shadow">
                                    <div class="thank-you p-30 text-center">
                                        <h6 class="text-black-5 mb-0">Thank you. Your order has been received.</h6>
                                    </div>
                                    <div class="order-info p-30 mb-10">
                                        <ul class="order-info-list">
                                            <li>
                                                <h6>order no</h6>
                                                <p>m 2653257</p>
                                            </li>
                                            <li>
                                                <h6>order no</h6>
                                                <p>m 2653257</p>
                                            </li>
                                            <li>
                                                <h6>order no</h6>
                                                <p>m 2653257</p>
                                            </li>
                                            <li>
                                                <h6>order no</h6>
                                                <p>m 2653257</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <!-- our order -->
                                        <div class="col-md-6">
                                            <div class="payment-details p-30">
                                                <h6 class="widget-title border-left mb-20">our order</h6>
                                                <table>
                                                    <tr>
                                                        <td class="td-title-1">Dummy Product Name x 2</td>
                                                        <td class="td-title-2">$1855.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Dummy Product Name</td>
                                                        <td class="td-title-2">$555.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Cart Subtotal</td>
                                                        <td class="td-title-2">$2410.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Shipping and Handing</td>
                                                        <td class="td-title-2">$15.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Vat</td>
                                                        <td class="td-title-2">$00.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-total">Order Total</td>
                                                        <td class="order-total-price">$2425.00</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="bill-details p-30">
                                                <h6 class="widget-title border-left mb-20">billing details</h6>
                                                <ul class="bill-address">
                                                    <li>
                                                        <span>Address:</span>
                                                        28 Green Tower, Street Name, New York City, USA
                                                    </li>
                                                    <li>
                                                        <span>email:</span>
                                                        info@companyname.com
                                                    </li>
                                                    <li>
                                                        <span>phone : </span>
                                                        (+880) 19453 821758
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="bill-details pl-30">
                                                <h6 class="widget-title border-left mb-20">billing details</h6>
                                                <ul class="bill-address">
                                                    <li>
                                                        <span>Address:</span>
                                                        28 Green Tower, Street Name, New York City, USA
                                                    </li>
                                                    <li>
                                                        <span>email:</span>
                                                        info@companyname.com
                                                    </li>
                                                    <li>
                                                        <span>phone : </span>
                                                        (+880) 19453 821758
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- order-complete end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->

    </section>
@endsection
