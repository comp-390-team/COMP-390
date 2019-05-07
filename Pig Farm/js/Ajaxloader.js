///Secion atendant files manupilation

$(document).ready(function(){
  $("#add_pig").click(function(){
    $("#production").load("loadfiles/addpig.php");
  });
});


$(document).ready(function(){
  $("#update_records").click(function(){
    $("#production").load("loadfiles/table.html");
  });
});



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


     //Table sorter . Used in sorting the table according to the user clicks
     $(function(){$(".table").tablesorter();});
  // Table sorter.


  function loadTable(str,from,to) {
    if (str == "" || from=="" || to=="") {
        document.getElementById("table").innerHTML = "";
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
                document.getElementById("table").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","loadfiles/loadTable.php?q="+str+"&from="+from+"&to="+to,true);
        xmlhttp.send();
    }
}

function H() {
  alert('I was clicked');
}
