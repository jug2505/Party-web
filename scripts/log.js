$(document).ready(function(){
    var path = window.location.pathname;
    if(path == '/'){
      var page = "index.php";
    } else {
      var page = path.split("/").pop();
    }
    var formData = new FormData();
    formData.append('page', page);
    fetch('database/log.php', {
        method: 'POST',
        body: formData
    })
});