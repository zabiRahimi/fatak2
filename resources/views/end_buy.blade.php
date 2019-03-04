{{-- sabad_kharid.css --}}
<div class="titr_end_buy">
  ثبت نهایی خرید و پرداخت آنلاین
</div>
<div class="titr_end_buy2">
  در حال حاضر خرید این محصول فقط به صورت پرداخت آنلاین امکان پذیر است .
</div>
<div class="bt_end_buy">
  <button type="button" class="btn btn-success bt_end_buy1" onclick="pardakht({{session('end_all_price')}} , '{{ json_encode(session('end_name_pro'))}}')">پرداخت آنلاین</button>
  <button type="button" class="btn btn-warning bt_end_buy2">انصراف از خرید</button>
</div>
