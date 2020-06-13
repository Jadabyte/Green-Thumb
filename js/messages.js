window.onload=function () {
    var messages = $(main);
    messages.scrollTop = messages.scrollHeight;
}
$(document).ready(function(){
    $("#msgSend").on("click", function(e){
        console.log("send");
        $("#msgForm").submit();
    });
});