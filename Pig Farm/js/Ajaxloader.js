//Global variables
var paneID =0;     //increments keeping track of the number of the report
var panes  =[];   //Used to keep track if the number of reports generated





///Secion atendant files manupilation
//lOADS THE FORM FOR ADDING PIGS
$(document).ready(function(){
  $("#add_pig").click(function(){
    $("#production").load("loadfiles/addpig.php",function() {

      //ADD all the nations
        $("#all_nations").load("loadfiles/nationslist.php")

      //HANDLE CHANGES IN THE ID
        $("#pig_id").change(function() {
        $("#pig_id").css({"border-bottom":"2px solid green","transition": "all 0.6s linear"});
        $("#id_r").hide();
      });
      //hANDLE CHANGES IN THE BREED
        $("#breed").change(function() {
        $("#breed").css({"border-bottom":"2px solid green","transition": "all 0.6s linear"});
        $("#breed_r").hide();
      });

       //hANDLE CHANGES FOR THE weight
        $("#weight").change(function() {
        $("#weight").css({"border-bottom":"2px solid green","transition": "all 0.6s linear"});
        $("#weight_r").hide();
      });

      //hANDLE CHANGES FOR THE gender
        $("#gender").change(function() {
        $("#gender").css({"border-bottom":"2px solid green","transition": "all 0.6s linear"});
        $("#gender_r").hide();
      });

      //hANDLE CHANGES FOR THE  day
        $("#day").change(function() {
        $("#day").css({"border-bottom":"2px solid green","transition": "all 0.6s linear"});
        $("#day_r").hide();
      });
    });

    $("#add_pig").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

    //reset the rest
    $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#update_records").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

    $("#reports").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

  });
});



  $("#update_records").click(function(){  loadFiles("all");

  $("#update_records").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

  // reset the rest
  $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
  $("#add_pig").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
  $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
  $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
  $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

  $("#reports").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

});


    function loadFiles(Type) {
      $("#production").load("loadfiles/table.php?type="+Type,function() {
         type=Type;
         handleSortPane();
         $("#to_hide").hide();
        // vieSorted("production","loadfiles/table.php?type=all","all",true);
      });

    }




 var handlePane=true;
function vieSorted(area,url,Type,hide, handlePane) {
  $("#"+area).load(url, function() {

    type=Type;
    if (hide){  $("#to_hide").hide(); }
  });
}


function handleSortPane(){
  $("#sort_btn").click(function() {
    $("#sort_pane").show();
    $("#sort_btn").hide();
  });



$("#close_sort_pane").click(function() {
$("#sort_pane").hide();
$("#sort_btn").show();
});

$("#sort_pane").hide();
}

//global variable to choose between pigs viable for sale and all pigs
var type="all";


function sortBy(baseUrl) {
  var from=$("#sort_from").val();
  var to=$("#sort_to").val();
  var min_weight=$("#sort_min").val();
  var max_weight=$("#sort_max").val();
  var breed=$("#sort_breed").val();
  var male  =$("#sort_male").is(":checked");
  var female=$("#sort_female").is(":checked");

  var sex= (male && female)?"all":
           (male)?"M":(female)?"F":"all";

  var queries="type="+type+"&from="+from+"&to="+to+"&min_weight="+min_weight+"&max_weight="+max_weight+"&breed="+breed.replace(/ /g,'_')+"&sex="+sex;

           // alert("f: "+from+"\nt: "+to+"\nmin: "+min_weight+"\nmax: "+max_weight+"\nbreed: "+breed.replace(/ /g,'_')+"\nsex: "+sex);


           vieSorted("data",baseUrl+queries,type,false);


}




