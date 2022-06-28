@extends("layouts.index")

@section('content')

<img src="/img/bem.jpg" style="width: 100%; height:18vh;" alt="">


            <section id="contact" class="contact">
                <div class="php-email-form">
                    <div class="section-title">
                        <h2>Últimas <span> reservas</span></h2>
                    </div>
                   
                    
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Dia da semana</th>
                                <th>Restaurante</th>
                                <th>Quantidade de Pessoas</th>
                                <th>Exclusão</th>
                                <th>alteração</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservas as $r)
                                @if($r->status_reserva_id == 1)
                                    <tr>
                                        <td data-title="Data">{{ date("d/m/Y", strtotime($r->data))}}</td>
                                        <td data-title="Horário">{{$r->horario}}</td>
                                        <td data-title="Dia da semana">{{$r->diaSemana}}</td>
                                        <td data-title="Restaurante">{{$r->nome}}</td>
                                        <td data-title="pessoas">{{$r->qtdPessoas}}</td>
                                        <td data-title="exclusão"><button type="submit"  onclick="abreModal(event, {{$r->id}})"  class="button-option" data-bs-toggle="modal" data-bs-target="#modalExluir">(Excluir)</button></td>
                                        <td data-title="alteração"><button type="submit" onclick="modalAlterar(event, {{$r->id}})" class="button-option" data-bs-toggle="modal" data-bs-target="#modalAlt">(Alterar)</button></td>
                                        <td data-title="status" class="warning">Pendente</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </section>

            <section id="contact" class="contact">
                <div class="php-email-form">
                    <div class="section-title">
                        <h2>Reservas <span> Confirmadas</span> pelo restaurante</h2>
                    </div>
                  
                    <table id="confirmada" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Dia da semana</th>
                                <th>Restaurante</th>
                                <th>Quantidade de Pessoas</th>
                                <th>Cancelar reserva</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservas as $r)
                                @if($r->status_reserva_id == 2 || $r->status_reserva_id == 5)
                                    <tr>
                                        <td data-title="Data">{{ date("d/m/Y", strtotime($r->data))}}</td>
                                        <td data-title="Horário">{{$r->horario}}</td>
                                        <td data-title="Dia da semana">{{$r->diaSemana}}</td>
                                        <td data-title="Restaurante">{{$r->nome}}</td>
                                        <td data-title="pessoas">{{$r->qtdPessoas}}</td>
                                        <td data-title="exclusão"><button type="submit" class="button-option" data-bs-toggle="modal" data-bs-target="#modalExluir">(Excluir)</button></td>

                                        @if($r->status_reserva_id == 2)
                                            <td data-title="status"><button type="submit" onclick="abreModal(event, {{$r->id}})" class="button-option" data-bs-toggle="modal" data-bs-target="#modalCheck">Confirmar presença</button></td>
                                            <td data-title="status">@php echo '&nbsp' @endphp</td>
                                        @elseif($r->status_reserva_id == 5)
                                            <td data-title="status">@php echo '&nbsp' @endphp</td>
                                            <td data-title="status"><button type="submit" onclick="abreModal(event, {{$r->id}})" class="button-option" data-bs-toggle="modal" data-bs-target="#modalCheck-out">Finalizar reserva</button></td>
                                        @endif
                                        <td data-title="status" class="successfull">Reserva confirmada</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </section>

            <section id="contact" class="contact">
                <div class="php-email-form">
                    <div class="section-title">
                        <h2>Reservas<span> concluídas</span></h2>
                    </div>
                   
                    <table id="exemplo" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Dia da semana</th>
                                <th>Restaurante</th>
                                <th>Quantidade de pessoas</th>
                                <th>Status</th>
                                <th>Reservar novamente</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservas as $r)
                                @if($r->status_reserva_id == 3 || $r->status_reserva_id == 4 || $r->status_reserva_id == 6)
                                    <tr>
                                        <td data-title="Data">{{ date("d/m/Y", strtotime($r->data))}}</td>
                                        <td data-title="Horário">{{$r->horario}}</td>
                                        <td data-title="Dia da semana">{{$r->diaSemana}}</td>
                                        <td data-title="Restaurante">{{$r->nome}}</td>
                                        <td data-title="pessoas">{{$r->qtdPessoas}}</td>
                                        @if($r->status_reserva_id == 6)                           
                                            <td data-title="status" class="successfull">Finalizada</td>
                                        @elseif($r->status_reserva_id == 4)
                                            <td data-title="status" class="danger">Reserva cancelada pelo cliente</td>
                                        @else
                                            <td data-title="status" class="danger">Reserva cancelada pelo restaurante</td>
                                        @endif  

                                        <td data-title="Reservar novamente"><a href="/restaurantes/{{$r->restaurante_id}}">RESERVAR</td>
                                        
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </section>
        </div>

        <!--reservas-->
        <!-- Modal Check in-->
        <div class="modal fade" id="modalCheck" tabindex="-1" aria-labelledby="modalCheckLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCheckLabel">Confirmar reserva ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="">
                            Confirmar check-in nesse restaurante ?
                            <button type="button" onclick="checkin(event)" class="btn btn-primaryBoot" data-bs-dismiss="modal"><a style="color: white;" href="">Sim</a></button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal-->

         <!-- Modal Check out-->
         <div class="modal fade" id="modalCheck-out" tabindex="-1" aria-labelledby="modalCheck-outLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCheck-outLabel">Finalizar reserva ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="">
                            Finalizar reserva nesse restaurante ? 
                            <button type="button" onclick="checkout(event)" class="btn btn-primaryBoot" data-bs-dismiss="modal"><a style="color: white;" href="../restaurante/restaurante.php#comentario">Sim</a></button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal-->

        <!-- Modal Exclusao-->
        <div class="modal fade" id="modalExluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalExcluirLabel">Tem certeza ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="">
                            A reserva do dia (**/**/****) será excluida permanentemente tem certeza ?
                            <button type="button" onclick="cancelarReserva(event)" class="btn btn-primaryBoot" data-bs-dismiss="modal"><a style="color: white;" href="">Sim</a></button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal-->

          <!-- Modal Exclusao-->
          <div class="modal fade" id="modalCancelar" tabindex="-1" aria-labelledby="modalCancelarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCancelarLabel">Tem certeza ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="">
                            A reserva do dia (**/**/****) será cancelada permanentemente tem certeza ?
                            <button type="button" onclick="cancelarReserva(event)" class="btn btn-primaryBoot" data-bs-dismiss="modal"><a style="color: white;" href="">Sim</a></button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal-->

        <!--modal Alteração-->
        <div class="modal fade" id="modalAlt" tabindex="-1" aria-labelledby="modalAlterarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modaAlterarLabel">Alteração de reserva</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="">
                            <div class="rowCenter">
                                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                                    <input type="number" class="form-120" name="qtdePessoa" id="qtdePessoa" placeholder="QTDE. Pessoas" data-msg="Digitar quantidade de pessoas">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                                    <select placeholder="dia da reserva" class="form-120" id="Horario da reserva" name="horarioReserva">
                                        <option selected value="0">Dia da reserva</option>
                                        <option select value="1">SEGUNDA-FEIRA</option>
                                        <option select value="2">TERÇA-FEIRA</option>
                                        <option select value="3">QUARTA-FEIRA</option>
                                        <option select value="4">QUINTA-FEIRA</option>
                                        <option select value="5">SEXTA-FEIRA</option>
                                        <option select value="6">SABADO</option>
                                        <option select value="7">DOMINGO</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <br>
                            <button type="button" class="btn btn-primaryBoot">Alterar reserva</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            var id;
            $(document).ready(function() {
                $('#example').DataTable();
            });
            $(document).ready(function() {
                $('#exemplo').DataTable();
            });


            $(document).ready(function() {
                $('#confirmada').DataTable();
            });

            function abreModal(e, x){
                e.preventDefault()
                id = x
            }

            async function cancelarReserva(e){
                e.preventDefault()
                await fetch('http://127.0.0.1:8000/api/reservas/cancelar/' + id,{
                    method: "DELETE",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',          
                    },
                })
                .then((resp)=>{
                    if(resp.ok){
                        var today = new Date();
                        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()
                        alert('reserva cancelada com sucesso às ' + time)
                        window.location.href = 'http://127.0.0.1:8000/reservas'
                    }
                })
            }

            async function checkin(e){
                e.preventDefault()
                await fetch('http://127.0.0.1:8000/api/reservas/checkin/' + id,{
                    method: "PATCH",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',          
                    },
                    body: JSON.stringify({status_reserva_id: 5}),
                })
                .then((resp)=>{
                    var today = new Date();

                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()
                    if(resp.ok){
                        alert('checkin feito com sucesso às ' + time)
                        window.location.href = 'http://127.0.0.1:8000/reservas'
                    }
                })
            }

            async function checkout(e){
                e.preventDefault()
                await fetch('http://127.0.0.1:8000/api/reservas/checkout/' + id,{
                    method: "PATCH",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',          
                    },
                    body: JSON.stringify({status_reserva_id: 6}),
                })
                .then((resp)=>{
                    var today = new Date();

                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds()
                    if(resp.ok){
                        alert('checkout feito com sucesso às ' + time)
                        window.location.href = 'http://127.0.0.1:8000/reservas'
                    }
                })
            }
            

        </script>
        

@endsection