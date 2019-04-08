<?php
namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use App\Models\Pro;
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
  public function sabt_nazar_pro(Save_pro_nazar $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=new NazarPro();
    $add->pro_id=$request->pro_id;
    $add->name=$request->name;
    $add->mobail=$request->mobail;
    $add->email=$request->email;
    $add->nazar=$request->nazar;
    $add->date=$date;
    $add->show=1;
    $add->save();
  }
  public function sabt_question_pro(Save_pro_question $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=new QuestionPro();
    $add->pro_id=$request->pro_id;
    $add->name=$request->name;
    $add->mobail=$request->mobail;
    $add->email=$request->email;
    $add->question=$request->question;
    $add->date=$date;
    $add->show=1;
    $add->save();
  }
  public function sabt_answer_pro(Save_pro_answer $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=new AnswerPro();
    $add->question_pro_id=$request->question_id;
    $add->pro_id=$request->pro_id;
    $add->name=$request->name;
    $add->mobail=$request->mobail;
    $add->email=$request->email;
    $add->answer=$request->answer;
    $add->date=$date;
    $add->show=1;
    $add->save();
  }
}//end class
