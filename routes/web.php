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
Route::get('/logoutShop','ShopController@logoutShop');//ok
Route::get('/dashboard_shop','ShopController@dashboard_shop')->middleware(['chekloginShop' ]);;//ok
Route::get('/perfectDaShop','ShopController@perfectDaShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/sabtShop_2','ShopController@sabtShop_2');//ok!!
Route::get('/editDaShop','ShopController@editDaShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/editDaShopSave','ShopController@editDaShopSave');//ok!!
Route::post('/editPasDaShop','ShopController@editPasDaShop');//ok!!
Route::get('/warningShop','ShopController@warningShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/sabtProStockShop','ShopController@sabtProStockShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/showProStockShop','ShopController@showProStockShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/showProOneStockShop/{pro_id}','ShopController@showProOneStockShop')->middleware(['chekloginShop' ])->where('pro_id', '[0-9]+');//ok!!

Route::get('/sabtProUnStockShop','ShopController@sabtProUnStockShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/showProUnStockShop','ShopController@showProUnStockShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/showProOneUnStockShop/{pro_id}','ShopController@showProOneUnStockShop')->middleware(['chekloginShop' ])->where('pro_id', '[0-9]+');//ok!!
Route::get('/newOrderShop/{date?}','ShopController@newOrderShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/newOrderShopOne/{id}','ShopController@newOrderShopOne')->middleware(['chekloginShop' ]);//ok!!
Route::post('/deleteCookieNamePic','ShopController@deleteCookieNamePic');//ok!!

// Route::post('/searchShop','ShopController@searchShop');//ok!!
// Route::post('/searchSortDateShop','ShopController@searchSortDateShop');//ok!!
// Route::post('/searchAdvancedShop','ShopController@searchAdvancedShop');//ok!!
Route::post('/savePro','ShopController@savePro');//ok!!
Route::post('/del_pro','ShopController@del_pro');//ok!!
Route::post('/checkDel_proShop','ShopController@checkDel_proShop');//ok!!
Route::post('/del_offerProShop','ShopController@del_offerProShop');//ok!!
Route::get('/oldOrderShop/{pro_id?}/{stamp?}','ShopController@oldOrderShop')->middleware(['chekloginShop' ])->where('pro_id', '[0-9]+')->where('stamp', '[0-9]+');//ok!!
Route::get('/oldOrderOneShop/{id1}/{id2}','ShopController@oldOrderOneShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/codeOldOrderShop','ShopController@codeOldOrderShop');//ok!!
Route::post('/nameOldOrderShop','ShopController@nameOldOrderShop');//ok!!
// Route::post('/allOldOrderShop','ShopController@allOldOrderShop');//ok!!
Route::post('/editPro','ShopController@editPro');//ok!!
Route::get('/buyProShop','ShopController@buyProShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/buyProShopOne/{buyer_id}/{pro_id}','ShopController@buyProShopOne')->middleware(['chekloginShop' ]);//ok!!
Route::post('/codeBuyProShop','ShopController@codeBuyProShop');//ok!!
Route::post('/nameBuyProShop','ShopController@nameBuyProShop');//ok!!
Route::post('/allBuyProShop','ShopController@allBuyProShop');//ok!!
// Route::post('/searchProSStock','ShopController@searchProSStock');//ok!!
Route::post('/searchProShop','ShopController@searchProShop');//ok!!
Route::post('/searchIdShop','ShopController@searchIdShop');//ok!!

