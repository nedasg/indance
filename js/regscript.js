$(function() {
  $("div.reg-btn").click(function() {
    $(this).closest("table").find("div.toHide").hide();
    $(this).closest("table").find("div.toShow").show();
    if (screen.width < 800) { $(this).closest("table").find("div.reg-div").css('width', '53%').css('text-align', 'center'); }
      else {
        $(this).closest("table").find("div.reg-div").css('width', '48%').css('text-align', 'right');
        if ( $(this).closest("table").find("input.partner").attr('type') == 'hidden' ) {
          $(this).closest("table").find("div.reg-div:last").css('margin-right', '45%');
        };
      };
    $(this).closest("table").find("form").show();
  });
});

$("button.reg-btn").click(function() {
  $("table.reg").removeClass("active");
  $("table.reg").find("form").attr("id", "").attr("name", "");
  $(this).closest("table").addClass("active");
  $(this).closest("form").attr("id", "activeForm").attr("name", "activeForm");
});

$(function() {
  $(".cancel").click(function() {
    $(this).closest("form").fadeOut(200, function() {
      $(this).closest("form").children("input[type!='hidden']").val("");
      $(this).closest("table").find("div.toShow").hide();
      $(this).closest("table").find("div.toHide").show();
      $(this).closest("table").find("td div:nth-of-type(odd)").css('width', '53%').css('text-align', 'center');
      $(this).closest("table").find("td div:nth-of-type(even)").css('width', '47%').css('text-align', 'left');
        if ( $(this).closest("table").find("input.partner").attr('type') == 'hidden' ) {
          $(this).closest("table").find("div.reg-div:last").css('margin-right', '0');
        };
    });
  });
});

function postToPHP() {
  var name = $('#activeForm :input.name').val();
  var email = $('#activeForm :input.email').val();
  var subject = $('#activeForm :input.subject').val();
  $.ajax({
    url: "/inc/confirm.php",
    data: {"email": email, "subject": subject, "name": name},
    type: "POST",
  });
}

function postToGoogle() {
  var name = $('#activeForm :input.name').val();
  var partner = $('#activeForm :input.partner').val();
  var email = $('#activeForm :input.email').val();
  var phone = $('#activeForm :input.phone').val();

// Čia prasideda telefono numerio apdorojimo skriptukas:
    var inputData = phone;
    if (inputData.match(/([a-zA-Z]|[^\u0000-\u007F])+/)) {    // [^\u0000-\u007F] - čia kad tikrintų ne tik angliškas raides.
      var phone = inputData;    // Jeigu yra bent viena raidė, tai siunčia visus pateiktus duomenis kaip niekur nieko.
      } else {
        if (inputData.match(/[0-9]+/)) {    // Jeigu yra bent vienas skaičius, tai prasideda numerio apdorojimo procesas.
          var onlyDigits = inputData.match(/[0-9]/g).join("");
          var x = onlyDigits.split("");
          var y = x.reverse().join("");
          var tempNumber = y.substring(0,8);    // Čia yra paimami 8 skaitmenys (arba mažiau) nuo galo.
          var xx = tempNumber.split("");
          var yy = xx.reverse().join("");
          if (yy.length == 8 ) { var finalNumber = "8" + yy; 
            } else { if (yy.substring(0,1) != 0) {var finalNumber = yy;} else {var finalNumber = "'" + yy;};    // Jeigu yra suvesti tik 7 arba mažiau skaitmenys ir pirmas iš jų yra 0, tai prieš siunčiant į Google Spreadsheet'us pradžioje reikia pridėti '. Kitaip GS tą pirmą nulį sunaikina.
          };
          var phone = finalNumber;    // Jeigu yra skaičiai (arba skaičiai su simboliais), tai siunčia apdorotus duomenis.
          } else { var phone = inputData; };    // Jeigu yra tik simboliai, tai siunčia visus pateiktus duomenis kaip niekur nieko.
        };
// Čia tel. apdorojimo skriptukas baigiasi. Jeigu kažkas negerai, tai tiesiog ištrinti ir viskas.

  var confirm = $('#activeForm :input.confirm').val();
  var recommend = $('#activeForm :input.recommend').val();
  $.ajax({
    url: "https://docs.google.com/forms/d/1wPg8WS3uBuM1JnClVtt1egI5D2EjcJsrwW9R5yPyCtE/formResponse",
    data: {"entry.1496603382": confirm, "entry.2075742854": name, "entry.675756860": partner, "entry.1515785749": email, "entry.11907510": phone, "entry.1940209302": recommend},
    type: "POST",
    dataType: "xml",
    statusCode: {
      0: function() {},
      200: function() {}
    }
  });
}

function validate() {
  if(document.activeForm.name.value == "") {
    document.activeForm.name.focus();
    return false; }
  if(document.activeForm.partner.type == "hidden") {
    return true; }
    else {
      if(document.activeForm.partner.value == "") {
      document.activeForm.partner.focus();
      return false; }
    }
//  if(document.activeForm.partner.value == "") {
//    document.activeForm.partner.focus();
//    return false; }
  if(document.activeForm.email.value == "") {
    document.activeForm.email.focus();
    return false; }
  if(document.activeForm.phone.value == "") {
    document.activeForm.phone.focus();
    return false; }
  else { return(true); }
}

$(document).ready(function() {
  $("form").submit(function(stop) {
    stop.preventDefault();
    if (validate() === true) {
      postToGoogle();
      postToPHP();
      $("#activeForm").fadeOut(200, function() {
        $("#activeForm").children("input[type!='hidden']").val("");
        $("table.active").find("div.toShow").hide();
        $("table.active").find("div.toHide").show();
        $("table.active td div:nth-of-type(odd)").css('width', '53%').css('text-align', 'center');
        $("table.active td div:nth-of-type(even)").css('width', '47%').css('text-align', 'left');
        if ( $("table.active").find("input.partner").attr('type') == 'hidden' ) {
          $("table.active").find("div.reg-div:last").css('margin-right', '0');
        };
      });
    };
  });
});