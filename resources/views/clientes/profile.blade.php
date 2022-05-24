@extends("layouts.index")

@section('content')
<img src="/img/bem.jpg" style="width: 100%; height:18vh;" alt="">

            <section id="contact" class="contact">

                <!--IMAGEM DO CLIENTE-->
                <div class="container mt-5">
                    <div class="php-email-form">
                        <div class="section-title">
                            <h2>Dados do <span>Usuario</span></h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group ">
                                <div class="text-center">
                                    <img src="/img/chefs/chefs-1.jpg" class="img-logo" alt="">
                                    <form class="form-upload">
                                        <label class="input-personalizado">
                                            <span data-bs-toggle="modal" data-bs-target="#modalFoto" class="botao-selecionar">Trocar imagem de perfil</span>
                                            <img class="imagem" />
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 form-goup">
                                <div class=" container mt-5">
                                    <div class="rowLine">
                                        <div class=" info">
                                            <i class="bi bi-person-circle"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalNome">Nome de usuario</h4>
                                            <p>A108 Adam Street<br>New York, NY 535022</p>
                                        </div>

                                        <div class=" info">
                                            <i class="bi bi-telephone"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalTel">Seu telefone</h4>
                                            <p>A108 Adam Street<br>New York, NY 535022</p>
                                        </div>

                                        <div class=" info mt-4 mt-lg-0">
                                            <i class="bi bi-list"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalCpf">CPF</h4>
                                            <p>segunda-domingo:<br>11:00 AM - 23:00 PM</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 form-goup">
                                <div class="container mt-5">
                                    <div class="rowLine">
                                        <div class=" info">
                                            <i class="bi bi-globe"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalEndereco">Endereço </h4>
                                            <p>Rua Luís Álvares de Espinha, 169</p>
                                        </div>
                                        <div class=" info mt-4 mt-lg-0">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalEmail">E-mail cadastrado</h4>
                                            <p>info@example.com</p>
                                        </div>
                                        <div class=" info mt-4 mt-lg-0">
                                            <i class="fas fa-lock icon-modify"></i>
                                            <h4 class="pointerCliente" data-bs-toggle="modal" data-bs-target="#modalSenha">Senha cadastrada</h4>
                                            <p data-bs-toggle="modal" data-bs-target="#modalSenha"class="altSenha">Alterar senha</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

            <!--modal Alteração-->

            <!--foto alteração-->
            <div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="modalFotoLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFotoLabel">Alteração de foto de perfil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                                <div class="text-center">
                                    <div id="img-container">
                                        <img src="/img/chefs/chefs-1.jpg" class="img-logo" id="preview" alt="">
                                    </div>
                                    <form class="form-uploadNot" action="" method="post" role="form">
                                        <label class="input-personalizado">
                                            <span class="botao-selecionar">Trocar foto</span>
                                            <img class="imagem" />
                                            <input type="file" class="input-file" id="img-input" name="imagem" accept="image/*">
                                        </label>
                                        <div class="modal-footer"></div>
                                        <a href=""><button class="btn btn-primaryBoot">Salvar Foto</button></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Nome de usuario-->
            <div class="modal fade" id="modalNome" tabindex="-1" aria-labelledby="modalNomeLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalNomeLabel">Alteração de nome</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                                <form action="" method="post" role="form" class="form">
                                    <label class="label-input" for="">
                                        <i class="far fa-user icon-modify"></i>
                                        <input type="text" placeholder="Novo nome do usuario">
                                    </label>
                                    <a href=""><button class="btn btn-primaryBoot">Salvar dados</button></a>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- telefone do usuario-->
            <div class="modal fade" id="modalTel" tabindex="-1" aria-labelledby="modalTelLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTelLabel">Alteração de contato</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                                <form action="" method="post" role="form" class="form">
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-phone-volume icon-modify"></i>
                                        <input type="text" placeholder="Telefone(contato)">
                                    </label>

                                    <a href=""><button class="btn btn-second">Salvar dados</button></a>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- cpf do usuario-->
            <div class="modal fade" id="modalCpf" tabindex="-1" aria-labelledby="modalCpfLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCpdLabel">Alteração de CPF</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                                <form action="" method="post" role="form" class="form">
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-clipboard-list icon-modify"></i>
                                        <input type="text" placeholder="Cpf do usuario">
                                    </label>
                                    <a href=""><button class="btn btn-second">Salvar dados</button></a>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- email  do usuario-->
            <div class="modal fade" id="modalEmail" tabindex="-1" aria-labelledby="modalEmailLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEmailLabel">Alteração de Email</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                                <form action="" method="post" role="form" class="form">
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-at icon-modify"></i>
                                        <input type="email" placeholder="Digite seu Email atual">
                                    </label>
                                    <h6>DIGITE SEU NOVO <span>EMAIL</span></h6>
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-at icon-modify"></i>
                                        <input type="email" placeholder="Digite seu novo email">
                                    </label>
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-at icon-modify"></i>
                                        <input type="email" placeholder="Confirmar email">
                                    </label>
                                    <a href=""><button class="btn btn-second">Salvar dados</button></a>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- senha do usuario-->
            <div class="modal fade" id="modalSenha" tabindex="-1" aria-labelledby="modalSenhaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalSenhaLabel">Alteração de senha</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                                <form action="" method="post" role="form" class="form">
                                    <label class="label-input" for="">
                                        <i class="fas fa-lock icon-modify"></i>
                                        <input type="text" placeholder="Digite sua senha atual">
                                    </label>
                                    <h6>DIGITE SUA NOVA <span>SENHA</span></h6>
                                    <label class="label-input" for="">
                                        <i class="fas fa-lock icon-modify"></i>
                                        <input type="password" id="password-field" placeholder="Senha">
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-right: 5px;"></span>
                                    </label>
                                    <label class="label-input" for="">
                                        <i class="fas fa-lock icon-modify"></i>
                                        <input type="password" id="password-field2" placeholder="Confirmar Senha">
                                        <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password" style="margin-right: 5px;"></span>
                                    </label>
                                    <a href=""><button class="btn btn-second">Salvar dados</button></a>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- endereço-->
            <div class="modal fade" id="modalEndereco" tabindex="-1" aria-labelledby="modalEnderecoLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEnderecoLabel">Alteração de endereço</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rowCenter">
                                <form action="" method="post" role="form" class="form">
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-house-flag icon-modify"></i>
                                        <input type="text" name="cep" id="cep" placeholder="CEP :">
                                    </label>
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-road icon-modify"></i>
                                        <input type="text" name="rua" id="rua" placeholder="Rua :">
                                    </label>
                                    <label class="label-input" for="">
                                        <i class="fa-solid fa-house-user icon-modify"></i>
                                        <input type="number" placeholder="Numero residencial :">
                                    </label>
                                    <a href=""><button class="btn btn-second">Salvar dados</button></a>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <section id="contact" class="contact">
                <div class="php-email-form">
                    <div class="section-title">
                        <h2>Suas<span> Reservas</span></h2>
                    </div>
                    <div class="recent-orders">
                    <table>
                <thead>
                    <tr>
                        <th>Data da Reserva</th>
                        <th>Horario Da Reserva</th>
                        <th>Restaurante da Reserva</th>
                        <th>Quantidade de Pessoas</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservas as $r)
                    <tr>
                        <td data-title="Data">{{$r->data}}</td>
                        <td data-title="Horario">{{$r->data}}</td>
                        <td data-title="restaurante">{{$r->data}}<button type="submit" class="button-option warning" data-bs-toggle="modal" data-bs-target="#modalAlt">(Alterar)</button></td>
                        <td data-title="pessoas">{{$r->data}}<button type="submit" class="button-option danger" data-bs-toggle="modal" data-bs-target="#modalExluir">(Excluir)</button></td>
                        <td data-title="status" class="successfull">{{$r->data}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td data-title="Data">Colocar do banco</td>
                        <td data-title="Horario">Colocar do banco</td>
                        <td data-title="restaurante">Colocar do banco<button type="submit" class="button-option warning" data-bs-toggle="modal" data-bs-target="#modalAlt">(Alterar)</button></td>
                        <td data-title="pessoas">Colocar do banco<button type="submit" class="button-option danger" data-bs-toggle="modal" data-bs-target="#modalExluir">(Excluir)</button></td>
                        <td data-title="status" class="warning">Pendente</td>
                    </tr>
                    <tr>
                        <td data-title="Data">Colocar do banco</td>
                        <td data-title="Horario">Colocar do banco</td>
                        <td data-title="restaurante">Colocar do banco<button type="submit" class="button-option warning" data-bs-toggle="modal" data-bs-target="#modalAlt">(Alterar)</button></td>
                        <td data-title="pessoas">Colocar do banco<button type="submit" class="button-option danger" data-bs-toggle="modal" data-bs-target="#modalExluir">(Excluir)</button></td>
                        <td data-title="status" class="warning">Pendente</td>
                    </tr>
                    <tr>
                        <td data-title="Data">Colocar do banco</td>
                        <td data-title="Horario">Colocar do banco</td>
                        <td data-title="restaurante">Colocar do banco<button type="submit" class="button-option warning" data-bs-toggle="modal" data-bs-target="#modalAlt">(Alterar)</button></td>
                        <td data-title="pessoas">Colocar do banco<button type="submit" class="button-option danger" data-bs-toggle="modal" data-bs-target="#modalExluir">(Excluir)</button></td>
                        <td data-title="status" class="danger">Cancelado</td>
                    </tr>
                </tbody>
            </table>
                    </div>
                </div>
            </section>


            <!--reservas-->
            <!-- Modal Exclusao-->
            <div class="modal fade" id="modalExluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalExcluirLabel">Tem certeza ?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            A reserva do dia (**/**/****) será excluida permanentemente tem certeza ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                            <button type="button" class="btn btn-primaryBoot" data-bs-dismiss="modal"><a href="">Sim</a></button>
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
                            <div class="rowCenter">
                                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                                    <input type="number" class="form-120" name="qtdePessoa" id="qtdePessoa" placeholder="QTDE. Pessoas" data-msg="Digitar quantidade de pessoas">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                                    <input type="text" class="form-120" name="nomeRest" id="nomeRest" placeholder="Nome do restaurante" data-msg="Escreva seu nome">
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
                                
                                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                                    <select placeholder="Horario da reserva" class="form-120" id="HorarioReserva" name="horarioReserva">
                                        <option selected value="0">Horario da reserva</option>
                                        <option select value="13"></option>
                                        <option select value="14"></option>
                                        <option select value="15"></option>
                                        <option select value="16"></option>
                                        <option select value="17"></option>
                                        <option select value="18"></option>
                                        <option select value="19"></option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primaryBoot"><a href="">Alterar reserva</a></button>
                        </div>
                    </div>
                </div>
            </div>
@endsection