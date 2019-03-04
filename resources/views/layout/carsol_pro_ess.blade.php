<div class=" div_in10">
<div class=" div_in11">
  محصولات ({{$count}} عدد)

</div>
<div class="div_in12">
 <div  class=" ingle-item slider">
               @foreach ($pro  as $value)
                 <div style="float:right;">
                 <a href="/product/{{$value->id}}/{{str_replace(" ","-","$value->name")}}" onclick="view_pro('{{$value->id}}')" style="text-decoration: none; color:inherit;">
                 <div class="div_in13_0">
                   <?php
                   $show_pro=$pro_pic->where('pro_id' , $value->id)->first();

                       if(isset($show_pro)){
                         $pic= $show_pro->pic_b1;
                       }else{
                         $pic=0;
                       }


                    ?>

                   <img class="img_in_13" src="/img_pro/{{$pic}}" alt="{{$value->name}}" width="175" height="175" >
                   <img class="img_in_13_2" src="/img_pro/{{$pic}}" alt="{{$value->name}}" width="130" >
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
                     <span class="span_in13_1"><i class="fas fa-comments"></i> {{count($pro_nazar->where('pro_id' , $value->id) ) }}  </span> <span class="span_in13_2"><i class="far fa-eye"></i>{{number_format($value->views)}}</span>
                   </div>
                 </div>
                 </a>
               </div>
              @endforeach
   </div>
 </div>
</div>
