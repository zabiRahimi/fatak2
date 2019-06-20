<?php

Route::get('/{page?,ch?}','IndexController@show')->where('page', '[0-9]+');
// ثبت بازدید از شبکه اجتماعی
Route::post('/bazdidCh','IndexController@bazdidCh');//ok!!

Route::get('/pro/{page?}','IndexController@show_ajax');
Route::get('/card/{name?}/{id?}','IndexController@show_card');
Route::post('/sabt_shekait','IndexController@sabt_shekait');

Route::get('refreshcaptcha', 'CaptchaController@refreshCaptcha');//ok
Route::get('/search', 'SearchController@search');//ok!!

Route::get('/product/{id}/{name?}','ProController@show_pro');//ok!!
Route::put('/view_pro','ProController@view_pro');//ok
Route::post('/sabt_nazar_pro','ProController@sabt_nazar_pro');//ok00
Route::post('/sabt_question_pro','ProController@sabt_question_pro');//ok00
Route::post('/sabt_answer_pro','ProController@sabt_answer_pro');//ok00

Route::put('/add_pro_sabad','SabadController@add_pro_sabad');//ok
Route::get('/show_sabad_pro/{del_id?}','SabadController@show_sabad_pro');//ok
Route::put('/num_pro_sabad_add','SabadController@num_pro_sabad_add');//ok
Route::put('/new_price','SabadController@new_price');//ok
Route::put('/new_all_price','SabadController@new_all_price');//ok
Route::put('/show_city','SabadController@show_city');//ok
Route::put('/sum_gram_post','SabadController@sum_gram_post');//ok
Route::put('/post_pishtaz','SabadController@post_pishtaz');//ok
Route::put('/post_sefareshi','SabadController@post_sefareshi');//ok
Route::put('/end_price_all','SabadController@end_price_all');//ok
Route::get('/show_factor_buy','SabadController@show_factor_buy');//ok
Route::post('/save_data_buyer','SabadController@save_data_buyer');//ok
Route::put('/end_buy','SabadController@end_buy');//ok
Route::put('/pardakht','SabadController@pardakht');//ok!!
Route::post('/create_cookie','SabadController@create_cookie');//ok


//login
Route::post('/register','RegisterController@register');//ok
Route::post('/login_user','RegisterController@login_user');//ok
Route::get('/dashboard_user','RegisterController@dashboard_user')->middleware(['cheklogin_user' ]);//ok
Route::get('/logout_user','RegisterController@logout_user');//ok
Route::post('/edit_register','RegisterController@edit_register');//ok

//channel
Route::get('/page_login','ChannelController@page_login');//ok
Route::post('/sabt_channel_1','ChannelController@sabt_channel_1');//ok!!
Route::post('/login_channel','ChannelController@login_channel');//ok!!
Route::get('/logoutCh','ChannelController@logoutCh');//ok!!
Route::get('/dashboard_channel','ChannelController@dashboard_channel')->middleware(['cheklogin_channel' ]);//ok!!
Route::get('/perfectDaCh','ChannelController@perfect_data')->middleware(['cheklogin_channel' ]);//ok!!
Route::post('/sabt_channel_2','ChannelController@sabt_channel_2');//ok!!
Route::get('/editDaCh','ChannelController@editDaCh')->middleware(['cheklogin_channel' ]);//ok!!
Route::post('/editDaChSave','ChannelController@editDaChSave');//ok!!
Route::post('/editPasDaCh','ChannelController@editPasDaCh');//ok!!
Route::get('/warnCh','ChannelController@warnCh')->middleware(['cheklogin_channel' ]);//ok!!
Route::get('/urlChMy','ChannelController@urlChMy')->middleware(['cheklogin_channel' ]);//ok!!
Route::get('/viewChMy','ChannelController@viewChMy')->middleware(['cheklogin_channel' ]);//ok!!
Route::get('/viewChAll','ChannelController@viewChAll')->middleware(['cheklogin_channel' ]);//ok!!
Route::get('/incomeChMy','ChannelController@incomeChMy')->middleware(['cheklogin_channel' ]);//ok!!
Route::get('/societyCh','ChannelController@societyCh');//ok!!
Route::get('/ghanonCh','ChannelController@ghanonCh');//ok!!
Route::get('/rahnamaCh','ChannelController@rahnamaCh')->middleware(['cheklogin_channel' ]);//ok!!