Route::get('/sabtErsalShop/{order_id?}','ShopController@sabtErsalShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/sabtCodeSh','ShopController@sabtCodeSh');//ok!!
Route::post('/sabtCodeRahgirySh','ShopController@sabtCodeRahgirySh');//ok!!
Route::get('/editErsalShop/{order_id?}','ShopController@editErsalShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/editCodeSh','ShopController@editCodeSh');//ok!!
Route::post('/editCodeRahgirySh','ShopController@editCodeRahgirySh');//ok!!
Route::get('/pigiryErsalShop/{idPro?}','ShopController@pigiryErsalShop')->middleware(['chekloginShop' ]);//ok!!
Route::get('/backErsalShop/{order_id?}','ShopController@backErsalShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/SearchAllDateBackShop','ShopController@SearchAllDateBackShop');//ok!!
Route::post('/SearchNameBackShop','ShopController@SearchNameBackShop');//ok!!
Route::post('/SearchAllNameBackShop','ShopController@SearchAllNameBackShop');//ok!!
Route::post('/SearchBackShop','ShopController@SearchBackShop');//ok!!
Route::post('/SearchDateSortBackShop','ShopController@SearchDateSortBackShop');//ok!!

Route::get('/payShop/{order_id?}','ShopController@payShop')->middleware(['chekloginShop' ]);//ok!!
Route::post('/SearchPayShop','ShopController@SearchPayShop');//ok!!
Route::post('/SearchNamePayShop','ShopController@SearchNamePayShop');//ok!!
Route::post('/SearchAllNamePayShop','ShopController@SearchAllNamePayShop');//ok!!
Route::post('/SearchDateSortPayShop','ShopController@SearchDateSortPayShop');//ok!!
Route::post('/SearchAllDatePayShop','ShopController@SearchAllDatePayShop');//ok!!

Route::post('/uplodImgProSh','ShopController@uplodImgProSh');//ok!!
Route::post('/del_imgShop','ShopController@del_imgShop');//ok!!
Route::post('/delimg2','ShopController@delimg2');//ok!!

Route::post('/pro_searchC','ShopController@pro_searchC');//ok
Route::post('/allPro_searchC','ShopController@allPro_searchC');//ok
Route::post('/date_searchC', 'ShopController@date_searchC');//ok
Route::post('/fromDAte_searchC','ShopController@fromDAte_searchC');//ok
Route::post('/ostan_searchC','ShopController@ostan_searchC');//ok
Route::post('/AllOstan_searchC','ShopController@AllOstan_searchC');//ok
Route::post('/AllCity_searchC','ShopController@AllCity_searchC');//ok
//ثبت سفارش محصول ناموجود
Route::get('/sabtOrder','OrderController@sabtOrder');//ok!!
Route::post('/sabtOrderSave','OrderController@sabtOrderSave');//ok!!
Route::get('/searchOrder','OrderController@searchOrder');//ok!!
Route::post('/mobailSearchOrder','OrderController@mobailSearchOrder');//ok!!
Route::post('/searchOrderSave','OrderController@searchOrderSave');//ok!!
Route::get('/showOrder/{order_id}','OrderController@showOrder')->where('order_id', '[0-9]+');//ok!!
Route::get('/showOneOrder/{id}/{order_id}','OrderController@showOneOrder')->where('id', '[0-9]+')->where('order_id', '[0-9]+');//ok!!
Route::get('/showSabadOrder/{id}/{order_id}','OrderController@showSabadOrder')->where('id', '[0-9]+')->where('order_id', '[0-9]+');//ok!!
Route::post('/pricePostOrder/{id}/{num}','OrderController@pricePostOrder')->where('id', '[0-9]+')->where('num', '[0-9]+');//ok!!
Route::post('/end_price_all','OrderController@end_price_all');//ok!!

Route::get('/factor_order/{id}/{num}/{post}','OrderController@factor_order')->where('id', '[0-9]+')->where('num', '[0-9]+')->where('post', '[0-9 , a-z]+');//ok!!
Route::post('/save_data_buyer2/{id}','OrderController@save_data_buyer2')->where('id', '[0-9]+');//ok
Route::get('/payBuyOrder','OrderController@payBuyOrder');//ok!!
Route::post('/delBuyOrder/{id}', 'OrderController@delBuyOrder')->where('id', '[0-9]+');//ok



