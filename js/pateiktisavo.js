$(document).ready(function() {
  $("#pateikti-savo").click(function() {
    $(".art-start, .table-level, .reg, .pasiulymo-nera, .fyi, .signature, .back").hide();
    $(".backTemp").show();
    if (screen.width < screen.height) {$("#media-photo").hide();};
    $("#reg-other").show();
  });
  $(".backTemp").click(function() { afterSendOrBack(); });
});

function afterSendOrBack() {
    $("#reg-other").hide();
    $(".art-start, .table-level, .reg, .fyi, .signature, .back").show();
    if (screen.width < screen.height) { $("#media-photo").show(); };
    $(".pazeng").hide();
    $(".prad").show();
    if ( $(".prad").length == 0 ) { $(".pasiulymo-nera").show(); } else { $(".pasiulymo-nera").hide(); };
    $(".table-level td:first-of-type").css("width", "60%");
    $(".table-level td:first-of-type").children().css("font-size", "1em");
    $(".table-level td:first-of-type").children().css("color", "#FAB22A");
    $(".table-level td:first-of-type").siblings().css("width", "40%");
    $(".table-level td:first-of-type").siblings().children().css("font-size", "0.9em");
    $(".table-level td:first-of-type").siblings().children().css("color", "white");
    document.getElementById("reg-other").reset();
};

function pateiktiSavo() {
var ksav = $("input[type='radio'][name='ksav']:checked").val(); var pirmad = $("input[type='radio'][name='pirmad']:checked").val(); var antrad = $("input[type='radio'][name='antrad']:checked").val(); var treciad = $("input[type='radio'][name='treciad']:checked").val(); var ketvirtad = $("input[type='radio'][name='ketvirtad']:checked").val(); var penktad = $("input[type='radio'][name='penktad']:checked").val(); var sestad = $("input[type='radio'][name='sestad']:checked").val(); var sekmad = $("input[type='radio'][name='sekmad']:checked").val(); var email = $('#reg-other-email').val(); var style = $('#reg-other-style').val(); var city = $('#reg-other-city').val();  var sokis = $("input[type='radio'][name='sokis']:checked").val();
  $.ajax({
    url: "https://docs.google.com/forms/d/1xsDEUeEGVelFhr-OuRSG3WLA3dLtVkukqNIV7eri0Sk/formResponse",
    data: {"entry.1538049973": ksav, "entry.1029160589": pirmad, "entry.1753385741": antrad, "entry.724062221": treciad, "entry.1133247477": ketvirtad, "entry.2072022263": penktad, "entry.756032933": sestad, "entry.2054535770": sekmad, "entry.723018374": email, "entry.1303496422": style, "entry.296270499": city, "entry.952161840": sokis},
    type: "POST",
    dataType: "xml",
    statusCode: {
      0: function() { afterSendOrBack(); },
      200: function() {}
    }
  });
};