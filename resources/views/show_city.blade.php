
<option value="aval" selected>انتخاب شهر</option>
@foreach ($show_city as  $value)
  <option value="{{$value->id}}" onclick="post_pishtaz({{$value->sub_ostan}});post_sefareshi({{$value->sub_ostan}}, '{{$value->city}}');">{{$value->city}}</option>
@endforeach
