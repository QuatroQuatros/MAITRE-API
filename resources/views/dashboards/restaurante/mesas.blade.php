@extends('layouts.restaurante-adm')
@section('content')

<main>
    <h1>Análise de Mesas</h1>

    <div class="recent-orders">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Mesa</th>
                    <th>quantidade por pessoa </th>
                    <th>Alteração</th>
                    <th>Exclusão</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mesas as $m)
                    <tr>
                        <td data-label="Mesa">1</td>
                        <td data-label="Qtde por pessoa">5</td>
                        <td><a href="#modalMesa" class="warning">Alterar mesa</a></td>
                        <td><a href="#modal" role="button" class="danger">excluir mesa</a></td>
                    </tr>
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


<!-- modal cadastro/atualização -->
<div class="modal-container" id="modalMesa" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">

        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">table_bar</span>
                <strong>Cadastre/atualize uma mess</strong>
                <form>
                    <fieldset>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-table"></i>
                                <label class="form-label" id="numMesa" name="numMesa" for="input">Mesa</label>
                                <input type="number" class="form-text">
                            </div>
                            <div class="form-row">
                            <i class="fas fa-user"></i>
                                <label class="form-label" id="numQtdeMesa" name="numQtdeMesa" for="input">Qtde de pessoas por mesa</label>
                                <input type="number" class="form-text">
                            </div>
                            <div class="form-row">
                                <i class="fas fa-stopwatch-20"></i>
                                <label class="form-label" for="input">intervalo de reserva</label>
                                <input type="number" class="form-text">
                            </div>
                            <span class="create-account"></span>
                            <div class="form-row button-login">
                                <button class="btn btn-login" onclick="launch_toast()">Finalizar<i class="fas fa-arrow-right"></i></button>
                                <div id="toast">
                                    <div id="desc">Dado inserido com sucesso</div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </p>
        <a href="#m1-c" class="link-2"></a>
    </div>
</div>
<!-- /modal Cadastro/atualizacao -->

<!-- Modal exclusao-->
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
        <h3>Esse dado será excluido permanentemente, tem certeza ?</h3>

        <div class="button-center">
            <a href="" class="button button__link">Não</a>
            <a href="" class="button button__link">Sim</a>
        </div>
    </div>
    <a href="#!" class="outside-trigger"></a>
</div>

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
    <a href="#modalMesa">
        <div class="sales-analytics">
            <div class="item add-product">
                <div class="icon">
                    <span class="material-icons-sharp">event</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Cadastrar nova mesa</h3>
                        <smal class="text-muted">1 de 7 cadastrados</smal>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>

@endsection