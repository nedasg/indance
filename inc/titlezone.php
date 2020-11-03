<script src="/js/titlezone.js"></script>

<table id="titlezone-tbl">
  <tr><td><div id="title"><?php print $titlezoneTitle ?></div></td></tr>
  <tr><td><div id="subtitle"><?php print $titlezoneSubTitle ?></div></td></tr>
  <tr><td>
    <div id="menu-bottom">
      <div class="contacts-item resp" id="mi-menu">
        <img class="img-contacts" alt="Menu" src="/images/btn/btn-menu.png" />
          <span class="contacts-text pc">Menu</span>
      </div>
      <div class="contacts-item" id="mi-phone">
        <a href="tel:+370<?php print $cvPhone ?>">
          <img class="img-contacts" alt="Phone" src="/images/btn/btn-phone.png" />
          <span class="contacts-text pc">8 <?php print $cvPhone ?></span>
        </a>
      </div>
      <div class="contacts-item" id="mi-email">
        <a href="mailto:<?php print $cvEmail ?>">
          <img class="img-contacts" alt="Mail" src="/images/btn/btn-email.png" />
          <span class="contacts-text pc"><?php print $cvEmail ?></span>
        </a>
      </div>
      <div class="contacts-item" id="mi-fb">
        <a href="<?php print $cvFb ?>" target="_blank">
          <img class="img-contacts" alt="Fb" src="/images/btn/btn-fb.png" />
          <span class="contacts-text pc">Facebook</span>
        </a>
      </div>
      <div class="contacts-item" id="mi-muzika">
        <a href="<?php print $cvMusic ?>">
          <img class="img-contacts" alt="Muzika" src="/images/btn/btn-muzika.png" />
          <span class="contacts-text pc" id="mi-muzika-text">Muzika</span>
        </a>
      </div>
      <div class="contacts-item" id="mi-video">
        <a class="a-youtube" href="<?php print $cvVideo ?>">
          <img class="img-contacts" alt="Video" src="/images/btn/btn-youtube-new.png" />
          <span class="contacts-text pc" id="mi-video-text">Video</span>
        </a>
      </div>
      <div class="contacts-item" id="mi-euro">
        <a class="a-rkvz">
          <img class="img-contacts" alt="Euro" src="/images/btn/btn-euro.png" />
          <span class="contacts-text pc" id="mi-euro-text">Rekvizitai</span>
        </a>
      </div>
    </div>
  </td></tr>
</table>