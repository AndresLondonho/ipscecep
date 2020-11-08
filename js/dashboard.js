
function dashboard(){
    $(".sidebar-menu a").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        $.post( url, {url:url},function(data) {
            if(url!="#")
                $("#contenido" ).html(data);
    });
    })
}

$(document).ready(() => {


    dashboard();
})