$(document).ready(function(){
  $("#store_report").click(function(){
    $("#production").load("loadfiles/Reports/reports.php",function () {


      paneID=0;
      panes=[];


      $("#reportGenerator").hide();
      $("#oldReport").hide();
      $("#to_hide").hide();
      $("#report_date_sold").hide();
      $("#report_ammount_sold").hide();

      handleSortPane();

      $("#reports").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

      //reset the rest
      $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#update_records").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#add_pig").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none" });


      //add validation for reports_s_to
      $("#reports_min_weight").keyup(function () {

           if(Number($("#reports_min_weight").val()) < 0  ||
              Number($("#reports_min_weight").val()) >  Number($("#reports_max_weight").val()) ){
             $("#reports_min_weight").css({  "border-bottom":"2px solid red" });
           }else{
             $("#reports_min_weight").css({ "border":"none" });
             $("#reports_max_weight").css({ "border":"none" });
           }
      });

      $("#reports_max_weight").keyup(function () {


           if(Number($("#reports_max_weight").val()) <  Number($("#reports_min_weight").val()) ){
             $("#reports_max_weight").css({  "border-bottom":"2px solid red" });
           }else{
             $("#reports_max_weight").css({ "border":"none" });
             $("#reports_min_weight").css({ "border":"none" });
           }
      });


      $("#reports_min_ammount").keyup(function () {

           if(Number($("#reports_min_ammount").val()) < 0  ||
              Number($("#reports_min_ammount").val()) >  Number($("#reports_max_ammount").val()) ){
             $("#reports_min_ammount").css({  "border-bottom":"2px solid red" });
           }else{
             $("#reports_min_ammount").css({ "border":"none" });
             $("#reports_max_ammount").css({ "border":"none" });
           }
      });


      $("#reports_max_ammount").keyup(function () {


           if(Number($("#reports_max_ammount").val()) <  Number($("#reports_min_ammount").val()) ){
             $("#reports_max_ammount").css({  "border-bottom":"2px solid red" });
           }else{
             $("#reports_max_ammount").css({ "border":"none" });
             $("#reports_min_ammount").css({ "border":"none" });
           }
      });




    });
  });
});








$(document).ready(function(){
  $("#reports").click(function(){
    $("#production").load("../../includes/Reports/reports.php",function () {


      paneID=0;
      panes=[];


      $("#reportGenerator").hide();
      $("#oldReport").hide();
      $("#to_hide").hide();
      $("#report_date_sold").hide();
      $("#report_ammount_sold").hide();

      handleSortPane();

      $("#reports").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

      //reset the rest
      $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#update_records").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#add_pig").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none" });


      //add validation for reports_s_to
      $("#reports_min_weight").keyup(function () {

           if(Number($("#reports_min_weight").val()) < 0  ||
              Number($("#reports_min_weight").val()) >  Number($("#reports_max_weight").val()) ){
             $("#reports_min_weight").css({  "border-bottom":"2px solid red" });
           }else{
             $("#reports_min_weight").css({ "border":"none" });
             $("#reports_max_weight").css({ "border":"none" });
           }
      });

      $("#reports_max_weight").keyup(function () {


           if(Number($("#reports_max_weight").val()) <  Number($("#reports_min_weight").val()) ){
             $("#reports_max_weight").css({  "border-bottom":"2px solid red" });
           }else{
             $("#reports_max_weight").css({ "border":"none" });
             $("#reports_min_weight").css({ "border":"none" });
           }
      });


      $("#reports_min_ammount").keyup(function () {

           if(Number($("#reports_min_ammount").val()) < 0  ||
              Number($("#reports_min_ammount").val()) >  Number($("#reports_max_ammount").val()) ){
             $("#reports_min_ammount").css({  "border-bottom":"2px solid red" });
           }else{
             $("#reports_min_ammount").css({ "border":"none" });
             $("#reports_max_ammount").css({ "border":"none" });
           }
      });


      $("#reports_max_ammount").keyup(function () {


           if(Number($("#reports_max_ammount").val()) <  Number($("#reports_min_ammount").val()) ){
             $("#reports_max_ammount").css({  "border-bottom":"2px solid red" });
           }else{
             $("#reports_max_ammount").css({ "border":"none" });
             $("#reports_min_ammount").css({ "border":"none" });
           }
      });




    });
  });
});






