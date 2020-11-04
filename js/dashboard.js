
function dashboard(){
    $(".sidebar").on("click","a#gestionM",function(){
        $("#contenidoDash").load("medico/medico.php");
    })

}

$(document).ready(() => {


    dashboard();
})