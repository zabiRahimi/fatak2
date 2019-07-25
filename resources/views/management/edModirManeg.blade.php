@extends('management.modiranAdmin')
@section('title')
  مدیریت :: لیست مدیران
@endsection
@section('contentModir')


<div class="CDBMTitr">
  لیست مدیران
</div>
<div class="CDBMBody">
  <div class="rowListEMM">
    <span class="rowListEMM_1"><i class="fas fa-certificate"></i></span>
    <span class="rowListEMM_2">کد</span>
    <span class="rowListEMM_3">نام</span>
    <span class="rowListEMM_4">سمت</span>
    <span class="rowListEMM_5">فعالیت</span>
    <span class="rowListEMM_6">موبایل</span>
  </div>
  @php
    $r=0;
  @endphp
  @foreach ($modiran as $value)
    @php
    $r++;
    $classBg=(($r%2)==0)?'classBg2':'classBg1';
    $retVal = ($value->show==1) ? "فعال" : 'غیر فعال' ;//هم ریختگی فارسی
    $classColor = ($value->show==1) ? 'classColor1' : 'classColor2';
    switch ($value->access) {
      case '1':$access2='مدیر عامل';  break;
      case '2':$access2='مدیر';  break;
      case '3':$access2='حسابدار';  break;
      case '4':$access2='ناظر';  break;
      case '5':$access2='ویرایشگر';  break;
      case '6':$access2='نویسنده A';  break;
      case '7':$access2='نویسنده B';  break;
      case '8':$access2='نویسنده C';  break;
    }
    @endphp
      <div class="rowListEMM_b {{$classBg}}" onclick="window.location='edModirManegOne/{{$value->id}}'">
        <span class="rowListEMM_1">{{$r}}</span>
        <span class="rowListEMM_2">{{$value->id}}</span>
        <span class="rowListEMM_3">{{$value->name}}</span>
        <span class="rowListEMM_4">{{$access2}}</span>
        <span class="rowListEMM_5 {{$classColor}}">{{$retVal}}</span>
        <span class="rowListEMM_6 ">{{$value->mobail}}</span>
      </div>
  @endforeach
</div>

@endsection