$(document).ready(function(){
  $("#sell_pigs").click(function(){
    $("#production").load("loadfiles/pigSell/sell.php",function () {
      $("#to_hide").hide();
      handleSortPane();

      $("#sell_pigs").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

      //reset the rest
      $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#update_records").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#add_pig").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#reports").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});


    });
  });
});

//loads the file for accepting pigs for sale
$(document).ready(function(){
  $("#view_pigs").click(function(){
    $("#production").load("loadfiles/pigsdata/pigtable.php?", function() {
      handleSortPane();
      $("#to_hide").hide();

      $("#view_pigs").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

      //reset the rest
      $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#update_records").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#add_pig").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

      $("#reports").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});


    });
  });
});





//Open and close menu
     $("#menu-toggle").click( function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("menuDispalyed");

        // $("#to_hide").removeClass( "col-lg-4 col-md-4 col-sm-4" )
        // .addClass( "col-lg-3 col-md-3 col-sm-3");

     });



     $(document).ready(function(){
       $("#employees").click(function(){
         $("#production").load("loadfiles/table.php");
       });
     });

     $(document).ready(function(){
       $("#products_analysis").click(function(){
         $("#production").load("loadfiles/products_analysis.php");
       });
     });

     $(document).ready(function(){
       $("#settings").click(function(){
         $("#production").load("loadfiles/settings/pig_settings/settings.php");

         $("#settings").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

         //reset the rest
         $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
         $("#update_records").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
         $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
         $("#add_pig").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
         $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

         $("#reports").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

       });
     });

     $(function(){
       $("#new_record").click(function(){
         $("#production").load("loadfiles/new_record.php");


       });
     });


     //Open profile
     $(document).ready(function(){
       $("#user_profile").click(function(){
         var   user_id=document.getElementById('emp_id').innerText;
            // user_id="333/333/333";
         $("#production").load("loadfiles/profiles/profile.php?id="+user_id);

         $("#user_profile").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

         //reset the rest
         $("#tools").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
         $("#feeds").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

         $("#add_pig").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
         $("#update_records").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
         $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
         $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
         $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

         $("#reports").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});



       });
     });




function closeForm(){
  // alert("ready");
  $("#to_hide").fadeOut(800,function() {
    $("#tableHolder").removeClass( "col-lg-8 col-md-8 col-sm-8" )
    .addClass( "col-lg-12 col-md-12 col-sm-12");
  });

}


function openTable(){
  $("#allPigs").slideDown(150);
  $("#statisticsHolder").slideUp(150);

}
   //This function when called will shrink the div with the table and show the update pane
   function hideDiv(id,age,years_old) {
     $("#tableHolder" ).removeClass( "col-lg-12 col-md-12 col-sm-12" )
     .addClass( "col-lg-8 col-md-8 col-sm-8");

     $("#to_hide").fadeIn(800,function() {

       //Open the file input if user clicks yes to request pig for sale
          $(document).ready(function() {
             $("input[name='sale']").change(function() {
                if ($("input[name='sale']:checked").val() == "Y" ) {
                  $("#file_entry").slideDown();
                }else {
                   $("#file_entry").slideUp();
                   $("#images").val("");
                }
             });
          });


           //reset the images to null
          $("#images").val("");



         $("#pig_entry").val(id);
         $("#breed_entry").val($("#"+id+"_breed").text());
         $("#weight_entry").val($("#"+id+"_weight").text());
         $("#age_entry").val(age);

         if ($("#"+id+"_sex").text()=="M")
         $("#male_gender").prop("checked", true);
         else
         $("#female_gender").prop("checked", true);


         //Set the selected value for selling by preventDefault
         if($("#"+id+"_sell").val()=="Y")
         $("#sell_request_y").prop("checked", true);
         else
         $("#sell_request_n").prop("checked", true);


     //Hide the request sale check box if the pig is less than 1 year old
         if (years_old<1)
          $("#sell_request").fadeOut(800);
        else
          $("#sell_request").fadeIn(800);


          $("#preview_entry").slideUp(400);
          $("#details_entry").slideDown(400);


          //Hide the fields for importing  the pig images
          $("#preview_entry").fadeOut(400);
          $("#file_entry").fadeOut(400);

     });
   }





   function checkInputs(pig_id, breed, weight, day, gender) {
     var check=true;

     if (pig_id == ""){
       $("#pig_id").css({"border-bottom":"2px solid red","transition": "all 0.6s linear"});
       $("#id_r").show().css({"color":"red","font-size":"25px"});
       check=false;
     }
     if (breed == ""){
       $("#breed").css({"border-bottom":"2px solid red","transition": "all 0.6s linear"});
       $("#breed_r").show().css({"color":"red","font-size":"25px"});
       check=false;
     }
     if (weight == 0){
       $("#weight").css({"border-bottom":"2px solid red","transition": "all 0.6s linear"});
       $("#weight_r").show().css({"color":"red","font-size":"25px"});
       check=false;

     }
     if (day == ""){
       $("#day").css({"border-bottom":"2px solid red","transition": "all 0.6s linear"});
       $("#day_r").show().css({"color":"red","font-size":"25px"});
       check=false;

     }
     if (gender != "M" &&  gender !="F" ){
       $("#gender").css({"border-bottom":"2px solid red","transition": "all 0.6s linear"});
       $("#gender_r").show().css({"color":"red","font-size":"25px"});
       check=false;
       window.alert("please specify gender as either capital F or capital M")

     }
     return check;
   }





