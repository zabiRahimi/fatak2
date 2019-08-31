function pro_searchNPUF() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../pro_searchNPUF',
    data: {
          pro:$('#pro_searchNPUF').val(),
         },
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function allPro_searchNPUF() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../allPro_searchNPUF',
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    }
    });
}
function date_searchNPUF(day) {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../date_searchNPUF',
    data: {
          day:day,
         },
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function fromDAte_searchNPUF() {
  var day1=$('#searchNPUFDay1').val();
  //var check =/^[0-9]{1}$/;if(check.test(day1)){day1 = 0 + day1;}
  var month1=$('#searchNPUFMonth1').val();//var check =/^[0-9]{1}$/;if(check.test(month1)){month1 = 0 + month1;}
  var year1=$('#searchNPUFYear1').val();var check =/^[0-9]{2}$/;if(check.test(year1)){year1 = 13 + year1;}
  var day2=$('#searchNPUFDay2').val();//var check =/^[0-9]{1}$/;if(check.test(day2)){day2 = 0 + day2;}
  var month2=$('#searchNPUFMont2').val();//var check =/^[0-9]{1}$/;if(check.test(month2)){month2 = 0 + month2;}
  var year2=$('#searchNPUFYear2').val();var check =/^[0-9]{2}$/;if(check.test(year2)){year2 = 13 + year2;}

  var date1=year1+'/'+month1+'/'+day1;
  // var date1='1360/12/03';
  var date2=year2+'/'+month2+'/'+day2;
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../fromDAte_searchNPUF',
    data: {
      date1:date1,
      date2:date2,
         },
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function ostan_searchNPUF() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../ostan_searchNPUF',
    data: {
      osatn:$('#searchNPUFOstan').val(),
      city:$('#searchNPUFCity').val(),
         },
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function AllOstan_searchNPUF() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../AllOstan_searchNPUF',
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function AllCiyt_searchNPUF() {
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
  $.ajax({
    type:'post',
    url:'../../AllCiyt_searchNPUF',
    success:function(){
      window.location.href  = "/orderNewPUnStockF";
    },
    error : function(xhr){
    },
    });
}
function id_searchNPUF() {
  var order_id=$('#id_searchNPUF').val();
  window.location='/orderNewPUnStockF/' +order_id ;
}
