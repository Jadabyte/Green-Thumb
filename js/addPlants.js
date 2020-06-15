$(document).ready(function(){
    $("#submit").on("click", function(){
        console.log("clicked");
        window.location.href = "/green-thumb/index.php";
    });

    /*
    $(".plant").on("click", function(e){
        let plantId = e.target;
        clicked = $(this).data("clicked");
        if(clicked == 0){
            plantId.style.border = "5px solid #7BBEEA";
            console.log(plantId);
            clicked = 1;
        }
        else{
            plantId.style.border = "none";
            clicked = 0;
        }
        
        console.log(plantId);
    });*/
});