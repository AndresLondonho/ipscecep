
function dashboard(){
    $(".sidebar-menu a").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        $.post( url, {url:url},function(data) {
            if(url!="#")
                $("#contenido").html(data);
                document.getElementById("seccion_activa").innerHTML = $("#modulo").val();
    });
    })
}

$(document).ready(() => {
    $("#contenido").load("home.php");

    dashboard();
})