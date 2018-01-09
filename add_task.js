//function ajaxRequest(){
   // var activexmodes=["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"] //activeX versions to check for in IE
    //if (window.ActiveXObject){ //Test for support for ActiveXObject in IE first (as XMLHttpRequest in IE7 is broken)
     //for (var i=0; i<activexmodes.length; i++){
      //try{
      // return new ActiveXObject(activexmodes[i])
      //}
     //// catch(e){
       //suppress error
     // }
     //}
    //}
   // else if (window.XMLHttpRequest) // if Mozilla, Safari etc
   //  return new XMLHttpRequest()
   // else
   //  return false
  // }
   
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
    //mypostrequest.onreadystatechange=function(){
            //if (mypostrequest.readyState==4){
                //if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
                    //document.getElementById("result").innerHTML=mypostrequest.responseText
                //}
                //else{
                    //alert("An error has occured making the request")
                //}
            //}
        //}
        
        //var parameters="value="+libTache+"&val="+str
        //mypostrequest.open("POST", "index.php", true)
        //mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        //mypostrequest.send(parameters)
    


//}
//function dellTask(){
    //alert("dell");
    //var xhr_object = new XMLHttpRequest(); 
    //xhr_object.open("POST", "index2.php", true);
//}
