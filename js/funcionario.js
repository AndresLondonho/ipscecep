var dt;
function funcionarios(){

    $("#tabla").on("click","a#editarFunc",function(){
        var codigo = $(this).data("codigo");
        var cargo,especialidad,sede;
        $("#modal_editar").load("funcionario/editarfuncionario.php");

        $.ajax({
            type:"get",
            url:"../controlador/funcionario.php",
            data: {codigo:codigo, accion:"consultar"},
            dataType:"json"
        }).done(function(funcionario){
            console.log(funcionario.id_func);
            if(funcionario.respuesta === "no existe"){
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'El funcionario con codigo '+codigo+' no existe en la base de datos'
                })
            } else {
                document.getElementById("id").innerHTML = funcionario.id_func;
                $("#id_func").val(funcionario.id_func);
                $("#nom_user").val(funcionario.nom_user);
                $("#ape_user").val(funcionario.ape_user);
                $("#nom2_user").val(funcionario.nom2_user);
                $("#ape2_user").val(funcionario.ape2_user);
                $("#tel_user").val(funcionario.tel_user);
                $("#email_user").val(funcionario.email_user);
                cargo = funcionario.cargo;
                especialidad = funcionario.especialidad;
                sede = funcionario.sede;
            }
        });

        $.ajax({
            type:"get",
            url:"../controlador/cargo.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            $("#id_cargo option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
                if(cargo === value.Codigo){
                    $("#id_cargo").append("<option selected value='" + value.Codigo + "'>" + value.nom_cargo + "</option>")
                } else {
                    $("#id_cargo").append("<option value='"+value.Codigo+"'>"+value.nom_cargo+"</option>");
                }
            })
        });

        $.ajax({
            type:"get",
            url:"../controlador/especialidad.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            $("#id_espec option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
                if(especialidad === value.Codigo){
                    $("#id_espec").append("<option selected value='" + value.Codigo + "'>" + value.Especialidad + "</option>")
                } else {
                    $("#id_espec").append("<option value='"+value.Codigo+"'>"+value.Especialidad+"</option>");
                }
            })
        });

        $.ajax({
            type:"get",
            url:"../controlador/sede.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            $("#id_sede option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
                if(sede === value.Codigo){
                    $("#id_sede").append("<option selected value='" + value.Codigo + "'>" + value.Sede + "</option>")
                } else {
                    $("#id_sede").append("<option value='"+value.Codigo+"'>"+value.Sede+"</option>");
                }
            })
        });
    });

    $("#modal_editar").on("click","button#actualizar",function(){
        var datos = $("#frmfunc").serialize();
        $.ajax({
            type: "get",
            url: "../controlador/funcionario.php",
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
            }
        })
    });

    $("#tabla").on("click","a#borrarFunc",function(){
        var codigo = $(this).data("codigo");

        swal({
            title: '¿Está seguro?',
            text: "¿Borrar el funcionario con codigo: " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Borrar!'
      }).then((decision) => {
              if (decision.value) {
                  var request = $.ajax({
                      method: "get",                  
                      url: "../controlador/funcionario.php",
                      data: {codigo: codigo, accion:'borrar'},
                      dataType: "json"
                  })
                  request.done(function( resultado ) {
                      if(resultado.respuesta == 'correcto'){
                          swal({
                            position: 'center',
                            type: 'success',
                            title: 'El funcionario con codigo ' + codigo + ' se ha borrado',
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

    $(".box").on("click","button#nuevoF",function(){
        $("#modal_editar").load("funcionario/nuevofuncionario.php");

        $.ajax({
            type:"get",
            url:"../controlador/privilegios.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            //$("#id_cargo option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
                $("#id_priv").append("<option value='"+value.id_priv+"'>"+value.nom_priv+"</option>");
            })
        });

        $.ajax({
            type:"get",
            url:"../controlador/cargo.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            //$("#id_cargo option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
                $("#id_cargo").append("<option value='"+value.id_cargo+"'>"+value.nom_cargo+"</option>");
            })
        });

        $.ajax({
            type:"get",
            url:"../controlador/especialidad.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            //$("#id_espec option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
                $("#id_espec").append("<option value='"+value.Codigo+"'>"+value.Especialidad+"</option>");
                
            })
        });

        $.ajax({
            type:"get",
            url:"../controlador/sede.php",
            data: {accion:'listar'},
            dataType: "json"
        }).done(function(resultado){
            //$("#id_sede option").remove();
            $.each(resultado.data, function(index, value){
            console.log(value.Codigo);
                $("#id_sede").append("<option value='"+value.Codigo+"'>"+value.Sede+"</option>");
            })
        });
    })

    $("#modal_editar").on("click","button#registrar",function(){
        var nombre = $("#nom_usuario").val();
        var apellido = $("#ape_usuario").val();
        var user = nombre.substr(0, 1)+apellido;
        var cedula = $("#cc_usuario").val();
        $("#funcionario").val(cedula);
        $("#username").val(user.toLowerCase());
        $("#password").val(cedula);
        console.log(user);
        
        console.log($("#funcionario").val());

        var datos = $("#frmfunc").serialize();

        $.ajax({
            type:"get",
            url:"../controlador/funcionario.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
            if(resultado.respuesta){
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'El funcionario con cedula '+cedula+' fue grabado con éxito',
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

}

$(document).ready(() => {
    dt = $("#tabla").DataTable({
        "ajax":"../controlador/funcionario.php?accion=listar",
        "columns":[
            {"data":"id_func"},
            {"data":"username"},
            {"data":"cc_user"},
            {"data":"nombre"},
            {"data":"apellido"},
            {"data":"tel_user"},
            {"data":"email_user"},
            {"data":"nom_cargo"},
            {"data":"nom_espec"},
            {"data":"nom_sede"},
            {"data":"id_func",
                render: function(data){
                    return '<div class="btn-group">'+
                        '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Acciones <span class="fa fa-caret-down"></span></button>'+
                        '<ul class="dropdown-menu">'+
                            '<li><a href="#" data-codigo="'+data+'" id="editarFunc" data-toggle="modal" data-target="#modal_editar"><i class="fa fa-edit"></i> Editar</a></li>'+
                            '<li><a href="#" data-codigo="'+data+'" id="borrarFunc"><i class="fa fa-trash"></i> Borrar</a></li>'+
                        '</ul>'+
                        '</div>'
                }
            }
        ]
    })

    funcionarios();
})