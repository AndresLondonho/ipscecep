var dt;
function ciudades(){

    $("#tabla").on("click","a#editarC", function(){
        var codigo = $(this).data("codigo");
        var Pais;
        console.log(codigo);
        $("#modal_editar").load("ciudad/editarCiudad.php"); 
        
        $.ajax({
            type: "get",
            url: "../controlador/ciudad.php",
            data: {codigo: codigo, accion: 'consultar'},
            dataType: "json"
        }).done(function (ciudad){
            if (ciudad.respuesta === "no existe"){
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'La ciudad con numero de ciudad '+codigo+' no existe en la base de datos'
                })
            } else {
                document.getElementById("num").innerHTML = ciudad.Codigo;
                $("#id_ciu").val(ciudad.Codigo);
                $("#nom_ciu").val(ciudad.nom_ciu);
                Pais = ciudad.Pais;
                console.log(Pais);

            }
        });
        $.ajax({
            type:"get",
            url:"../controlador/pais.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            $("#id_pais option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
                if(Pais === value.Codigo){
                    $("#id_pais").append("<option selected value='" + value.Codigo + "'>" + value.Pais + "</option>")
                } else {
                    $("#id_pais").append("<option value='"+value.Codigo+"'>"+value.Pais+"</option>");
                }
            })
        })
    })

    $("#modal_editar").on("click","button#actualizar",function(){
        var datos = $("#frmciudad").serialize();
       $.ajax({
           type: "get",
           url: "../controlador/ciudad.php",
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
   
    $(".box").on("click","button#nuevoC", function(){
        $("#modal_editar").load("ciudad/nuevaCiudad.php");
        
        $.ajax({
            type:"get",
            url:"../controlador/ciudad.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            $("#id_pais option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
            $("#id_pais").append("<option value='"+value.Codigo+"'>"+value.Pais+"</option>");
            })
        })
    })

    $("#modal_editar").on("click","button#registrar",function(){
        var datos = $("#frmciudad").serialize();
        $.ajax({
            type:"get",
            url:"../controlador/ciudad.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
            if(resultado.respuesta){
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'La ciudad fue grabada con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
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

    $("#tabla").on("click","a#borrarC",function(){
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");
        console.log(codigo);
        swal({
              title: '¿Está seguro?',
              text: "¿Borrar la ciudad numero: " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Borrar!'
        }).then((decision) => {
                if (decision.value) {
                    var request = $.ajax({
                        method: "get",                  
                        url: "../controlador/ciudad.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })
                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal({
                              position: 'center',
                              type: 'success',
                              title: 'La ciudad numero ' + codigo + ' se ha borrado',
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
        "ajax": "../controlador/ciudad.php?accion=listar",
        "columns": [
            { "data": "Ciudad"} ,
            { "data": "Pais" },
            { "data": "Ciudad",
              render: function (data) {
                        return '<div class="btn-group pull-right ">'+
                        '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Acciones <span class="fa fa-caret-down"></span></button>'+
                        '<ul class="dropdown-menu">'+
                            '<li><a href="#" data-codigo="'+data+'" id="editarC" data-toggle="modal" data-target="#modal_editar"><i class="fa fa-edit"></i> Editar</a></li>'+
                            '<li><a href="#" data-codigo="'+data+'" id="borrarC"><i class="fa fa-trash"></i> Borrar</a></li>'+
                        '</ul>'+
                        '</div>'
              }
          }
        ]
});

ciudades();

})