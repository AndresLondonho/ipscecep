function operaciones(){
    $("#menu").on("click", "a#btnlogin", function(){
        $("#login").load("php/vista/login.php");
        $("#login").removeClass("hide");
        $("#login").addClass("show");
    })
}

$(document).ready(() => {
    $("#login").addClass("hide");
    operaciones();
})