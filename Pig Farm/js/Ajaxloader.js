//Load the pig data table by default
$(document).ready(function() {
  $("#production").load("loadfiles/table.php",function() {
    $("#to_hide").hide();
  });
});


///Secion atendant files manupilation
//lOADS THE FORM FOR ADDING PIGS
$(document).ready(function(){
  $("#add_pig").click(function(){
    $("#production").load("loadfiles/addpig.php",function() {
      //HANDLE CHANGES IN THE ID
        $("#pig_id").change(function() {
        $("#pig_id").css({"border-bottom":"2px solid green","transition": "all 3s linear"});
        $("#id_r").hide();
      });
      //hANDLE CHANGES IN THE BREED
        $("#breed").change(function() {
        $("#breed").css({"border-bottom":"2px solid green","transition": "all 3s linear"});
        $("#breed_r").hide();
      });

       //hANDLE CHANGES FOR THE weight
        $("#weight").change(function() {
        $("#weight").css({"border-bottom":"2px solid green","transition": "all 3s linear"});
        $("#weight_r").hide();
      });

      //hANDLE CHANGES FOR THE gender
        $("#gender").change(function() {
        $("#gender").css({"border-bottom":"2px solid green","transition": "all 3s linear"});
        $("#gender_r").hide();
      });

      //hANDLE CHANGES FOR THE  day
        $("#day").change(function() {
        $("#day").css({"border-bottom":"2px solid green","transition": "all 3s linear"});
        $("#day_r").hide();
      });

    });
  });
});


$(document).ready(function(){
  $("#update_records").click(function(){
    $("#production").load("loadfiles/table.php", function() {
      $("#to_hide").hide();
    });
  });
});

$(document).ready(function(){
  $("#sell_pigs").click(function(){
    $("#production").load("loadfiles/pigSell/sell.php");
  });
});

//loads the file for accepting pigs for sale
$(document).ready(function(){
  $("#view_pigs").click(function(){
    $("#production").load("loadfiles/pigsdata/pigtable.php", function() {
      $("#to_hide").hide();

    });
  });
});





//Open and close menu
     $("#menu-toggle").click( function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("menuDispalyed");
     });



     $(document).ready(function(){
       $("#employees").click(function(){
         $("#production").load("loadfiles/employee.php");
       });
     });

     $(document).ready(function(){
       $("#products_analysis").click(function(){
         $("#production").load("loadfiles/products_analysis.php");
       });
     });

     $(document).ready(function(){
       $("#settings").click(function(){
         $("#production").load("loadfiles/settings.php");
       });
     });

     $(function(){
       $("#new_record").click(function(){
         $("#production").load("loadfiles/new_record.php");
       });
     });




function closeForm(){
  // alert("ready");
  $("#to_hide").fadeOut(800,function() {
    $("#tableHolder").removeClass( "col-lg-8 col-md-8 col-sm-8" )
    .addClass( "col-lg-12 col-md-12 col-sm-12");
  });

}
   //This function when called will shrink the div with the table and show the update pane
   function hideDiv(id,age,years_old) {
     $("#tableHolder" ).removeClass( "col-lg-12 col-md-12 col-sm-12" )
     .addClass( "col-lg-8 col-md-8 col-sm-8");

     $("#to_hide").fadeIn(3000,function() {

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
       $("#pig_id").css({"border-bottom":"2px solid red","transition": "all 3s linear"});
       $("#id_r").show().css({"color":"red","font-size":"25px"});
       check=false;
     }
     if (breed == ""){
       $("#breed").css({"border-bottom":"2px solid red","transition": "all 3s linear"});
       $("#breed_r").show().css({"color":"red","font-size":"25px"});
       check=false;
     }
     if (weight == 0){
       $("#weight").css({"border-bottom":"2px solid red","transition": "all 3s linear"});
       $("#weight_r").show().css({"color":"red","font-size":"25px"});
       check=false;

     }
     if (day == ""){
       $("#day").css({"border-bottom":"2px solid red","transition": "all 3s linear"});
       $("#day_r").show().css({"color":"red","font-size":"25px"});
       check=false;

     }
     if (gender != "M" &&  gender !="F" ){
       $("#gender").css({"border-bottom":"2px solid red","transition": "all 3s linear"});
       $("#gender_r").show().css({"color":"red","font-size":"25px"});
       check=false;
       window.alert("please specify gender as either capital F or capital M")

     }
     return check;
   }





function addNewPig() {
       var pig_id=document.getElementById('pig_id').value;
       var breed=document.getElementById('breed').value;
       var weight=document.getElementById('weight').value;
       var day=document.getElementById('day').value;
       var gender=document.getElementById('gender').value;


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
      xmlhttp.open("GET","../../../pigs/addpigOrRemovePig.php?pig_id="+pig_id+"&breed="+breed+"&weight="+weight+"&day="+day+"&gender="+gender,true);
      xmlhttp.send();
  }else{
    $("#error_notification").fadeIn(2500).fadeOut(20000);
  }
}


function deletePig(id) {

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

        xmlhttp.open("GET","../../../pigs/addpigOrRemovePig.php?id="+id,true);
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


              //on success upload image if sell is requested
              if (request == "Y") {
                uploadImage();
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
function uploadImage(){
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
            url: "loadfiles/imageUploads/upload.php",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(res) {
            alert("success");
            },
            error: function(res) {

            }
             });
            }
        }
