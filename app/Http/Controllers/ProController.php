<?php
namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use App\Models\Pro;
use App\Models\Shop;
use App\Models\picturePro;
use App\Models\NazarPro;
use App\Models\QuestionPro;
use App\Models\AnswerPro;
use App\Http\Requests\Save_pro_nazar;
use App\Http\Requests\Save_pro_question;
use App\Http\Requests\Save_pro_answer;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
class ProController extends Controller
{
  public function show_pro(Request $request , $id  ){
    $show_pro=Pro::find($id);
    $pic_pro=Pro::find($id)->PicturePro;
    $nazar_pro=Pro::find($id)->NazarPro;
    $count_nazar_pro=count($nazar_pro);
    $question_pro=Pro::find($id)->QuestionPro;
    $count_question_pro=count($question_pro);
    $answer_pro=AnswerPro::where('pro_id' , $id)->get();
    $check=$request->cookie('check_log');
    $shop=Shop::find($show_pro->shop_id);
    if(!empty($request->cookie('numProSabad'))){$arraySabad=unserialize($request->cookie('numProSabad'));$numProSabad=$arraySabad['numPro'];}else{$numProSabad=0;}//تعداد محصولات موجود در سبد خرید
    //ثبت بازدید
    $nameCookei='sabt'. $id;
    if(empty($request->cookie($nameCookei))){
      $bazdid= $show_pro->bazdid+1;
      $show_pro->update(['bazdid'=>$bazdid]);
      Cookie::queue($nameCookei, 'ok',0);
    }
    return  view('pro.showOnePro', compact('show_pro','pic_pro','nazar_pro','count_nazar_pro','question_pro','count_question_pro','answer_pro'
     ,'numProSabad','check','shop'));
  }
  public function sabtNazarStock(Save_pro_nazar $request)
  {

    $add=new NazarPro();
    $add->pro_id=$request->pro_id;
    $add->name=$request->name;
    $add->mobail=$request->mobail;
    $add->email=$request->email;
    $add->nazar=$request->nazar;
    $add->date=time();
    $add->show=1;
    $add->save();
  }
  public function sabtQuestionStock(Save_pro_question $request)
  {
    $add=new QuestionPro();
    $add->pro_id=$request->pro_id;
    $add->name=$request->name;
    $add->mobail=$request->mobail;
    $add->email=$request->email;
    $add->question=$request->question;
    $add->date=time();
    $add->show=1;
    $add->save();
  }
  public function sabt_answer_pro(Save_pro_answer $request)
  {

    $add=new AnswerPro();
    $add->question_pro_id=$request->question_id;
    $add->pro_id=$request->pro_id;
    $add->name=$request->name;
    $add->mobail=$request->mobail;
    $add->email=$request->email;
    $add->answer=$request->answer;
    $add->date=time();
    $add->show=1;
    $add->save();
  }
}//end class
