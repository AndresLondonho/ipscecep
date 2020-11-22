var dt, id_espec, id_func;
function cita(){
    $(".box").on("keypress","input#id_sede",function(){
        var cedula = document.getElementById("id_pac").value;
        $("#nom_pac").val(cedula);
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