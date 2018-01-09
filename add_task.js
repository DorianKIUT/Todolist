
function addTask() {
    var http = new XMLHttpRequest();  
    var url = "index.php" ;
    http.open("POST", url, false);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Call a function when the state changes.
    var params=encodeURIComponent(document.getElementById("tache").value)
    http.send('params=' + params + "&ajouter");
    window.location.reload();

}

function delTask(element) {
    var http = new XMLHttpRequest();  
    var url = "index.php" ;
    http.open("POST", url, false);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Call a function when the state changes.
    var params=encodeURIComponent(element.id)
    http.send('id=' + params);
    window.location.reload();

}
