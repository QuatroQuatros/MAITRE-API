@extends('layouts.index')

@section('title', 'MAÎTRE || RESTAURANTES ')

@section('content')
<main id="main">
                <!-- ======= Hero Section ======= -->
                <section id="hero">
                    <div class="hero-container">
                        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                            <div class="carousel-inner" role="listbox">

                                <!-- Slide 1 -->
                                <div class="carousel-item active" style="background-image: url(/img/slide/slide-1.jpg);">
                                    <div class="carousel-container">
                                        <div class="carousel-content">
                                            <h2 class="animate__animated animate__fadeInDown"><span>MAÎ</span>TRE</h2>
                                            <p class="animate__animated animate__fadeInUp">
                                            <div class="section-title">
                                                <h2><span>Facilite seu dia</span></h2>
                                            </div>
                                            </p>
                                            <p class="animate__animated animate__fadeInUp">Pesquise por restaurantes ou seu prato favorito</p>
                                        </div>
                                    </div>
                                </div>


                                @foreach($restaurantes as $r)
                                    @if($r->level == 2)
                                        <!-- Slides -->
                                        <div class="carousel-item" style="background-image: url({{$r->foto}});">
                                            <div class="carousel-container">
                                                <div class="carousel-content">
                                                    <h2 class="animate__animated animate__fadeInDown"><span>{{$r->nome}}</span></h2>
                                                    <p class="animate__animated animate__fadeInUp">RESTAURANTE RÚSTICO E ELEGANTE QUE SERVE PRATOS INTERNACIONAIS, BOLOS, PÃES, SOBREMESAS E DOCES ARTESANAIS.</p>
                                                    <p class="animate__animated animate__fadeInUp"><span class="golden">Alameda Franca, 1243, Rua Haddock Lobo, 1077 - Jardim Paulista, São Paulo - SP, 01422-001</span></p>
                                                    <div>
                                                        <a href="#restaurantes" class="btn-menu animate__animated animate__fadeInUp scrollto">Visitar</a>
                                                        <a href="#restaurantePremium" class="btn-book animate__animated animate__fadeInUp scrollto">Reservar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                

                            </div>

                            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                            </a>

                            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </section><!-- End Hero -->



                <section class="chefs" id="menu">
                    <div class="container d-md-flex align-items-stretch">

                        <nav id="sidebar">
                            <div class="p-4 pt-5">
                                <h5>Filtros de pesquisa</h5>
                                <ul class="list-unstyled components mb-5">
                                    <li>
                                        <label>
                                            <form action="#" class="subscribe-form">
                                                <div class="form-group d-flex">
                                                    <div class="icon"><span class="icon-paper-plane"></span></div>
                                                    <input type="search" class="form-control busca" placeholder="Pesquise...">
                                                </div>
                                            </form>
                                        </label>
                                    </li>
                                    <li>
                                        <h5>Pesquise por categorias</h5>
                                        <label>
                                            <form class="subscribe-form" id="formCat">           
                                                @foreach($categorias as $c)


                                                    <label class="containerCheck">{{$c->categoria}}
                                                        <input id="check" class="filtroCat" type="checkbox" value="{{$c->categoria}}" name="categorias[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                @endforeach 
                                                <input type="submit" value="FILTRAR">
                                            </form>
                                            
                                        </label>

                                    </li>
                                    <li>
                                        <h5>Avaliação por estrelas</h5>
                                        <label id="img_category_label" class="field" for="img_category" data-value="">
                                            <div class="mb-3">
                                                <div class="estrelas">
                                                    <input type="radio" id="cm_star-empty" name="fb" value="" checked />
                                                    <label for="cm_star-1"><i class="fa"></i></label>
                                                    <input type="radio" id="cm_star-1" name="fb" value="1" />
                                                    <label for="cm_star-2"><i class="fa"></i></label>
                                                    <input type="radio" id="cm_star-2" name="fb" value="2" />
                                                    <label for="cm_star-3"><i class="fa"></i></label>
                                                    <input type="radio" id="cm_star-3" name="fb" value="3" />
                                                    <label for="cm_star-4"><i class="fa"></i></label>
                                                    <input type="radio" id="cm_star-4" name="fb" value="4" />
                                                    <label for="cm_star-5"><i class="fa"></i></label>
                                                    <input type="radio" id="cm_star-5" name="fb" value="5" />
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                                <div class="mb-5">
                                    <h5>Pratos mais pesquisados</h5>
                                    <div class="tagcloud">
                                        <a href="#" class="tag-cloud-link">dish</a>
                                        <a href="#" class="tag-cloud-link">menu</a>
                                        <a href="#" class="tag-cloud-link">food</a>
                                        <a href="#" class="tag-cloud-link">sweet</a>
                                        <a href="#" class="tag-cloud-link">tasty</a>
                                        <a href="#" class="tag-cloud-link">delicious</a>
                                        <a href="#" class="tag-cloud-link">desserts</a>
                                        <a href="#" class="tag-cloud-link">drinks</a>
                                    </div>
                                </div>
                            </div>
                        </nav>

                        <div class="container">

                            <div class="section-title">
                                <h2>Alguns <span>restaurantes</span></h2>
                            </div>
                            <div class="row" id="resultado">
                                @foreach ($restaurantes as $r)
                                
                                    <div class="col-lg-4 col-md-6">
                                        <div class="member">
                                            <div class="pic"><img class="restaurante-img" src="{{$r->foto}}" class="img-fluid" alt=""></div>
                                            <div class="member-info">
                                                <h4>{{$r->nome}}</h4>
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                                </div>
                                                <div class="social">
                                                <p>{{$r->categoria}}</p>
                                                </div>
                                                <div class="center-button">
                                                    <a href="/restaurantes/{{$r->id}}"><button type="submit"
                                                            class="button-coment">Visitar restaurante</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>     
                                @endforeach
                                

                            </div>
                        </div>

                    </div>
                </section>
            </main>
            
@endsection