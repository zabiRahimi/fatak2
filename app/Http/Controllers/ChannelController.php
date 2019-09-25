<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\channel;
use App\Models\Ch_view;
use App\Models\Income;
use App\Models\Reimburse_ch;
use Cookie;
use DB;
use Illuminate\Contracts\Encryption\Encrypter;
use App\Http\Requests\Save_login_channel;
use App\Http\Requests\Save_sabt_channel_1;
use App\Http\Requests\Save_sabt_channel_2;
use App\Http\Requests\Save_editDaChSave;
use App\Http\Requests\Save_editPasDaCh;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Illuminate\Support\Facades\Hash;

class ChannelController extends Controller
{
    public $stage;
    public $id;
    public function __construct(Encrypter $encrypter ,Request $request)
    {
      $cookie=$request->cookie('check_log_channel');
      if(!empty($cookie)){
      $this->middleware(function ($request, $next){
      $id = $request->cookie('check_log_channel');
      $this->id=$id;
      $user=Channel::find($id);
      $this->stage=$user->stage;
      return $next($request);
        });
        }
    }
    public function page_login(Request $request)
    {
      return view('channel.login_channel');
    }
    public function sabt_channel_1(Save_sabt_channel_1 $request)
    {
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $save=new Channel();
      $save->name=$request->name;
      $save->mobail=$request->mobail;
      $save->email=$request->email;
      $save->pas=Hash::make($request->pas);
      $save->date_ad=$date;
      $save->date_up=$date;
      $save->stage=1;
      $save->show=1;
      $save->save();
    }
    public function login_channel(Save_login_channel $request ){
      $mobail=$request->mobail;
      $pas=$request->pas;
      $add=Channel::where('mobail',$mobail)->first();
      if(!empty($add)){
        if (Hash::check($pas, $add['pas']))
        {
          $id=$add['id'];
          Cookie::queue('check_log_channel', $id);
        }else{
          return response()->json(['errors' => ['no_karbar' => ['موبایل و یا رمز عبور اشتباه است .']]], 422);
        }
      }
        else{
          return response()->json(['errors' => ['no_karbar' => ['موبایل و یا رمز عبور اشتباه است .']]], 422);
        }
    }
    public function logoutCh(){
      Cookie::queue('check_log_channel', '',time() - 3600);
      return redirect('/');
    }
    public function dashboard_channel(Request $request){
      $user=Channel::find($this->id);
      $stage=$this->stage;
      return view('channel.dashboardCh' , compact('user','stage'));
    }
    public function perfect_data(Request $request)
    {
      $stage=$this->stage;
      return view('channel.perfect_data' , compact('stage'));
    }

