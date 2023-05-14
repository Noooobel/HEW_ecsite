// 動きのきっかけとなるアニメーションの名前を定義
function fadeAnime(){

    // ふわっ
    $('.text01').each(function(){ //fadeUpTriggerというクラス名が
      var elemPos = $(this).offset().top-30;//要素より、50px上の
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll >= elemPos - windowHeight){
      $(this).addClass('fadeUp');// 画面内に入ったらfadeUpというクラス名を追記
      }else{
      $(this).removeClass('fadeUp');// 画面外に出たらfadeUpというクラス名を外す
      }
      });
  }
  
  // 画面をスクロールをしたら動かしたい場合の記述
    $(window).scroll(function (){
      fadeAnime();/* アニメーション用の関数を呼ぶ*/
    });// ここまで画面をスクロールをしたら動かしたい場合の記述
  
  // 画面が読み込まれたらすぐに動かしたい場合の記述
    $(window).on('load', function(){
      fadeAnime();/* アニメーション用の関数を呼ぶ*/
    });// ここまで画面が読み込まれたらすぐに動かしたい場合の記述




function fadeAnime(){
  $('.hover002,.hover005,.hover007,.hover011,.hover018,.hover001,.hover021,.hover023,.hover037,.hover012,.hover123,.hover124,.hover015,.hover016,.hover125,.hover006,.hover025,.hover026,.hover028,.hover032,.hover036,.hover029,.hover034,.hover038,.hover039,.hover040,.hover014,.hover033,.hover127,.hover027,.hover086,.hover087,.hover090,.hover088,.hover092,.hover094,.hover098,.hover102,.hover106,.hover100,.hover101,.hover110,.hover104,.hover109,.hover107,.hover079,.hover075,.hover081,.hover063,.hover069,.hover067,.hover056,.hover074,.hover078,.hover060,.hover061,.hover080,.hover062,.hover066,.hover070,.hover003,.hover010,.hover022,.hover020,.hover024,.hover051,.hover050,.hover054,.hover055,.hover065,.hover068,.hover073,.hover045,.hover071,.hover076').each(function(){ 
    var elemPos = $(this).offset().top-30;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight){
    $(this).addClass('fadeUp');
    }else{
    $(this).removeClass('fadeUp');
    }
    });
}
  $(window).scroll(function (){
    fadeAnime();
  });
  $(window).on('load', function(){
    fadeAnime();
  });





    $('.slider').slick({
      autoplay: true,//自動的に動き出すか。初期値はfalse。
      infinite: true,//スライドをループさせるかどうか。初期値はtrue。
      slidesToShow: 4,//スライドを画面に3枚見せる
      slidesToScroll: 4,//1回のスクロールで3枚の写真を移動して見せる
      prevArrow: '<div class="slick-prev"></div>',//矢印部分PreviewのHTMLを変更
      nextArrow: '<div class="slick-next"></div>',//矢印部分NextのHTMLを変更
      dots: true,//下部ドットナビゲーションの表示
      responsive: [
        {
        breakpoint: 769,//モニターの横幅が769px以下の見せ方
        settings: {
          slidesToShow: 2,//スライドを画面に2枚見せる
          slidesToScroll: 2,//1回のスクロールで2枚の写真を移動して見せる
        }
      },
      {
        breakpoint: 426,//モニターの横幅が426px以下の見せ方
        settings: {
          slidesToShow: 1,//スライドを画面に1枚見せる
          slidesToScroll: 1,//1回のスクロールで1枚の写真を移動して見せる
        }
      }
    ]
    });
    
    
    script(function () {

      //ページ内スクロール
      var $nav = $(".global-nav");
      var navHeight = $nav.outerHeight();
    
      $('a[href^="#"]').on("click", function () {
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? "html" : href);
        var position = target.offset().top - navHeight;
        $("html, body").animate(
          {
            scrollTop: position,
          },
          600,
          "swing"
        );
        return false;
      });
    
      //ページトップ
      $("#js-page-top").on("click", function () {
        $("body,html").animate(
          {
            scrollTop: 0,//設定位置　0なのでブラウザの一番上に設定
          },
          600//移動速度　数字が大きいほど遅くなる
        );
        return false;
      });
    });