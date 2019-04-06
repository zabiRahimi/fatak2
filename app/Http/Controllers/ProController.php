<?php

namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Pro;
use App\Models\picturePro;
use App\Models\NazarPro;
use App\Models\QuestionPro;
use App\Models\AnswerPro;
use App\Models\City;
use App\Models\Shop;
use App\Models\Post_pishtaz;
use App\Models\Post_sefareshi;
class ProController extends Controller
{
  public function show_pro(Request $request , $id  ){
    $show_pro=Pro::find($id);
    $pic_pro=Pro::find($id)->PicturePro;
    $nazar_pro=Pro::find($id)->NazarPro;
    $count_nazar_pro=Pro::find($id)->NazarPro->count();
    $question_pro=Pro::find($id)->QuestionPro;
    $count_question_pro=Pro::find($id)->QuestionPro->count();
    $answer_pro=AnswerPro::where('pro_id' , $id)->get();
    // $count_answer_pro=QuestionPro::find($id)->AnswerPro->count();
    //جهت اسلایدر محصولات
    $pro=Pro::where('show' , 1)->get();
    $count=Pro::where('show' , 1)->count();
    $pro_nazar=NazarPro::get();
    $pro_pic=PicturePro::get();
    $check=$request->cookie('check_log');
    if(!empty($request->cookie('numpro'))){$num_pro=$request->cookie('numpro');}else{$num_pro=0;}
    //ثبت بازدید

$nameCookei='sabt'. $id;
if(empty($request->cookie($nameCookei))){
  $view= $show_pro->views+1;
  $show_pro->update(['views'=>$view]);
  Cookie::queue($nameCookei, 'ok');

}

    return  view('pro.show_pro', compact('show_pro', 'pic_pro', 'nazar_pro', 'count_nazar_pro' , 'question_pro' , 'count_question_pro', 'answer_pro' , 'count_answer_pro'
     ,'pro' ,  'count' , 'pro_nazar', 'pro_pic','num_pro','check'  ));
  }
  //ثبت بازدید
  // public function view_pro(Request $request){
  //   $id2=$request->id;
  //   $name_session='seh'.$id2;
  //   $val=$request->session()->get($name_session);
  //   if($val!='no'){
  //     $pro=Pro::find($id2);
  //     $view= $pro->views+1;
  //     $pro->update(['views'=>$view]);
  //      $request->session()->put([$name_session=>'no']);
  //   }
  // }

}//end class
