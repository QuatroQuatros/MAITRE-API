var next_click=document.querySelectorAll(".next_button");
var main_form=document.querySelectorAll(".main");
var step_list = document.querySelectorAll(".progress-bar li");
var num = document.querySelector(".step-number");
let formnumber=0;

/*const {axios} = require('axios');*/
//let formnumber = document.getElementById('formLevel').value;
//formnumber = parseInt(formnumber);

next_click.forEach(function(next_click_form){
    next_click_form.addEventListener('click',function(){
        if(!validateform()){
            return false
        }
       formnumber++;
       updateform();
       progress_forward();
       contentchange();
    });
}); 

var back_click=document.querySelectorAll(".back_button");
back_click.forEach(function(back_click_form){
    back_click_form.addEventListener('click',function(){
       formnumber--;
       updateform();
       progress_backward();
       contentchange();
    });
});

var username=document.querySelector("#user_name");
var shownname=document.querySelector(".shown_name");
 

var submit_click=document.querySelectorAll(".submit_button");
submit_click.forEach(function(submit_click_form){
    submit_click_form.addEventListener('click',function(){
       shownname.innerHTML= username.value;
       formnumber++;
       updateform(); 
    });
});
 

function updateform(){
    main_form.forEach(function(mainform_number){
        mainform_number.classList.remove('active');
    })
    main_form[formnumber].classList.add('active');
} 
 
function progress_forward(){
    // step_list.forEach(list => {
        
    //     list.classList.remove('active');
         
    // }); 
    
     
    num.innerHTML = formnumber+1;
    step_list[formnumber].classList.add('active');
}  

function progress_backward(){
    var form_num = formnumber+1;
    step_list[form_num].classList.remove('active');
    num.innerHTML = form_num;
} 
 
var step_num_content=document.querySelectorAll(".step-number-content");

 function contentchange(){
     step_num_content.forEach(function(content){
        content.classList.remove('active'); 
        content.classList.add('d-none');
     }); 
     step_num_content[formnumber].classList.add('active');
 } 
 
 
function validateform(){
    validate=true;
    var validate_inputs=document.querySelectorAll(".main.active input");
    validate_inputs.forEach(function(vaildate_input){
        vaildate_input.classList.remove('warning');
        if(vaildate_input.hasAttribute('require')){
            if(vaildate_input.value.length==0){
                validate=false;
                vaildate_input.classList.add('warning');
            }
        }
    });
    return validate;
    
}

var request;
var checkedValue = [];
var diaCadastrado = [];
var restId;
var d;
$(document).on('submit', '#form1', function(e) {
    e.preventDefault();
    console.log('teste')

    if (request) {
        request.abort();
    }
    var $form = $(this);


    var serializedData = $form.serialize();

    console.log(serializedData)


    request = $.ajax({
        url: "/restaurantes/create",
        type: "POST",
        //data: serializedData
        data: new FormData( this ),
        processData: false,
        contentType: false
    });

    request.done(function (response, textStatus, jqXHR){
        console.log(response);
        restId = response.id;
    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
   
});

$(document).on('submit', '#formDia', function(e) {
    e.preventDefault();
    checkedValue = []; 

    
    var inputElements = document.getElementsByClassName('form-check-input');
    for(var i=0; inputElements[i]; ++i){
          if(inputElements[i].checked){
               checkedValue.push(inputElements[i].value);
          }
    }

    for (var i=0; i < diaCadastrado.length; i++) {
      dia = diaCadastrado[i];
      if (checkedValue.indexOf(dia) >= 0) {
        console.log(dia + ' está no array');
        checkedValue = checkedValue.splice(checkedValue.indexOf(dia), 1);
        console.log(checkedValue.length)
      } else {
        console.log(dia + ' não está no array');
      }
    }
    console.log(checkedValue)
        request = $.ajax({
            type:"GET",
            data: {dias:checkedValue},
            url: "/horarios/diaSemana",
            dataType: "json",
        });

        request.done(function (data, textStatus, xhr){
            console.log(data);
            d = data;
            console.log(data.length);

            if(xhr.status == 200){
                $("#dias").empty();
                for(var i = 0; i < data.length; i++){
                    $("#dias").append(`<option value=${data[i].id}>${data[i].diaSemana}</option>`); 
                }  

            }

        });
        request.fail(function (jqXHR, textStatus, errorThrown){
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });
    });


$(document).on('submit', '#formHorario', function(e) {
    e.preventDefault();

});


function hour_to_seconds(hour){
    console.log(hour)
    var a = String(hour).split(':')
    console.log(a);
    var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60;
    return seconds
}

function seconds_to_hour(seconds){
    d = Number(seconds);
    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);

    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
    return hDisplay + mDisplay; 

}

function call(body){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    request = $.ajax({
        url: "/horarios/create",
        type: "POST",
        //data:{diaSemana_id:dia, horario:horario, restaurante_id:restId},
        data: JSON.stringify(body),
        dataType: 'json',
        processData: false,
        contentType: "application/json; charset=utf-8",
    });

    request.done(function (response, textStatus, jqXHR){
        console.log(response);
        console.log(checkedValue.length)
        if(!diaCadastrado.includes(body.dia_semana_id)){
            diaCadastrado.push(body.dia_semana_id);
        }

        for (var i=0; i < diaCadastrado.length; i++) {
          dia = diaCadastrado[i];
          if (checkedValue.indexOf(dia) >= 0) {
            console.log(dia + ' está no array');
            checkedValue = checkedValue.splice(checkedValue.indexOf(dia), 1);
            console.log(checkedValue.length)
          } else {
            console.log(dia + ' não está no array');
          }
        }
        
        $(`#dias option[value="${body.dia_semana_id}"]`).remove();

        if(checkedValue.length == 0){
            $( "#finalizar" ).removeClass( "disabled" ).addClass( "next_button" );
        }

    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });   
}

function teste(){


    var dia = document.getElementById('dias').value;
    var inicio = hour_to_seconds(document.getElementById('inicio').value);
    var fim = hour_to_seconds(document.getElementById('fim').value);
    var intervalo = hour_to_seconds(document.getElementById('intervalo').value);

    for(inicio; inicio < fim; inicio += intervalo){
        horario = new Date(inicio * 1000).toISOString().substr(11, 8);
        body = {
            "dia_semana_id": dia,
            "horario": horario,
            "restaurante_id": restId,
        };

        call(body);





        /*axios.post('/horarios/create', {
            dia_semana_id: dia,
            horario: horario,
            restaurante_id: restId
          })
          .then(function (response) {
            console.log(response);
            $(`#dias option[value="${dias}"]`).remove();
          })
          .catch(function (error) {
            console.log(error);
          });*/

        
    }

}

$(document).on('click', '#horarioVoltar', function(e) {
    e.preventDefault();
    console.log('oi', diaCadastrado);
    console.log('batata', checkedValue)





    /*for(var i =0; i < checkedValue.length; i++){
        for(var j =0; j < diaCadastrado.length; j++){
            if(checkedValue.includes[diaCadastrado[j]]){
                console.log('batata')
            }
        }
    }*/

});




