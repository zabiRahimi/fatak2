{{-- دقت شود css مربوط به search_body و search_titr در فایل main.css می باشد --}}
<div class="search_body">
  <div class="search_titr">
    نتایج جستجو
  </div>
{{-- css در فایل show_pro.css  --}}
  <div class=" div_in10">
 <div class=" div_in11">
  نتایج در محصولات ({{$count_record_pro}} عدد)
 </div>
 @if(count($record_pro) > 0)
 <div class="div_in12">
   <div  class=" ingle-item slider">
                 @foreach ($record_pro  as $value)
                   <div style="float:right;">
                   <div class="div_in13_0">
                     
                     <img class="img_in_13" src="/img_pro/{{$value->pic}}" alt="{{$value->name}}" width="175" >
                     <img class="img_in_13_2" src="/img_pro/{{$value->pic}}" alt="{{$value->name}}" width="130" >
                     <div class="div_in13_1">
                     {{$value->name}}
                     </div>
                     <div class="div_in13_2">

                       <span class="prise_new number">{{number_format($value->price)}}</span> تومان
                     </div>
                     <div class="div_in13_3">
                       @if ($value->old_price==0)
                       @else
                         <span class="prise_old">{{number_format($value->old_price)}}</span> تومان
                       @endif

                     </div>
                     <div class="div_in13_4">
                       <span class="span_in13_1"><i class="fas fa-comments"></i>12897</span> <span class="span_in13_2"><i class="far fa-eye"></i>20254</span>
                     </div>



                   </div>
                 </div>
                @endforeach
     </div>
   </div>
 @else

     <div class="empty_record">
       محصولی یافت نشد .
     </div>

 @endif
</div>
{{-- css در فایل show_pro.css  --}}
  <div class=" div_in10">
 <div class=" div_in11">
  نتایج در خواندنی ها ({{$count_record_ess}} عدد)
 </div>
 @if($count_record_ess > 0)
 <div class="div_in12">
   <div  class=" ingle-item slider">
                 @foreach ($record_ess  as $value)
                   <div style="float:right;">
                   <div class="div_in13_0">
                     {{-- <h1>{{$value->name}}</h1> --}}
                     <img class="img_in_13" src="/img_pro/{{$value->pic}}" alt="{{$value->name}}" width="175" >
                     <img class="img_in_13_2" src="/img_pro/{{$value->pic}}" alt="{{$value->name}}" width="130" >
                     <div class="div_in13_1">
                     {{$value->name}}
                     </div>
                     <div class="div_in13_2">

                       <span class="prise_new number">{{number_format($value->price)}}</span> تومان
                     </div>
                     <div class="div_in13_3">
                       @if ($value->old_price==0)
                       @else
                         <span class="prise_old">{{number_format($value->old_price)}}</span> تومان
                       @endif

                     </div>
                     <div class="div_in13_4">
                       <span class="span_in13_1"><i class="fas fa-comments"></i>12897</span> <span class="span_in13_2"><i class="far fa-eye"></i>20254</span>
                     </div>



                   </div>
                 </div>
                @endforeach
     </div>
   </div>
 @else

     <div class="empty_record">
       مقاله ای یافت نشد .
     </div>

 @endif
</div>



</div>