function addNewPig() {
       var mother_id=$("#mother_id").val();
       var pig_id=$('#pig_id').val();
       var breed=$('#breed').val()
       var weight=$('#weight').val();
       var day=$('#day').val()
       var gender=$('#gender').val();
       var employee=$('#emp_id').text();



     if (checkInputs(pig_id, breed, weight, day, gender)) {



      if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
      } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {

          if (this.readyState == 4 && this.status == 200) {
            $("#production").load("loadfiles/addpig.php");
            // document.getElementById("production").innerHTML = this.responseText;

          }
      };
      xmlhttp.open("GET","../../../pigs/addpigOrRemovePig.php?pig_id="+pig_id+"&mother_id="+mother_id+"&breed="+breed+"&weight="+weight+"&day="+day+"&gender="+gender+"&emp_id="+employee,true);
      xmlhttp.send();
  }else{
    $("#error_notification").fadeIn(2500).fadeOut(20000);
  }
}


function ORIGINALdELETE(id) {

  Swal.fire({
  title: 'Delete pig record record?',
  text: "Are you sure you want to delete pig with id "+id,
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Delete !'
}).then((result) => {
  if (result.value) {

    if (id == "") {
        document.getElementById("production").innerHTML = "";
        return;
    } else {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {


            if (this.readyState == 4 && this.status == 200) {
              $("#"+id).fadeOut(400);
            }
        };

        xmlhttp.open("GET","../../../pigs/addpigOrRemovePig.php?id="+id+"&reason="+reason,true);
        xmlhttp.send();

    }
    Swal.fire(
      'Pig  successfully deleted.',
      ' ',
      'success'
    )
  }
})
}



