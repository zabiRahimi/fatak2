<?php
namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use App\Models\Pro;
use App\Models\picturePro;
use App\Models\NazarPro;
use App\Models\QuestionPro;
use App\Models\AnswerPro;
class ProController extends Controller
{
  public function show_pro(Request $request , $id  ){
    $show_pro=Pro::find($id);
    $pic_pro=Pro::find($id)->PicturePro;
    $nazar_pro=Pro::find($id)->NazarPro;
    // $count_nazar_pro=Pro::find($id)->NazarPro->count();
    $count_nazar_pro=count($nazar_pro);
    $question_pro=Pro::find($id)->QuestionPro;
    $count_question_pro=Pro::find($id)->QuestionPro->count();
    $answer_pro=AnswerPro::where('pro_id' , $id)->get();
    $check=$request->cookie('check_log');
    if(!empty($request->cookie('numpro'))){$num_pro=$request->cookie('numpro');}else{$num_pro=0;}
    //ثبت بازدید
    $nameCookei='sabt'. $id;
    if(empty($request->cookie($nameCookei))){
      $view= $show_pro->views+1;
      $show_pro->update(['views'=>$view]);
      Cookie::queue($nameCookei, 'ok');
    }
    return  view('pro.show_pro', compact('show_pro','pic_pro','nazar_pro','count_nazar_pro','question_pro','count_question_pro','answer_pro','count_answer_pro'
     ,'num_pro','check'));
  }
}//end class
