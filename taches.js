
function addTask() {
    var http = new XMLHttpRequest();  
    var url = "addTask.php" ;
    http.open("POST", url, false);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var params=encodeURIComponent(document.getElementById("tache").value)
    http.send('params=' + params + "&ajouter");
    window.location.reload();

}


function delTask(element) {
    var http = new XMLHttpRequest();  
    var url = "delTask.php" ;
    http.open("POST", url, false);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var params=encodeURIComponent(element.id)
    http.send('id=' + params);
    window.location.reload();

}
