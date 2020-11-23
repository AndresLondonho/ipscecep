var dt, id_espec, id_func;
function cita(){
    document.getElementById("id_espec").onchange = function(){
        var espec = $("#id_espec").val();
        console.log(espec);

        $.ajax({
            type:"get",
            url:"../controlador/medico.php",
            data: {espec:espec, accion:'medicoEsp'},
            dataType:"json"
        }).done(function(resultado){
            console.log(resultado.id_func);
            $("#id_func option").remove();
            $.each(resultado.data, function(index, value){
                console.log(value.id_espec);
                if(espec === resultado.id_espec){
                    $("#id_func").append("<option selected value='" + value.id_func + "'>" + value.medico + "</option>")
                } else {
                    $("#id_func").append("<option value='"+value.id_func+"'>"+value.medico+"</option>");
                }
                //$("#id_func").append("<option value='"+value.id_func+"'>"+value.medico+"</option>")
            })
        })
        $("#id_func").prop('disabled', false);
    }
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
        //$("#id_espec option").remove();
        console.log(resultado.data);
        $.each(resultado.data, function (index, value){
            $("#id_espec").append("<option value='"+value.Codigo+"'>"+value.Especialidad+"</option>");
        })
    })
    cita();
})