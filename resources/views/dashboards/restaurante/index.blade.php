@extends('layouts.restaurante-adm')
@section('content')
<main>
    <h1>Reservas do dia</h1>

    <div class="insights">
        <div class="sales">
            <div class="middle">
                <div class="left">
                    <h3>Total de reservas(hoje)</h3>
                    <h1>$25,024</h1>
                </div>
            </div>
            <small class="text-muted">Last 24 hours</small>
        </div>
        <!-----------------end sales----------------->
        <div class="expenses">
            <div class="middle">
                <div class="left">
                    <h3>Status do restaurante</h3>
                    <h1>vazio</h1>
                </div>
            </div>
            <small class="text-muted">Last 24 hours</small>
        </div>
        <!-----------------end of expenses----------------->
    </div>
    <!---------------- end insights ---------------->
    <div class="containerNoti">
        <h1>Ultimas reservas feitas</h1>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Nome do cliente</div>
                <div class="col col-2">Email do Cliente</div>
                <div class="col col-3">telefone</div>
                <div class="col col-4">Status</div>
            </li>
            @foreach($reservas as $r)
                <a href="#modal" onclick="carregaModal()">
                    <li class="table-row">
                        <input type="hidden" value="{{$r->id}}" id="id">
                        <div class="col col-1" data-label="Nome do cliente">{{$r->nome}}</div>
                        <div class="col col-2" data-label="Email Cliente">{{$r->email}}</div>
                        <div class="col col-3" data-label="Telefone">$341</div>
                        @if($r->status_reserva_id == 1)
                            <div class="col col-4" data-label="Status"><span class="warning" id="status">Pendente</span></div>
                        @elseif($r->status_reserva_id == 2)
                            <div class="col col-4" data-label="Status"><span class="success" id="status">Aprovado</span></div>
                        @else
                            <div class="col col-4" data-label="Status"><span class="danger" id="status">Cancelado</span></div>
                        @endif  
                    </li>
                </a>
            @endforeach

           
        </ul>
    </div>


    <div class="recent-orders">
        <h2 class="text-muted">Reservas passadas</h2>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nome do cliente</th>
                    <th>Email do cliente</th>
                    <th>Telefone</th>
                    <th>Dia Reserva</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Nome">Winycios</td>
                    <td data-label="Email">111.111.111-86</td>
                    <td data-label="Telefone">11 911111-1111</td>
                    <td data-label="Dia da Reserva">13/09/2004</td>
                </tr>
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
                <img src="/img/logos/atlanticSemFundo.png">
            </div>
        </div>
    </div>
    <!--end top-->
    <div class="recent-updates">
        <h2 class="text-muted">Ultimas avaliações</h2>
        <div class="updates">
            <div class="update">
                <div class="profile-photo">
                    <img src="/img/img1.jpg">
                </div>
                <div class="message">
                    <p><b>Dacuel</b> <span class="material-icons-sharp">stars</span>
                        <span class="material-icons-sharp">stars</span>
                        <span class="material-icons-sharp">stars</span>
                        <span class="material-icons-sharp">stars</span>
                    </p>
                </div>
            </div>
            <div class="update">
                <div class="profile-photo">
                    <img src="/img/img2.jpg">
                </div>
                <div class="message">
                    <p><b>Vyobain</b> <span class="material-icons-sharp">stars</span>
                        <span class="material-icons-sharp">stars</span>
                        <span class="material-icons-sharp">stars</span>
                    </p>
                </div>
            </div>
            <div class="update">
                <div class="profile-photo">
                    <img src="/img/img3.jpg">
                </div>
                <div class="message">
                    <p><b>Oslove</b> <span class="material-icons-sharp">stars</span>
                        <span class="material-icons-sharp">stars</span>

                    </p>
                </div>
            </div>
            <div class="update">
                <div class="profile-photo">
                    <img src="/img/img5.jpg">
                </div>
                <div class="message">
                    <p><b>Moyto</b> <span class="material-icons-sharp">stars</span>
                        <span class="material-icons-sharp">stars</span>
                        <span class="material-icons-sharp">stars</span>
                        <span class="material-icons-sharp">stars</span>
                        <span class="material-icons-sharp">stars</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="sales-analytics">
        <h2 class="text-muted">Opção de conta</h2>
        <a href="#inativar">
            <div class="item online">
                <div class="icon">
                    <span class="material-icons-sharp">disabled_by_default</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Inativar restaurante</h3>
                    </div>
                </div>
            </div>
        </a>
        <a href="#exclusao">
            <div class="item offline">
                <div class="icon">
                    <span class="material-icons-sharp">delete_forever</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Excluir restaurante</h3>
                    </div>
                </div>
            </div>
        </a>
        <a href="../diverso/premium.php">
            <div class="item customers">
                <div class="icon">
                    <span class="material-icons-sharp">upgrade</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3><div class="text-muted">Plano atual:</div> <div class="plano">básico</div></h3>
                        <smal class="text-muted">Aumentar plano</smal>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>

<!-- Modal Dados-->
<div class="modal-wrapper" id="modal">
    <div class="modal-body card">
        <div class="modal-header">
            <h2 class="heading">Dados da reserva</h2>
            <a href="#!" role="button" class="close" aria-label="close this modal">
                <svg viewBox="0 0 24 24">
                    <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                </svg>
            </a>
        </div>

        <div class="central">
            <h3>Nome completo: <span class="text-muted" id="nome"> Winycios alves nascimento </span></h3>
        </div>
        <div class="central">
            <h3>Email : <span class="text-muted" id="email"> 527.690.598-31 </span></h3>
        </div>
        <div class="central">
            <h3>Telefone : <span class="text-muted" id="telefone"> (11) 946233-4046 </span></h3>
        </div>
        <div class="central">
            <h3>Data reserva : <span class="text-muted" id="data"> 13/09/2004 </span></h3>
        </div>
        <div class="central">
            <h3>Horario da Reserva : <span class="text-muted" id="horario"> 13:30 </span></h3>
        </div>
        <div class="central">
            <h3>Quantidade de pessoas : <span class="text-muted" id="qtd"> 5 </span></h3>
        </div>



        <div class="button-center">
            <a href="" class="button button__link">Voltar</a>
            <a href="#popup" class="button button__link">Avançar</a>
        </div>
    </div>
    <a href="#!" class="outside-trigger"></a>
</div>


<!-- Modal Input-->
<div class="popup" id="popup">
    <div class="popup-inner">
        <div class="popup__photo">
            <table class="rwd-table">
                <tr>
                    <th>Mesas</th>
                    <th>Cadeira por mesa</th>
                </tr>
                <tr>
                    <td data-th="Mesas">
                        <ul id="result"></ul>
                    </td>
                    <td data-th="Qtde">
                        <ul>Retirar</ul>
                    </td>
                </tr>
                <tfoot class="rwd-table">
                    <tr>
                        <th>Total de cadeiras que seram usadas :</th>
                    </tr>
                    <tr>
                        <td data-th="Total de assentos">
                            <ul>Dados</ul>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <h4>Mesas adicionadas</h4>

        </div>
        <div class="popup__text">
            <div class="central">
                <h3>Nome completo: <span class="text-muted" id="nome"> Winycios alves nascimento </span></h3>
            </div>
            <div class="central">
                <h3>Email : <span class="text-muted" id="email"> 527.690.598-31 </span></h3>
            </div>
            <div class="central">
                <h3>Telefone : <span class="text-muted" id="telefone"> (11) 946233-4046 </span></h3>
            </div>
            <div class="central">
                <h3>Data reserva : <span class="text-muted" id="data"> 13/09/2004 </span></h3>
            </div>
            <div class="central">
                <h3>Horario da Reserva : <span class="text-muted" id="horario"> 13:30 </span></h3>
            </div>
            <div class="central">
                <h3>Quantidade de pessoas : <span class="text-muted" id="qtd"> 5 </span></h3>
            </div>
    
            <form action="" method="post" id="contact_form">
                <div class="name">
                    <label for="name">
                        <h3>Duração da reserva</h3>
                    </label>
                    <input type="time" name="txDuReserva" id="txDuReserva" required>
                </div>
                <p class='subject'>
                    <label class='label' for='select'></label>
                    <select placeholder="Dia da semana" id="selectMesa" name="txMesas">
                        <option selected value="0">Mesas disponiveis no momento:</option>
                        <option value="1">Mesa 1 = 5</option>
                    </select>
                <div style="display:inline-flex; gap: 10px;">
                    <span class="button button__link" id="btn" onclick="addMesa()">Cadastrar</span>
                    <span class="button button__link" id="btnClear" onclick="limpar()">Limpar</span>
                </div>
                </p>
                <div class="button-center">
                    <a href="#!" class="button button__link">Rejeitar reserva</a>
                    <button class="button button__link" onclick="launch_toast()">Confirmar reserva</button>
                </div>
            </form>
            <div id="toast">
                <div id="desc">Reserva feita com sucesso</div>
            </div>
        </div>
        <a class="popup__close" href="#">X</a>
    </div>
</div>



<!-- modal inativo -->
<div class="modal-container" id="inativar" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <strong>tem certeza ?</strong>
                <form>
                    <fieldset>
                        <span class="create-account"></span>
                        <p>Esse restaurante será inativado por tempo identerminado ou até que o dono desse estabelecimento entre em contato com os administradores da maître. tem certeza disso ?</p>
                        <span class="create-account"></span>
                        <div class="form-row button-login long">
                            <a href="/login"><button class="btn btn-login">Não</button></a>
                            <a href="#!"><button class="btn btn-login">Inativar<i class="fas fa-arrow-right"></i></button></a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </p>
        <a href="#m!" class="link-2"></a>
    </div>
</div>
<!-- /modal inativo -->

<!-- Modal Exclusao-->
<div class="modal-container" id="exclusao" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <strong>tem certeza ?</strong>
                <form>
                    <fieldset>
                        <span class="create-account"></span>
                        <p>Esse restaurante será excluido permanentemente, tem certeza ?</p>
                        <span class="create-account"></span>
                        <div class="form-row button-login long">
                            <a href="/login"><button class="btn btn-login">Não</button></a>
                            <a href="#!"><button class="btn btn-login">Excluir<i class="fas fa-arrow-right"></i></button></a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </p>
        <a href="#m1-c" class="link-2"></a>
    </div>
</div>





@endsection