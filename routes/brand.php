<?php
/* use App\Models\Order;

use App\Models\Coupon;

Route::get('brands/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('brand')->user();

    //dd($users);
    $brand_id = auth()->user()->id;

    $all_coupons= Coupon::where('brand_id', $brand_id)->get();
    $count_coupons=count($all_coupons);

    $all_orders= Order::where('brand_id', $brand_id)->get();
    $count_orders=count($all_orders);

    $deliver_orders= Order::where('status_id', '1')->where('brand_id', $brand_id)->get();
    $count_deliver_orders=count($deliver_orders);

    $print_orders= Order::where('status_id', '2')->where('brand_id', $brand_id)->get();
    $count_print_orders=count($print_orders);

    $cancel_orders= Order::where('status_id', '3')->where('brand_id', $brand_id)->get();
    $count_cancel_orders=count($cancel_orders);

    $ready_orders= Order::where('status_id', '4')->where('brand_id', $brand_id)->get();
    $count_ready_orders=count($ready_orders);;


    return view('brand.home',compact('count_coupons','count_orders','count_deliver_orders','count_print_orders','count_cancel_orders','count_ready_orders'));
})->name('brands.home');

Route::group([ 'prefix' => 'brands', 'domain' => env('APP_DOMAIN'), 'namespace' => 'Brand'], function () {

    //================ Company Profile ===================//
    Route::get('/edit/profile', 'BrandController@brand_edit_view');
    Route::post('/edit/brand', 'BrandController@edit_brand');
    Route::get('/password/edit', 'BrandController@edit_password_view');
    Route::post('/edit/password', 'BrandController@edit_password');

    //================ Coupons  ===================//
    Route::get('/coupons', 'ManageCouponController@coupons_list');
    Route::get('/coupon/{id}', 'ManageCouponController@coupon_detail');
    Route::get('/coupon/status/{status}/{id}', 'ManageCouponController@status');

    //================ Orders  ===================//
    Route::get('/orders', 'OrderController@order_list');
    Route::get('/orders/{status}', 'OrderController@order_list_status');
    Route::get('/order/{id}', 'OrderController@order_detail');
    Route::get('/redemptions/{id}', 'OrderController@order_redemptions');
    Route::post('/order/status/{id}', 'OrderController@order_status');
    Route::get('/redeem/{id}', 'OrderController@order_redeem');

}); */
