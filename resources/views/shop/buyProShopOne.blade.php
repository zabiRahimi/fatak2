@extends('shop.layoutDashShop')
@section('title')
  مشخصات محصول و خریدار
@endsection
@section('dash_content')

    <div class="dashTitrSh">
    مشخصات محصول و خریدار
      <a href="/buyProShop"><button type="button" class="btn oldOrderOneBut" onclick="">  بازگشت  </button></a>
    </div>
    <div class="dashLBodySh">
      <div class="buyOneDivTitr">
        مشخصات محصول
      </div>

      <div class="orderLine"></div>
      <div class="buyOne2DivTitr">
        مشخصات خریدار
      </div>

    </div>

   <!-- Modal موفق بودن ثبت محصول-->
   <div class="modal fade" id="end_orderEditSh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body modal_ok">
           <div class="modal_ok1"><i class="far fa-check-circle"></i></div>
           <div class="modal_ok2">تغییرات با موفقیت ثبت شد .</div>
         </div>
         <div class=" modal_ok3">
           <button type="button" class="btn btn-primary "data-dismiss="modal" aria-label="Close" >متوجه شدم !!</button>
         </div>
       </div>
     </div>
   </div><!--end modal پایان موفقیت ثبت .-->
   {{--  --}}

@endsection
