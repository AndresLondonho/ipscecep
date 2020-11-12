var dt;
function pacientes(){

    $("#tabla").on("click","a#editarP", function(){
        var codigo = $(this).data("codigo");
        var Ciudad;
        console.log(codigo);
        $("#modal_editar").load("paciente/editarPaciente.php"); 
        
        $.ajax({
            type: "get",
            url: "../controlador/paciente.php",
            data: {codigo: codigo, accion: 'consultar'},
            dataType: "json"
        }).done(function (paciente){
            if (paciente.respuesta === "no existe"){
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'El paciente con cedula '+codigo+' no existe en la base de datos'
                })
            } else {
                document.getElementById("ced").innerHTML = paciente.Cedula;
                $("#cc_pac").val(paciente.Cedula);
                $("#nom_pac").val(paciente.nom_user);
                $("#ape_pac").val(paciente.ape_user);
                $("#email_pac").val(paciente.email_pac);
                $("#tel_pac").val(paciente.tel_user);
                $("#dir_pac").val(paciente.dir_pac);
                Ciudad = paciente.Ciudad;
                console.log(Ciudad);

            }
        });
        $.ajax({
            type:"get",
            url:"../controlador/ciudad.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            $("#espec option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
                if(ciudad === value.Codigo){
                    $("#espec").append("<option selected value='" + value.Codigo + "'>" + value.Ciudad + "</option>")
                } else {
                    $("#espec").append("<option value='"+value.Codigo+"'>"+value.Ciudad+"</option>");
                }
            })
        })
    })

    $("#modal_editar").on("click","button#actualizar",function(){
        var datos = $("#frmpaciente").serialize();
       $.ajax({
           type: "get",
           url: "../controlador/paciente.php",
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
   
    $(".box").on("click","button#nuevoP", function(){
        $("#modal_editar").load("paciente/nuevoPaciente.php");
        
        $.ajax({
            type:"get",
            url:"../controlador/ciudad.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            $("#espec option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
            $("#espec").append("<option value='"+value.Codigo+"'>"+value.Ciudad+"</option>");
            })
        })
    })

    $("#modal_editar").on("submit","#registrar",function(e){
        e.preventDefault();
        var cedula = $("#cc_pac").val();
        $("#id_pac").val(cedula);
        var datos = $("#frmpaciente").serialize();
        $.ajax({
            type:"get",
            url:"../controlador/paciente.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
            if(resultado.respuesta){
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'El paciente fue grabado con éxito',
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

    $("#tabla").on("click","a#borrarP",function(){
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");
        console.log(codigo);
        swal({
              title: '¿Está seguro?',
              text: "¿Borrar el paciente con cedula: " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Borrar!'
        }).then((decision) => {
                if (decision.value) {
                    var request = $.ajax({
                        method: "get",                  
                        url: "../controlador/paciente.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })
                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal({
                              position: 'center',
                              type: 'success',
                              title: 'El paciente con cedula ' + codigo + ' se ha borrado',
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
        "ajax": "../controlador/paciente.php?accion=listar",
        "columns": [
            { "data": "Cedula"} ,
            { "data": "Paciente" },
            { "data": "Email" },
            { "data": "Telefono" },
            { "data": "Direccion" },
            { "data": "Ciudad" },
            { "data": "Cedula",
              render: function (data) {
                        return '<div class="btn-group pull-right ">'+
                        '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Acciones <span class="fa fa-caret-down"></span></button>'+
                        '<ul class="dropdown-menu">'+
                            '<li><a href="#" data-codigo="'+data+'" id="editarP" data-toggle="modal" data-target="#modal_editar"><i class="fa fa-edit"></i> Editar</a></li>'+
                            '<li><a href="#" data-codigo="'+data+'" id="borrarP"><i class="fa fa-trash"></i> Borrar</a></li>'+
                        '</ul>'+
                        '</div>'
              }
          }
        ]
});

pacientes();

})