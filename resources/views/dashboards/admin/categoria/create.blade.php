@extends('layouts.admin')
@section('content')

<main>
    <h1>Analise de Dados</h1>

    <div class="insights">
        <div class="income">
            <span class="material-icons-sharp">analytics</span>
            <div class="middle">
                <div class="left">
                    <h3>Total de categorias</h3>
                    <h1>5</h1>
                </div>
            </div>
            <small class="text-muted">atualizado a 24 horas</small>
        </div>
        <!-----------------end sales----------------->
        <div class="expenses">
            <span class="material-icons-sharp">bar_chart</span>
            <div class="middle">
                <div class="left">
                    <h3>Mais restaurantes</h3>
                    <h1>Lanches</h1>
                </div>
            </div>
            <small class="text-muted">atualizado a 24 horas</small>
        </div>
        <!-----------------end of expenses----------------->
        <div class="sales">
            <span class="material-icons-sharp">stacked_line_chart</span>
            <div class="middle">
                <div class="left">
                    <h3>Nenhum restaurante</h3>
                    <h1>Saudaveis</h1>
                </div>
            </div>
            <small class="text-muted">atualizado a 24 horas</small>
        </div>
        <!----------------- end income ----------------->
    </div>
    <!---------------- end insights ---------------->

    <div class="recent-orders">
        <h2>Categorias Cadastradas</h2>
        <table>
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>QTDE. restaurantes</th>
                    <th>Opção</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $c)
                    <tr>
                        <td>{{$c->descCategoria}}</td>
                        <td></td>
                        <td>
                            <form action="/admin/categorias/{{$c->id}}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="event.preventDefault();
                                this.closest('form').submit();">Excluir</a>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
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
                <p>hey, <b>ADM</b></p>
                <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
                <img src="/images/admin/logos/atlanticSemfundo.png">
            </div>
        </div>
    </div>
    <!--end top-->
    <div class="recent-updates">
        <h2>Pesquisar por categorias</h2>
        <div class="updates">
            <input type="text" id="txtBusca" placeholder="Buscar..." />
            <div class="update">
                <div class="profile-photo">
                    <img src="">
                </div>
                <div class="message">
                    <p><b>Pizzas</b> 5 restaurantes</p>
                    <small class="text-muted">
                        <td><a href='../../adm_crud/exclusao-Cliente.php?id=$row[0]' class='warning'>Excluir Produto</a>
                        </td>
                    </small>
                </div>
            </div>
        </div>
    </div>
    <!-- Formulario -->
    <div id="containerForm">
        <h1>&bull;adicione Categorias&bull;</h1>
        <div class="underline"></div>
        <form action="/admin/categorias/create" method="post" id="contact_form">
            @csrf
            <div class="nameCat">
                <label for="name"></label>
                <input type="text" placeholder="Categoria a cadastrar" value="{{old('descCategoria')}}" name="descCategoria" id="txCat" required>
                @if($errors->has('descCategoria'))
                    <div class="error-msg">{{$errors->first('descCategoria')}}</div>
                @endif
            </div>
            <input type="submit" value="Cadastrar" id="form_button">
        </form>
    </div>
    <!--end top-->
    <!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>

@endsection