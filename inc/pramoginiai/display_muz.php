<script>
$(function() {
  $(".track").click(function() {
    $("#ifr-muz").show();
  });
});

$(function() {
  $("#ballroomChoice td").click(function() {
    $("#ballroomChoice td").css("border-bottom", "1px solid transparent").css("color", "#FAB22A").css('width', '40%').css('font-size', '18px');
    $(this).css("border-bottom", "1px solid #dfdede").css("color", "#dfdede").css('width', '50%').css('font-size', '20px');
    if ( $(this).is(":first-child") ) { $(".ballroomChoiceDiv2").fadeOut(100, function() { $(".ballroomChoiceDiv1").fadeIn(200); }); }
    if ( $(this).is(":last-child") ) { $(".ballroomChoiceDiv1").fadeOut(100, function() { $(".ballroomChoiceDiv2").fadeIn(200); }); }
  });
});

if (screen.width < screen.height) { $(".back:last").hide(); };
</script>

<div id="lib1" class="displayMuz">

<table id="ballroomChoice">
  <tr>
    <td><div>Klasikiniai</div></td>
    <td><div>Lotynų Amerikos</div></td>
  </tr>
</table>

<div class="ballroomChoiceDiv1">

<div class="songclass">Lėtas valsas</div>
<br>

  <div class="song">
    <span class="artist">Eros Ramazzotti & Cher</span>
    <a href="//www.youtube.com/embed/LGpE1OHAwHs?autoplay=1" target="ifr-muz">
      <span class="track">Più Che Puoi</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Russell Watson's</span>
    <a href="//www.youtube.com/embed/Pq-hDukrGDo?autoplay=1" target="ifr-muz">
      <span class="track">Amore e Musica</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Yirumas</span>
    <a href="//www.youtube.com/embed/3oBeCmK4lpU?autoplay=1" target="ifr-muz">
      <span class="track">River Flows in You</span>
    </a>
  </div>

<br>
<div class="songclass">Tango</div>
<br>

  <div class="song">
    <span class="artist">Gotan Project</span>
    <a href="//www.youtube.com/embed/9W5S-JqQ5SQ?autoplay=1" target="ifr-muz">
      <span class="track">Diferente</span>
    </a>
    <a href="//www.youtube.com/embed/S98-BIpzZuk?autoplay=1" target="ifr-muz">
      <span class="track">Tango Santa Maria</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Astor Piazzolla</span>
    <a href="//www.youtube.com/embed/VHrWO7KWciU?autoplay=1" target="ifr-muz">
      <span class="track">Libertango</span>
    </a>
  </div>

<br>
<div class="songclass">Vienos valsas</div>
<br>

  <div class="song">
    <span class="artist">Flightless Bird</span>
    <a href="//www.youtube.com/embed/xwZNGaMrwcE?autoplay=1" target="ifr-muz">
      <span class="track">American Mouth</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">The Piano Guys</span>
    <a href="//www.youtube.com/embed/7vfv1o9uoeA?autoplay=1" target="ifr-muz">
      <span class="track">Secrets</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Markus Schoffl</span>
    <a href="//www.youtube.com/embed/PhSg9aDGizg?autoplay=1" target="ifr-muz">
      <span class="track">Breathe easy</span>
    </a>
  </div>

<br>
<div class="songclass">Fokstrotas</div>
<br>

  <div class="song">
    <span class="artist">Beth & Johny M</span>
    <a href="//www.youtube.com/embed/DnsNlv7aHo0?autoplay=1" target="ifr-muz">
      <span class="track">Prayer in C</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Connie Francis</span>
    <a href="//www.youtube.com/embed/WDFFgM0jL3c?autoplay=1" target="ifr-muz">
      <span class="track">I Will Wait For You</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Amber Couple</span>
    <a href="//www.youtube.com/embed/wtysw7e6ov8?autoplay=1" target="ifr-muz">
      <span class="track">Fallen Leaves</span>
    </a>
  </div>

<br>
<div class="songclass">Kvikstepas</div>
<br>

  <div class="song">
    <span class="artist">The Baseballs</span>
    <a href="//www.youtube.com/embed/e1UWEMmJkzE?autoplay=1" target="ifr-muz">
      <span class="track">Crazy In Love</span>
    </a>
    <a href="//www.youtube.com/embed/URxzu8EFBVY?autoplay=1" target="ifr-muz">
      <span class="track">Umbrella</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">In-Grid</span>
    <a href="//www.youtube.com/embed/QoUAU_CxECg?autoplay=1" target="ifr-muz">
      <span class="track">Vive Le Swing</span>
    </a>
  </div>

</div>

<div class="ballroomChoiceDiv2" style="display: none;">

<div class="songclass">Samba</div>
<br>

  <div class="song">
    <span class="artist">Club del Belulgas</span>
    <a href="//www.youtube.com/embed/trnoxBOo-hI?autoplay=1" target="ifr-muz">
      <span class="track">Straight to Memphis</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Champs</span>
    <a href="//www.youtube.com/embed/3H6amDbAwlY?autoplay=1" target="ifr-muz">
      <span class="track">Tequila</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Alessandro Olivato</span>
    <a href="//www.youtube.com/embed/M7yvZ8E4zag?autoplay=1" target="ifr-muz">
      <span class="track">Burunda</span>
    </a>
  </div>

<br>
<div class="songclass">Čia čia čia</div>
<br>

  <div class="song">
    <span class="artist">Makeba</span>
    <a href="//www.youtube.com/embed/oB_7t5Z2LAE?autoplay=1" target="ifr-muz">
      <span class="track">Pata Pata</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Robin Thicke</span>
    <a href="//www.youtube.com/embed/P1kGMrEQ-DE?autoplay=1" target="ifr-muz">
      <span class="track">Blurred Lines</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Lemon</span>
    <a href="//www.youtube.com/embed/_pPANFytPsI?autoplay=1" target="ifr-muz">
      <span class="track">Latin Lover</span>
    </a>
  </div>

<br>
<div class="songclass">Rumba</div>
<br>

  <div class="song">
    <span class="artist">Celine Dion</span>
    <a href="//www.youtube.com/embed/M2kmFpsetRc?autoplay=1" target="ifr-muz">
      <span class="track">Falling Into You</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Sting</span>
    <a href="//www.youtube.com/embed/KLVq0IAzh1A?autoplay=1" target="ifr-muz">
      <span class="track">Fields Of Gold</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Bill&nbsp;Withers</span>
    <a href="//www.youtube.com/embed/h0FFJucC_qw?autoplay=1" target="ifr-muz">
      <span class="track">Ain't No Sunshine</span>
    </a>
  </div>

<br>
<div class="songclass">Džaivas</div>
<br>

  <div class="song">
    <span class="artist">Blackwell Presley</span>
    <a href="//www.youtube.com/embed/NNu2Z-7UuDs?autoplay=1" target="ifr-muz">
      <span class="track">All Shook Up</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Afric Simone</span>
    <a href="//www.youtube.com/embed/N5fqPHm9ik0?autoplay=1" target="ifr-muz">
      <span class="track">Hafanana</span>
    </a>
  </div>

  <div class="song">
    <span class="artist">Amanda Jenssen</span>
    <a href="//www.youtube.com/embed/lXA02lllOp8?autoplay=1" target="ifr-muz">
      <span class="track">Dry my Soul</span>
    </a>
  </div>

</div>

</div>