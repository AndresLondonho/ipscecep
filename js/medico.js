var dt;

function medico(){

    $("#detalle").on("click", "a#cerrar", function(){
        $("#detalle").removeClass("show");
        $("#detalle").addClass("hide");
    })


    $("#lista").on("click", "a#editar", function(){
        var codigo = $(this).data('codigo');
        console.log(codigo);

        $("#detalle").load("infoMedico.php");
        $("#detalle").addClass("show");

        $.ajax({
            type: "get",
            url: "../controlador/medico.php",
            data: {codigo: codigo, accion: 'consultar'},
            dataType: "json"
        }).done(function (medico){
            if (medico.respuesta === "no existe"){
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'El medico con cedula '+codigo+' no existe en la base de datos'
                })
            } else {
                document.getElementById("nom_med").innerHTML = medico.medico;
                document.getElementById("espec").innerHTML = medico.especialidad;
                document.getElementById("ced_med").innerHTML = medico.cedula;
                document.getElementById("tel_med").innerHTML = medico.telefono;
                document.getElementById("sede").innerHTML = medico.sede;
            }
        })
    })
    
    

}

$(document).ready(() => {


    $.ajax({
        url : '../controlador/medico.php?accion=listar',
        type : 'GET',
        success : function(res){
            var js = JSON.parse(res);
            console.log(js);

            for (var i = 0; i < js.data.length; i++){
                console.log("registros: "+js.data.length);
                dt+= 
                '<tr class="unread">'+
                '<td><img class="rounded-circle" style="width:40px;" src="https://i.pinimg.com/236x/4d/99/80/4d9980910c0fed8d590c6cb896f8f862.jpg" alt="activity-user"></td>'+
                '<td>'+
                    '<a class="mb-1" data-codigo="'+js.data[i].Cedula+'" href="#" id="editar">'+js.data[i].Medico+'</a>'+
                    '<p class="m-0">'+js.data[i].Especialidad+'</p>'+
                '</td>'+
                '<td><a href="#!" class="label theme-bg2 text-white f-12">Historial</a></td>'+
                '<td><a href="#!" class="label theme-bg text-white f-12">Citas Proximas</a></td>'+
            '</tr>';
            }
            $('#tbody').html(dt);
        }

    })


    

medico();
});