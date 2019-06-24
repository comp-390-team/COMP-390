//Load the pig data table by default
$(document).ready(function() {
  $("#production").load("loadfiles/table.php?type=all",function() {

    handleSortPane();
    $("#to_hide").hide();
    $("#update_records").css({"background":"#16A085","transition": "all 0.6s linear", "border-bottom":"2px solid yellow","border-top": "2px solid yellow"});

    //reset the rest
    $("#user_profile").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#add_pig").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#sell_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#settings").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
    $("#view_pigs").css({"background":"#2c3e50","transition": "all 0.6s linear", "border":"none"});
  });
});



//load the file to display accepted pigs
function viewAccepted() {
$("#production").load("loadfiles/pigSell/sell.php",function () {
  $("#to_hide").hide();
    handleSortPane();

});
}

function viewRejectedSale() {
$("#production").load("loadfiles/pigSell/rejected.php",function() {
  handleSortPane();
});

}

function openSellPane() {
    alert("hello")
}

function removeFromRejects(id, date_rejected) {

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

      xmlhttp.open("GET","../../../pigs/addpigOrRemovePig.php?updaterejects="+id+"&date_rejected="+date_rejected,true);
      xmlhttp.send();

  }


  Swal.fire(
    'successfull.',
    ' ',
    'success'
  )
}


// const ipAPI = 'https://api.ipify.org?format=json';
// const inputValue = fetch(ipAPI)
//   .then(response => response.json())
//   .then(data => data.ip);




