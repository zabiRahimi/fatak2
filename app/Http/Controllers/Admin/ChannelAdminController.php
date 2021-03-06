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
use App\Models\Channel;
use App\Models\Ch_view;//بازدیدها و خریدهای شبکه
use App\Models\Income;
use App\Http\Requests\Save_editDaChSave;
use App\Http\Requests\SaveEdit2_ChannelAdmin;
use App\Http\Requests\Save_modirEditPas_admin;


class ChannelAdminController extends Controller
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
    // $show_img=Imgpro::where('show' , 1)->get();
    return view('management.channel_admin.channel_admin' , compact('id','nameModir','access'));
  }
  public function all_edit_channel(Request $request ){
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $channel=Channel::get();
    $ch_view=Ch_view::get();

    return view('management.channel_admin.all_edit_channel', compact('id','nameModir','access','channel','ch_view'));
  }
  public function showOne_ChannelAdmin(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $channel=Channel::find($request->channel_id);

    return view('management.channel_admin.showOne_ChannelAdmin', compact('id','nameModir','access','channel'));
  }
  //ویرایش و ثبت اطلاعات کامل شبکه
  public function edit1_ChannelAdmin(Save_editDaChSave $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $save=channel::find($request->id);
    $save->name=$request->name;
    $save->codemly=$request->codemly;
    $save->mobail=$request->mobail;
    $save->email=$request->email;
    $save->ostan=$request->ostan;
    $save->city=$request->city;
    $save->address=$request->address;
    $save->accountNumber=$request->accountNumber;
    $save->cart=$request->cart;
    $save->master=$request->master;
    $save->bank=$request->bank;
    $save->date_up=$date;
    $save->stage=2;
    $save->save();
  }
  //ویرایش و ثبت اطلاعات اولیه شبکه
  public function edit2_ChannelAdmin(SaveEdit2_ChannelAdmin $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $save=channel::find($request->id);
    $save->name=$request->name;
    $save->mobail=$request->mobail;
    $save->date_up=$date;
    $save->save();
  }
  public function editPas_channelAdmin(Save_modirEditPas_admin $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=channel::find($request->id);
    $add->pas=Hash::make($request->pas);
    $add->date_up=$date;
    $add->save();
  }

  public function all_act_channel(Request $request)
  {
    //کارکرد شبکه ها
    //تکمیل نشده است
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $channel=Channel::find($request->channel_id);

    return view('management.channel_admin.all_act_channel', compact('id','nameModir','access','channel'));
  }

  public function all_rank_channel(Request $request)
  {
    //رتبه شبکه ها
    //تکمیل نشده است
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $channel=Channel::find($request->channel_id);

    return view('management.channel_admin.all_rank_channel', compact('id','nameModir','access','channel'));
  }
}//end class
