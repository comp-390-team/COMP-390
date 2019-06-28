viewFeeds();

  $("#tools").click(function(){vieWTools();});

  $("#feeds").click(function(){viewFeeds();});


function addTool() {
  //reset the control variables
  employee_available=false;
  valid_quantity=false;

  $("#production").load("loadfiles/tool/tool.php");

    // $("#to_hide").hide();

    $("#tools").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});
    //
    // //reset the rest
    $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#feeds").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

}

function  updateFeed(name,type){
  $("#"+type+"_"+name+"_q").hide();
  $("#update_"+name).show();
  $("#update_"+name).val($("#"+type+"_"+name+"_q").text());

  $("#updatebtn_"+name)
        .attr("onclick","saveUpdate(\""+name+"\",\""+type+"\")")
        .text("save")
        .removeClass("btn-success")
        .addClass("btn-warning");
}


function saveUpdate(name,type) {
  $("#"+type+"_"+name+"_q").show();
  $("#update_"+name).hide();
  $("#updatebtn_"+name)
        .attr("onclick","updateFeed(\""+name+"\",\""+type+"\")")
        .text("update")
        .removeClass("btn-warning")
        .addClass("btn-success");


        var name     =$("#"+type+"_"+name+"_n").text();
        var quantity =$("#update_"+name).val();


         if(quantity > 0){
            $("#"+type+"_"+name+"_q").text(quantity);
              updateData(type,name,quantity);

         }else{
           alert("quantity must be more than zero");
         }
}

function updateData(type,name, quantity){

  $.ajax({
      type: "POST",
      url:"../../../inventory/updateInventory.php",
      data: {update_item  : type,
             name         : name,
             quantity     : quantity
             },
      dataType:'JSON',
      success: function(response){

           if (response.success){
              $("#t_"+name).remove();
           }
               // Swal.fire(tool_name+"successfully added");
           else{}
               // Swal.fire("An error occured");
      },
      error:function (response) {
        alert(response.responseText)
        // Swal.fire("An error occured");
      }
  });

}



function toolsInUse() {

  //reset the control variables
  employee_available=false;
  valid_quantity=false;

  $("#production").load("loadfiles/tool/in_use.php",function() {
    $("#to_hide").hide();
  });



    $("#tools").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});
    //
    // //reset the rest
    $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#feeds").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

}

function vieWTools(){
//reset the control variables
employee_available=false;
valid_quantity=false;


  //Load the pig data table by default
  $(document).ready(function() {
    $("#production").load("loadfiles/tool/table.php",function() {
      $("#to_hide").hide();
      $(".tools").hide();


      $("#tools").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

      //reset the rest
      $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#feeds").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    });
  });

}



function addFeed() {

  $("#production").load("loadfiles/feed/feed.php");

    // $("#to_hide").hide();

    $("#feeds").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});
    //
    // //reset the rest
    $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#tools").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});

}

