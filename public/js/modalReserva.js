function adicionaZero(numero){
    if (numero <= 9) 
        return "0" + numero;
    else
        return numero; 
}



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
        let data = new Date(response.data); //29/01/2020
        let dataFormatada = (adicionaZero(data.getDate().toString()) + "/" + (adicionaZero(data.getMonth()+1).toString()) + "/" + data.getFullYear());
        console.log(dataFormatada);
        $('#nome').text(response.nome);
        $('#email').text(response.email);
        $('#diaSemana').text(response.diaSemana);
        $('#horario').text(response.horario);
        $('#data').text(dataFormatada);
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

    body = {
        "status_reserva_id": 3,
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    request = $.ajax({
        url: "/reservas/rejeitar/" + id,
        type: "PATCH",
        data: JSON.stringify(body),
        dataType: 'json',
        processData: false,
        contentType: "application/json; charset=utf-8",
    });

    request.done(function (response, textStatus, jqXHR){
        console.log(response)
        if(response.status_reserva_id == 3){
            $("#status").removeClass("warning").addClass("danger");
            $('#status').text('cancelado');
        }

    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });   

}


function aprovarReserva(){
    var id = document.getElementById('id').value;

    body = {
        "status_reserva_id": 2,
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    request = $.ajax({
        url: "/reservas/aprovar/" + id,
        type: "PATCH",
        data: JSON.stringify(body),
        dataType: 'json',
        processData: false,
        contentType: "application/json; charset=utf-8",
    });

    request.done(function (response, textStatus, jqXHR){
        console.log(response)
        if(response.status_reserva_id == 2){
            $("#status").removeClass("warning").addClass("success");
            $('#status').text('aprovado');
        }

    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });   

}