function sellPig(pig_id) {

  Swal.fire({
      title: "Customer information",
      text: "Enter customer ID",
      input: 'text',
      showCancelButton: true,
      inputValidator: (value) => {
  if (!value) {
    return 'Please input the customer ID!'
  }
}
  }).then((result) => {
      if (result.value) {

            $.ajax({
            type: "POST",
            url: "../../../Persons/Customer/Customer.php",
            data: {check: result.value},
            dataType:'JSON',
            success: function(response){
                // console.log(response.blablabla);
                var success=(response.success)?"user available":" Do you want to add customer";

                 //if customer is in database display his/her data then sellPig
                 if (response.success) {
                     Swal.fire({
                      title:"Customer details",
                      showCancelButton:true,
                      html: '<!--Card content-->'+
                      '<div class="card-body px-lg-5 pt-0">'+

                        '  <!-- Form -->'+
                          '<form class="text-center" style="color: #757575;" role="form">'+

                          '    <div class="form-row">'+
                          '        <div class="col">'+
                          '            <!-- First name -->'+
                          '            <div class="md-form">'+
                          '                <label for=""> ID</label>'+
                          '            </div>'+
                          '        </div>'+
                          '        <div class="col">'+
                          '            <!-- Last name -->'+
                          '            <div class="md-form">'+
                          '                <input type="text" id="id_entry" class="form-control" value="'+result.value+'" disabled>'+
                          '            </div>'+
                          '        </div>'+
                          '    </div>'+

                          '    <div class="form-row">'+
                          '        <div class="col">'+
                          '            <!-- First name -->'+
                          '            <div class="md-form">'+
                          '                <label for="">Name</label>'+
                          '            </div>'+
                          '        </div>'+
                          '        <div class="col">'+
                          '            <!-- Last name -->'+
                          '            <div class="md-form">'+
                          '                <input type="text" id="name_entry" class="form-control" value="'+response.name+'" disabled>'+
                          '            </div>'+
                          '        </div>'+
                          '    </div>'+


                          '    <div class="form-row">'+
                          '        <div class="col">'+
                          '            <!-- First name -->'+
                          '            <div class="md-form">'+
                          '                <label for="">Phone number</label>'+
                          '            </div>'+
                          '        </div>'+
                          '        <div class="col">'+
                          '           <!-- Last name -->'+
                          '            <div class="md-form">'+
                          '                <input type="text" id="phone_entry" class="form-control" value="'+response.phone_no+'">'+
                          '            </div>'+
                          '        </div>'+
                          '    </div>'+

                          '    <div class="form-row">'+
                          '        <div class="col">'+
                          '            <div class="md-form">'+
                          '                <label for="">Address</label>'+
                          '            </div>'+
                          '        </div>'+
                          '        <div class="col">'+
                          '            <div class="md-form">'+
                          '                <input type="text" id="tittle_entry" class="form-control" value="'+response.address+'">'+
                          '            </div>'+
                          '        </div>'+
                          '    </div>'+
                          '</form>'
                     }).then((result) => {
                       if (result.value) {

                         //Open the purchase details
                         $("#tableHolder" ).removeClass( "col-lg-12 col-md-12 col-sm-12" )
                         .addClass( "col-lg-8 col-md-8 col-sm-8");

                         $("#to_hide").fadeIn(800,function () {
                            $("#Cname_entry").text(response.name);
                            $("#Cid_entry").text(response.id);
                            $("#Ccontact_entry").text(response.phone_no);
                            $("#Caddress_entry").text(response.address);


                             clearSales();
                            var selected =pig_id;
                            var price    =$("#"+selected+"_price").text();

                            var current_total=$("#total").text();
                            var sum_total=Number(current_total)+Number(price);

                            var btn="<button class='btn btn-danger btn-sm' type='button' name='button'  onclick='removeSale(\""+selected+"\")'>&times;</button>";

                            var tr="<tr id='sales_"+selected+"'>"+
                                      "<td>"+selected+"</td>"+
                                      "<td id='iprice_"+selected+"'>"+price+"</td>"+
                                      "<td>"+btn+"</td>";

                            $("#total_charges").before(tr);
                            $("#option_"+selected).remove();
                            $("#combobox").val("");
                            $("#total").text(sum_total);

                         });
                       }
                     })
                 }
                //if customer is not in database ask if he wants to be registered
                else if (!response.success) {
                  Swal.fire({
                    title:"Customer not registered.",
                    text : success,
                    showCancelButton: true
                  }).then((rvalue)=>{
                    if (rvalue.value){
                    Swal.fire({
                    title: "register Customer",
                    showConfirmButton:true,
                    showCancelButton:true,
                    background: '#ECEFF1',
                    confirmButtonText:'<i class="fa fa-thumbs-up"></i> Add Customer!',
                    animation: "slide-from-top",
                    html:  '<div class="">'+

                            '<!--Card content-->'+
                            '<div class="card-body px-lg-5 pt-0">'+

                            '  <!-- Form -->'+
                            '  <form class="text-center" style="color: #7acb75;">'+

                                '<!-- ID -->'+
                                '<div class="md-form">'+
                                '  <input type="email" id="C_ID" class="form-control" required>'+
                                '  <label for="C_ID">Customer ID</label>'+
                                '</div>'+

                                '<!-- First Name -->'+
                                '<div class="md-form">'+
                                '  <input type="text" id="C_fname" class="form-control"  required>'+
                                '  <label for="C_fname">first Name</label>'+
                                '</div>'+

                                '<!-- Second Name -->'+
                                '<div class="md-form">'+
                                '  <input type="text" id="C_sname" class="form-control" required>'+
                                '  <label for="C_sname">Second Name</label>'+
                                '</div>'+

                                '<!-- Second Name -->'+
                                '<div class="md-form">'+
                                '  <input type="text" id="C_address" class="form-control" required>'+
                                '  <label for="C_address"> Address </label>'+
                                '</div>'+

                                '<!-- Second Name -->'+
                                '<div class="md-form">'+
                                '  <input type="text" id="C_phone" class="form-control" required>'+
                                '  <label for="C_phone"> Number </label>'+
                                '</div>'+

                            '  </form>'+
                            '  <!-- Form -->'+

                          '  </div>'+

                        '  </div>'+
                        '  <!-- Material form login -->',
                        preConfirm:function() {

                          var invalid=false;
                              if ($("#C_ID")     .val().length <1 || $("#C_ID").val().length>10){
                                invalid=true; $("#C_ID")     .css({"border-bottom":"2px solid red","transition": "all 1s linear"}); }
                              if ($("#C_fname")  .val().length <1){ invalid=true; $("#C_fname")  .css({"border-bottom":"2px solid red","transition": "all 1s linear"}); }
                              if ($("#C_sname")  .val().length <1){ invalid=true; $("#C_sname")  .css({"border-bottom":"2px solid red","transition": "all 1s linear"}); }
                              if ($("#C_address").val().length <1){ invalid=true; $("#C_address").css({"border-bottom":"2px solid red","transition": "all 1s linear"}); }
                              if ($("#C_phone")  .val().length <1){ invalid=true; $("#C_phone")  .css({"border-bottom":"2px solid red","transition": "all 1s linear"}); }

                            if (invalid)
                            Swal.showValidationMessage(`Please key in all the values: `);

                        }
                    }).then((r2value)=> {
                        if (r2value.value) {
                          var id      =$("#C_ID").val();
                          var f_name  =$("#C_fname").val();
                          var s_name  =$("#C_sname").val();
                          var address =$("#C_address").val();
                          var phone   =$("#C_phone").val();


                          //Ajax request to add customer
                          $.ajax({
                              type: "POST",
                              url: "../../../Persons/Customer/Customer.php",
                              data: {c_id  : id, c_fname:f_name, c_sname: s_name, c_address: address, c_phone: phone},
                              dataType:'JSON',
                              success: function(response){
                                Swal.fire("Customer registered successfully");

                                //Open the purchase details
                                $("#tableHolder" ).removeClass( "col-lg-12 col-md-12 col-sm-12" )
                                .addClass( "col-lg-8 col-md-8 col-sm-8");

                                $("#to_hide").fadeIn(800,function () {
                                   $("#Cname_entry").text(f_name+"  "+s_name);
                                   $("#Cid_entry").text(id);
                                   $("#Ccontact_entry").text(phone);
                                   $("#Caddress_entry").text(address);


                                    clearSales();
                                   var selected =pig_id;
                                   var price    =$("#"+selected+"_price").text();

                                   var current_total=$("#total").text();
                                   var sum_total=Number(current_total)+Number(price);

                                   var btn="<button class='btn btn-danger btn-sm' type='button' name='button'  onclick='removeSale(\""+selected+"\")'>&times;</button>";

                                   var tr="<tr id='sales_"+selected+"'>"+
                                             "<td>"+selected+"</td>"+
                                             "<td id='iprice_"+selected+"'>"+price+"</td>"+
                                             "<td>"+btn+"</td>";

                                   $("#total_charges").before(tr);
                                   // $("#combo-options option").attr("value",pig_id).remove();
                                   $("#option_"+selected).remove();
                                   $("#combobox").val("");
                                   $("#total").text(sum_total);

                                });

                                //sell pig to the customer
                                // sell(pig_id,id);
                              },
                              error: function (response) {
                                Swal.fire("An error occured");
                              }
                          });

                        }
                    });

               }
                  })


                }
            },
            error: function(res) {
              Swal.fire("An error occured ")
            }
                });
      }
  });
}


