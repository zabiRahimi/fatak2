<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Cookie;
use App\Models\Register;
use App\Http\Requests\Save_register;
use App\Http\Requests\Save_login_user;
use App\Http\Requests\Save_edit_user;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function register(Save_register $request ){
      $date1=new Verta();//تاریخ جلالی
      $date=$date1->format('Y/n/j');
      $add=new Register();
      $add->name=$request->name;
      $add->karbary=$request->karbary;
      $add->pas=Hash::make($request->pas);
      $add->mobail=$request->mobail;
      $add->email=$request->email;
      $add->created_at=$date;
      $add->updated_at=$date;
      $add->show=1;
      $add->save();
    }
    public function login_user(Save_login_user $request ){
      $karbary=$request->karbary;
      $pas=$request->pas;
      $add=Register::where('karbary',$karbary)->first();
      if(!empty($add)){
        if (Hash::check($pas, $add['pas']))
        {
          $id=$add['id'];
          Cookie::queue('check_log', $id,0);
        }else{
          return response()->json(['errors' => ['no_karbar' => ['نام کاربری و یا رمز عبور اشتباه است .']]], 422);
        }
      }
        else{
          return response()->json(['errors' => ['no_karbar' => ['نام کاربری و یا رمز عبور اشتباه است .']]], 422);
        }
    }
    public function logout_user(){
      // Cookie::queue('check_log', '',time() - 3600);
      return redirect('/')->withCookie(Cookie::forget('check_log'));
    }
    public function dashboard_user(Request $request){
      $id=$request->cookie('check_log');
      $user=Register::find($id);
      return view('dashboard_user' , compact('user'));
    }
    public function edit_register(Save_edit_user $request){
      $id=$request->id;
      $edit=Register::find($id);
      $edit->name=$request->name;
      $edit->karbary=$request->karbary;
      $edit->mobail=$request->mobail;
      $edit->email=$request->email;
      $edit->save();
    }
}
