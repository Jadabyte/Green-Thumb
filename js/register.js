/*if(window.innerWidth > 500){
    window.location = "landing.php";
}*/
$(document).ready(function(){
    let toggledConfirm = 0
    let toggled = 0
    let form = $("#form");
    $("#Password").on("input", function(e){
        if(toggledConfirm === 0 && toggled === 1){
            $(".confirm").slideToggle();
            toggledConfirm = 1;
        }
    });

    $(document).on('click',function(e){
        if(e.target.id == "register"){
            $("#title").html("Create ");
            $("#title").append($('<strong></strong>').addClass("accent title").html("an account."));
            
            $("#subHead").slideToggle();
            $(".firstname").slideToggle();
            $(".lastname").slideToggle();
            $("#forgot").slideToggle();

            $("#switchText").html("If you already have an account, ");
            $("#switchText").append($('<a></a>').attr('id', 'login').attr('href', '').html("log in here."));

            $("header").animate({'margin-bottom': '30px'});
            $("header").data("state", 1);

            toggled = 1;
        }

        else if(e.target.id == "login"){
            $("#title").html("Welcome ");
            $("#title").append($('<strong></strong>').addClass("accent title").html("back."));
            
            $("#subHead").slideToggle();
            $(".firstname").slideToggle();
            $(".lastname").slideToggle();
            $("#forgot").slideToggle();

            $("#switchText").html("If you don't have an account yet, ");
            $("#switchText").append($('<a></a>').attr('id', 'register').attr('href', '').html("sign up here."));
            
            if(toggledConfirm === 1){
                $(".confirm").slideToggle();
            }

            $("header").animate({'margin-bottom': '75px'});
            $("header").data("state", 1);

            toggled = 0;
        }
        else if(e.target.id == "submit"){
            form.submit();
            window.location = "index.php";
        }
        e.preventDefault();
    });
});