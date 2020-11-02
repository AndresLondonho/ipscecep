/*$(document).ready(function(){
    $('#login').click(function(){
        var user=('#user').val();
        var pass=('#pass').val();
        if($.trim(user).length > 0 && $.trim(pass).length > 0){
            $.ajax({
                url:"conexionDB.php",
                method:"POST",
                data:{user:user, pass:pass},
                cache:"false",
                beforeSend: function(){
                    $('#login').val("conectando...");
                },
                success:function(data){
                    $('#login').val("Iniciar sesion");
                    if(data=="1"){
                        $(location).attr('href', 'iniciolgejemplo.php')
                    }else{
                        $("#result").hmtl("<div class='alert alert-dimissible alert-dange'><button type='button'
                        class='close' data-dimiss='alert'>&times;</button><strong>¡Error!</strong> las credenciales
                        son incorrectas.<div>");
                    }
                }
            });
        };
    });
});*/