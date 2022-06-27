@extends('layouts.restaurante-adm')
@section('content')


<main>
    <div class="recent-orders">
        <h1>Pratos já adicionados</h1>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Prato</th>
                    <th>nome </th>
                    <th>Categoria</th>
                    <th>descrição</th>
                    <th>valor</th>
                    <th>alteração</th>
                    <th>exclusão</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pratos as $p)
                    <tr>
                        <td data-label="Prato"><a href="{{$p->foto}}" data-lightbox="portfolio"><img class="prato" src="{{$p->foto}}"></a></td>
                        <td data-label="Nome">{{$p->nome}}</td>
                        <td data-label="Categoria">{{$p->categoria_id}}</td>
                        <td data-label="Descrição">{{$p->descPrato}}</td>
                        <td data-label="Valor">{{$p->valor}}</td>
                        <td><a href="#modalAtualizar" onclick="modalAtualizar({{$p->id}})" class="warning">Alterar prato</a></td>
                        <td><a href="#modal" onclick="abreModal({{$p->id}})"  role="button" class="danger">Excluir prato</a></td>
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


<!-- modal cadastro -->
<div class="modal-container" id="modalCadastro" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">
        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">restaurant_menu</span>
                <strong>Cadastre um prato</strong>
                <form action="/pratos/create" method="Post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <input type="hidden" name="restaurante_id"/>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-calendar-check"></i>
                                <label class="form-label" for="input">Categoria do prato :</label>
                                <select class="form-text" name="categoria_id" id="link1">
                                    <option selected value="0">Escolha a categoria do prato:</option>
                                    <option select value="#adicionar">Cadastrar categorias</option>
                                    @foreach($categorias as $c)
                                        <option select value="{{$c->id}}">{{$c->descCategoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <i class="fas fa-signature"></i>
                                <label class="form-label" for="input">Nome do prato</label>
                                <input type="text" name="nome" id="txPrato" class="form-text">
                            </div>
                            <div class="form-row">
                                <i class="fas fa-file-signature"></i>
                                <label class="form-label" for="input">Descrição</label>
                                <input type="text" name="descPrato" id="txDescricao" class="form-text">
                            </div>
                            <div class="line">
                                <div class="form-row">
                                    <i class="fas fa-tag"></i>
                                    <label class="form-label" for="input">Valor</label>
                                    <input type="text" name="valor" id="txValor" class="form-text">
                                </div>
                                <div class="form-row">
                                    <label class="form-label" for="input">Foto do prato</label>
                                    <input type="file" name="foto" placeholder="Foto" name="fotoRestaurante">
                                </div>
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
        <a href="#" class="link-2"></a>
    </div>
</div>
<!-- /modal Cadastro -->

<!-- modal Atualização -->
<div class="modal-container" id="modalAtualizar" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">
        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">restaurant_menu</span>
                <strong>Atualize um prato</strong>
                    <fieldset>
                        <input type="hidden" name="restaurante_id"/>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-calendar-check"></i>
                                <label class="form-label" for="input">Categoria do prato :</label>
                                <select class="form-text" name="categoria_id" id="link2">
                                    <option selected value="0">Escolha a categoria do prato:</option>
                                    <option select value="#adicionar">Cadastrar categorias</option>
                                    @foreach($categorias as $c)
                                        <option select value="{{$c->id}}">{{$c->descCategoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <i class="fas fa-signature"></i>
                                <label class="form-label" for="input">Nome do prato</label>
                                <input type="text" name="nome" id="nome" class="form-text">
                            </div>
                            <div class="form-row">
                                <i class="fas fa-file-signature"></i>
                                <label class="form-label" for="input">Descrição</label>
                                <input type="text" name="descPrato" id="desc" class="form-text">
                            </div>
                            <div class="line">
                                <div class="form-row">
                                    <i class="fas fa-tag"></i>
                                    <label class="form-label" for="input">Valor</label>
                                    <input type="text" name="valor" id="valor" class="form-text">
                                </div>
                                <div class="form-row">
                                    <label class="form-label" for="input">Foto do prato</label>
                                    <input type="file" name="fotoRest" placeholder="Foto" name="fotoRestaurante">
                                </div>
                            </div>
                            <span class="create-account"></span>
                            <div class="form-row button-login">
                                <button class="btn btn-login" onclick="atualizarPrato(event)">Finalizar<i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </fieldset>
            </div>
        </div>
        </p>
        <a href="#" class="link-2"></a>
    </div>
</div>
<!-- /modal Atualizacao -->

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
            <a href="" onclick="deletarPrato(event)" class="button button__link">Sim</a>
        </div>
    </div>
    <a href="#" class="outside-trigger"></a>
</div>

<!-- modal categoria -->
<div class="modal-container" id="adicionar" style="background: rgb(12 12 12 / 57%);">
    <div class="modal">
        <p class="modal__text">
        <div class="containerform">
            <div class="register">
                <span class="material-icons-sharp">category</span>
                <strong>Cadastre uma categoria</strong>
                <form action="/categoria-prato/create" method="post">
                    @csrf
                    <fieldset>
                        <p>*Por favor verificar se essa categoria já não foi cadastrada</p>
                        <div class="form">
                            <div class="form-row">
                                <i class="fas fa-file-signature"></i>
                                <label class="form-label" for="input">Nova categoria</label>
                                <input type="text" name="descCategoria" class="form-text">
                            </div>
                            <span class="create-account"></span>
                            <div class="form-row button-login">
                                <button class="btn btn-login">Cadastrar<i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </p>
        <a href="#" class="link-2"></a>
    </div>
</div>
<!-- /modal categoria -->

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
                <img src="/img/logos/atlanticSemfundo.png">
            </div>
        </div>
    </div>
    <!------------------- end recent updates --------------------->
    <a href="#modalCadastro">
        <div class="sales-analytics">
            <div class="item add-product">
                <div class="icon">
                    <span class="material-icons-sharp">restaurant_menu</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Cadastrar novo prato</h3>
                        <smal class="text-muted">Pratos no total</smal>
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
    function abreModal(x){
        id = x;

        console.log(id)
    }


    async function deletarPrato(e){
        e.preventDefault();
        console.log('deletar prato', id)

        await fetch('http://127.0.0.1:8000/api/pratos/'+id,{
             method: 'DELETE',
        })
        .then((resp) =>{
            if(resp.ok){
                window.location.href = 'http://127.0.0.1:8000/pratos/cardapio'
                alert('destruiu')
            }
        })
    }

    async function modalAtualizar(x){
        id = x;

        console.log(id)

        var categoria = document.getElementById('link2')
        var nome = document.getElementById('nome')
        var desc = document.getElementById('desc')
        var valor = document.getElementById('valor')
        await fetch('http://127.0.0.1:8000/api/pratos/'+id,{
             method: 'GET',
             headers: { 'Content-Type': 'application/json' },
        })
        .then((resp) =>{
            if(resp.ok){
                return resp.json()
            }
        })
        .then((data) =>{
            categoria.value = data.categoria_id
            nome.value = data.nome
            nome.value = data.nome
            desc.value = data.descPrato
            valor.value = data.valor
        })
    }


    async function atualizarPrato(e){     
        e.preventDefault();
        console.log('atualizar prato', id)

        var categoria = document.getElementById('link2').value
        var nome = document.getElementById('nome').value
        var desc = document.getElementById('desc').value
        var valor = document.getElementById('valor').value

        console.log(categoria)
        console.log(nome)
        console.log(desc)
        console.log(valor)

        await fetch('http://127.0.0.1:8000/api/pratos/'+id,{
             method: 'PUT',
             headers: { 'Content-Type': 'application/json' },
             body: JSON.stringify({ 
                nome: nome, 
                descPrato: desc,
                valor: valor,
                categoria_id:categoria,
            })
        })
        .then((resp) =>{
            if(resp.ok){
                window.location.href = 'http://127.0.0.1:8000/pratos/cardapio'
                alert('atualizado')
            }
        })
    }

</script>


@endsection