@extends('layouts.index')

@section('title', 'MAÎTRE || RESTAURANTES ')

@section('content')
<main id="main">
    <div class="testimonials" id="inicio">
        <div class="container position-relative">
            <div class="section-title">
                <h2><span>Facilite seu dia</span></h2>
                <h3 class="h3White">Pesquise por seus restaurantes favoritos</h3>
            </div>
        </div>
    </div>

    <section class="menu" id="menu">
        <div class="container">
            <ul class="cards">
                @foreach($restaurantes as $r)
                <li>
                    <a href="/restaurantes/{{$r->id}}" class="card">
                        <img class="restaurante-card" src="/storage/{{$r->foto}}" class="card__image" alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <img class="card__thumb"
                                    src="https://img.elo7.com.br/product/original/2E973A3/logotipo-personalizada-restaurante-arte-digital-restaurante.jpg"
                                    alt="" />
                                <div class="card__header-text">
                                    <h3 class="card__title">{{$r->nome}}</h3>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="card__status">Categoria do restaurante</span>
                                </div>
                            </div>
                            <p class="card__description">Descrição do restaurante</p>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </section>

    
</main>
@endsection