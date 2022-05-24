@extends('layouts.index')

@section('title', 'MAÎTRE || SERVINDO A VOCÊ')

@section('content')
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
                          <p class="animate__animated animate__fadeInUp">Servindo a você.</p>
                          <div>
                              <a href="/restaurantes"
                                  class="btn-menu animate__animated animate__fadeInUp scrollto">Restaurantes</a>
                              <a href="#restaurantePremium"
                                  class="btn-book animate__animated animate__fadeInUp scrollto">Premium</a>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Slide 2 -->
              <div class="carousel-item" style="background-image: url(/img/slide/slide-2.jpg);">
                  <div class="carousel-container">
                      <div class="carousel-content">
                        <h2 class="animate__animated animate__fadeInDown"><span>MAÎ</span>TRE</h2>
                          <p class="animate__animated animate__fadeInUp">Encontre os melhores restaurantes perto de você.</p>
                          <div>
                              <a href="/restaurantes"
                                  class="btn-menu animate__animated animate__fadeInUp scrollto">Restaurantes</a>
                              <a href="#restaurantePremium"
                                  class="btn-book animate__animated animate__fadeInUp scrollto">Premium</a>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Slide 3 -->
              <div class="carousel-item" style="background-image: url(/img/slide/slide-3.jpg);">
                  <div class="carousel-container">
                      <div class="carousel-content">
                        <h2 class="animate__animated animate__fadeInDown"><span>MAÎ</span>TRE</h2>
                          <p class="animate__animated animate__fadeInUp">Fazer reservas nos seus restaurantes favoritos nunca foi tão fácil.</p>
                          <div>
                              <a href="/restaurantes"
                                  class="btn-menu animate__animated animate__fadeInUp scrollto">Restaurantes</a>
                              <a href="#restaurantePremium"
                                  class="btn-book animate__animated animate__fadeInUp scrollto">Premium</a>
                          </div>
                      </div>
                  </div>
              </div>

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

<main id="main">

  <!--======= restaurantes Section ======= -->
  <section id="restaurantes" class="chefs">
      <div class="container">

          <div class="section-title">
              <h2>Alguns <span>restaurantes</span></h2>
          </div>

          <div class="row">
          @if(count($restaurantes) == 0)
            <div class="col-lg-4 col-md-6">
              <div class="member">
                  <div class="pic"><img class="restaurante-img" src="img/notFound.png" class="img-fluid" alt=""></div>
                  <div class="member-info">
                      <p>Não foi possivel encontrar nenhum restaurante</p>


                  </div>
              </div>
            </div>
          @endif
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
                    <div class="center-button">
                        <a href="/restaurantes/{{$r->id}}"><button type="submit"
                                class="button-coment">Visitar restaurante</button></a>
                    </div>
                </div>
            </div>
          </div>
          @endforeach
      </div>
  </section><!-- End restaurante Section -->


  <!-- ======= full restaurantes Section ======= -->
  <section id="restaurantePremium" class="events">
      <div class="container">

          <div class="section-title">
              <h2>Restaurantes <span>Em Destaque</span></h2>
          </div>

          <div class="events-slider swiper">
              <div class="swiper-wrapper">

                  <div class="swiper-slide">
                      <div class="row event-item">
                          <div class="col-lg-6">
                              <img src="/img/event-birthday.jpg" class="img-fluid" alt="">
                          </div>
                          <div class="col-lg-6 pt-4 pt-lg-0 content">
                              <h3>Birthday Parties</h3>
                              <div class="price">
                                  <p><span>$189</span></p>
                              </div>
                              <p class="fst-italic">
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                  incididunt ut labore et dolore
                                  magna aliqua.
                              </p>
                              <ul>
                                  <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea
                                      commodo
                                      consequat.</li>
                                  <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in
                                      voluptate velit.</li>
                                  <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea
                                      commodo
                                      consequat.</li>
                              </ul>
                              <p>
                                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                  in
                                  reprehenderit in voluptate
                                  velit esse cillum dolore eu fugiat nulla pariatur
                              </p>
                              <a href="./restaurante/restaurante.php"><button type="submit"
                                      class="button-coment">Visitar restaurante</button></a>
                          </div>
                      </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                      <div class="row event-item">
                          <div class="col-lg-6">
                              <img src="/img/event-private.jpg" class="img-fluid" alt="">
                          </div>
                          <div class="col-lg-6 pt-4 pt-lg-0 content">
                              <h3>Private Parties</h3>
                              <div class="price">
                                  <p><span>$290</span></p>
                              </div>
                              <p class="fst-italic">
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                  incididunt ut labore et dolore
                                  magna aliqua.
                              </p>
                              <ul>
                                  <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea
                                      commodo
                                      consequat.</li>
                                  <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in
                                      voluptate velit.</li>
                                  <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea
                                      commodo
                                      consequat.</li>
                              </ul>
                              <p>
                                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                  in
                                  reprehenderit in voluptate
                                  velit esse cillum dolore eu fugiat nulla pariatur
                              </p>
                              <a href="./restaurante/restaurante.php"><button type="submit"
                                      class="button-coment">Visitar restaurante</button></a>
                          </div>
                      </div>
                  </div><!-- End testimonial item -->
                  <div class="swiper-slide">
                      <div class="row event-item">
                          <div class="col-lg-6">
                              <img src="/img/event-custom.jpg" class="img-fluid" alt="">
                          </div>
                          <div class="col-lg-6 pt-4 pt-lg-0 content">
                              <h3>Custom Parties</h3>
                              <div class="price">
                                  <p><span>$99</span></p>
                              </div>
                              <p class="fst-italic">
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                  incididunt ut labore et dolore
                                  magna aliqua.
                              </p>
                              <ul>
                                  <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea
                                      commodo
                                      consequat.</li>
                                  <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in
                                      voluptate velit.</li>
                                  <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea
                                      commodo
                                      consequat.</li>
                              </ul>
                              <p>
                                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                  in
                                  reprehenderit in voluptate
                                  velit esse cillum dolore eu fugiat nulla pariatur
                              </p>
                              <a href="./restaurante/restaurante.php"><button type="submit"
                                      class="button-coment">Visitar restaurante</button></a>
                          </div>
                      </div>
                  </div><!-- End testimonial item -->
              </div>
              <div class="swiper-pagination"></div>
          </div>
      </div>
  </section><!-- End restaurante premiu Section -->

</main><!-- End #main -->
@endsection

  
