$(document).ready(function(){
    $(".plant").on("click", function(e){
        let target = e.target;
        let name = $(target).data("name");
        window.location = ".php";
    });
});