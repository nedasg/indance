$(function() {
  if ( $("#media-display").children().length > 0 ) {
    $("#media-photo, #media-video").hide();
  } else {};
});

$(function() {
  $(".moreText").click(function() {
    $(".textToShow").show(function() {
    $('html, body').animate({
      scrollTop: $(".textToShow:first-of-type").offset().top
      }, 400);
    });
  });
});

$(function() {
  $("#pazeng").click(function() {
    $(".prad").fadeOut(100, function() { $(".pazeng").fadeIn(100); });
    if ( $(".pazeng").length == 0 ) { $(".pasiulymo-nera").show(); } else { $(".pasiulymo-nera").hide(); $(".pazeng").fadeIn(100); }
  });
  $("#prad").click(function() { 
    $(".pazeng").fadeOut(100, function() { $(".prad").fadeIn(100); }); 
    if ( $(".prad").length == 0 ) { $(".pasiulymo-nera").show(); } else { $(".pasiulymo-nera").hide(); $(".prad").fadeIn(100); } 
  });
});

$(function() {
  $(".table-level td").click(function() {
      $(this).css("width", "60%");
      $(this).children().css("font-size", "16px");
      $(this).children().css("color", "white");
      $(this).siblings().css("width", "40%");
      $(this).siblings().children().css("font-size", "13px");
      $(this).siblings().children().css("color", "#FAB22A");
  });
});

$(function() {
$(".a-map").mouseenter(function() {
  var adr = $(this);
  setTimeout(function() {
  if ($(".a-map:hover").length > 0) {
    $("#media-photo, #media-video").hide();
if (adr.hasClass('vytauto')) { $("#media-display").hide().load("/inc/display_map.php #vytauto79"); };
if (adr.hasClass('sb-parketas')) { $("#media-display").hide().load("/inc/display_map.php #sermuksniu4a-parketas"); };
if (adr.hasClass('sb-garazas')) { $("#media-display").hide().load("/inc/display_map.php #sermuksniu4a-garazas"); };
if (adr.hasClass('sb-kilimas')) { $("#media-display").hide().load("/inc/display_map.php #sermuksniu4a-kilimas"); };
if (adr.hasClass('mktnm')) { $("#media-display").hide().load("/inc/display_map.php #vilniaus39"); };
if (adr.hasClass('jasinskio')) { $("#media-display").hide().load("/inc/display_map.php #jasinskio11"); };
if (adr.hasClass('tauro')) { $("#media-display").hide().load("/inc/display_map.php #tauro20"); };
if (adr.hasClass('asan')) { $("#media-display").hide().load("/inc/display_map.php #asanaviciutes20"); };
if (adr.hasClass('ukmrg')) { $("#media-display").hide().load("/inc/display_map.php #ukmerges234a"); };
    $("#media-display").fadeIn(200);
      $(".a-map").mouseleave(function() {
        $("#media-display").hide();
        $(".displayMap").remove();
        $("#media-photo, #media-video").show();
      });
  };
  }, 50);
});
});

$(function() {
$(".a-mkt").mouseenter(function() {
  var mkt = $(this);
  setTimeout(function() {
  if ($(".a-mkt:hover").length > 0) {
    $("#media-photo, #media-video").hide();
if (mkt.hasClass('nds')) { $("#media-display").hide().load("/inc/display_mkt.php #nds"); }
if (mkt.hasClass('aur')) { $("#media-display").hide().load("/inc/display_mkt.php #aur"); }
if (mkt.hasClass('jul')) { $("#media-display").hide().load("/inc/display_mkt.php #jul"); }
if (mkt.hasClass('and')) { $("#media-display").hide().load("/inc/display_mkt.php #and"); }
if (mkt.hasClass('zuz')) { $("#media-display").hide().load("/inc/display_mkt.php #zuz"); }
if (mkt.hasClass('vai')) { $("#media-display").hide().load("/inc/display_mkt.php #vai"); }
if (mkt.hasClass('ele')) { $("#media-display").hide().load("/inc/display_mkt.php #ele"); }
if (mkt.hasClass('krs')) { $("#media-display").hide().load("/inc/display_mkt.php #krs"); }
if (mkt.hasClass('mgl')) { $("#media-display").hide().load("/inc/display_mkt.php #mgl"); }
if (mkt.hasClass('ara')) { $("#media-display").hide().load("/inc/display_mkt.php #ara"); }
    $("#media-display").fadeIn(200);
      $(".a-mkt").mouseleave(function() {
        $("#media-display").hide();
        $(".displayMkt").remove();
        $("#media-photo, #media-video").show();
      });
  };
  }, 50);
});
});

$(function() {
$(".a-muz").mouseenter(function() {
var id = $(this).attr('id');
  setTimeout(function() {
  if ($(".a-muz:hover").length > 0) {
    $("#media-photo, #media-video").hide();
if (id == 'showLib') { $("#media-display").hide().load("/inc/display_muz.php #lib1"); };
    $("#media-display").fadeIn(200);
      $(".a-muz").mouseleave(function() {
        $("#media-display").hide();
        $(".displayMuz").remove();
        $("#media-photo, #media-video").show();
      });
  };
  }, 50);
});
});