// فروشنده
Route::get('/pageloginShop','ShopController@pageloginShop');//ok
Route::post('/sabtShop_1','ShopController@sabtShop_1');//ok
Route::post('/loginShop','ShopController@loginShop');//ok!!
Route::get('/dashboard_shop','ShopController@dashboard_shop')->middleware(['chekloginShop' ]);;//ok
Route::get('/perfectDaShop','ShopController@perfectDaShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/sabtShop_2','ShopController@sabtShop_2');//ok!!
Route::get('/editDaShop','ShopController@editDaShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/editDaShopSave','ShopController@editDaShopSave');//ok!!
Route::post('/editPasDaShop','ShopController@editPasDaShop');//ok!!
Route::get('/newOrderShop/{date?}','ShopController@newOrderShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/newOrderShopOne/{id}','ShopController@newOrderShopOne')->middleware(['chekloginShop' ]);//ok!!
Route::post('/searchShop','ShopController@searchShop');//ok!!
Route::post('/searchSortDateShop','ShopController@searchSortDateShop');//ok!!
Route::post('/searchAdvancedShop','ShopController@searchAdvancedShop');//ok!!
Route::post('/proShop','ShopController@proShop');//ok!!
Route::get('/oldOrderShop','ShopController@oldOrderShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/oldOrderShopOne/{id1}/{id2}','ShopController@oldOrderShopOne')->middleware(['chekloginShop' ]);//ok!!
Route::post('/codeOldOrderShop','ShopController@codeOldOrderShop');//ok!!
Route::post('/nameOldOrderShop','ShopController@nameOldOrderShop');//ok!!
Route::post('/allOldOrderShop','ShopController@allOldOrderShop');//ok!!
Route::post('/editProShop','ShopController@editProShop');//ok!!
Route::get('/buyProShop','ShopController@buyProShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/buyProShopOne/{buyer_id}/{pro_id}','ShopController@buyProShopOne')->middleware(['chekloginShop' ]);//ok!!
Route::post('/codeBuyProShop','ShopController@codeBuyProShop');//ok!!
Route::post('/nameBuyProShop','ShopController@nameBuyProShop');//ok!!
Route::post('/allBuyProShop','ShopController@allBuyProShop');//ok!!

Route::get('/sabtErsalShop/{order_id?}','ShopController@sabtErsalShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/sabtCodeSh','ShopController@sabtCodeSh');//ok!!
Route::post('/sabtCodeRahgirySh','ShopController@sabtCodeRahgirySh');//ok!!
Route::get('/editErsalShop/{order_id?}','ShopController@editErsalShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/editCodeSh','ShopController@editCodeSh');//ok!!
Route::post('/editCodeRahgirySh','ShopController@editCodeRahgirySh');//ok!!
Route::get('/pigiryErsalShop/{idPro?}','ShopController@pigiryErsalShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/backErsalShop/{order_id?}','ShopController@backErsalShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/payShop/{order_id?}','ShopController@payShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/SearchPayShop','ShopController@SearchPayShop');//ok!!
Route::post('/SearchNamePayShop','ShopController@SearchNamePayShop');//ok!!
Route::post('/SearchAllNamePayShop','ShopController@SearchAllNamePayShop');//ok!!
Route::post('/SearchDateSortPayShop','ShopController@SearchDateSortPayShop');//ok!!
Route::post('/SearchAllDatePayShop','ShopController@SearchAllDatePayShop');//ok!!

Route::post('/uplodImgProSh','ShopController@uplodImgProSh');//ok!!
Route::post('/del_imgShop','ShopController@del_imgShop');//ok!!

//ثبت سفارش محصول ناموجود
Route::get('/sabtOrder','OrderController@sabtOrder');//ok!!
Route::post('/sabtOrderSave','OrderController@sabtOrderSave');//ok!!


//قسمت مدیریت management
Route::get('/management', 'Admin\ManagementController@show');//ok
Route::get('/pro_admin', 'Admin\Pro_adController@show');//ok!!
Route::post('/uplod_img_pro', 'Admin\Pro_adController@uplod_img_pro');//ok
Route::get('/article_admin', 'Admin\Pro_adController@show');//ok!!
Route::get('/add_pro', 'Admin\Pro_adController@add_pro');//ok
Route::post('/save_add_pro1', 'Admin\Pro_adController@save_add_pro1');//ok
Route::get('/edit_pro/{id}', 'Admin\Pro_adController@edit_pro');//ok!!
Route::post('/save_edit_pro1', 'Admin\Pro_adController@save_edit_pro1');//ok
Route::get('/all_edit_pro', 'Admin\Pro_adController@all_edit_pro');//ok