//قسمت مدیریت management
Route::get('/management', 'Admin\ManagementController@page_login');//ok
Route::post('/loginManage', 'Admin\ManagementController@loginManage');//ok
Route::get('/logoutManeg', 'Admin\ManagementController@logoutManeg')->middleware(['chekloginManeg']);//ok!!
Route::get('/dashbordAdmin', 'Admin\ManagementController@dashbordAdmin')->middleware(['chekloginManeg']);//ok!!
Route::get('/pro_admin', 'Admin\Pro_adController@show')->middleware(['chekloginManeg']);//ok!!
Route::post('/uplod_img_pro', 'Admin\Pro_adController@uplod_img_pro');//ok
Route::get('/article_admin', 'Admin\Pro_adController@show')->middleware(['chekloginManeg']);//ok!!
Route::get('/add_pro', 'Admin\Pro_adController@add_pro')->middleware(['chekloginManeg']);//ok
Route::post('/save_add_pro1', 'Admin\Pro_adController@save_add_pro1');//ok
Route::get('/edit_pro/{id2}', 'Admin\Pro_adController@edit_pro')->middleware(['chekloginManeg'])->where('id2', '[0-9]+');//ok!!
Route::post('/save_edit_pro1', 'Admin\Pro_adController@save_edit_pro1');//ok
Route::get('/all_edit_pro', 'Admin\Pro_adController@all_edit_pro')->middleware(['chekloginManeg']);//ok
Route::post('/del_imgProAdmin', 'Admin\Pro_adController@del_imgProAdmin');//ok
Route::get('/orderBuy', 'Admin\Pro_adController@orderBuy')->middleware(['chekloginManeg']);//ok
Route::get('/orderBuyOne/{id_buy}', 'Admin\Pro_adController@orderBuyOne')->middleware(['chekloginManeg'])->where('id_buy', '[0-9]+');//ok
// Route::get('/showShopPro/{shop_id}/{page}', 'Admin\Pro_adController@showShopPro')->middleware(['chekloginManeg'])->where('shop_id', '[0-9]+')->where('page', '[0-9 , a-z ,A-Z]+');//ok
// Route::get('/proceedPro', 'Admin\Pro_adController@proceedPro')->middleware(['chekloginManeg']);//ok
// Route::get('/proceedProOne/{id_buy}', 'Admin\Pro_adController@proceedProOne')->middleware(['chekloginManeg'])->where('id_buy', '[0-9]+');//ok
Route::post('/backOrderBuy/{buy_id}', 'Admin\Pro_adController@backOrderBuy')->where('buy_id', '[0-9]+');//ok
// Route::get('/orderErsalSabt/{buy_id?}', 'Admin\Pro_adController@orderErsalSabt')->middleware(['chekloginManeg']);//ok
// Route::post('/sabtCodeRahgiryAdmin', 'Admin\Pro_adController@sabtCodeRahgiryAdmin');//ok
// Route::post('/editCodeRahgiryAdmin', 'Admin\Pro_adController@editCodeRahgiryAdmin');//ok
// Route::get('/orderErsalShowAll', 'Admin\Pro_adController@orderErsalShowAll')->middleware(['chekloginManeg']);//ok
// Route::get('/orderErsalShowOne/{id_buy}', 'Admin\Pro_adController@orderErsalShowOne')->middleware(['chekloginManeg'])->where('id_buy', '[0-9]+');//ok
// Route::post('/editStageOrderAdmin', 'Admin\Pro_adController@editStageOrderAdmin');//ok
// Route::get('/orderSabtEnd/{buy_id?}', 'Admin\Pro_adController@orderSabtEnd')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
// Route::get('/orderSabtEndShowAll', 'Admin\Pro_adController@orderSabtEndShowAll')->middleware(['chekloginManeg']);//ok
// Route::get('/orderSabtEndShowOne/{id_buy}', 'Admin\Pro_adController@orderSabtEndShowOne')->middleware(['chekloginManeg'])->where('id_buy', '[0-9]+');//ok
// Route::get('/orderBackSabt/{buy_id?}', 'Admin\Pro_adController@orderBackSabt')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
// Route::post('/orderBackSave', 'Admin\Pro_adController@orderBackSave');//ok
// Route::get('/orderBackShowAll', 'Admin\Pro_adController@orderBackShowAll')->middleware(['chekloginManeg']);//ok
// Route::get('/orderBackShowOne/{buy_id}', 'Admin\Pro_adController@orderBackShowOne')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
// Route::post('/orderBackEdit', 'Admin\Pro_adController@orderBackEdit');//ok
// Route::post('/delOrderBack/{buy_id}/{backPro_id}/{delBuy?}', 'Admin\Pro_adController@delOrderBack')->where('buy_id', '[0-9]+')->where('backPro_id', '[0-9]+')->where('delBuy', '[0-9 , a-z ,A-Z]+');//ok
// Route::get('/orderBackEndShowAll', 'Admin\Pro_adController@orderBackEndShowAll')->middleware(['chekloginManeg']);//ok
// Route::get('/orderBackEndShowOne/{buy_id}', 'Admin\Pro_adController@orderBackEndShowOne')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::get('/modiranAdmin', 'Admin\ModirAdminController@modiranAdmin')->middleware(['CheckLeader']);//ok!!
Route::get('/adModirManeg', 'Admin\ModirAdminController@adModirManeg')->middleware(['CheckLeader']);//ok!!
Route::post('/modirAdminSabt', 'Admin\ModirAdminController@modirAdminSabt');//ok
Route::get('/edModirManeg', 'Admin\ModirAdminController@edModirManeg')->middleware(['CheckLeader']);//ok!!
Route::get('/edModirManegOne/{idModir}', 'Admin\ModirAdminController@edModirManegOne')->middleware(['CheckLeader'])->where('idModir', '[0-9]+');//ok!!
Route::post('/editModirManeg', 'Admin\ModirAdminController@editModirManeg');//ok
Route::post('/editPasModirManeg', 'Admin\ModirAdminController@editPasModirManeg');//ok
Route::get('/showProfileManeg', 'Admin\ModirAdminController@showProfileManeg')->middleware(['chekloginManeg']);//ok!!
Route::post('/editModirManeg2', 'Admin\ModirAdminController@editModirManeg2');//ok
Route::post('/editPasModirManeg2', 'Admin\ModirAdminController@editPasModirManeg2');//ok

