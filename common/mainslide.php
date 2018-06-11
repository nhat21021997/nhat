<section class="mainslide">
  <div id="sync1" class="owl-carousel owl-theme">
    <div class="item">
      <img src="resources/img/upload/slide-1.jpg" alt="">
    </div>
    <div class="item">
      <img src="resources/img/upload/slide-2.jpg" alt="">
    </div>
    <div class="item">
      <img src="resources/img/upload/slide-3.jpg" alt="">
    </div>
    <div class="item">
      <img src="resources/img/upload/slide-4.png" alt="">
    </div>
    <div class="item">
      <img src="resources/img/upload/slide-5.jpg" alt="">
    </div>
  </div>
  <div id="sync2" class="owl-carousel owl-theme sub-menu-slide">
    <div class="item">
     <div class="sub-item"> Khuyến mại bộ phát wifi</div>
    </div>
    <div class="item">
      <div class="sub-item">Giảm giá Đồng hồ định vị </div>
    </div>
    <div class="item">
      <div class="sub-item">Thời gian bán hàng shop An Tiến</div>
    </div>
    <div class="item">
       <div class="sub-item">Sạc kích nổ oto</div>
    </div>
    <div class="item">
      <div class="sub-item">Sạc Ravpower 27000 mah</div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {

  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
  var slidesPerPage = 4; //globaly define number of elements per page
  var syncedSecondary = true;

  sync1.owlCarousel({
    items : 1,
    slideSpeed : 2000,
    nav: false,
    autoplay: true,
    dots: false,
    loop: true,
    responsiveRefreshRate : 200,
    // navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
  }).on('changed.owl.carousel', syncPosition);

  sync2
    .on('initialized.owl.carousel', function () {
      sync2.find(".owl-item").eq(0).addClass("current");
    })
    .owlCarousel({
    items : 5,
    dots: false,
    nav: false,
    smartSpeed: 200,
    slideSpeed : 500,
    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
    responsiveRefreshRate : 100
  }).on('changed.owl.carousel', syncPosition2);

  function syncPosition(el) {
    //if you set loop to false, you have to restore this next line
    //var current = el.item.index;
    
    //if you disable loop you have to comment this block
    var count = el.item.count-1;
    var current = Math.round(el.item.index - (el.item.count/2) - .5);
    
    if(current < 0) {
      current = count;
    }
    if(current > count) {
      current = 0;
    }
    
    //end block

    sync2
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = sync2.find('.owl-item.active').length - 1;
    var start = sync2.find('.owl-item.active').first().index();
    var end = sync2.find('.owl-item.active').last().index();
    
    if (current > end) {
      sync2.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      sync2.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }
  
  function syncPosition2(el) {
    if(syncedSecondary) {
      var number = el.item.index;
      sync1.data('owl.carousel').to(number, 100, true);
    }
  }
  
  sync2.on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).index();
    sync1.data('owl.carousel').to(number, 300, true);
  });
});
</script>