function viewFeeds(){

  // reseting control variables
  employee_available=false;
  valid_quantity=false;

  //Load the pig data table by default
  $(document).ready(function() {
    $("#production").load("loadfiles/feed/table.php",function() {
      $("#to_hide").hide();
      $(".feeds").hide();


      $("#feeds").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

      //reset the rest
      $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#tools").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    });
  });

}


function getReport() {
  //Load the pig data table by default
  $(document).ready(function() {
    $("#production").load("loadfiles/feed/used_feeds.php",function() {
      $("#to_hide").hide();
      $(".feeds").hide();


      $("#feeds").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

      //reset the rest
      $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#tools").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
      $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    });
  });
}



var valid_quantity=false;

function  showToolDetails(name){

  $("#tableHolder" ).removeClass( "col-lg-12 col-md-12 col-sm-12" )
  .addClass( "col-lg-8 col-md-8 col-sm-8");
  $("#to_hide").show(function() {

    $("#tool_name").val(name);


    $("#tool_quantity").keyup(function() {

      var available_quantity=$("#t_"+name.replace(/ /g,"")+"_q").text();


      var needed_quantity=$("#tool_quantity").val();

     if (needed_quantity>Number(available_quantity)  || needed_quantity<1){
       $("#tool_quantity").css({"border-bottom":"2px solid red"});
       valid_quantity=false;
     }
    else{
       $("#tool_quantity").css({"border-bottom":"2px solid green"});
       valid_quantity=true;
     }
    });


   $("#employee_id").keyup(function() {
       var id=$("#employee_id").val();
       checkEmployeeID(id);
   });

  });

}




function  showToolInUse(name, date_handed){

  $("#tableHolder" ).removeClass( "col-lg-12 col-md-12 col-sm-12" )
  .addClass( "col-lg-8 col-md-8 col-sm-8");
  $("#to_hide").show(function() {

    $("#tool_name").val(name);
    $("#date_picked").val(date_handed);
    $("#employee_id").val($("#emp_"+name+"_id").text());
    $("#employee_name").val($("#emp_"+name+"_name").text());



    $("#tool_quantity").keyup(function() {

      var available_quantity=$("#t_"+name+"_q").text();


      var needed_quantity=$("#tool_quantity").val();

     if (needed_quantity>Number(available_quantity)  || needed_quantity<1){
       $("#tool_quantity").css({"border-bottom":"2px solid red"});
       valid_quantity=false;
     }
    else{
       $("#tool_quantity").css({"border-bottom":"2px solid green"});
       valid_quantity=true;
     }
    });


   $("#employee_id").keyup(function() {
       var id=$("#employee_id").val();
       checkEmployeeID(id);
   });

  });

}

var employee_available=false;

function checkEmployeeID(id){
  $.ajax({
      type: "POST",
      url:"../../../Persons/AddEmployee.php",
      data: {checkEmployee  : id},
      dataType:'JSON',
      success: function(response){
         // Swal.fire("","successfully added "+e_fname+" "+e_sname);

         if (!response.success) {
           $("#employee_id").css({"border-bottom":"2px solid red"});
           employee_available=false;

         }else{
           $("#employee_id").css({"border-bottom":"2px solid green"});
           employee_available=true;
         }
      },
      error:function (response) {
         alert(response.responseText);
      }
  });
}




function addnewTool() {
 var tool_name=$("#tool_name").val();
 var tool_quantity=$("#tool_quantity").val();
 var tool_description=$("#tool_description").val();


  $.ajax({
      type: "POST",
      url:"../../../inventory/updateInventory.php",
      data: {tool_name  : tool_name, tool_quantity:tool_quantity, tool_description:tool_description},
      dataType:'JSON',
      success: function(response){

           if (response.success){}
               // Swal.fire(tool_name+"successfully added");
           else{}
               // Swal.fire("An error occured");
      },
      error:function (response) {
        // Swal.fire("An error occured");
      }
  });
}

function deleteTool(name) {
  $.ajax({
      type: "POST",
      url:"../../../inventory/updateInventory.php",
      data: {delete_tool  : name},
      dataType:'JSON',
      success: function(response){

           if (response.success){
              $("#t_"+name).remove();
           }
               // Swal.fire(tool_name+"successfully added");
           else{}
               // Swal.fire("An error occured");
      },
      error:function (response) {
        // Swal.fire("An error occured");
      }
  });
}



function  showFeedDetails(name){

  $("#tableHolder" ).removeClass( "col-lg-12 col-md-12 col-sm-12" )
  .addClass( "col-lg-8 col-md-8 col-sm-8");
  $("#to_hide").show(function() {

    $("#feed_name").val(name);

     var available_quantity=$("#f_"+name.replace(/ /g,"")+"_q").text();

    $("#feed_quantity").keyup(function() {

      var needed_quantity=$("#feed_quantity").val();

     if (needed_quantity>Number(available_quantity) || needed_quantity<1){
       $("#feed_quantity").css({"border-bottom":"2px solid red"});

       valid_quantity=false;
     }
    else{
       $("#feed_quantity").css({"border-bottom":"2px solid green"});
      valid_quantity=true;
     }
    });


    $("#employee_id").keyup(function() {
        var id=$("#employee_id").val();
        checkEmployeeID(id);
    });


  });

}


function addnewFeed() {
 var feed_name=$("#feed_name").val();
 var feed_quantity=$("#feed_quantity").val();
 var feed_type=$("#feed_type").val();


  $.ajax({
      type: "POST",
      url:"../../../inventory/updateInventory.php",
      data: {feed_name  : feed_name, feed_quantity:feed_quantity, feed_type:feed_type},
      dataType:'JSON',
      success: function(response){

           if (response.success){}
               // Swal.fire(tool_name+"successfully added");
           else{}
               // Swal.fire("An error occured");
      },
      error:function (response) {
        // Swal.fire("An error occured");
      }
  });
}



function deleteFeed(name) {
  $.ajax({
      type: "POST",
      url:"../../../inventory/updateInventory.php",
      data: {delete_feed  : name},
      dataType:'JSON',
      success: function(response){

           if (response.success){
              $("#f_"+name.replace(/ /g,"")).remove();
           }
               // Swal.fire(tool_name+"successfully added");
           else{}
               // Swal.fire("An error occured");
      },
      error:function (response) {
        // Swal.fire("An error occured");
      }
  });
}


function handFeed() {
   if(employee_available && valid_quantity){
     var name=$("#feed_name").val();
     var emp_id=$("#employee_id").val();
     var quantity=$("#feed_quantity").val();


     var  available_quantity=$("#f_"+name.replace(/ /g,"")+"_q").text();
          available_quantity=Number(available_quantity)-quantity;


          $.ajax({
              type: "POST",
              url:"../../../inventory/updateInventory.php",
              data: {hand_feed  : name, employee_id:emp_id ,quantity: quantity, newQuantity: available_quantity},
              dataType:'JSON',
              success: function(response){

                   if (response.success){

                            $("#f_"+name.replace(/ /g,"")+"_q").text(available_quantity);

                            if (available_quantity == 0){
                                   $("#f_"+name.replace(/ /g,"")).remove();
                                   // reseting control variables
                                   employee_available=false;
                                   valid_quantity=false;
                           }

                     // Swal.fire(tool_name+"successfully added");
                   }
                   else{
                     // Swal.fire("An error occured");

                   }
              },
              error:function (response) {
                alert(response.responseText);
                // Swal.fire("An error occured");
              }
          });



   }else{
     alert("please insert the right values");
     // Swal.fire("Please enter valid inputs");
   }
}


function handTool() {
   if(employee_available && valid_quantity){
     var name=$("#tool_name").val();
     var emp_id=$("#employee_id").val();
     var quantity=$("#tool_quantity").val();


     var  available_quantity=$("#t_"+name.replace(/ /g,"")+"_q").text();
          available_quantity=Number(available_quantity)-quantity;

     $.ajax({
         type: "POST",
         url:"../../../inventory/updateInventory.php",
         data: {hand_tool  : name, employee_id:emp_id ,quantity: quantity, newQuantity: available_quantity},
         dataType:'JSON',
         success: function(response){

              if (response.success){

                       $("#t_"+name.replace(/ /g,"")+"_q").text(available_quantity);

                       if (available_quantity == 0){
                              $("#t_"+name.replace(/ /g,"")).remove();
                              // reseting control variables
                              employee_available=false;
                              valid_quantity=false;
                      }

                // Swal.fire(tool_name+"successfully added");
              }
              else{
                // Swal.fire("An error occured");

              }
         },
         error:function (response) {
           alert(response.responseText);
           // Swal.fire("An error occured");
         }
     });

   }else{

     alert("please insert the right values");
     // Swal.fire("Please enter valid inputs");
   }
}



function returnTool() {
     var name         =$("#tool_name").val();
     var remark       =$("#remark").val();
     var quantity     =$("#t_"+name+"_q").text();
     var employee_id  =$("#employee_id").val();
     var date_picked  =$("#date_picked").val();


     $.ajax({
         type: "POST",
         url:"../../../inventory/updateInventory.php",
         data: {return_tool  : name, quantity:quantity ,remark: remark,employee_id:employee_id ,date_picked:date_picked},
         dataType:'JSON',
         success: function(response){
                   $("#t_"+name.replace(/ /g,"")).remove();

                // Swal.fire(tool_name+"successfully added");
         },
         error:function (response) {
           alert(response.responseText);
           // Swal.fire("An error occured");
         }
     });
}
