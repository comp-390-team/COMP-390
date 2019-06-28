var report_type="general";


var reportTitle =""
var subtitles   ="";
var analysis    ="";
var types       ="";
var imagenames1 ="";
var imagenames2 ="";

var separator="xunix "+Date.now() +" xinux"



 async function printReport() {

   reportTitle= $("#reportTitle").val();

   if (reportTitle.length>7) {

       if (await saveImages())
             savePDF()
      else
        alert("check  to ensure that all the subtittles are of a lenth more than 7 characters long");


   }else
     alert("Please enter a valid tittle: Tittle  length cannot be less than 7 characters long");


   reportTitle =""
   subtitles   ="";
   analysis    ="";
   types       ="";
   imagenames1 ="";
   imagenames2 ="";

}



 function savePDF() {
  $.ajax({
     type: "POST",
     url: "../../includes/Reports/pdfReport/pdf.php",
     dataType:'JSON',
     data: {
            title : reportTitle,
            author: $("#username").text(),
            subtitle:subtitles,
            analysis:analysis,
            type:types,
            screenShot1:imagenames1,
            screenShot2:imagenames2,
            separator  :separator
          },
     success: function(response){
       // Swal.fire("Report successfully generated");
        alert("success");

     },
     error: function (XMLHttpRequest, textStatus, errrThrown) {

       // Swal.fire("An error occured ");
       alert(" hhh"+XMLHttpRequest.responseText)
     }
 });

}






async function saveImages() {
   var  validSubtittle=true;

  panes.forEach(function(value) {

    var sub=$("#Subtitle"+value).val();
    validSubtittle=(sub.length > 7)?validSubtittle:false;

    subtitles    +=  sub + separator;
    analysis     +=  $("#analysis"+value).val()+separator;
    types        +=  $("#type"+value).text()+separator;
    imagenames1  +=  "parameter"+value+separator;
    imagenames2  +=  "data"+value+separator;


      screenShot("parameter"+value);
      screenShot("data"+value);
  });

  return validSubtittle;

}


  function screenShot(id){

  html2canvas(document.getElementById(id)).then(function(canvas) {
    // document.body.appendChild(canvas);

    //Get base 64
    var   base64Url=canvas.toDataURL('image/jpeg').replace('image/jpeg','image/octet-stream');

    $.ajax({
        type    : "POST",
        url     : "../../includes/Reports/images/upload.php",
        data    : {image: base64Url, name: id},
        dataType: 'JSON',
        success : function(response){ alert("success");},
    });

  });
}




function hideSaleInfo() {
  $("#report_date_sold").hide();
  $("#report_ammount_sold").hide();
  report_type="general";

}


function displaySaleInfo() {
  $("#report_date_sold").show();
  $("#report_ammount_sold").show();
  report_type="sales";

}


function closePane(paneNo) {
  $("#"+paneNo).remove();

  var index=panes.indexOf(Number(paneNo.replace(/pane/g,"")));

  panes.splice(index,1);

}

$("#reports").click(function(){paneNo=0;});



function generateReport() {

  var min_date_farrowed =$("#reports_f_from").val();
  var max_date_farrowed =$("#reports_f_to").val();
  var min_date_sold     =$("#reports_s_from").val();
  var max_date_sold     =$("#reports_s_to").val();
  var min_weight        =$("#reports_min_weight").val();
  var max_weight        =$("#reports_max_weight").val();
  var min_ammount       =$("#reports_min_ammount").val();
  var max_ammount       =$("#reports_max_ammount").val();

  var male              =$("#reports_sex_male").is(":checked");
  var female            =$("#reports_sex_female").is(":checked");

  var sex= (male && female)?"all":male ? "male": female ?"female" : "all";


  var breeds="";
     $('#myTable2 td:first-child').each(function() {

       var pig_id=$(this).text();
       breeds+=pig_id+",";
   });
   breeds=breeds.substring(0, breeds.length - 1);
   breeds=(breeds.length>0)?breeds:"all";

   min_weight= (min_weight == "" )?0:min_weight;
   max_weight= (max_weight == "")?0:max_weight;

   min_ammount= (min_ammount =="" )?0:min_ammount;
   max_ammount= (max_ammount =="" )?0:max_ammount;



  $.post("../../includes/Reports/generatedReport.php",
  {
    paneID: paneID++,
    min_date_farrowed:min_date_farrowed,
    max_date_farrowed:max_date_farrowed,
    min_date_sold:min_date_sold,
    max_date_sold:max_date_sold,
    min_weight:min_weight,
    max_weight:max_weight,
    min_ammount:min_ammount,
    max_ammount:max_ammount,
    breeds:breeds,
    sex:sex,
    type:report_type
  }
  ,function (data, status) {
        $("#reportArea").append(data);
        panes.push(paneID-1);

  });

  $("#reportGenerator").show();

}

function changePane(open, close) {
    if (open == "oldReport"){
    $("#"+open).slideDown(100).load("../../includes/Reports/previous_report.php");
    $("#"+close).slideUp(100);
  }else{
    $("#"+open).slideDown(100);
    $("#"+close).slideUp(100);
  }

}
