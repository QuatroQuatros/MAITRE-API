@extends('layouts.index')

@section('title')

MAÎTRE || {{strtoupper($restaurante->nome)}}
@endsection

@section('content')
<main id="main">

        <!-- ======= restaurante Section ======= -->
        <section id="restaurante" class="events">
            <div class="container">

                <div class="section-title">
                    <h2><span>{{$restaurante->nome}}</span></h2>
                </div>

                <div class="events-slider swiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="row event-item">
                                <div class="col-lg-6">
                                    <img src="/storage/{{$restaurante->foto}}" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-6 pt-4 pt-lg-0 content">
                                    <h3>{{$restaurante->nome}}</h3>
                                    <p class="fst-italic">
                                        Descrição sobre o restaurante
                                    </p>
                                    <ul>
                                        <li><i class="bi bi-check-circle"></i>Horarios</li>
                                        <li><i class="bi bi-check-circle"></i>Horarios</li>
                                        <li><i class="bi bi-check-circle"></i>Horarios</li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="row event-item">
                                <div class="col-lg-6">
                                    <img src="/storage/app/public/{{$restaurante->foto}}" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-6 pt-4 pt-lg-0 content">
                                    <h3>{{$restaurante->nome}}</h3>
                                    <p class="fst-italic">
                                        Descrição sobre o restaurante
                                    </p>
                                    <ul>
                                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip
                                            ex ea commodo consequat.</li>
                                        <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in
                                            reprehenderit in voluptate velit.</li>
                                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip
                                            ex ea commodo consequat.</li>
                                    </ul>
                                    <p>
                                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                        dolor in reprehenderit in voluptate
                                        velit esse cillum dolore eu fugiat nulla pariatur
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="row event-item">
                                <div class="col-lg-6">
                                    <img src="/storage/{{$restaurante->foto}}" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-6 pt-4 pt-lg-0 content">
                                    <h3>{{$restaurante->nome}}</h3>
                                    <p class="fst-italic">
                                        Descrição sobre o restaurante
                                    </p>
                                    <ul>
                                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip
                                            ex ea commodo consequat.</li>
                                        <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in
                                            reprehenderit in voluptate velit.</li>
                                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip
                                            ex ea commodo consequat.</li>
                                    </ul>
                                    <p>
                                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                        dolor in reprehenderit in voluptate
                                        velit esse cillum dolore eu fugiat nulla pariatur
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End restaurante Section -->

        <!-- ======= informacao Section ======= -->
        <section id="informacao" class="why-us">
            <div class="container">



                <!-- ======= Contact Section ======= -->
                <section id="contato" class="contact">
                    <div class="container mt-5">

                        <div class="section-title">
                            <h2>Restaurante :<span> {{$restaurante->nome}}</span></h2>
                        </div>
                    </div>

                    <div class="container mt-5">

                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 info">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Sobre o restaurante:</h4>
                                    <p>A108 Adam Street<br>New York, NY 535022</p>
                                </div>

                                <div class="col-lg-3 col-md-6 info">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Localização:</h4>
                                    <p>A108 Adam Street<br>New York, NY 535022</p>
                                </div>

                                <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                                    <i class="bi bi-clock"></i>
                                    <h4>Horarios aberto:</h4>
                                    <p>segunda-domingo:<br>11:00 AM - 23:00 PM</p>
                                </div>

                                <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                                    <i class="bi bi-phone"></i>
                                    <h4>Contato</h4>
                                    <p>11 91234-5678<br>info@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </section><!-- End Contact Section -->

                <!-- ======= cardapio Section ======= -->
                <section id="cardapio" class="specials">
                    <div class="container">

                        <div class="section-title">
                            <h2>Pratos<span> Especiais</span></h2>
                            <p>Pratos dedicados as dias especiais</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <ul class="nav nav-tabs flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">prato 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab-2">prato 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab-3">prato 3</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab-4">prato 4</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-9 mt-4 mt-lg-0">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab-1">
                                        <div class="row">
                                            <div class="col-lg-8 details order-2 order-lg-1">
                                                <h3>Nome do prato</h3>
                                                <p class="fst-italic">...</p>
                                                <p>...</p>
                                            </div>
                                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                                <img src="../assets/img/specials-1.jpg" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-2">
                                        <div class="row">
                                            <div class="col-lg-8 details order-2 order-lg-1">
                                                <h3>Nome do prato</h3>
                                                <p class="fst-italic">...</p>
                                                <p>...</p>
                                            </div>
                                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                                <img src="../assets/img/specials-2.jpg" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-3">
                                        <div class="row">
                                            <div class="col-lg-8 details order-2 order-lg-1">
                                                <h3>Nome do prato</h3>
                                                <p class="fst-italic">...</p>
                                                <p>...</p>
                                            </div>
                                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                                <img src="../assets/img/specials-3.jpg" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-4">
                                        <div class="row">
                                            <div class="col-lg-8 details order-2 order-lg-1">
                                                <h3>Nome do prato</h3>
                                                <p class="fst-italic">...</p>
                                                <p>...</p>
                                            </div>
                                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                                <img src="../assets/img/specials-4.jpg" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section><!-- End cardapio Section -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nome do prato</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal-->

        <!--cardapio completo-->
        <section class="menu">
            <div class="container">

                <div class="section-title">
                    <h2>Cardapio <span>completo</span></h2>
                </div>


                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            <li data-filter="*" class="filter-active">Tudo</li>
                            <li data-filter=".filter-starters">Tira-gosto</li>
                            <li data-filter=".filter-salads">Salada</li>
                            <li data-filter=".filter-specialty">Especiarias</li>
                        </ul>
                    </div>
                    <input type="search" placeholder="Pequise por pratos" />
                </div>

                <div class="row menu-container">

                    <div class="col-lg-6 menu-item filter-starters">
                        <div class="menu-content">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Bread
                                barrel</a><span>$6.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-specialty">
                        <div class="menu-content">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Bread
                                barrel</a><span>$6.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-starters">
                        <div class="menu-content">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Crab
                                Cake</a><span>$7.95</span>
                        </div>
                        <div class="menu-ingredients">
                            A delicate crab cake served on a toasted roll with lettuce and
                            tartar
                            sauce
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-salads">
                        <div class="menu-content">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Caesar
                                Selections</a><span>$8.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-specialty">
                        <div class="menu-content">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tuscan
                                Grilled</a><span>$9.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Grilled chicken with provolone, artichoke hearts, and roasted red
                            pesto
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-starters">
                        <div class="menu-content">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Mozzarella
                                Stick</a><span>$4.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-salads">
                        <div class="menu-content">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Greek
                                Salad</a><span>$9.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Fresh spinach, crisp romaine, tomatoes, and Greek olives
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-salads">
                        <div class="menu-content">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Spinach
                                Salad</a><span>$9.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Fresh spinach with mushrooms, hard boiled egg, and warm bacon
                            vinaigrette
                        </div>
                    </div>

                    <div class="col-lg-6 menu-item filter-specialty">
                        <div class="menu-content">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Lobster
                                Roll</a><span>$12.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
                        </div>
                    </div>
                </div>

        </section><!-- End Menu Section -->

        <!-- ======= reservaSection ======= -->
        <section id="reserva" class="book-a-table">
            <div class="container">
                <div class="section-title">
                    <h2>Fazer <span>Reserva</span></h2>
                    <p>Caso gostou desse restaurante e estiver logado em uma conta pode fazer a reserva a qualquer
                        momento.</p>
                </div>

                <form action="/reservas/create" method="post" role="form" class="php-email-form">
                    @csrf
                    <input type="hidden" value="{{$restaurante->id}}" name="restId">
                    <div class="rowLine">
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <input type="number" class="form-control" name="qtd" id="qtd" placeholder="QTDE. Pessoas" data-msg="Digitar quantidade de pessoas">
                            <div class="validate"></div>
                        </div>
        
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <select placeholder="dia da reserva" class="form-control" id="Horario da reserva" name="dia">
                                <option selected value="0">Dia da reserva</option>
                                @foreach($horarios as $h)
                                    <option value="{{$h->diaId}}">{{$h->diaSemana}}</option>
                                @endforeach
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <select placeholder="Horario da reserva" class="form-control" id="Horario da reserva" name="horario">
                                <option selected value="0">Horario da reserva</option>
                                @foreach($horarios as $h)
                                    <option value="{{$h->horario}}">{{$h->horario}}</option>
                                @endforeach
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                            <input type="date" class="form-control" name="data" id="dataInput" placeholder="QTDE. Pessoas" data-msg="Digitar quantidade de pessoas">
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="text-center"><button type="submit">Agendar</button></div>
                </form>
            </div>
        </section><!-- reserva Section -->

        <!-- ======= comentarios Section ======= -->
        <section id="comentario" class="testimonials">
            <div class="container position-relative">
                <div class="section-title">
                    <h2><span>Alguns comentarios</span></h2>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        @if(count($avaliacoes) == 0)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="$restaurante->foto" class="testimonial-img" alt="">
                                    <h3>ESTE RESTAURANTE AINDA NÃO POSSUÍ AVALIAÇÕES</h3>
                                    <!--<h4>Ceo &amp; Founder</h4>-->
                                    <div class="stars">
                                        @for($i = 0; $i < 5; $i++)
                                            <i class="bi bi-star"></i>
                                        @endfor
                                        <!--<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>-->
                                    </div>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Caso você queria fazer um comentário, é só apertar no botão abaixo.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        @endif

                        @foreach($avaliacoes as $a)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="$restaurante->foto" class="testimonial-img" alt="">
                                    <h3>{{$a->nome}}</h3>
                                    <!--<h4>Ceo &amp; Founder</h4>-->
                                    <div class="stars">
                                        @for($i = 0; $i < $a->estrelas; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                        <!--<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>-->
                                    </div>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {{$a->descAvaliacao}}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="center-button">
                        <button type="submit" class="button-coment" data-bs-toggle="modal" data-bs-target="#modalComent">Compartilhe sua opinião também</button>
                    </div>
                </div>

            </div>
        </section><!-- comentarios Section -->

        <!--modal comentario-->
        <div class="modal fade" id="modalComent" tabindex="-1" aria-labelledby="modalComentLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalComentLabel">Opinião sobre esse restaurante</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/avaliacoes/create" method="post">
                            @csrf
                            <input type="hidden" name="restaurante_id" value="{{$restaurante->id}}"/>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Avaliação</label>
                                <div class="estrelas">
                                    <input type="radio" id="cm_star-empty" name="estrelas" value="" checked />
                                    <label for="cm_star-1"><i class="fa"></i></label>
                                    <input type="radio" id="cm_star-1" name="estrelas" value="1" />
                                    <label for="cm_star-2"><i class="fa"></i></label>
                                    <input type="radio" id="cm_star-2" name="estrelas" value="2" />
                                    <label for="cm_star-3"><i class="fa"></i></label>
                                    <input type="radio" id="cm_star-3" name="estrelas" value="3" />
                                    <label for="cm_star-4"><i class="fa"></i></label>
                                    <input type="radio" id="cm_star-4" name="estrelas" value="4" />
                                    <label for="cm_star-5"><i class="fa"></i></label>
                                    <input type="radio" id="cm_star-5" name="estrelas" value="5" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Escreva seu comentario</label>
                                <textarea class="form-control" name="descAvaliacao" id="message-text"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <input type="submit" value="Enviar Comentario">
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

       
    </main>

    <script>
        //Script para definir a data minima e maxima do calendario de reservas.


        const today = new Date();
        const yyyy = today.getFullYear();
        let mm = today.getMonth() + 1; // Months start at 0!
        let mmNext = today.getMonth() + 2; // Months start at 0!
        let dd = today.getDate();

        if (dd < 10) dd = '0' + dd;
        if (mm < 10) mm = '0' + mm;
        if (mmNext < 10) mmNext = '0' + mmNext;

        var date = yyyy + '-' + mm + '-' + dd;
        var dateNext = yyyy + '-' + mmNext + '-01';

        document.getElementById('dataInput').setAttribute("min", date);
        document.getElementById('dataInput').setAttribute("max", dateNext);


    </script>
@endsection