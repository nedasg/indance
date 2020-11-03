<?php

//Šitie kintamieji pasiima duomenis kuriuos registracijos formoje pateikia klientas:
  $email = $_POST['email'] . ", info@indance.lt";
  $subject = $_POST['subject'];
  $message = $_POST['name'];

//Čia yra nurodomas pašto adresas, tipo "nuo kurio" klientas gauna patvirtinimą apie registraciją:
  $admin_email = "info@indance.lt";
  
//Čia yra suformuluojama komanda siųsti el. laišką:
  mail($email, $subject, "Sveikiname, Jūs sėkmingai užsiregistravote! Artėjant užsiėmimų pradžiai dar su Jumis susisieksime.

Su šokančiais linkėjimais,
INDANCE Šokių Pramogos!", "From:" . $admin_email);

?>

<!--
<?php
function mail_utf8($to, $from_user, $from_email, 
                                             $subject = '(No subject)', $message = '')
   { 
      $from_user = "=?UTF-8?B?".base64_encode($from_user)."?=";
      $subject = "=?UTF-8?B?".base64_encode($subject)."?=";

      $headers = "From: $from_user <$from_email>\r\n". 
               "MIME-Version: 1.0" . "\r\n" . 
               "Content-type: text/html; charset=UTF-8" . "\r\n"; 

     return mail($to, $subject, $message, $headers); 
   }
?>
-->