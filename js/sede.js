var dt;
function sede(){

    $(".box").on("click","button#nuevaS", function(){
        $("#modal_editar").load("sede/nuevaSede.php");

        $.ajax({
            type: "get",
            url: "../controlador/ciudad.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            $("#id_ciu option").remove();
            $.each(resultado.data, function(index, value){
                $("#id_ciu").append("<option value='"+value.Codigo+"'>"+value.Ciudad+"</option>")
            })
        })

        $.ajax({
            type: "get",
            url: "../controlador/medico.php",
            data: {accion:'listarM'},
            dataType: "json"
        }).done(function(resultado){
            $("#id_rol option").remove();
            $.each(resultado.data, function(index, value){
                $("#id_rol").append("<option value='"+value.Funcionario+"'>"+value.Medico+"</option>")
            })
        })
    })

    $("#modal_editar").on("click","button#registrar", function(){
        var datos = $("#frmsede").serialize();
        $.ajax({
            type: "get",
            url: "../controlador/sede.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado){
            if(resultado.respuesta){
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'La sede fue grabada con éxito',
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

    $("#tabla").on("click","a#borrarS",function(){
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");
        console.log(codigo);
        swal({
              title: '¿Está seguro?',
              text: "¿Borrar la sede con codigo: " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Borrar!'
        }).then((decision) => {
                if (decision.value) {
                    var request = $.ajax({
                        method: "get",                  
                        url: "../controlador/sede.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })
                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal({
                              position: 'center',
                              type: 'success',
                              title: 'La sede con codigo ' + codigo + ' se ha borrado',
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

    $("#tabla").on("click","a#editarS", function(){
        var codigo = $(this).data("codigo");
        var ciudad, director;
        $("#modal_editar").load("sede/editarSede.php");

        $.ajax({
            type: "get",
            url: "../controlador/sede.php",
            data: {codigo: codigo, accion: 'consultar'},
            dataType: "json"
        }).done(function(sede){
            if (sede.respuesta === "no existe"){
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'La sede con codigo '+codigo+' no existe en la base de datos'
                })
            } else {
                document.getElementById("id").innerHTML = sede.Codigo;
                $("#id_sede").val(sede.Codigo);
                $("#nom_sede").val(sede.Sede);
                $("#tel_sede").val(sede.Telefono);
                $("#dir_sede").val(sede.Direccion);
                ciudad = sede.id_ciu;
                director = sede.id_rol;
                console.log(ciudad);
                console.log(director);
            }
        });

        $.ajax({
            type: "get",
            url: "../controlador/ciudad.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            $("#id_ciu option").remove();
            $.each(resultado.data, function(index, value){
                if(ciudad === value.Codigo){
                    $("#id_ciu").append("<option selected value='" + value.Codigo + "'>" + value.Ciudad + "</option>")
                } else {
                    $("#id_ciu").append("<option value='"+value.Codigo+"'>"+value.Ciudad+"</option>");
                }
            })
        })

        $.ajax({
            type: "get",
            url: "../controlador/medico.php",
            data: {accion:'listarM'},
            dataType: "json"
        }).done(function(resultado){
            $("#id_rol option").remove();
            $.each(resultado.data, function(index, value){
                if(director === value.Funcionario){
                    $("#id_rol").append("<option selected value='" + value.Funcionario + "'>" + value.Medico + "</option>")
                } else {
                    $("#id_rol").append("<option value='"+value.Funcionario+"'>"+value.Medico+"</option>");
                }
            })
        })
    })

    $("#modal_editar").on("click","button#actualizar", function(){
        var datos = $("#frmsede").serialize();
        $.ajax({
            type: "get",
            url: "../controlador/sede.php",
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
            }
        })
    })
}
$(document).ready(() => {
    dt = $("#tabla").DataTable({
        "ajax": "../controlador/sede.php?accion=listar",
        "columns": [
            {"data": "Sede"},
            {"data": "Direccion"},
            {"data": "Telefono"},
            {"data": "Ciudad"},
            {"data": "Director"},
            {"data": "Codigo",
              render: function (data) {
                        return '<div class="btn-group">'+
                        '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Acciones <span class="fa fa-caret-down"></span></button>'+
                        '<ul class="dropdown-menu">'+
                            '<li><a href="#" data-codigo="'+data+'" id="editarS" data-toggle="modal" data-target="#modal_editar"><i class="fa fa-edit"></i> Editar</a></li>'+
                            '<li><a href="#" data-codigo="'+data+'" id="borrarS"><i class="fa fa-trash"></i> Borrar</a></li>'+
                        '</ul>'+
                        '</div>'
              }
          }
        ]
    });
    sede();
})