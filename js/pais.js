var dt;
function pais(){
    $(".box").on("click","button#nuevoPais", function(){
        $("#modal_editar").load("pais/nuevoPais.php");
    })

    $("#modal_editar").on("click","button#registrar", function(){
        var datos = $("#frmpais").serialize();
        $.ajax({
            type:"get",
            url:"../controlador/pais.php",
            data: datos,
            dataType:"json"
        }).done(function(resultado){
            if(resultado.respuesta){
                swall({
                    position: 'center',
                    type: 'success',
                    title: 'El paciente fue grabado con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
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

    $("#tabla").on("click","a#editarPais", function(){
        var codigo = $(this).data("codigo");
        $("#modal_editar").load("pais/editarPais.php");

        $.ajax({
            type: "get",
            url: "../controlador/pais.php",
            data: {codigo: codigo, accion: 'consultar'},
            dataType: "json"
        }).done(function(pais){
            if(pais.respuesta === "no existe"){
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'El pais con codigo '+codigo+' no existe en la base de datos'
                })
            } else {
                document.getElementById("id").innerHTML = pais.ID_pais;
                $("#id_pais").val(pais.ID_pais);
                $("#nom_pais").val(pais.Pais);
                $("#cap_pais").val(pais.Capital);
            }
        })
    })

    $("#modal_editar").on("click", "button#actualizar", function(){
        var datos = $("#frmpais").serialize();
        $.ajax({
            type: "get",
            url: "../controlador/pais.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado){
            if(resultado.respuesta){
                swal(
                    'Actualizado',
                    'Se actualizaron los datos correctamente',
                    'success'
                )
            } else {
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'Algo ha salido mal'
                })
            }
        })
    })

    $("#tabla").on("click", "a#borrarPais", function(){
        var codigo = $(this).data("codigo");

        swal({
            title: '¿Está seguro?',
            text: "¿Borrar el pais con codigo: " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Borrar!'
      }).then((decision) => {
              if (decision.value) {
                  var request = $.ajax({
                      method: "get",                  
                      url: "../controlador/pais.php",
                      data: {codigo: codigo, accion:'borrar'},
                      dataType: "json"
                  })
                  request.done(function( resultado ) {
                      if(resultado.respuesta == 'correcto'){
                          swal({
                            position: 'center',
                            type: 'success',
                            title: 'El pais con codigo ' + codigo + ' se ha borrado',
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
        "ajax": "../controlador/pais.php?accion=listar",
        "columns": [
            {"data": "id_pais"},
            {"data": "nom_pais"},
            {"data": "cap_pais"},
            {"data": "id_pais",
              render: function (data) {
                        return '<div class="btn-group">'+
                        '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Acciones <span class="fa fa-caret-down"></span></button>'+
                        '<ul class="dropdown-menu">'+
                            '<li><a href="#" data-codigo="'+data+'" id="editarPais" data-toggle="modal" data-target="#modal_editar"><i class="fa fa-edit"></i> Editar</a></li>'+
                            '<li><a href="#" data-codigo="'+data+'" id="borrarPais"><i class="fa fa-trash"></i> Borrar</a></li>'+
                        '</ul>'+
                        '</div>'
              }
            }
        ]
    })
    pais();
})