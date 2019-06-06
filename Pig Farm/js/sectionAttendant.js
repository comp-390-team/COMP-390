
//load the file to display accepted pigs
function viewAccepted() {
$("#production").load("loadfiles/pigSell/sell.php");
}

function viewRejectedSale() {
$("#production").load("loadfiles/pigSell/rejected.php");
}

function openSellPane() {
    alert("hello")
}

function removeFromRejects(id) {
    alert(id);
}
