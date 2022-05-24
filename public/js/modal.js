function carregaModal(){
    var id = document.getElementById('id').value;

    console.log(id)


    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    request = $.ajax({
        url: "/reservas/" + id,
        type: "GET",
        dataType: 'json',
        processData: false,
        contentType: "application/json; charset=utf-8",
    });

    request.done(function (response, textStatus, jqXHR){
        console.log(response)
        console.log(response.nome)
        $('#nome').text(response.nome);
        $('#diaSemana').text(response.diaSemana);
        $('#horario').text(response.horario);
        $('#qtd').text(response.qtdPessoas);

    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });   

}


function rejeitarReserva(){
    var id = document.getElementById('id').value;

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    request = $.ajax({
        url: "/reservas/rejeitar/" + id,
        type: "PATCH",
        data: {status_reserva_id:3}
        dataType: 'json',
        processData: false,
        contentType: "application/json; charset=utf-8",
    });

    request.done(function (response, textStatus, jqXHR){
        console.log(response)

    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });   

}