function sell(pig_id,customer_id) {
  $.ajax({
      type: "GET",
      url: "../../../pigs/addpigOrRemovePig.php",
      data: {saleID  : pig_id, customer_id:customer_id},
      dataType:'JSON',
      success: function(response){
        Swal.fire("Sale successfully completed");
         $("#"+pig_id).fadeOut(400);
         $("#sales_"+pig_id).fadeOut(400);

      },
      error: function (response) {
        Swal.fire("An error occured ");
      }
  });
}






//add more pigs to same customer
function addMorePigs() {
  // alert();

    var val  = $("#combobox").val();
    var opts = $('#combo-options').children();
        for (var i = 0; i < opts.length; i++) {
          if (opts[i].value === val) {
            // An item was selected from the list!

            // Add this item to the purchase list
            var selected =opts[i].value;
            var price    =$("#"+selected+"_price").text();

            var current_total=$("#total").text();
            var sum_total=Number(current_total)+Number(price);

            var btn="<button class='btn btn-danger btn-sm' type='button' name='button'  onclick='removeSale(\""+selected+"\")'>&times;</button>";

            var tr="<tr id='sales_"+selected+"'>"+
                      "<td>"+selected+"</td>"+
                      "<td id='iprice_"+selected+"'>"+price+"</td>"+
                      "<td>"+btn+"</td>";

            $("#total_charges").before(tr);
            $("#combo-options option").eq(i).remove();
            $("#combobox").val("");
            $("#total").text(sum_total);
            break;
          }
        }
}



function removeSale(id_remove) {
  var option="<option value='"+id_remove+"' > "+id_remove+"</option>";

  var current_total=$("#total").text();
  var price    =$("#iprice_"+id_remove+"").text();

  var sum_total=Number(current_total)-Number(price);


  $("#combo-options").append(option);
  $("#sales_"+id_remove).remove();
  $("#total").text(sum_total);

}

function sellAllPigs() {

   var customer_id=$("#Cid_entry").text();
      $('#myTable2 td:first-child').each(function() {

        var pig_id=$(this).text();

        if (pig_id != "Total") {
          //call function to sell the pigs
          sell(pig_id,customer_id);
        }

    });
}


function clearSales() {
     $('#myTable2 td:first-child').each(function() {

       var pig_id=$(this).text();

       if (pig_id != "Total") {
         //call function to remove the pigs
         removeSale(pig_id);
       }

   });
}
