/**This js file will hold functions that will be used to manipulate the manager pane**/

//This function when called will shrink the div with the table and show the update pane
function editEmployee(id,Name,No,title,Nationality) {
  $("#tableHolder" ).removeClass( "col-lg-12 col-md-12 col-sm-12" )
  .addClass( "col-lg-8 col-md-8 col-sm-8");

  $("#to_hide").fadeIn(4000,function() {
    var newd=id.replace(/\//g,"_");

      $("#id_entry").val(id);
      $("#name_entry").val(Name);
      $("#phone_entry").val($("#"+newd+"_phone").text());

      $("#tittle_entry").val($("#"+newd+"_tittle").text());
      $("#nationality_entry").val($("#"+newd+"_nation").text());
      // $("#age_entry").val(age);


  });
}


function deleteEmployee(id) {

  if (confirm("Confirm deletion of Employee with ID "+id)) {
    if (id == "") {
        // document.getElementById("production").innerHTML = "";
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
                $("#"+id).fadeOut(700);
            }
        };

        xmlhttp.open("GET","../../Persons/AddEmployee.php?delete_id="+id,true);
        xmlhttp.send();

    }
  } else
    return;
}


//Function to update the employee data.
function updateEmployee() {

  var id      = $("#id_entry").val();


  if (confirm("Do you want to update  the   employee with ID "+id)) {

    var tittle       = $("#tittle_entry").val();
    var phone        = $("#phone_entry").val();
    var nationality  = $("#nationality_entry").val();


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

              // document.getElementById("production").innerHTML = this.responseText;

                   var newd=id.replace(/\//g,"_");

            //Set the values of the td to the value set to the be updated
             //This value set picked using ids given to  td
              $("#"+newd+"_phone").text(phone);
              $("#"+newd+"_nation").text(nationality);
              $("#"+newd+"_tittle").text(tittle);


            }
        };
         // $manager->updateEmployee($phone_no, $job_tittle, $nationality, $ID);


        xmlhttp.open("GET","../../Persons/AddEmployee.php?update_id="+id+"&phone_no="+phone+"&job_tittle="+tittle+"&nationality="+nationality,true);
        xmlhttp.send();

    }
  } else
    return;

}



//Functions for loading databse
//function to view all pigs in the database
function viewAll() {
$("#production").load("loadfiles/pigsdata/pigtable.php");
}

//function to view all pigs in the database
function viewPigsTosell() {
          $("#production").load("loadfiles/pigsdata/pigsToSell.php",function() {
               $("#decline").hide();
               $("#quote_price").hide();
               $("#to_hide").hide();
          });
          }

          function hideDetails() {
              $("#details").slideToggle(1000);
              $("#decline").slideToggle(1000);

              $("#approve").attr("onclick","openPriceField()");
              $("#approve").text("Quote price ");

              if ($("#quote_id").is(":hidden")) {
                $("#quote_price").slideToggle(1000);
                $("#quote_id").slideToggle(1000);
              }
          }

//Opens the field to be used to pick the price
          function openPriceField(){
            $("#quote_price").slideToggle(1000);
            $("#quote_id").slideToggle(1000);
            $("#approve").attr("onclick","approveSelling()");
            $("#approve").text("Approve ");

          }

          //approve approveSelling
          function approveSelling() {

              var id=$("#pig_entry").text();

              if (confirm("Do you want to update  the   pig with ID "+id)) {

                var price   = $("#quoted_price").val();

                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }

                    xmlhttp.onreadystatechange = function() {

                        if (this.readyState == 4 && this.status == 200) {
                          $("#"+id).fadeOut(1000);

                          $("#quote_price").slideToggle(1000);
                          $("#quote_id").slideToggle(1000);
                          $("#approve").attr("onclick","openPriceField()");
                          $("#approve").text("Quote price ");
                        }
                    };
          xmlhttp.open("GET","../../pigs/addpigOrRemovePig.php?quote_id="+id+"&quote_price="+price,true);
          xmlhttp.send();

              } else
                return;
          }


          function rejectSelling() {

              var id=$("#pig_entry").text();

              if (confirm("Do you want to update  the   pig with ID "+id)) {

                var remark   = $("#comment").val();


                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }

                    xmlhttp.onreadystatechange = function() {

                        if (this.readyState == 4 && this.status == 200) {
                          $("#"+id).fadeOut(1000);
                          $("#details").slideToggle(1000);
                          $("#decline").slideToggle(1000);

                          $("#pig_entry").text("");
                          $("#breed_entry").text("");
                          $("#weight_entry").text("");
                          $("#age_entry").text("");
                          // document.getElementById("production").innerHTML = this.responseText;
                        }
                    };
          xmlhttp.open("GET","../../pigs/addpigOrRemovePig.php?reject_id="+id+"&remark="+remark,true);
          xmlhttp.send();

              } else
                return;
          }


          function showDetails(id,age) {
            $("#tableHolder" ).removeClass( "col-lg-12 col-md-12 col-sm-12" )
            .addClass( "col-lg-8 col-md-8 col-sm-8");




            $("#to_hide").fadeIn(1500,function() {

                  //change images
                  // ../../pigs/pigsToSell/A345/A345_0.jpg
                   var count=0;
                  $(document).ready(function() {
                     $("#previous").click(function() {
                       //set the value of count
                          count=(count == 0)?4:count;
                       $("#pig_image").attr("src", "../../pigs/pigsToSell/"+id+"/"+id+"_"+count-- +".jpg");
                     });
                  });


                   //Change image to next
                  $(document).ready(function() {
                     $("#next").click(function() {
                       //set the value of count
                          count=(count == 4)?0:count;
                       $("#pig_image").attr("src", "../../pigs/pigsToSell/"+id+"/"+id+"_"+count++ +".png");
                     });
                  });

                  $("#pig_image").attr("src", "../../pigs/pigsToSell/"+id+"/"+id+"_"+count+".jpg");


              //Open the details pane if hidden
              if ($("#details").is(":hidden"))
                   hideDetails();
                   //Restore the id pane if hidden
              else if ($("#quote_id").is(":hidden")) {
                     $("#quote_price").slideToggle(1000);
                     $("#quote_id").slideToggle(1000);

                     //reset the values of the Buttons
                     $("#approve").attr("onclick","openPriceField()");
                     $("#approve").text("Quote price ");
                   }

                   //set the values to a the pane for better viewing
                $("#pig_entry").text(id);
                $("#breed_entry").text($("#"+id+"_breed").text());
                $("#weight_entry").html($("#"+id+"_weight").text()+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kg");
                $("#age_entry").text(age);

            });
          }
