var dt;
function medicos(){

    $("#tabla").on("click","a#editarM", function(){
        var codigo = $(this).data("codigo");
        var especialidad,sede;
        console.log(codigo);
        $("#modal_editar").load("medico/editarMedico.php"); 
        
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
                document.getElementById("ced").innerHTML = medico.cedula;
                $("#cc_user").val(medico.cedula);
                $("#nom_user").val(medico.nom_user);
                $("#ape_user").val(medico.ape_user);
                $("#nom2_user").val(medico.nom2_user);
                $("#ape2_user").val(medico.ape2_user);
                $("#tel_user").val(medico.tel_user);
                $("#email_user").val(medico.email_user);
                especialidad = medico.especialidad;
                sede = medico.sede;
                console.log(especialidad);
                console.log(sede);

            }
        });
        $.ajax({
            type:"get",
            url:"../controlador/especialidad.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            $("#espec option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
                if(especialidad === value.Codigo){
                    $("#espec").append("<option selected value='" + value.Codigo + "'>" + value.Especialidad + "</option>")
                } else {
                    $("#espec").append("<option value='"+value.Codigo+"'>"+value.Especialidad+"</option>");
                }
            })
        })

        $.ajax({
            type:"get",
            url:"../controlador/sede.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            $("#sede option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
                if(sede === value.Codigo){
                    $("#sede").append("<option selected value='" + value.Codigo + "'>" + value.Sede + "</option>")
                } else {
                    $("#sede").append("<option value='"+value.Codigo+"'>"+value.Sede+"</option>");
                }
            })
        })
    })

    $("#modal_editar").on("click","button#actualizar",function(){
        var datos = $("#frmmedico").serialize();
        $.ajax({
            type: "get",
            url: "../controlador/medico.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado){
            if(resultado.respuesta){
                swal(
                    'Actualizado',
                    'Se actualizaron los datos correctamente',
                    'success'
                )
                $('#modal_editar').modal('toggle');
                dt.ajax.reload();
            } else {
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'Algo ha salido mal'
                })
                $('#modal_editar').modal('toggle');
                dt.ajax.reload();
            }
        })
    })

    $(".box").on("click","button#nuevoM", function(){
        $("#modal_editar").load("medico/nuevoMedico.php");
        
        $.ajax({
            type:"get",
            url:"../controlador/especialidad.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            //$("#espec option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
            $("#espec").append("<option value='"+value.Codigo+"'>"+value.Especialidad+"</option>");
            })
        })

        $.ajax({
            type:"get",
            url:"../controlador/sede.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            //$("#sede option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
            $("#sede").append("<option value='" + value.Codigo + "'>" + value.Sede + "</option>");
            })
        })
    })

    $("#modal_editar").on("click","button#registrar",function(){
        var nombre = $("#nom_user").val();
        var apellido = $("#ape_user").val();
        var user = nombre.substr(0, 1)+apellido;
        var pass = $("#cc_user").val();

        $("#func").val(pass);
        $("#username").val(user.toLowerCase());
        $("#password").val(pass);
        console.log("Que si hpta, el codigo es "+$("#func").val());
        console.log("Que si hpta, la sapa contraseña es "+$("#password").val()+" que deberia ser la misma fucking contraseña de mierdaaaaaaaaaa");
        var datos = $("#frmmedico").serialize();
        $.ajax({
            type:"get",
            url:"../controlador/medico.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
            if(resultado.respuesta){
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'El medico con cedula '+pass+' fue grabado con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
                $('#modal_editar').modal('toggle');
                dt.ajax.reload();
            } else {
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Ocurrió un erro al grabar',
                    showConfirmButton: false,
                    timer: 1500
                });
               
            }
        })
    })

    $("#tabla").on("click","a#borrarM",function(){
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");
        console.log(codigo);
        swal({
              title: '¿Está seguro?',
              text: "¿Borrar el medico con cedula: " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Borrar!'
        }).then((decision) => {
                if (decision.value) {
                    var request = $.ajax({
                        method: "get",                  
                        url: "../controlador/medico.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })
                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal({
                              position: 'center',
                              type: 'success',
                              title: 'El medico con cedula ' + codigo + ' se ha borrado',
                              showConfirmButton: false,
                              timer: 1500
                            })       
                            var info = dt.page.info();   
                            if((info.end-1) == info.length)
                                dt.page( info.page-1 ).draw( 'page' );
                            dt.ajax.reload(null, false);
                            
                        } else {
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Something went wrong!'                         
                            })
                        }
                    });
                     
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!' + textStatus                          
                        })
                    });
                }
        })
    });
}

$(document).ready(() => {
    dt = $("#tabla").DataTable({
        "ajax": "../controlador/medico.php?accion=listar",
        "columns": [
            { "data": "Cedula"} ,
            { "data": "Medico" },
            { "data": "Especialidad" },
            { "data": "Telefono" },
            { "data": "Email" },
            { "data": "Sede" },
            { "data": "Usuario" },
          { "data": "Cedula",
              render: function (data) {
                        return '<div class="btn-group pull-right ">'+
                        '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Acciones <span class="fa fa-caret-down"></span></button>'+
                        '<ul class="dropdown-menu">'+
                            '<li><a href="#" data-codigo="'+data+'" id="editarM" data-toggle="modal" data-target="#modal_editar"><i class="fa fa-edit"></i> Editar</a></li>'+
                            '<li><a href="#" data-codigo="'+data+'" id="borrarM"><i class="fa fa-trash"></i> Borrar</a></li>'+
                        '</ul>'+
                        '</div>'
              }
          }
        ]
});

medicos();

})