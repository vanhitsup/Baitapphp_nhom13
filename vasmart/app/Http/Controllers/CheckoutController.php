<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
session_start();
class CheckoutController extends Controller
{
    //
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function login_checkout()
    {

        $cate_product = DB::table('category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        return view('checkout.login')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function add_customer(Request $request)
    {

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('checkout');
    }

    public function checkout()
    {
        $cate_product = DB::table('category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        return view('checkout.checkout')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function save_checkout(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_note'] = $request->shipping_note;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);

        return Redirect::to('payment');
    }

    public function payment()
    {

        $cate_product = DB::table('category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        return view('checkout.payment')->with('category', $cate_product)->with('brand', $brand_product);

    }

    public function logout_user()
    {
        Session::flush();
        return Redirect::to('/login');
    }


    public function login_user(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('customers')->where('customer_email', $email)->where('customer_password', $password)->first();


        if ($result) {
            Session::put('customer_id', $result->customer_id);

            return Redirect::to('/checkout');
        } else {
            Session::put('message', 'Tài khoản hoặc mật khẩu của bạn không chính xác !');
            return Redirect::to('/login');
        }

    }

    public function order_place(Request $request)
    {
        //insert payment_method

        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('order')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('order_details')->insert($order_d_data);
        }
        if ($data['payment_method'] == 1) {

            echo 'Thanh toán thẻ ATM';

        } elseif ($data['payment_method'] == 2) {
            Cart::destroy();

            $cate_product = DB::table('category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
            $brand_product = DB::table('brand_product')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
            $shipping = DB::table('shipping')->orderby('category_id', 'desc')->get();

            return view('checkout.order')->with('category', $cate_product)->with('brand', $brand_product)->with('shipping',$shipping);

        } else {
            echo 'Thẻ ghi nợ';

        }

    }
}
