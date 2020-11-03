<script>
    $(document).ready(function() {
      $(".tmt-submenu tr td").each(function() {
        if ( $(this).find("div").html().length < 1) {
          $(this).parent().remove();
        } else {};
      });

      $("#top-menu-table tr:first td").on("mouseenter click", function() {
        tdIndex = $(this).index();
        $(".tmt-submenu").hide();
        $(".tmt-submenu:eq(" + tdIndex + ")").show();
        $(".tmt-submenu").on("mouseleave", function() { $(".tmt-submenu").hide(); });
        $("body").on("mouseleave", function() { $(".tmt-submenu").hide(); });
      });

      $("#logo-div").on("mouseenter", function() {
        $(".tmt-submenu").hide();
      });
    });
</script>

<table id="top-menu-table" class="pc">
    <tr>
        <td><div class="tmt-div">PRAMOGINIAI<br><span>šokiai</span></div></td>
        <td><div class="tmt-div"><span>Kubietiška<br></span>SALSA</div></td>
        <td><div class="tmt-div">BAČIATA<br><span>Bachata</span></span></div></td>
        <td><div class="tmt-div">SOLO<br><span>latino</span></div></td>
        <td><a href="/vestuves" rel="external"><div class="tmt-div">VESTUVINIS<br><span>šokis</span></div></a></td>
        <td>
            <a href="tel:+37068537785"><img class="tmt-btn" src="/images/btn/btn-new-phone.png" /></a>
            <a rel="external" href="http://www.youtube.com/user/indancers" target="_blanc"><img class="tmt-btn" src="/images/btn/btn-new-ytb.png" /></a>
            <a rel="external" href="https://lt-lt.facebook.com/pages/INDANCE-Entertainment/37125973970" target="_blanc"><img class="tmt-btn" src="/images/btn/btn-new-fb.png" /></a>
            <a href="mailto:info@indance.lt"><img class="tmt-btn" src="/images/btn/btn-new-email.png" /></a>
        </td>
    </tr>
</table>

<table id="tmt-pram" class="tmt-submenu">
      <tr><td><div><a href="/pramoginiai-sokiai/vilnius" rel="external">Naujos grupės CENTRE</a></div></td></tr>
      <tr><td><div><a href="/pramoginiai-sokiai/muzika" rel="external">Muzikos biblioteka</a></div></td></tr>
      <tr><td><div><a href="/aurimas" rel="external">Aurimas Anužis</a></div></td></tr>
      <tr><td><div><a href="https://www.facebook.com/INDANCE-Entertainment-37125973970/" rel="external" target="_blank">Facebook</a></div></td></tr>
      <tr><td><div><a href="https://www.youtube.com/user/indancers" rel="external" target="_blank">Youtube</a></div></td></tr>
      <tr><td><div><a href="/pramoginiai-sokiai" rel="external">Kodėl INDANCE?</a></div></td></tr>
</table>

<table id="tmt-salsa" class="tmt-submenu">
      <tr><td><div><a href="/salsa/vilnius" rel="external">Naujos grupės CENTRE</a></div></td></tr>
      <tr><td><div><a href="/salsa/vilnius/jeruzale" rel="external">Naujos grupės JERUZALĖJE</a></div></td></tr>
      <tr><td><div><a href="/salsa/muzika" rel="external">Muzikos biblioteka</a></div></td></tr>
      <tr><td><div><a href="/salsa/video" rel="external">Video biblioteka</a></div></td></tr>
      <tr><td><div><a href="/salsa" rel="external">Apie salsą INDANCE</a></div></td></tr>
      <tr><td><div><a href="/nedas" rel="external">Nedas Grigaliūnas</a></div></td></tr>
      <tr><td><div><a href="https://www.facebook.com/INDANCE-Entertainment-37125973970/" rel="external" target="_blank">Facebook</a></div></td></tr>
      <tr><td><div><a href="https://www.youtube.com/user/indancers" rel="external" target="_blank">Youtube</a></div></td></tr>
</table>

<table id="tmt-bch" class="tmt-submenu">
      <tr><td><div><a href="/bachata/vilnius" rel="external">Nauji pasiūlymai čia</a></div></td></tr>
</table>

<table id="tmt-solo" class="tmt-submenu">
      <tr><td><div><a href="/sololatino/vilnius" rel="external">Naujos grupės Vilniuje</a></div></td></tr>
      <tr><td><div><a href="/sololatino" rel="external">Kodėl INDANCE?</a></div></td></tr>
      <tr><td><div><a href="/aira" rel="external">Aira Anužė</a></div></td></tr>
</table>

<table id="tmt-vest" class="tmt-submenu">
<!--      <tr><td><div></div></td></tr>-->
</table>