// channel admin
Route::get('/channel_admin', 'Admin\ChannelAdminController@show')->middleware(['chekloginManeg']);//ok!!
Route::get('/all_edit_channel', 'Admin\ChannelAdminController@all_edit_channel')->middleware(['chekloginManeg']);//ok
Route::get('/showOne_ChannelAdmin/{channel_id}', 'Admin\ChannelAdminController@showOne_ChannelAdmin')->middleware(['chekloginManeg'])->where('channel_id', '[0-9]+');//ok
Route::post('/edit1_ChannelAdmin', 'Admin\ChannelAdminController@edit1_ChannelAdmin');//ok
Route::post('/edit2_ChannelAdmin', 'Admin\ChannelAdminController@edit2_ChannelAdmin');//ok
Route::post('/editPas_channelAdmin', 'Admin\ChannelAdminController@editPas_channelAdmin');//ok
Route::get('/all_act_channel', 'Admin\ChannelAdminController@all_act_channel')->middleware(['chekloginManeg']);//ok
Route::get('/all_rank_channel', 'Admin\ChannelAdminController@all_rank_channel')->middleware(['chekloginManeg']);//ok

// shop admin
Route::get('/shop_admin', 'Admin\ShopAdminController@show')->middleware(['chekloginManeg']);//ok!!
Route::get('/all_edit_shop', 'Admin\ShopAdminController@all_edit_shop')->middleware(['chekloginManeg']);//ok
Route::get('/showOne_shopAdmin/{shop_id}', 'Admin\ShopAdminController@showOne_shopAdmin')->middleware(['chekloginManeg'])->where('shop_id', '[0-9]+');//ok
Route::post('/edit1_shopAdmin', 'Admin\ShopAdminController@edit1_shopAdmin');//ok
Route::post('/edit2_shopAdmin', 'Admin\ShopAdminController@edit2_shopAdmin');//ok
Route::post('/editPas_shopAdmin', 'Admin\ShopAdminController@editPas_shopAdmin');//ok
Route::get('/all_act_shop', 'Admin\ShopAdminController@all_act_shop')->middleware(['chekloginManeg']);//ok
Route::get('/all_rank_shop', 'Admin\ShopAdminController@all_rank_shop')->middleware(['chekloginManeg']);//ok
Route::get('/all_newOrderSA', 'Admin\ShopAdminController@all_newOrderSA')->middleware(['chekloginManeg']);//ok
//عملیات بر روی خریدها و سفارشات ثابت و غیر ثابت
Route::post('/orderAghdamAdmin/{buy_id}/{stampBuy}', 'Admin\ManagementController@orderAghdamAdmin')->where('buy_id', '[0-9]+')->where('stampBuy', '[0-9]+');//ok
Route::post('/delBuyOrderAdmin/{buy_id}/{stampDel}', 'Admin\ManagementController@delBuyOrderAdmin')->where('buy_id', '[0-9]+')->where('stampDel', '[0-9]+');//ok

