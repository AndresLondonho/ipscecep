
function dashboard(){
    $(".sidebar").on("click","a#gestionM",function(){
        $("#listar").load("medico/medico.php");
    })

}

$(document).ready(() => {


    dashboard();
})