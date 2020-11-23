
function dashboard(){
    $(".sidebar-menu a").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        $.post( url, {url:url},function(data) {
            if(url!="#")
                $("#contenido").html(data);
                document.getElementById("seccion_activa").innerHTML = $("#modulo").val();
    });
    })

    $("#menunav").on("click","a#actualizarDatos",function(){
        var codigo = document.getElementById("id_func").value;
        console.log(codigo);
        $("#modal_actualizardatos").load("editarusuario.php");

        $.ajax({
            type:"get",
            url:"../controlador/funcionario.php",
            data: {codigo:codigo, accion:'consultar'},
            dataType:"json"
        }).done(function(datos){
            if(datos.respuesta === "no existe"){
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'Datos no encontrados'
                })
            } else {
                $("#id_funcionario").val(datos.id_func);
                $("#nom_user").val(datos.nom_user);
                $("#ape_user").val(datos.ape_user);
                $("#nom2_user").val(datos.nom2_user);
                $("#ape2_user").val(datos.ape2_user);
                $("#tel_user").val(datos.tel_user);
                $("#email_user").val(datos.email_user);
            }
        })
    })

    $("#modal_actualizardatos").on("click","button#actualizar",function(){
        var datos = $("#frmdatos").serialize();
        $.ajax({
            type:"get",
            url:"../controlador/funcionario.php",
            data:datos,
            dataType:"json"
        }).done(function(resultado){
            if(resultado.respuesta){
                swal(
                    'Actualizado',
                    'Se actualizaron los datos correctamente',
                    'success'
                )
                $('#modal_actualizardatos').modal('toggle');
                dt.ajax.reload();
            } else {
                swal({
                    type: 'error',
                    title: 'Error',
                    text: 'Algo ha salido mal'
                })
                $('#modal_actualizardatos').modal('toggle');
            }
        })
    })
}

$(document).ready(() => {
    $("#contenido").load("home.php");

    dashboard();
})