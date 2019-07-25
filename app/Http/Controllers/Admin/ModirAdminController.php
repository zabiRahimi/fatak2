<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\Encrypter;
use App\Models\Admin\Management;

use App\Http\Requests\Save_login_manage;
use App\Http\Requests\Save_modirSabt_admin;
use App\Http\Requests\Save_modirEdit_admin;
use App\Http\Requests\Save_modirEditPas_admin;
use Cookie;
use DB;
use Illuminate\Support\Facades\Hash;
use Hekmatinasser\Verta\Verta;//تاریخ جلالی

class ModirAdminController extends Controller
{
  public $id ,$nameModir,$access ;
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

  public function modiranAdmin(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    return view('management.modiranAdmin',compact('id','nameModir','access'));
  }
  public function adModirManeg(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    return view('management.adModirManeg',compact('id','nameModir','access'));
  }
  public function modirAdminSabt(Save_modirSabt_admin $request)
  {
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=new Management();
    $add->name=$request->name;
    $add->karbary=$request->karbary;
    $add->mobail=$request->mobail;
    $add->pas=Hash::make($request->pas);
    $add->access=$request->access;
    $add->created_at=$date;
    $add->updated_at=$date;
    $add->show=$request->show;
    $add->save();
  }
  public function edModirManeg(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $modiran=Management::get();
    return view('management.edModirManeg',compact('id','nameModir','access','modiran'));
  }
  public function edModirManegOne(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $idModir=$request->idModir;
    $modir=Management::find($idModir);
    return view('management.edModirManegOne',compact('id','nameModir','access','modir'));
  }
  public function editModirManeg(Save_modirEdit_admin $request)
  {
    $id=$request->id;
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=Management::find($id);
    $add->name=$request->name;
    $add->karbary=$request->karbary;
    $add->mobail=$request->mobail;
    $add->access=$request->access;
    $add->updated_at=$date;
    $add->show=$request->show;
    $add->save();
  }
  public function editPasModirManeg(Save_modirEditPas_admin $request)
  {
    $id=$request->id;
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=Management::find($id);
    $add->pas=Hash::make($request->pas);
    $add->save();
  }
  public function showProfileMagen(Request $request)
  {
    $id=$this->id;$nameModir=$this->nameModir;$access=$this->access;
    $modir=Management::find($id);
    return view('management.showProfileMagen',compact('id','nameModir','access','modir'));
  }
  public function editModirManeg2(Save_modirEdit_admin $request)
  {
    $id=$request->id;
    $date1=new Verta();//تاریخ جلالی
    $date=$date1->format('Y/n/j');
    $add=Management::find($id);
    $add->name=$request->name;
    $add->karbary=$request->karbary;
    $add->mobail=$request->mobail;
    $add->updated_at=$date;
    $add->save();
  }
  public function editPasModirManeg2(Save_modirEditPas_admin $request)
  {
    $oldPas=$request->oldPas;
    $add=Management::find($this->id);
      if (Hash::check($oldPas, $add['pas']))
      {
        $add->pas=Hash::make($request->pas);
        $add->save();
      }else{
        return response()->json(['errors' => ['no_pas' => ['رمز فعلی اشتباه است .']]], 422);
      }
  }
}//end class
