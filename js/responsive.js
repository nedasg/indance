$(document).ready(function() {
  if ( screen.width < 500 ||
    navigator.userAgent.match(/iPhone/i) ||
    navigator.userAgent.match(/SAMSUNG|SGH-[I|N|T]|GT-[I|P|N]|SM-[N|P|T|Z]|SHV-E|SCH-[I|J|R|S]|SPH-L/i) || 
    navigator.userAgent.match(/Windows Phone/i) ||
    navigator.userAgent.match(/iemobile/i) ||
    navigator.userAgent.match(/Android/i) ||
    navigator.userAgent.match(/webOS/i) ||
    navigator.userAgent.match(/BlackBerry/) ||
    navigator.userAgent.match(/ZuneWP7/i) )
  {
    $("#media-video").appendTo("p.vdplayer");
    $("#media-photo").appendTo("p.phchanger");
//    $("video")[0].prop('muted', false); 
  };
});