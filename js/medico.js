var dt;

function medico(){

    

}

$(document).ready(() => {


    $.ajax({
        url : 'php/controlador/medico.php?accion=listar',
        type : 'GET',
        success : function(res){
            // aqui formateo lo de la variable res
            var js = JSON.parse(res);

            for (var i = 0; i < js.data.length; i++){
                console.log("registros: "+js.data.length);
                dt+= 
                '<tr class="unread">'+
                '<td><img class="rounded-circle" style="width:40px;" src="imgs/'+js.data[i].img_med+'" alt="activity-user"></td>'+
                '<td>'+
                    '<a class="mb-1" href="php/vista/infoMedico.php" id="editar">'+js.data[i].medico+'</a>'+
                    '<p class="m-0">'+js.data[i].espec+'</p>'+
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