//pro stock admin سفارشات موجود فروشگاه فاتک
Route::get('/order_proStockFatak', 'Admin\OrderStockFatakAdminController@show')->middleware(['chekloginManeg']);//ok!!
Route::get('/orderNewPStockF', 'Admin\OrderStockFatakAdminController@orderNewPStockF')->middleware(['chekloginManeg']);//ok!!
Route::get('/orderOneNewPStockF/{buy_id}', 'Admin\OrderStockFatakAdminController@orderOneNewPStockF')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok!!
Route::get('/proceedOrderStockF', 'Admin\OrderStockFatakAdminController@proceedOrderStockF')->middleware(['chekloginManeg']);//ok
Route::get('/proceedOneOrderStockF/{buy_id}', 'Admin\OrderStockFatakAdminController@proceedOneOrderStockF')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::post('/backOrderNSF/{buy_id}', 'Admin\OrderStockFatakAdminController@backOrderNSF')->where('buy_id', '[0-9]+');//ok
Route::get('/orderErsalSabtStockF/{buy_id?}', 'Admin\OrderStockFatakAdminController@orderErsalSabtStockF')->middleware(['chekloginManeg']);//ok
Route::post('/sabtCodeRahgiryNSF', 'Admin\OrderStockFatakAdminController@sabtCodeRahgiryNSF');//ok
Route::get('/orderErsalShowAllStockF', 'Admin\OrderStockFatakAdminController@orderErsalShowAllStockF')->middleware(['chekloginManeg']);//ok
Route::get('/orderErsalShowOneStockF/{buy_id}','Admin\OrderStockFatakAdminController@orderErsalShowOneStockF')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::post('/editCodeRahgiryNSF', 'Admin\OrderStockFatakAdminController@editCodeRahgiryNSF');//ok
Route::post('/editStageOrderNSF', 'Admin\OrderStockFatakAdminController@editStageOrderNSF');//ok
Route::get('/orderSabtEndStockF/{buy_id?}', 'Admin\OrderStockFatakAdminController@orderSabtEndStockF')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::get('/orderSabtEndShowAllStockF', 'Admin\OrderStockFatakAdminController@orderSabtEndShowAllStockF')->middleware(['chekloginManeg']);//ok
Route::get('/orderSabtEndShowOneStockF/{buy_id}', 'Admin\OrderStockFatakAdminController@orderSabtEndShowOneStockF')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::get('/orderBackSabtStockF/{buy_id?}', 'Admin\OrderStockFatakAdminController@orderBackSabtStockF')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::post('/orderBackSaveStockF', 'Admin\OrderStockFatakAdminController@orderBackSaveStockF');//ok
Route::get('/orderBackShowAllStockF', 'Admin\OrderStockFatakAdminController@orderBackShowAllStockF')->middleware(['chekloginManeg']);//ok
Route::get('/orderBackShowOneStockF/{buy_id}', 'Admin\OrderStockFatakAdminController@orderBackShowOneStockF')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::post('/orderBackEditStockF', 'Admin\OrderStockFatakAdminController@orderBackEditStockF');//ok
Route::post('/delOrderBackStockF/{buy_id}/{backPro_id}/{delBuy?}', 'Admin\OrderStockFatakAdminController@delOrderBackStockF')->where('buy_id', '[0-9]+')->where('backPro_id', '[0-9]+')->where('delBuy', '[0-9 , a-z ,A-Z]+');//ok
Route::get('/orderBackEndShowAllStockF', 'Admin\OrderStockFatakAdminController@orderBackEndShowAllStockF')->middleware(['chekloginManeg']);//ok
Route::get('/orderBackEndShowOneStockF/{buy_id}', 'Admin\OrderStockFatakAdminController@orderBackEndShowOneStockF')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
// سفارشات غیر ثابت فاتک Unstock
Route::get('/order_proUnStockFatak', 'Admin\OrderUnStockFatakAdminController@show')->middleware(['chekloginManeg']);//ok!!
Route::get('/orderNewPUnStockF/{order_id?}', 'Admin\OrderUnStockFatakAdminController@orderNewPUnStockF')->middleware(['chekloginManeg'])->where('order_id', '[0-9]+');//ok!!
Route::get('/orderOneNewPUnStockF/{order_id}', 'Admin\OrderUnStockFatakAdminController@orderOneNewPUnStockF')->middleware(['chekloginManeg'])->where('order_id', '[0-9]+');//ok!!
Route::post('/pro_searchUSF', 'Admin\OrderUnStockFatakAdminController@pro_searchUSF');//ok
Route::post('/allPro_searchUSF', 'Admin\OrderUnStockFatakAdminController@allPro_searchUSF');//ok
Route::post('/date_searchUSF', 'Admin\OrderUnStockFatakAdminController@date_searchUSF');//ok
Route::post('/fromDAte_searchUSF', 'Admin\OrderUnStockFatakAdminController@fromDAte_searchUSF');//ok
Route::post('/ostan_searchNPUF', 'Admin\OrderUnStockFatakAdminController@ostan_searchNPUF');//ok
Route::post('/AllOstan_searchNPUF', 'Admin\OrderUnStockFatakAdminController@AllOstan_searchNPUF');//ok
Route::post('/AllCiyt_searchNPUF', 'Admin\OrderUnStockFatakAdminController@AllCiyt_searchNPUF');//ok
Route::post('/saveOrderNPUF', 'Admin\OrderUnStockFatakAdminController@saveOrderNPUF');//ok
Route::get('/orderSabtPUnStockF/{order_id?}/{stamp?}', 'Admin\OrderUnStockFatakAdminController@orderSabtPUnStockF')->middleware(['chekloginManeg'])->where('order_id', '[0-9]+')->where('stamp', '[0-9]+');//ok!!
Route::get('/orderOneSabtPUnStockF/{pro_id}', 'Admin\OrderUnStockFatakAdminController@orderOneSabtPUnStockF')->middleware(['chekloginManeg'])->where('pro_id', '[0-9]+');//ok!!
Route::get('/orderOneSabtPUnStockF/{pro_id}', 'Admin\OrderUnStockFatakAdminController@orderOneSabtPUnStockF')->middleware(['chekloginManeg'])->where('pro_id', '[0-9]+');//ok!!
Route::post('/editOrderSPUF/{pro_id}', 'Admin\OrderUnStockFatakAdminController@editOrderSPUF')->where('pro_id', '[0-9]+');//ok
Route::get('/orderBuyUnStockF', 'Admin\OrderUnStockFatakAdminController@orderBuyUnStockF')->middleware(['chekloginManeg']);//ok!!
Route::get('/orderOneBuyUnStockF/{buy_id}', 'Admin\OrderUnStockFatakAdminController@orderOneBuyUnStockF')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok!!
Route::get('/proceedOrderUnStockF', 'Admin\OrderUnStockFatakAdminController@proceedOrderUnStockF')->middleware(['chekloginManeg']);//ok











