@extends('management.modiranAdmin')
@section('title')
  مدیریت :: لیست مدیران
@endsection
@section('contentModir')


<div class="CDBMTitr">
  لیست مدیران
</div>
@foreach ($modiran as $value)
  {{$value->name}}
@endforeach
@endsection
