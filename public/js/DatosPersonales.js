$(document).ready(function (){
    $.ajax({
        url: urlDatosPersonales,
        headers: {'X-CSRF-TOKEN': token},
        type: 'post',
    }).done(function(data){
        $.each(data.data, function(key, value){
            $('#DatosPersonales tbody')
            .append('<tr><td>'+value.name+'</td><td>'+value.lastname+'</td><td>'+value.vat+'</td><td>'+value.birthdate+'</td><td>'+value.phone+'</td><td>'+value.email+'</td><td><button class="btn btn-sm btn-success" id="btnEdit" data-id="'+value.id+'">Modificar</button><button class="btn btn-sm btn-danger" id="btnDelete" data-id="'+value.id+'">Eliminar</button></td></tr>');
        });
    }).fail(function(e){
        console.log("error");
    });

    $('table').on('click', 'tbody #btnEdit', function(){
        var id = $(this).data('id');
        window.location.href =baseUrl+'/datos/personales/'+id+'/edit';
    });

    $('table').on('click', 'tbody #btnDelete', function(){
        var id = $(this).data('id');
        window.location.href =baseUrl+'/datos/personales/'+id+'/delete';
    });
});