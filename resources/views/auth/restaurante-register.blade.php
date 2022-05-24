@extends('layouts.authRestaurante')

@section('content')


    <img src="/img/bem2.jpg" style="width: 100%; height:18vh;" alt="">
        <div class="section-title">
            <h2><span>Continuação do</span> Cadastro de restaurante</h2>
        </div>
        <div class="containerFormRes">
            <div class="card">
                <div class="form">
                    <div class="left-side">
                        <div class="left-heading">
                            <h3>Cadastrando seu restaurante</h3>
                        </div>
                        <div class="steps-content">
                            <h3>Passo <span class="step-number">1</span></h3>
                            <p class="step-number-content active">Entre com os dados principais do restaurante</p>
                            <input type="hidden" id="formLevel" value="0">
                        </div>
                        <ul class="progress-bar">
                            <li class="active">Dados necessarios</li>
                            <li>Localização</li>
                            <li>Foto restaurante</li>
                            <li>Dias</li>
                            <li>Horários</li>
                            <li>Mesas</li>
                        </ul>
                    </div>
                    <div class="right-side">
                        <!--inicio do formulario de dados-->
                        <form method="POST" id="form1" enctype="multipart/form-data">
                            @csrf
                            <div class="main active">
                                <div class="text">
                                    <h2>Informações obrigatorias</h2>
                                    <p>Insira essas informações para se fazer seu negócio decolar</p>
                                </div>

                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="nome" id="user_name" required require>
                                        <span>Nome do restaurante</span>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="tel" required require>
                                        <span>Tel.Restaurante(contato)</span>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <select name="categoria_id">
                                            <option value="0">Selecione a categoria de seu restaurante</option>
                                            @foreach($categorias as $c)
                                                <option value="{{$c->id}}">{{$c->descCategoria}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button class="next_button">Próxima etapa</button>
                                </div>
                            </div>
                            <div class="main">
                                <div class="text">
                                    <h2>Localização</h2>
                                    <p>Informe o endereço de seu restaurante</p>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="cep" id="cep" required require>
                                        <span>CEP:</span>
                                    </div>
                                    <div class="input-div">
                                        <input type="text" name="bairro" id="bairro" required require>
                                        <span>Bairro:</span>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="endereco" id="rua" required require>
                                        <span>Rua:</span>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="cidade" id="cidade" required require>
                                        <span>Cidade:</span>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="estado" id="estado" required require>
                                        <span>Estado :</span>
                                    </div>
                                </div>
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="numero" required require>
                                        <span>Número do restaurante:</span>
                                    </div>
                                </div>
                                <div class="buttons button_space">
                                    <button class="back_button">Voltar</button>
                                    <span class="next_button">Próxima Etapa</span>
                                </div>
                            </div>
                            <!--img-->
                            <div class="main">
                                <div class="text">
                                    <h2>Foto do restaurante</h2>
                                    <p>Foto que iremos usar para apresentar seu restaurante</p>
                                </div>
                                <div class="text-center">
                                    <!--fileList-->
                                    <img src="/img/chefs/chefs-1.jpg" class="img-ftRest" id="preview" alt="">
                                    <div class="form-upload">
                                        <label class="input-personalizado">
                                            <span data-bs-toggle="modal" data-bs-target="#modalFoto" class="botao-selecionar">Trocar imagem de perfil</span>
                                            <img class="imagem" />
                                        </label>
                                    </div>
                                </div>
                                <div class="buttons button_space">
                                    <button class="back_button">Voltar</button>
                                    <button class="next_button">Próxima Etapa</button>
                                    
                                </div>
                            </div>
                            <div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="modalFotoLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalFotoLabel">Alteração de foto de perfil</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                            <div class="modal-body">
                                                <!--necessario colocar o codigo aqui tambem ou sobe esse modal lá para cima-->
                                                <div class="rowCenter">
                                                    <div class="text-center">
                                                        <div id="img-container">
                                                            <img src="/img/chefs/chefs-1.jpg" class="img-ftRest" id="preview2" alt="">
                                                        </div>
                                                        
                                                            <label class="input-personalizado">
                                                                <span class="botao-selecionar">Trocar foto</span>
                                                                <img class="imagem" />
                                                                <input type="file" class="input-file" id="img-input" name="foto" accept="image/*">
                                                            </label>
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--fim do formulario-->
                    <!--</div> apaguei essa div--> 

                    <!--modal foto alteração-->
                    

                    <div class="main">
                        <div class="text">
                            <h2>Dias</h2>
                            <p>Selecione os dias que o seu restaurante esta aberto</p>
                        </div>
                        <!--form para seleção de dias-->
                        <form id="formDia">
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='2' role="switch" id="seg">
                                        <label class="form-check-label" for="seg">segunda-feira</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='3' role="switch" id="ter">
                                        <label class="form-check-label" for="ter">terça-feira</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='4' role="switch" id="qua">
                                        <label class="form-check-label" for="qua">quarta-feira</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='5' role="switch" id="qui">
                                        <label class="form-check-label" for="qui">quinta-feira</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='6' role="switch" id="sex">
                                        <label class="form-check-label" for="sex">sexta-feira</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='7' role="switch" id="sab">
                                        <label class="form-check-label" for="sab">sabado</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="dia[]" value='1' role="switch" id="dom">
                                        <label class="form-check-label" for="dom">domingo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button class="back_button">voltar</button>
                                <button class="next_button">Próxima Etapa</button>
                            </div>
                        </form>
                    </div>

                    <div class="main">
                        <div class="text">
                            <h2>Horários</h2>
                            <p>Digite os horários que seu restaurante estará aberto</p>
                        </div>
                        <!--form para seleção de horario (CASO QUISER QUE A PAGINA RECARREGUE TIRA O ID-->
                        <form id="formHorario">
                            <div class="input-text">
                                <!-- Custom select structure -->
                                <select id="dias">
                                    <option selected>Selecione um dia </option>
                                    
                                </select>
                                <!-- Custom select structure -->
                            </div>
                            <div class="input-text">
                                <label>Horário de Abertura</label>
                                <div class="input-div">
                                    <input type="time" name="inicio" id="inicio" min="01:00" max="23:59" >
                                </div>
                            </div>
                            <div class="input-text">
                                <label>Horário de fechamento</label>
                                <div class="input-div">
                                    <input type="time" name="fim" id="fim" min="01:00" max="23:59" >
                                </div>
                            </div>
                            <div class="input-text">
                                <label>Intervalo de reserva</label>
                                <button type="button" class="btn btn-primary" data-bs-toggle="popover" title="Intervalo de reserva ?" data-bs-content="Intervalo, serve para termos uma base de quanto tempo é necessario para uma reserva ficar em espera">(?)</button>
                                <div class="input-div">
                                    <input type="time" name="intervalo" id="intervalo" min="01:00" max="04:00" placeholder="01:00">
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="back_button" id="horarioVoltar">voltar</button>
                                <!--<span id="finalizar" class="disabled">Proxima Etapa</span>-->
                                <!--<button class="disabled" id="finalizar">Proximo</button>-->
                                <button onclick="cadastrarHorario()">Cadastrar</button>
                                <button class="next_button">Proxíma Etapa</button>

                            </div>
                        </form>
                    </div>

                    <div class="main">
                        <div class="text">
                            <h2>Mesas</h2>
                            <p>Cadastre a quantidade de mesas que serão disponibilizadas para reservas</p>
                        </div>
                        <!--form para mesas-->
                        <form id="formMesa">
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="number" name="qtd" id="qtdMesas">
                                    <span>Qtde. mesas</span>
                                </div>
                                <div class="input-div">
                                    <input type="number" name="cap" id="capMesa">
                                    <span>Capacidade pessoas</span>
                                </div>
                            </div>
                            <div class="buttons button_space">
                                <button class="back_button" id="horarioVoltar">voltar</button>
                                <button onclick="cadastrarMesa()">Cadastrar</button>
                                <button class="next_button">Finalizar</button>
                                <!--<button id="finalizar" class="disabled">Finalizar</button>-->
                            </div>
                        </form>
                    </div>
                    <div class="main">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>

                        <div class="text congrats">
                            <h2>Obrigado!</h2>
                            <p>Obrigado<span class="shown_name"></span> Seu restaurante foi cadastrado com sucesso</p>
                            <div class="buttons button_space">
                                <a href="/restaurantes/admin"><button class="next_button">Finalizar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection