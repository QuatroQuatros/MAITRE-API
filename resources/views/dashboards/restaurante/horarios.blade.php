@extends('layouts.restaurante-adm')
@section('content')

    <main>

        <!---------------- end insights ---------------->
        <div class="recent-orders">
            <h1>Nossos Clientes</h1>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script type="text/javascript" charset="utf8" src="/DataTables/datatables.min.js"></script>
            <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Dia</th>
                        <th>horário</th>
                        <th>Exclusão</th>
                        <th>Reativação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($horarios as $h)
                        @if($h->deleted_at == null)
                            <tr>
                                <td data-label="dia">{{$h->diaSemana}}</td>
                                <td data-label="horário">{{$h->horario}}</td>
                                <td><a href="#modal" onclick="modalExcluir({{$h->id}})" role="button" class="danger">Inativar Horário</a></td>
                                <td><a class="warning"> @php echo '&nbsp' @endphp </a></td>
                            </tr>
                        @else
                            <tr>
                                <td data-label="dia">{{$h->diaSemana}}</td>
                                <td data-label="horário">{{$h->horario}}</td>
                                <td><a class="warning"> @php echo '&nbsp' @endphp </a></td>
                                <td><a href="#modalReativar" onclick="modalReativar({{$h->id}})" role="button" class="danger">Reativar Horário</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                });
            </script>
        </div>
    </main>
    <!----------- end main ABERTA NO MENU.PHP ------------->

    <!--modal cadastro-->

    <!-- modal 1 -->
    <div class="modal-container" id="m1-o" style="background: rgb(12 12 12 / 57%);">
        <div class="modal">
            <p class="modal__text">

            <div class="containerform">
                <div class="register">
                    <span class="material-icons-sharp">event</span>
                    <strong>Cadastre/atualize um horário</strong>
                    <form action="/horarios/create" method="POST">
                        @csrf
                        <fieldset>
                            <input type="hidden" name="restaurante_id" value="{{$rest_id}}">
                            <div class="form">
                                <div class="form-row">
                                    <i class="fas fa-calendar-check"></i>
                                    <label class="form-label" for="input">Dias</label>
                                    <select class="form-text" name="dia_semana_id">
                                        <option selected value="0">Selecione um dia da semana:</option>
                                        <option select value="1">DOMINGO</option>
                                        <option select value="2">SEGUNDA-FEIRA</option>
                                        <option select value="3">TERÇA-FEIRA</option>
                                        <option select value="4">QUARTA-FEIRA</option>
                                        <option select value="5">QUINTA-FEIRA</option>
                                        <option select value="6">SEXTA-FEIRA</option>
                                        <option select value="7">SÁBADO</option>

                                    </select>
                                </div>
                                <div class="form-row">
                                    <i class="fas fa-clock"></i>
                                    <label class="form-label" for="input">horário abertura</label>
                                    <input type="time" name="horario" class="form-text">
                                </div>
                                
                                <span class="create-account"></span>
                                <div class="form-row button-login">
                                    <button class="btn btn-login">Finalizar<i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            </p>
            <a href="#!" class="link-2"></a>
        </div>
    </div>
    <!-- /modal 1 -->

    <!-- Modal Exclusao-->
    <div class="modal-wrapper" id="modal">
        <div class="modal-body card">
            <div class="modal-header">
                <h2 class="heading">tem certeza ?</h2>
                <a href="#!" role="button" class="close" aria-label="close this modal">
                    <svg viewBox="0 0 24 24">
                        <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                    </svg>
                </a>
            </div>
            <h3>Esse dado será inativado, tem certeza ?</h3>

            <div class="button-center">
                <a href="" class="button button__link">Não</a>
                <a href="" onclick="excluir(event)" class="button button__link">Sim</a>
            </div>
        </div>
        <a href="#!" class="outside-trigger"></a>
    </div>

    <!-- Modal reativação-->
    {{-- <div class="modal-wrapper" id="modalReativar">
        <div class="modal-body card">
            <div class="modal-header">
                <h2 class="heading">tem certeza ?</h2>
                <a href="#!" role="button" class="close" aria-label="close this modal">
                    <svg viewBox="0 0 24 24">
                        <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                    </svg>
                </a>
            </div>
            <h3>Esse dado será reativado, tem certeza ?</h3>

            <div class="button-center">
                <a href="" class="button button__link">Não</a>
                <a href="" onclick="ativar(event)" class="button button__link">Sim</a>
            </div>
        </div>
        <a href="#!" class="outside-trigger"></a>
    </div> --}}

    <!--light and white mode-->

    <div class="right">
        <div class="top">
            <button id="menu-btn">
                <span class="material-icons-sharp">menu</span>
            </button>
            <div class="theme-toggler">
                <span class="material-icons-sharp active">light_mode</span>
                <span class="material-icons-sharp">dark_mode</span>
            </div>
            <div class="profile">
                <div class="info">
                    <p>hey, <b>{{Auth::user()->name}}</b></p>
                    <small class="text-muted">Admin</small>
                    
                </div>
                <div class="profile-photo">
                    <img src="/img/logos/atlanticSemfundo.png">
                </div>
            </div>
        </div>
        <!------------------- end recent updates --------------------->
        <a href="#m1-o">
            <div class="sales-analytics">
                <div class="item add-product">
                    <div class="icon">
                        <span class="material-icons-sharp">event</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Cadastrar novo horário</h3>
                            <smal class="text-muted">1 de 7 cadastrados</smal>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
    </div>

    <script>
        var id;
        function modalExcluir(t){
            id = t;
            console.log(t)
            console.log(id)
        }

        async function excluir(e){
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            request = $.ajax({
                url: "/api/horarios/" + id,
                type: "DELETE",
                success: function(result) {
                    console.log('batata')
                }
            });
               
        }


    </script>
@endsection