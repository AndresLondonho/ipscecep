function fusuario(){    
    $("#login-form").on('submit',function(e){    
        e.preventDefault();
        var datos = $(this).serialize();
        console.log(datos)
        $.ajax({
            type:"post",
            url:"../controlador/controladorUsuario.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
            if(resultado.respuesta == "existe"){
                location.href ="./php/vista/dashboard.php"; 
            }
            else{
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Usuario y/o contraseña incorrecta',
                    showConfirmButton: false,
                    timer: 1500
                }),
                function() {
                    $("#usuario").focus().select();
                };                
            }
        });
    })

}
