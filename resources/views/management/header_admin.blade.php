
  <div class="header_ad_titr">
    <div class="header_ad_titr1">
      <span class="HeaderATS">
      <span class="HeaderATS1"> کاربر : </span><span class="HeaderATS2">{{$nameModir}}</span>
      <span class="HeaderATS3"> کد : </span><span class="HeaderATS4">{{$id . 'md'}}</span>
      <a href="/showProfileManeg" class="HeaderATA"><i class="fas fa-user-tie"></i>  پروفایل</a>
      </span>
    </div>
    <div class="header_ad_titr2">
      <h4>مدیریت فاتک</h4>
    </div>
    <div class="header_ad_titr3">
      <span class="hATSpan1" onclick="window.location='/logoutManeg'"><i class="fas fa-sign-out-alt"></i> خروج</span>
    </div>

  </div>
  <ul class="header_ad_ul">
    <a href="/dashbordAdmin" class="a_pjax"><li>خانه</li></a>
    <a href="/pro_admin" class=""><li>محصولات</li></a>
    <a href="/article_admin" class="a_pjax"><li>مقالات</li></a>
    <a href="/channel_admin" class=""><li>شبکه اجتماعی</li></a>
    <a href="#" class="a_pjax"><li>فروشندگان</li></a>
    <a href="#" class="a_pjax"><li>آمار</li></a>
    <a href="#" class="a_pjax"><li>شکایات و انتقادات</li></a>
    @if ($access==1)
      <a href="/modiranAdmin" class="a_pjax"><li>مدیران</li></a>
    @endif
    <a href="#" class="a_pjax"><li>سایت</li></a>
  </ul>
