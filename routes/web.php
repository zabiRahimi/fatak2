<?php

Route::get('/{page?}','IndexController@show')->where('page', '[0-9]+');
Route::get('/pro/{page?}','IndexController@show_ajax');
Route::get('/card/{name?}/{id?}','IndexController@show_card');
Route::get('refreshcaptcha', 'CaptchaController@refreshCaptcha');//ok
Route::get('/search', 'SearchController@search');//ok!!
Route::get('/product/{id}/{name?}','ProController@show_pro');//ok!!
Route::put('/view_pro','ProController@view_pro');//ok

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
