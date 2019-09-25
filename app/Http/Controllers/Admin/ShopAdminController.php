<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\Encrypter;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Illuminate\Support\Facades\Hash;
use Cookie;
use DB;
use App\Models\Admin\Management;
use App\Models\Shop;
use App\Models\Ch_view;//بازدیدها و خریدهای شبکه
use App\Models\Income;
use App\Http\Requests\Save_editShop;
use App\Http\Requests\SaveEdit2_shopAdmin;
use App\Http\Requests\Save_modirEditPas_admin;
class ShopAdminController extends Controller
{
  public $id ,$nameModir,$access;
  public function __construct(Encrypter $encrypter ,Request $request)
  {
    $cookie=$request->cookie('checkLogManeg');
    if(!empty($cookie)){
    $this->middleware(function ($request, $next){
    $id = $request->cookie('checkLogManeg');
    $this->id=$id;
    $user=Management::find($id);
    $this->nameModir=$user->name;
    $this->access=$user->access;
    return $next($request);
      });
      }
  }
  public function show(Request $request){
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    return view('management.shop_admin.shop_admin' , compact('id','nameModir','access'));
  }
  public function all_edit_shop(Request $request ){
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $shop=Shop::get();
    $ch_view=Ch_view::get();
    return view('management.shop_admin.all_edit_shop', compact('id','nameModir','access','shop','ch_view'));
  }
  public function showOne_shopAdmin(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $shop=Shop::find($request->shop_id);
    return view('management.shop_admin.showOne_shopAdmin', compact('id','nameModir','access','shop'));
  }
  //ویرایش و ثبت اطلاعات کامل شبکه
  public function edit1_shopAdmin(Save_editShop $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $save=Shop::find($request->id);
    $save->shop=$request->shop;
    $save->seller=$request->seller;
    $save->codemly=$request->codemly;
    $save->mobail=$request->mobail;
    $save->tel=$request->tel;
    $save->email=$request->email;
    $save->ostan=$request->ostan;
    $save->city=$request->city;
    $save->address=$request->address;
    $save->codepost=$request->codepost;
    $save->accountNumber=$request->accountNumber;
    $save->cart=$request->cart;
    $save->master=$request->master;
    $save->bank=$request->bank;
    $save->date_up=$date;
    $save->stage=2;
    $save->show=$request->show;
    $save->save();
  }
  //ویرایش و ثبت اطلاعات اولیه شبکه
  public function edit2_shopAdmin(SaveEdit2_shopAdmin $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $save=Shop::find($request->id);
    $save->seller=$request->seller;
    $save->mobail=$request->mobail;
    $save->date_up=$date;
    $save->save();
  }
  public function editPas_shopAdmin(Save_modirEditPas_admin $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=Shop::find($request->id);
    $add->pas=Hash::make($request->pas);
    $add->date_up=$date;
    $add->save();
  }
  public function all_act_shop(Request $request)
  {
    //کارکرد شبکه ها
    //تکمیل نشده است
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $shop=Shop::find($request->shop_id);
    return view('management.shop_admin.all_act_shop', compact('id','nameModir','access','shop'));
  }
  public function all_rank_shop(Request $request)
  {
    //رتبه شبکه ها
    //تکمیل نشده است
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $shop=Shop::find($request->shop_id);
    return view('management.shop_admin.all_rank_shop', compact('id','nameModir','access','shop'));
  }
  public function all_newOrderSA(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $shop=Shop::get();
    $ch_view=Ch_view::get();
    return view('management.shop_admin.all_newOrderSA', compact('id','nameModir','access','shop','ch_view'));
  }
}//end class
