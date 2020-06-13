$(document).ready(function(){
    $("#msgSend").on("click", function(e){
        console.log("send");
        $("#msgForm").submit();
    });
});