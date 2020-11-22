function operaciones(){
    $("#menu").on("click", "a#btnlogin", function(){
        $("#modal_login").load("php/vista/login.php");
    })
}

$(document).ready(() => {
    $("#login").addClass("hide");
    operaciones();
})