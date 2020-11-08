var dt;
function pacientes(){

    $("#tabla").on("click","a#editarM", function(){
        var codigo = $(this).data("codigo");
        var especialidad;
        var sede;
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
                $("#cc_user").val(paciente.cedula);
                $("#nom_user").val(paciente.nom_user);
                $("#ape_user").val(paciente.ape_user);
                $("#tel_user").val(paciente.tel_user);
                especialidad = paciente.especialidad;
                sede = paciente.sede;
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

    $("#editar").on("click",".btncerrar", function(){
        $(".box-title").html("Listado de Comunas");
        $("#editar").addClass('hide');
        $("#editar").removeClass('show');
        $("#listado").addClass('show');
        $("#listado").removeClass('hide');  
        $(".box #nuevo").show(); 
    })  

    $(".box").on("click","#nuevo", function(){
        $(this).hide();
        $(".box-title").html("Crear Comuna");
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $("#listado").addClass('hide');
        $("#listado").removeClass('show');
        $("#editar").load('./Vistas/Comuna/nuevaComuna.php', function(){
            $.ajax({
               type:"get",
               url:"./Controlador/controladorMunicipio.php",
               data: {accion:'listar'},
               dataType:"json"
            }).done(function( resultado ) {                    ;
                $.each(resultado.data, function (index, value) { 
                  $("#editar #muni_codi").append("<option value='" + value.muni_codi + "'>" + value.muni_nomb + "</option>")
                });
            });
        });
        
    })

    $("#editar").on("click","button#grabar",function(){
      var datos=$("#fcomuna").serialize();
      //console.log(datos);
      $.ajax({
            type:"get",
            url:"./Controlador/controladorComuna.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'La comuna fue grabada con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })     
                    $(".box-title").html("Listado de Comunas");
                    $(".box #nuevo").show();
                    $("#editar").html('');
                    $("#editar").addClass('hide');
                    $("#editar").removeClass('show');
                    $("#listado").addClass('show');
                    $("#listado").removeClass('hide');
                    dt.page( 'last' ).draw( 'page' );
                    dt.ajax.reload(null, false);                   
             } else {
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Ocurrió un erro al grabar',
                    showConfirmButton: false,
                    timer: 1500
                });
               
            }
        });
    });

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
            } else {
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'Algo ha salido mal'
                })
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
                            '<li><a href="#" data-codigo="'+data+'" id="editarM" data-toggle="modal" data-target="#modal_editar"><i class="fa fa-edit"></i> Editar</a></li>'+
                            '<li><a href="#" data-codigo="'+data+'" id="borrarM"><i class="fa fa-trash"></i> Borrar</a></li>'+
                        '</ul>'+
                        '</div>'
              }
          }
        ]
});

pacientes();

})