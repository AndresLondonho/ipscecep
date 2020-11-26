var dt, id_espec,medico;
function cita(){
    $("#id_espec").change(function(){
        var espec = $("#id_espec").val();

        $.ajax({
            type:"get",
            url:"../controlador/medico.php",
            data: {codigo: espec, accion:'listarM'},
            dataType:"json"
        }).done(function(resultado){
            $("#nom_med").prop('disabled', false);
            $("#nom_med option").remove();
            $("#nom_med").append("<option>Seleccione el medico</option>");
            $.each(resultado.data, function(index, value){
                $("#nom_med").append("<option value='"+value.Funcionario+"'>"+value.Medico+"</option>");
            })
        })
    })

    $("#nom_med").change(function(){
        medico = $("#nom_med").val();
        $.ajax({
            type:"get",
            url:"../controlador/medico.php",
            data: {codigo:medico, accion:'consultarS'},
            dataType:"json"
        }).done(function(resultado){
            $("#nom_sede").val(resultado.sede);
            $("#sede").val(resultado.id_sede);
        })
        
    })

    $("#id_pac").keyup(function(){
        var ced = $(this).val();
        $.ajax({
            type:"get",
            url:"../controlador/paciente.php",
            data: {codigo:ced, accion:'consultar'},
            dataType:"json"
        }).done(function(resultado){
            if (resultado.respuesta === "no existe"){
                
            } else {
                $("#nom_pac").val(resultado.Paciente);
            }
        })

    })

    $("#nuevaCita").click(function(){
        var datos = $("#frmCita").serialize();

        $.ajax({
            type:"get",
            url:"../controlador/cita.php",
            data: datos,
            dataType:"json"
        }).done(function(resultado){
            if(resultado.respuesta){
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'La cita se ha registrado exitosamente',
                    showConfirmButton: false,
                    timer: 1200
                })
                $("#contenido").load("citas/nuevaCita.php");
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

    $(".box").on("click","a#borrarCita",function(){
        var codigo = $(this).data("codigo");
        console.log(codigo);
        swal({
            title: '¿Está seguro?',
            text: "¿Borrar la cita?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Borrar!'
      }).then((decision) => {
              if (decision.value) {
                  var request = $.ajax({
                      method: "get",                  
                      url: "../controlador/cita.php",
                      data: {codigo: codigo, accion:'borrar'},
                      dataType: "json"
                  })
                  request.done(function( resultado ) {
                      if(resultado.respuesta == 'correcto'){
                          swal({
                            position: 'center',
                            type: 'success',
                            title: 'La cita numero ' + codigo + ' se ha borrado',
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

    $(".box").on("click","a#editarCita",function(){
        $("#contenido").load("citas/editarCita.php");
        var codigo = $(this).data("codigo");
        console.log(codigo);
        $.ajax({
            type:"get",
            url:"../controlador/cita.php",
            data: {codigo:codigo, accion:'consultar'},
            dataType:"json"
        }).done(function(resultado){
            if (resultado.respuesta === "no existe"){
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'Algo salio muy mal'
                })
            } else {
                document.getElementById("nom_pac").innerHTML = resultado.paciente;
                document.getElementById("id_pac").innerHTML = resultado.cedulaP;
                document.getElementById("tel_pac").innerHTML = resultado.tel_espec;
                document.getElementById("nom_med").innerHTML = resultado.medico
                document.getElementById("espec").innerHTML = resultado.nom_espec;
                $("#nro_cita").val(resultado.nro_cita)
            }
        })

        $.ajax({
            type:"get",
            url:"../controlador/cita.php",
            data: {accion:'medicamento'},
            dataType:"json"
        }).done(function(resultado){
            $("#id_medcto").append("<option>Seleccione el medico</option>");
            $.each(resultado.data, function(index, value){
                $("#id_medcto").append("<option value='"+value.id_medcto+"'>"+value.nom_medcto+"</option>");
            })
        })
    })

    $("#contenido").on("change","#med",function(){
        if(document.getElementById("med").checked){
            $("#droga").removeClass("hide");
            $("#droga").addClass("show");
        } else{
            $("#droga").removeClass("show");
            $("#droga").addClass("hide");
        }
    })

    $("#contenido").on("click","button#actualizar",function(){
        var datos = $("#frmcita").serialize();

        $.ajax({
            type:"get",
            url:"../controlador/cita.php",
            data:datos,
            dataType:"json"
        }).done(function(resultado){
            if(resultado.respuesta){
                swal(
                    'Actualizado',
                    'Diagnostico finalizado y listo para reporte.',
                    'success'
                )
                $("#contenido").load("citas/cita.php");
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

    $("#tabla").on("click","a#detalleCita",function(){
        var codigo = $(this).data("codigo");
        console.log(codigo);
        $("#modal_detalle").load("citas/detallecita.php");
        $.ajax({
            type:"get",
            url:"../controlador/cita.php",
            data: {codigo:codigo, accion:'detalle'},
            dataType:"json"
        }).done(function(resultado){
            if (resultado.respuesta === "no existe"){
                $("#modal_detalle").modal("toggle");
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'El paciente aun no ha sido atendido'
                })                
            } else {
                document.getElementById("nom_pac").innerHTML = resultado.paciente;
                document.getElementById("id_pac").innerHTML = resultado.cedulaP;
                document.getElementById("detalle").innerHTML = resultado.detalle;
                document.getElementById("medicamento").innerHTML = resultado.nom_medcto;
                document.getElementById("cantidad").innerHTML = resultado.stock;

                $("#nro_cita").val(resultado.nro_cita)
            }
        })
    })

    $("#contenido").on("click","button#aceptar",function(){
        $("#modal_detalle").modal("toggle");
    })


    $(".box").on("click","a#reporte",function(){
        $("a#reporte").attr("href","../../recursos/fpdf/pdfs/citas.php");
    })
}

$(document).ready(() => {

    dt = $("#tabla").dataTable({
        "ajax": "../controlador/cita.php?accion=listar",
        "columns": [
            {"data": "nro_cita",
                render: function(data){
                    return '<a href="#" data-codigo="'+data+'" data-toggle="modal" data-target="#modal_detalle" id="detalleCita" title="Detalle"><i class="fa fa-info"></i></a>'
                }   
            },
            {"data": "Paciente"},
            {"data": "Medico"},
            {"data": "Tipo_cita"},
            {"data": "Fecha"},
            {"data": "Hora"},
            {"data": "Sede"},
            {"data": "nro_cita",
                render: function(data){
                    return '<a href="#" data-codigo="'+data+'" id="editarCita" title="Editar"><i class="fa fa-edit"></i></a>'
                }   
            },
            {"data": "nro_cita",
                render: function(data){
                    return '<a href="#" data-codigo="'+data+'" id="borrarCita" title="Borrar"><i class="fa fa-trash"></i></a>'
                }   
            }
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