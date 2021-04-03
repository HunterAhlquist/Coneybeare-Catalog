document.getElementById("approve").onclick = approveListing;
document.getElementById("reject").onclick = rejectListing;
$(document).ajaxStop(function(){
    window.location = "admin";
});

function approveListing() {
    $.ajax({
        url: "include/edit.php",
        type: "POST",
        dataType:'json',
        data: {approve: true}
    })
}
function rejectListing() {
    $.ajax({
        url: "include/edit.php",
        type: "POST",
        dataType:'json',
        data: {approve: false}
    })
}