$(document).ready(function(){
    $(".claim").on("click", function(e){
        let claimBtn = e.target;
        clicked = $(this).data("claim");

        if(clicked == 0){
            claimBtn.style.background = "#FD9872";
            claimBtn.style.border = "#FD9872";
            claimBtn.setAttribute("data-claim", "1");
            claimBtn.innerHTML = "Claimed!";
        }
        else{
            claimBtn.style.background = "#7BBEEA";
            claimBtn.style.border = "#7BBEEA";
            claimBtn.setAttribute("data-claim", "0");
        }
        e.preventDefault();
    });
});