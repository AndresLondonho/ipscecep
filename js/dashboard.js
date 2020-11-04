
function dashboard(){
    $(".sidebar").on("click","a#gestionM",function(){
        $("#listar").load("medico/medico.php");
        $("#listar").removeClass("hide");
        $("#listar").addClass("show");
        $("#contenidoDash").removeClass("show");
        $("#contenidoDash").addClass("hide");
    })

}

$(document).ready(() => {


    dashboard();
})