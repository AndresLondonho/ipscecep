var dt,stock;
function medicamento(){
   $(".box").on("click","button#nuevoMedcto", function(){
       $("#modal_editar").load("medicamento/nuevomedicamento.php");
   })

   $("#modal_editar").on("click","button#registrar", function(){
        var datos = $("#frmmedcto").serialize();
        $.ajax({
            type:"get",
            url:"../controlador/medicamento.php",
            data: datos,
            dataType:"json"
        }).done(function(resultado){
            if(resultado.respuesta){
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'El medicamento fue grabado con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
                $('#modal_editar').modal('toggle');
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

   $("#tabla").on("click","a#editarMedcto", function(){
        var codigo = $(this).data("codigo");
        $("#modal_editar").load("medicamento/editarmedicamento.php");

        $.ajax({
            type:"get",
            url:"../controlador/medicamento.php",
            data: {codigo: codigo, accion: 'consultar'},
            dataType:"json"
        }).done(function(medicamento){
            if(medicamento.respuesta === "no existe"){
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'El pais con codigo '+codigo+' no existe en la base de datos'
                })
            } else {
                document.getElementById("id").innerHTML = medicamento.ID_medcto;
                $("#id_medcto").val(medicamento.ID_medcto);
                document.getElementById("nombre").innerHTML = medicamento.nombre;
                document.getElementById("stockA").innerHTML = medicamento.stock;
                stock = medicamento.stock;
            }
        })
   })

   $("#modal_editar").on("click","button#actualizar", function(){
    stock = parseInt(stock) + parseInt($("#stocknuevo").val());
    $("#stock").val(stock);
    var datos = $("#frmmedcto").serialize();
    $.ajax({
        type:"get",
        url:"../controlador/medicamento.php",
        data: datos,
        dataType:"json"
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

   $("#tabla").on("click","a#borrarMedcto",function(){
    var codigo = $(this).data("codigo");

    swal({
        title: '¿Está seguro?',
        text: "¿Borrar el medicamento con codigo: " + codigo + " ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Borrar!'
    }).then((decision) => {
          if (decision.value) {
              var request = $.ajax({
                  method: "get",                  
                  url: "../controlador/medicamento.php",
                  data: {codigo: codigo, accion:'borrar'},
                  dataType: "json"
              })
              request.done(function( resultado ) {
                  if(resultado.respuesta == 'correcto'){
                      swal({
                        position: 'center',
                        type: 'success',
                        title: 'El medicamento con codigo ' + codigo + ' se ha borrado',
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


}

$(document).ready(() => {
    dt = $("#tabla").DataTable({
        "ajax": "../controlador/medicamento.php?accion=listar",
        "columns": [
            {"data": "id_medcto"},
            {"data": "nom_medcto"},
            {"data": "stock"},
            {"data": "id_medcto",
            render: function (data){
                return '<div class="btn-group">'+
                        '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Acciones <span class="fa fa-caret-down"></span></button>'+
                        '<ul class="dropdown-menu">'+
                            '<li><a href="#" data-codigo="'+data+'" id="editarMedcto" data-toggle="modal" data-target="#modal_editar"><i class="fa fa-edit"></i> Editar</a></li>'+
                            '<li><a href="#" data-codigo="'+data+'" id="borrarMedcto"><i class="fa fa-trash"></i> Borrar</a></li>'+
                        '</ul>'+
                        '</div>'
            }
            }
        ]
    })
    medicamento();
})