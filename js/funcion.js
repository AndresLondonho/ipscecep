function operaciones(){
    $("#menu").on("click", "a#btnlogin", function(){
        $("#login").load("php/vista/login.php");
        $("#login").removeClass("hide");
        $("#login").addClass("show");
    })

    $("#login").on("click", "a#cerrar", function(){
        $("#login").removeClass("show");
        $("#login").addClass("hide");
    })
}

$(document).ready(() => {
    $("#login").addClass("hide");
    operaciones();
})