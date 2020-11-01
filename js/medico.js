var dt;

function medico(){

    

}

$(document).ready(() => {


    $.ajax({
        url : '../controlador/medico.php?accion=listar',
        type : 'GET',
        success : function(res){
            var js = JSON.parse(res);
            console.log(js);

            for (var i = 0; i < js.data.length; i++){
                console.log("registros: "+js.data.length);
                dt+= 
                '<tr class="unread">'+
                '<td><img class="rounded-circle" style="width:40px;" src="https://i.pinimg.com/236x/4d/99/80/4d9980910c0fed8d590c6cb896f8f862.jpg" alt="activity-user"></td>'+
                '<td>'+
                    '<a class="mb-1" href="php/vista/infoMedico.php" id="editar">'+js.data[i].Medico+'</a>'+
                    '<p class="m-0">'+js.data[i].Especialidad+'</p>'+
                '</td>'+
                '<td><a href="#!" class="label theme-bg2 text-white f-12">Historial</a></td>'+
                '<td><a href="#!" class="label theme-bg text-white f-12">Citas Proximas</a></td>'+
            '</tr>';
            }
            $('#tbody').html(dt);
        }

    })


    

medico();
});