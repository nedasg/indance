<form id="reg-other" name="form-reg-other" onsubmit="pateiktiSavo()" method="post" target="_self">

<div class="div-klau"><span>Kiek kartų per savaitę norėtumėte šokti?</span></div>

<fieldset class="klau">
  <div><div>Vieną</div><div><input id="ksav-1" type="radio" name="ksav" value="Vieną" /></div></div>
  <div><div>Du</div><div><input id="ksav-2" type="radio" name="ksav" value="Du" /></div></div>
  <div><div>Nesvarbu</div><div><input id="ksav-3" type="radio" name="ksav" value="Nesvarbu" /></div></div>
</fieldset>

<div class="div-klau"><span>Nurodykite Jums tinkamas savaitės dienas ir užsiėmimo pradžios laikus:</span></div>

<fieldset class="sav-d" id="fieldset-top">
  <div>Pirmadieniais:</div>
  <div><div>18 val.</div><div><input id="I-2" type="radio" name="pirmad" value="18" /></div></div>
  <div><div>19 val.</div><div><input id="I-3" type="radio" name="pirmad" value="19" /></div></div>
  <div><div>20 val.</div><div><input id="I-4" type="radio" name="pirmad" value="20" /></div></div>
  <div><div>Iki 18 val.</div><div><input id="I-1" type="radio" name="pirmad" value="17" /></div></div>
</fieldset>

<fieldset class="sav-d">
  <div>Antradieniais:</div>
  <div><input id="II-2" type="radio" name="antrad" value="18" /></div>
  <div><input id="II-3" type="radio" name="antrad" value="19" /></div>
  <div><input id="II-4" type="radio" name="antrad" value="20" /></div>
  <div><input id="II-1" type="radio" name="antrad" value="17" /></div>
</fieldset>

<fieldset class="sav-d">
  <div>Trečiadieniais:</div>
  <div><input id="III-2" type="radio" name="treciad" value="18" /></div>
  <div><input id="III-3" type="radio" name="treciad" value="19" /></div>
  <div><input id="III-4" type="radio" name="treciad" value="20" /></div>
  <div><input id="III-1" type="radio" name="treciad" value="17" /></div>
</fieldset>

<fieldset class="sav-d">
  <div>Ketvirtadieniais:</div>
  <div><input id="IV-2" type="radio" name="ketvirtad" value="18" /></div>
  <div><input id="IV-3" type="radio" name="ketvirtad" value="19" /></div>
  <div><input id="IV-4" type="radio" name="ketvirtad" value="20" /></div>
  <div><input id="IV-1" type="radio" name="ketvirtad" value="17" /></div>
</fieldset>

<fieldset class="sav-d">
  <div>Penktadieniais:</div>
  <div><input id="V-2" type="radio" name="penktad" value="18" /></div>
  <div><input id="V-3" type="radio" name="penktad" value="19" /></div>
  <div><input id="V-4" type="radio" name="penktad" value="20" /></div>
  <div><input id="V-1" type="radio" name="penktad" value="17" /></div>
</fieldset>

<fieldset class="sav-d">
  <div>Šeštadieniais:</div>
  <div><input id="VI-2" type="radio" name="sestad" value="18" /></div>
  <div><input id="VI-3" type="radio" name="sestad" value="19" /></div>
  <div><input id="VI-4" type="radio" name="sestad" value="20" /></div>
  <div><input id="VI-1" type="radio" name="sestad" value="17" /></div>
</fieldset>

<fieldset class="sav-d">
  <div>Sekmadieniais:</div>
  <div><input id="VII-2" type="radio" name="sekmad" value="18" /></div>
  <div><input id="VII-3" type="radio" name="sekmad" value="19" /></div>
  <div><input id="VII-4" type="radio" name="sekmad" value="20" /></div>
  <div><input id="VII-1" type="radio" name="sekmad" value="17" /></div>
</fieldset>

<div class="div-klau">
  <span>Jeigu norite gauti informaciją apie naujus pasiūlymus šokti:</span>
</div>

<input id="reg-other-email" type="email" name="reg-other-email" placeholder="Jūsų el. pašto adresas" />
<input id="reg-other-style" type="hidden" name="reg-other-style" value=<?php echo $regOtherStyle;?>>
<input id="reg-other-city" type="hidden" name="reg-other-city" value=<?php echo $regOtherCity;?>>

<button id="send-other" type="submit">Pateikti duomenis!</button>

<div class="contacts-item backTemp">
  <img class="img-contacts" alt="Back" src="/images/btn/btn-back.png" />
  <span class="contacts-text pc">Grįžti</span>
</div>

</form>

<script src="/js/pateiktisavo.js"></script>