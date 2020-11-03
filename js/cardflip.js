ekranas = $( window ).height();

$(function() {
  var cards = document.querySelectorAll(".card.effect__click");
  for ( var i  = 0, len = cards.length; i < len; i++ ) {
    var card = cards[i];
    clickListener( card );
  }

  function clickListener(card) {
    card.addEventListener( "click", function() {
      var c = this.classList;
      c.contains("flipped") === true ? c.remove("flipped") : c.add("flipped");
    });
  }
});

$(document).ready(function() {
  $(".card").click(function() {
    $(".card").not(this).fadeTo("fast", 0.4);
    $(".card").css("z-index", "auto");
    $(this).fadeTo("fast", 1).css("z-index", "100");
    $("div.card.effect__click").not(this).removeClass("flipped");
    var eTop = $(this).offset().top; //get the offset top of the element
// $("#extra").html("location : <b>" + eTop + "</b> px<br>" + ekranas);
    if (eTop > ekranas/3*2) { $(this).children("div.card__back").css("top", "auto").css("bottom", "0"); };
  });
  $(".cardBackMenuClose").click(function(e) {
    e.stopPropagation();
    $(".card").fadeTo("fast", 1);
    $("div.card.effect__click").not(this).removeClass("flipped");
  });
  $(".card__back").click(function(e) {
    e.stopPropagation();
    $(".card").fadeTo("fast", 1);
    $("div.card.effect__click").not(this).removeClass("flipped");
  });
});