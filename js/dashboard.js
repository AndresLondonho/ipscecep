
function dashboard(){
    $("#sidebar a").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        $.post( url, {url:url},function(data) {
            if(url!="#")
                $("#contenidoDash" ).html(data);
    });
    })
}

$(document).ready(() => {


    dashboard();
})