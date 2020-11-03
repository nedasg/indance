$(function() {
  $("#title, #subtitle").mouseenter(function() { $("#city2").fadeTo(200, 1); });
  $("#title, #subtitle").mouseleave(function() { $("#city2").fadeTo(200, 0); });
});

$(function() {
  var $subMenu = $("<div id='subMenu' style='display: none;'></div>");
  $subMenu.load("/inc/styles.php");
  $("#div-main").prepend($subMenu);
//  $("#mi-menu").one('click', function() { $("#tbl-styles tr:first").remove(); });
  $("#mi-menu").click(function() { if ($("#subMenu").is(":hidden")) {$("#subMenu").show();} else {$("#subMenu").hide();}; });
});

$(function() {
  $(".a-rkvz").click(function() {
    if ( $("#art-rkvz").is(":hidden") ) {
      $("#art-mkt, .back").hide(); $("#art-rkvz, .backTemp").show();
      setTimeout(function() { $("#art-rkvz, .backTemp").hide(); $("#art-mkt, .back").show(); }, 20000);
      } else { $("#art-rkvz").hide(); $("#art-mkt").show(); };
  });
  $(".backTemp").click(function() { $("#art-rkvz, .backTemp").hide(); $("#art-mkt, .back").show(); });
});

$(function() {
  if (screen.width < screen.height) {
    if ($("#titlezone-tbl tr:nth-child(2) td br").length > 0) {
      $("#titlezone-tbl tr:nth-child(1)").css("height", "30px");
      $("#titlezone-tbl tr:nth-child(2)").css("height", "35px");
      $("#titlezone-tbl tr:nth-child(2)").css("line-height", "17px");
      $("#titlezone-tbl tr:nth-child(2) td div").css("font-size", "0.95em");
      $("#menu-bottom").css("margin-bottom", "-10px");
    };
 } else {
      if ($("#titlezone-tbl tr:nth-child(2) td br").length > 0) {
        $("#titlezone-tbl tr:nth-child(2)").css("line-height", "27px");
        $("#titlezone-tbl tr:nth-child(2) td div").css("font-size", "1.5em");
      };
    };
});