function deletePig(id) {
    Swal.fire({
      title:"Give reasons for deletion.",
      text : "success",
      showCancelButton: true
    }).then((rvalue)=>{
      if (rvalue.value){
      Swal.fire({
      title: "Reasons for pig deletion",
      showConfirmButton:true,
      showCancelButton:true,
      background: '#ECEFF1',
      confirmButtonText:'<i class="fa fa-thumbs-up"></i> Delete! ',
      animation: "slide-from-top",
      html:  '<div class="">'+

              '<!--Card content-->'+
              '<div class="card-body px-lg-5 pt-0">'+

              '  <!-- Form -->'+
              '  <form class="text-center" style="color: #7acb75;">'+

                  '<!-- ID -->'+
                  '<div class="form-row">'+
                  ' <div class="col">'+
                  '     <div class="md-form">'+
                  '          <label>Reason </label>'+
                  '     </div>'+
                  ' </div>'+
                  ' <div class="col">'+
                  '      <select class="form-control" id="reason">'+
                  '          <option value="Dead">Dead</option>'+
                  '           <option value="Wrong entry">Wrong entry</option>'+
                  '     </select>'+
                  '  </div>'+
                  '  </div>'
      }).then((r2value)=> {
          if (r2value.value) {
            var reason  =$("#reason").val();

            $.ajax({
                type: "GET",
                url: "../../../pigs/addpigOrRemovePig.php",
                data: { id  : id,
                        reason:reason
                      },
                dataType:'JSON',
                success: function(response){
                  Swal.fire("Deletion was successfull ");

                },
                error: function (response) {
                  Swal.fire("An error occured",response.responseText);
                }
            });


          }
      });

 }
});


  }



function updatePig() {

  var id      = $("#pig_entry").val();

  Swal.fire({
  title: 'Update records?',
  text: "Do you want to update  the   pig with ID "+id,
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Update !'
}).then((result) => {
  if (result.value) {

    var gender  = $("input[name='SEX']:checked").val();
    var breed   = $("#breed_entry").val();
    var weight  = $("#weight_entry").val();
    var request = $("input[name='sale']:checked").val();

     $("#"+id+"_sell").val(request);



    if (id == "") {
        document.getElementById("production").innerHTML = "";
        return;
    } else {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {


            if (this.readyState == 4 && this.status == 200) {

            //Set the values of the td to the value set to the be updated
             //This value set picked using ids given to  td
              $("#"+id+"_breed").text(breed);
              $("#"+id+"_weight").text(weight);
              $("#"+id+"_sex").text(gender);


              // Swal.fire("",this.responseText);
              //on success upload image if sell is requested
              if (request == "Y") {
                uploadImage("upload.php");
              }
            }
        };
        xmlhttp.open("GET","../../../pigs/addpigOrRemovePig.php?update_id="+id+"&update_breed="+breed+"&update_weight="+weight+"&update_gender="+gender+"&update_request="+request,true);
        xmlhttp.send();

    }

    Swal.fire(
      'Updated!',
      'Records successfully updated.',
      'success'
    )
  }
})
}





///image upload script
function uploadImage(url){
    var filedata = document.getElementById('images');

      formdata = false;
    if (window.FormData) {
        formdata = new FormData();
    }
    var i = 0, len = filedata.files.length, img, reader, file;

    for (; i < len; i++) {
        file = filedata.files[i];


        if (window.FileReader) {
            reader = new FileReader();
            reader.onloadend = function(e) {
                // // showUploadedItem(e.target.result, file.fileName);
                // alert("yes");
            };
            reader.readAsDataURL(file);
        }

        if (formdata) {
            formdata.append("file[]", file);
        }
    }
    if (formdata) {
        $.ajax({
            url: "loadfiles/imageUploads/"+url,
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(res) {

            Swal.fire("Image(s) successfully uploaded"+res.responseText)
            },
            error: function(res) {
              alert(res.responseText);

            }
             });
            }
        }



        function checkPassword(employee_id,url,old_password,new_password,choice,message, edit_data) {
          $.ajax({
              type: "GET",
              url:url,
              data: {check  : employee_id, old_P:old_password, new_P:new_password, choice:choice, user_info : edit_data},
              dataType:'JSON',
              success: function(response){

                   if (response.success) {
                        $("#old_pA").show();
                        $("#old_password").css({"border-bottom":"2px solid green","transition": "all 0.5s linear"});

                        if (response.updatesuccess) {
                          Swal.fire(message+"successfully changed");
                        }

                   }else {
                     $("#old_pA").hide();
                     $("#old_password").css({"border-bottom":"2px solid red","transition": "all 0.5s linear"});
                   }
              },
              error:function (response) {
                 alert(response.responseText);
              }
          });
        }
