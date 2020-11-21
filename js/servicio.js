var dt;
function servicio(){
    $(".box").on("click","button#nuevoServicio", function(){
        $("#modal_editar").load("servicio/nuevoservicio.php");
    })

    $("#modal_editar").on("click","button#registrar", function(){
        var datos = $("#frmserv").serialize();
        $.ajax({
            type:"get",
            url:"../controlador/servicio.php",
            data: datos,
            dataType:"json"
        }).done(function(resultado){
            if(resultado.respuesta){
                swall({
                    position: 'center',
                    type: 'success',
                    title: 'El servicio fue grabado con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
                $("#modal_editar").modal('toggle');
                dt.ajax.reload();
            }else {
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

    $("#tabla").on("click", "a#borrarServ", function(){
        var codigo = $(this).data("codigo");

        swal({
            title: '¿Está seguro?',
            text: "¿Borrar el servicio con codigo: " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Borrar!'
      }).then((decision) => {
              if (decision.value) {
                  var request = $.ajax({
                      method: "get",                  
                      url: "../controlador/servicio.php",
                      data: {codigo: codigo, accion:'borrar'},
                      dataType: "json"
                  })
                  request.done(function( resultado ) {
                      if(resultado.respuesta == 'correcto'){
                          swal({
                            position: 'center',
                            type: 'success',
                            title: 'El servicio con codigo ' + codigo + ' se ha borrado',
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
    })

    $("#tabla").on("click","a#editarServ", function(){
        var codigo = $(this).data("codigo");
        $("#modal_editar").load("servicio/editarservicio.php");

        $.ajax({
            type:"get",
            url:"../controlador/servicio.php",
            data:{codigo: codigo, accion:"consultar"},
            dataType:"json"
        }).done(function(servicio){
            if(servicio.respuesta === "no existe"){
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'El servicio con codigo '+codigo+' no existe en la base de datos'
                })
            } else {
                console.log(servicio.Numero);
                console.log(servicio.Servicio);
                document.getElementById("id").innerHTML = servicio.Numero;
                $("#id_serv").val(servicio.Numero);
                $("#nom_serv").val(servicio.Servicio);
            }
        })
    })

    $("#modal_editar").on("click","button#actualizar", function(){
        var datos = $("#frmserv").serialize();
        $.ajax({
            type:"get",
            url:"../controlador/servicio.php",
            data: datos,
            dataType:"json"
        }).done(function(resultado){
            if(resultado.respuesta){
                swal(
                    'Actualizado',
                    'Se actualizaron los datos correctamente',
                    'success'
                )
                $("#modal_editar").modal('toggle');
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
        "ajax": "../controlador/servicio.php?accion=listar",
        "columns": [
            {"data": "Numero"},
            {"data": "Servicio"},
            {"data": "Numero",
              render: function (data) {
                        return '<div class="btn-group">'+
                        '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Acciones <span class="fa fa-caret-down"></span></button>'+
                        '<ul class="dropdown-menu">'+
                            '<li><a href="#" data-codigo="'+data+'" id="editarServ" data-toggle="modal" data-target="#modal_editar"><i class="fa fa-edit"></i> Editar</a></li>'+
                            '<li><a href="#" data-codigo="'+data+'" id="borrarServ"><i class="fa fa-trash"></i> Borrar</a></li>'+
                        '</ul>'+
                        '</div>'
              }
            }
        ]
    })
    servicio();
})