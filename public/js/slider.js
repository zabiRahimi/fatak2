$('.ingle-item').slick(
  {
dots: true,
infinite: true,
speed: 1000,
slidesToShow:7,
slidesToScroll: 6,
autoplay: true,
autoplaySpeed: 13000,
responsive: [
  {
  breakpoint: 1490,
  settings: {
  infinite: true,
  slidesToShow: 6,
  slidesToScroll: 5
  }
},
{
breakpoint: 1275,
settings: {
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 4
}
},
{
breakpoint: 1105,
settings: {
  infinite: true,
  dots: false,
  slidesToShow: 4,
  slidesToScroll: 3
}
},
{
breakpoint: 840,
settings: {
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3,
  dots: false
}
},
{
breakpoint: 769,
settings:
 {
  dots: false,
  slidesToShow: 4,
  slidesToScroll: 3,
}
},
{
breakpoint: 684,
settings: {
  dots: false,
  centerMode: true,
  slidesToShow: 3,
  slidesToScroll: 3,
}
},
{
breakpoint: 605,
settings: {
centerMode: true,
dots: false,
slidesToShow: 3,
slidesToScroll: 1,
arrows:false
}
},
{
breakpoint: 555,
settings: {
centerMode: true,
dots: false,
slidesToShow: 2,
slidesToScroll: 1,
arrows:false
}
},
{
breakpoint: 405,
settings: {
centerMode: true,
dots: false,
slidesToShow: 1,
slidesToScroll: 1,
arrows:false
}
},
{
breakpoint: 375,
settings: {
dots: false,
slidesToShow: 2,
slidesToScroll: 1,
arrows:true
}
},
{
breakpoint: 340,
settings: {
dots: false,
slidesToShow: 1,
slidesToScroll: 1,
arrows:true,
}
}
]
  }
);


  // $(".big_img_pro").slick({
  //   slidesToShow: 1,
  //     slidesToScroll: 1,
  //     arrows: false,
  //     fade: true,
  //     asNavFor: '.short_img_pro'
  //   }
    // );
    $(".short_img_pro").slick({

          vertical: true,
          slidesToShow: 4,
          slidesToScroll: 1,

          responsive: [
            {
            breakpoint: 321,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows:false,
              centerMode:true
            }
          },
        ]

          // focusOnSelect: true
      }
      );
      $(".short_img_pro2").slick({

            infinite:true,
            slidesToShow:4,
            slidesToScroll: 1,
            // arrows:false,
            centerMode: true,
            variableWidth: true,
            autoplay: true,
            autoplaySpeed: 2000,
            // rtl:true


            // focusOnSelect: true

        responsive: [
          {
          breakpoint: 600,
          settings: {

          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      ]

});
      $(".smallImgSlickAll").slick({

            infinite:true,
            slidesToShow:1,
            slidesToScroll: 1,
            // arrows:false,
            centerMode: true,
            variableWidth: true,
            autoplay: true,
            autoplaySpeed: 2000,
            // rtl:true


            // focusOnSelect: true

      //   responsive: [
      //     {
      //     breakpoint: 600,
      //     settings: {
      //
      //     slidesToShow: 1,
      //     slidesToScroll: 1,
      //   }
      // },
      // ]

});