    public function sabt_channel_2(Save_sabt_channel_2 $request)
    {
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $id=$request->cookie('check_log_channel');
      $save=channel::find($id);
      $save->codemly=$request->codemly;
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
    public function editDaCh(Request $request)
    {
      $user=Channel::find($this->id);
      $stage=$this->stage;
      return view('channel.edit_data' , compact('stage' , 'user'));
    }
    public function editDaChSave(Save_editDaChSave $request)
    {
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $save=channel::find($this->id);
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
      $save->save();
    }
    public function editPasDaCh(Save_editPasDaCh $request)
    {
      $pas=$request->pasOld;
      $add=Channel::find($this->id);
      // if(!empty($add)){
        if (Hash::check($pas, $add['pas']))
        {
          $add->pas=Hash::make($request->pasNew);
          $add->save();
        }else{
          return response()->json(['errors' => ['no_pas' => ['رمز فعلی اشتباه است .']]], 422);
        }
    }
    public function warnCh(Request $request)
    {
      return view('channel.warnCh');
    }
    public function urlChMy(Request $request)
    {
      $stage=$this->stage;
      $id=$this->id;
      return view('channel.urlChMy', compact('stage','id'));
    }
    public function viewChMy(Request $request)
    {
      $stage=$this->stage;
      $date1=new Verta();//تاریخ جلالی
      $dateStart=$date1->startMonth()->format('Y/n/j');
      $dateEnd=$date1->endMonth()->format('Y/n/j');
      //ابتدای ماه گذشته
      $startMonthPast=$date1->subMonth()->startMonth()->format('Y/n/j');
      //انتهای ماه گذشته
      $endMonthPast=$date1->subMonth()->endMonth()->format('Y/n/j');
      // ->whereBetween('votes', [1, 100])->get();
      $ch=Ch_view::where('channel_id', $this->id)->get();
      $buy=Ch_view::where('channel_id', $this->id)->where('lot_ch' ,'!=',null)->get();
      $buy_month=Ch_view::where('channel_id', $this->id)->where('lot_ch' ,'!=',null)->whereBetween('date', [$dateStart, $dateEnd])->get();
      $buy_monthPast=Ch_view::where('channel_id', $this->id)->where('lot_ch' ,'!=',null)->whereBetween('date', [$startMonthPast, $endMonthPast])->count();
      $view_month=Ch_view::where('channel_id', $this->id)->whereBetween('date', [$dateStart, $dateEnd])->get();
      $count_view_monthPast=Ch_view::where('channel_id', $this->id)->whereBetween('date', [$startMonthPast, $endMonthPast])->count();
      $count_buy=count($buy);
      $count_buy_month=count($buy_month);
      $count=count($ch);
      $count_view_month=count($view_month);
      return view('channel.viewChMy', compact('stage','count','count_buy','count_view_month','count_view_monthPast','count_buy_month','buy_monthPast'));
    }
    public function viewChAll(Request $request)
    {
      $id=$this->id;
      $stage=$this->stage;
      $date1=new Verta();//تاریخ جلالی
      $dateStart=$date1->startMonth()->format('Y/n/j');
      $dateEnd=$date1->endMonth()->format('Y/n/j');
      $count_ch=Channel::count();
      $channel=new Channel();
      $count_view_ch=Ch_view::count();
      $count_view_month=Ch_view::whereBetween('date', [$dateStart, $dateEnd])->count();
      $bigViewCh = DB::table('ch_views')->select("ch_views.channel_id",Db::raw('count(*) as ch_views'))->groupBy('channel_id')->orderBy('ch_views','desc')->get();
      $bigViewChMont = DB::table('ch_views')->select("ch_views.channel_id",Db::raw('count(*) as ch_views'))->whereBetween('date', [$dateStart, $dateEnd])->groupBy('channel_id')->orderBy('ch_views','desc')->get();
      return view('channel.viewChAll', compact('id','stage' ,'count_ch','channel','count_view_ch','count_view_month','bigViewCh','bigViewChMont'));
    }
    public function incomeChMy(Request $request)
    {
      $id=$this->id;
      $date1=new Verta();//تاریخ جلالی
      //ابتدای ماه گذشته
      $startMonthPast=$date1->subMonth()->startMonth()->format('Y/n/j');
      //انتهای ماه گذشته
      $endMonthPast=$date1->subMonth()->endMonth()->format('Y/n/j');
      //بدست آوردن همه بازدیدهای ماه گذشته
      $count_view_month=Ch_view::whereBetween('date', [$startMonthPast, $endMonthPast])->count();
      //تعداد بازدیدهای ماه گذشته من
      $count_view_month_my=Ch_view::where('channel_id', $this->id)->whereBetween('date', [$startMonthPast, $endMonthPast])->count();
      $month_income=Income::where('stage', '2')->first();
      //ارزش بازدید ماه گذشته
      if($month_income && !empty($count_view_month)){
        $view_income_month=floor($month_income->channel/$count_view_month);
      }else{
        $view_income_month=0;
      }
      //بیشتر نبودن ارزش بازدید از 1000 تومان
      if ($view_income_month > 1000) {
        $view_income_month=1000;
      }
      //درآمد بازدید ماه گذشته من
      $view_income_month_my=$view_income_month*$count_view_month_my;
      //درآمد منجر به خرید ماه گذشته شبکه من
      $price_buy_month_my=Ch_view::where('channel_id', $this->id)->whereBetween('date', [$startMonthPast, $endMonthPast])->sum('lot_ch');
      //کل درآمد ماه گذشته من
      $allIncomeMonth_my=$price_buy_month_my+$view_income_month_my;
      //کل درآمد من
      $allIncome_my=Channel::where('id', $this->id)->first();
      //درآمد تسویه شده من
      $defray_my=Reimburse_ch::where('channel_id', $this->id)->where('species', 1)->sum('price');
      //درآمد تسویه نشده من
      $noDefray_my=$allIncome_my->income-$defray_my;
      //پردرآمد ترینها
      $superIncomeCh=Channel::orderBy('income','desc')->get();
      $all_income=Income::where('stage', '!=','1')->sum('channel');
      $stage=$this->stage;
      return view('channel.incomeChMy', compact('id','stage','view_income_month','view_income_month_my','price_buy_month_my','allIncomeMonth_my','allIncome_my','defray_my','noDefray_my','month_income','all_income','superIncomeCh'));
    }
    public function societyCh(Request $request)
    {
      return view('channel.societyCh');
    }
    public function ghanonCh(Request $request)
    {
      return view('channel.ghanonCh');
    }
    public function rahnamaCh(Request $request)
    {
      return view('channel.rahnamaCh');
    }
}
