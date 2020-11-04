var dt;

function medico(){

    //Funciones de la vista principal del medico
    $("#detalle").on("click", "a#cerrar", function(){
        $("#detalle").removeClass("show");
        $("#detalle").addClass("hide");
    })

    $("#lista").on("click", "a#vcard", function(){
        var codigo = $(this).data('codigo');
        console.log(codigo);

        $("#contenidoDash").load("medico/infoMedico.php");
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
                document.getElementById("img_med").innerHTML = '<img src="../../imgs/'+medico.imagen+'">';
                document.getElementById("nom_med").innerHTML = medico.medico;
                document.getElementById("espec").innerHTML = medico.especialidad;
                document.getElementById("ced_med").innerHTML = medico.cedula;
                document.getElementById("tel_med").innerHTML = medico.telefono;
                document.getElementById("sede").innerHTML = medico.sede;
                document.getElementById("editarmed").innerHTML = '<a href="#" data-codigo="'+medico.cedula+' " title="Editar" id="editar"><img src="../../imgs/editar.png" alt=""></i></a>';
            }
        })

    })
    


    //Funciones de la vista de la información del medico

    $("#contenidoDash").on("click", "a#editar", function(){
        var codigo = $(this).data('codigo');
        console.log(codigo);
        $("#contenidoDash").load("medico/editarMedico.php")

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
                document.getElementById("cc_med").innerHTML = medico.cedula;
                $("#nom_med").val(medico.nombre);
                $("#ape_med").val(medico.apellido);
                $("#tel_med").val(medico.telefono);
                $("#espec_med").val(medico.especialidad);

            }
        })
    })


    $("#contenidoDash").on("click", "button#actualizar", function(){
        var datos = $("#frmmedico").serialize();
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
                '<td><img class="rounded-circle" style="width:40px;" src="../../imgs/'+js.data[i].Imagen+'" alt="activity-user"></td>'+
                '<td>'+
                    '<a class="mb-1" data-codigo="'+js.data[i].Cedula+'" href="#" id="vcard">'+js.data[i].Medico+'</a>'+
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