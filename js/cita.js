var dt, id_espec, id_func;
function cita(){
    $("#id_espec").change(function(){
        id_espec = $("#id_espec").val();
        $.ajax({
            type: "get",
            url: "../controlador/medico.php",
            data: {codigo: id_espec, accion: 'consultarE'},
            dataType: "json"
        }).done(function(resultado){
            $("#id_func option").remove();
            console.log(resultado.data);
            $.each(resultado.data, function(){
            })
        })
    })


}

$(document).ready(() => {
    dt = $("#tabla").dataTable({
        "ajax": "../controlador/cita.php?accion=listar",
        "columns": [
            {"data": "Paciente"},
            {"data": "Medico"},
            {"data": "Tipo_cita"},
            {"data": "Fecha"},
            {"data": "Hora"},
            {"data": "Sede"}            
        ]
    });

    //Llena el combobox de las especialidades
    $.ajax({
        type: "get",
        url: "../controlador/especialidad.php",
        data: {accion:'listar'},
        dataType: "json"
    }).done(function(resultado){
        $("#id_espec option").remove();
        console.log(resultado.data);
        $.each(resultado.data, function (index, value){
            $("#id_espec").append("<option selected value='"+value.Codigo+"'>"+value.Especialidad+"</option>");
            id_espec = value.Codigo;
        })
        console.log(id_espec);
    })
    cita();
})