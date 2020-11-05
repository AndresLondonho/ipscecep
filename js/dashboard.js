
function dashboard(){
    $("#sidebar a").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        $.post(url, function(resultado){
            if(url!="#")
            $("#contenidoDash").removeClass("hide");
            $("#contenidoDash").addClass("show");
            $("#contenidoDash").html(resultado);
        })
    })
}

$(document).ready(() => {


    dashboard();
})