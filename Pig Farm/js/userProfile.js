



function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}


function validatePhone(phoneNumber) {
    var found = phoneNumber.search(/^(\+{1}\d{2,3}\s?[(]{1}\d{1,3}[)]{1}\s?\d+|\+\d{2,3}\s{1}\d+|\d+){1}[\s|-]?\d+([\s|-]?\d+){1,2}$/);
    if(found > -1)  return true;
    else  return false;
}

var loadFile = function(event) {
  var output  = document.getElementById('image_profile');
  var output1  = document.getElementById('image_profile1');

  output.src = URL.createObjectURL(event.target.files[0]);
  output1.src = URL.createObjectURL(event.target.files[0]);

};

var changePSWD=function(event) {
   event.preventDefault();

   $("#passwordArea").slideDown(function() {

     $("#old_password").val("");
     $("#old_password").css({"border-bottom":"1px solid grey"});
     $("#new_password").css({"border-bottom":"1px solid grey"});
     $("#new_password_repeat").css({"border-bottom":"1px solid grey"});



     $("#old_pA").hide();
     $("#new_pA").hide();
     $("#new_pR").hide();




     $("#close").click(function() {

       $("#passwordArea").slideUp();
       $("#detailsArea").slideDown();

       $("#old_password").val("");
       $("#new_password").val("");
       $("#new_password_repeat").val("");

     });

     //check changes on the the input_form
     $("#old_password").change(function () {
       var id  =$("#Eid_entry").text();
       var url ="../../../login/login.php";
       var old_password=$("#old_password").val();

        checkPassword(id,url,old_password,'new_password',"password","Password  ","");
     });

     $("#approve").click(function() {

        if($("#old_pA").is(":visible")){
          var new_password    =$("#new_password").val();
          var repeat_password =$("#new_password_repeat").val();

        if ((new_password == repeat_password)) {

          if (new_password.length>6) {
              $("#new_pA").show();
              $("#new_pR").show();

              var id  =$("#Eid_entry").text();
              var url ="../../../login/login.php";
              var new_password=$("#new_password").val();

               checkPassword(id,url,'empty',new_password,"password","Password    ","");
              }

        }else{
          $("#new_password").css({"border-bottom":"2px solid red","transition": "all 0.5s linear"});
          $("#new_password_repeat").css({"border-bottom":"2px solid red","transition": "all 0.5s linear"});

        }

      }else{
        $("#old_password").css({"border-bottom":"2px solid red","transition": "all 0.5s linear"});
      }

     });



   });

   $("#detailsArea").slideUp();
}

//Save phone data
function savenewPhone(){
  var id  =$("#Eid_entry").text();
  var url ="../../../login/login.php";
  var new_password =$("#new_password").val();
  var new_phone_no =$("#user_phone").val();


if(validatePhone(new_phone_no)){
  checkPassword(id,url,'empty',new_password,"phone","Phone number    ",new_phone_no);

  $("#phone").slideDown(function() {
    $("#phone").text(new_phone_no);
  });
  $("#phoneArea").slideUp();
  $("#clear").slideUp();

  $("#savePhone").attr("onclick","phoneDetails()");
  $("#savePhone").text("change");
}else{
  alert("Please input a valid phone number");
}


}

function savenewEmail() {
  var id  =$("#Eid_entry").text();
  var url ="../../../login/login.php";
  var new_password=$("#new_password").val();
  var new_email =$("#user_Email").val();

  $("#email").text(new_email);

if(validateEmail(new_email)){
  checkPassword(id,url,'empty',new_password,"email","Email address    ",new_email);

  //hide the email area
  $("#email").slideDown();
  $("#emailArea").slideUp();
  $("#clearEmail").slideUp();

  $("#saveEmail").attr("onclick","emailDetails()");
  $("#saveEmail").text("change");

}else {
  alert("Please key in a valid email adress")
}
}

function phoneDetails() {
  $("#phoneArea").slideDown(function () {

  });

  $("#phone").slideUp();
  $("#savePhone").attr("onclick","savenewPhone()");
  $("#savePhone").text("save");
  $("#clear").show();
}

function emailDetails() {
  $("#emailArea").slideDown(function () {

  });

  $("#email").slideUp();
  $("#saveEmail").attr("onclick","savenewEmail()");
  $("#saveEmail").text("save");
  $("#clearEmail").show();
}

function cancelPhoneDetails() {
  $("#phone").slideDown();
  $("#phoneArea").hide();

  $("#savePhone").attr("onclick","phoneDetails()");
  $("#savePhone").text("change");
  $("#clear").hide();
}

function cancelEmailDetails() {
  $("#email").slideDown();
  $("#emailArea").hide();

  $("#saveEmail").attr("onclick","emailDetails()");
  $("#saveEmail").text("change");
  $("#clearEmail").hide();
}

$("#passwordArea").hide();
$("#old_pA").hide();
$("#new_pA").hide();
$("#new_pR").hide();

$("#phoneArea").hide();
$("#clear").hide();


//emailArea
$("#emailArea").hide();
$("#clearEmail").hide();