//pro stock admin سفارشات موجود سایر فروشگاهها
Route::get('/order_proStockSaier', 'Admin\OrderStockSaierAdminController@show')->middleware(['chekloginManeg']);//ok!!
Route::get('/showShopProStockS/{shop_id}/{page}', 'Admin\OrderStockSaierAdminController@showShopProStockS')->middleware(['chekloginManeg'])->where('shop_id', '[0-9]+')->where('page', '[0-9 , a-z ,A-Z]+');//ok
Route::get('/orderNewPStockS', 'Admin\OrderStockSaierAdminController@orderNewPStockS')->middleware(['chekloginManeg']);//ok!!
Route::get('/orderOneNewPStockS/{buy_id}', 'Admin\OrderStockSaierAdminController@orderOneNewPStockS')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok!!
Route::get('/proceedOrderStockS', 'Admin\OrderStockSaierAdminController@proceedOrderStockS')->middleware(['chekloginManeg']);//ok
Route::get('/proceedOrderOneStockS/{buy_id}', 'Admin\OrderStockSaierAdminController@proceedOrderOneStockS')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::post('/backOrderNSS/{buy_id}', 'Admin\OrderStockSaierAdminController@backOrderNSS')->where('buy_id', '[0-9]+');//ok
// Route::get('/orderErsalSabtStockS/{buy_id?}', 'Admin\OrderStockSaierAdminController@orderErsalSabtStockS')->middleware(['chekloginManeg']);//ok
Route::get('/orderErsalShowAllStockS', 'Admin\OrderStockSaierAdminController@orderErsalShowAllStockS')->middleware(['chekloginManeg']);//ok
Route::get('/orderErsalShowOneStockS/{buy_id}','Admin\OrderStockSaierAdminController@orderErsalShowOneStockS')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::post('/editStageOrderNSS', 'Admin\OrderStockSaierAdminController@editStageOrderNSS');//ok
Route::get('/orderSabtEndStockS/{buy_id?}', 'Admin\OrderStockSaierAdminController@orderSabtEndStockS')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::get('/orderSabtEndShowAllStockS', 'Admin\OrderStockSaierAdminController@orderSabtEndShowAllStockS')->middleware(['chekloginManeg']);//ok
Route::get('/orderSabtEndShowOneStockS/{buy_id}', 'Admin\OrderStockSaierAdminController@orderSabtEndShowOneStockS')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::get('/orderBackSabtStockS/{buy_id?}', 'Admin\OrderStockSaierAdminController@orderBackSabtStockS')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::post('/orderBackSaveStockS', 'Admin\OrderStockSaierAdminController@orderBackSaveStockS');//ok
Route::get('/orderBackShowAllStockS', 'Admin\OrderStockSaierAdminController@orderBackShowAllStockS')->middleware(['chekloginManeg']);//ok
Route::get('/orderBackShowOneStockS/{buy_id}', 'Admin\OrderStockSaierAdminController@orderBackShowOneStockS')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
Route::post('/orderBackEditStockS', 'Admin\OrderStockSaierAdminController@orderBackEditStockS');//ok
Route::post('/delOrderBackStockS/{buy_id}/{backPro_id}/{delBuy?}', 'Admin\OrderStockSaierAdminController@delOrderBackStockS')->where('buy_id', '[0-9]+')->where('backPro_id', '[0-9]+')->where('delBuy', '[0-9 , a-z ,A-Z]+');//ok
Route::get('/orderBackEndShowAllStockS', 'Admin\OrderStockSaierAdminController@orderBackEndShowAllStockS')->middleware(['chekloginManeg']);//ok
Route::get('/orderBackEndShowOneStockS/{buy_id}', 'Admin\OrderStockSaierAdminController@orderBackEndShowOneStockS')->middleware(['chekloginManeg'])->where('buy_id', '[0-9]+');//ok
