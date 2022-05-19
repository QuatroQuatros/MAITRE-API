@extends('layouts.restaurante-adm')
@section('content')
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['', 'reserva'],
        ['seg',  2],
        ['ter',  3],
        ['qua',  1],
        ['qui',  5],
        ['sex',  8],
        ['sab',  15],
        ['dom',  10],
      ]);

      var options = {
        title: 'Reservas(Por semana)',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
  </script>

<!--grafico de barra-->
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Avaliação(estrelas)','usuarios'],
        ['1', 2],
        ['2', 5],
        ['3', 3],
        ['4', 7],
        ['5', 10]
      ]);

      var options = {
        chart: {
          title: 'Avaliação geral dos clientes',
        }
      };

      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>
</script>

<main>
  <h1>Analise de Dados</h1>

  <div class="insi">
  <div id="curve_chart" style="width: 500px; height: 450px"></div>
      <div id="columnchart_material" style="width: 500px; height: 450px;"></div>
  </div>
  <!---------------- end insights ---------------->
  <div class="recent-orders">
      <h2>Reservas do dia</h2>
      <table>
          <thead>
              <tr>
                  <th>Nome Cliente</th>
                  <th>Data/hora reserva</th>
                  <th>qtde de pessoas</th>
                  <th>Telefone</th>

              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Winycios alves</td>
                  <td>17:00 13/09/2022</td>
                  <td>2</td>
                  <td class="warning">11 94016-6751</td>
              </tr>
              <tr>
                  <td>Lucinaldo santos</td>
                  <td>12:00 13/09/2022</td>
                  <td>1</td>
                  <td class="warning">11 91234-5678</td>
              </tr>
              <tr>
                  <td>Madalena pereira</td>
                  <td>21:00 13/09/2022</td>
                  <td>6</td>
                  <td class="warning">11 98765-4321</td>
              </tr>
              <tr>
                  <td>Luana teixeira</td>
                  <td>22:00 13/09/2022</td>
                  <td>2</td>
                  <td class="warning">11 94016-7894</td>
              </tr>
              <tr>
                  <td>vinicius gomes</td>
                  <td>19:00 13/09/2022</td>
                  <td>8</td>
                  <td class="warning">11 99876-5432</td>
              </tr>
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
              <p>hey, {{$name}}<b></b></p>
              <small class="text-muted">Dono do restaurante</small>
          </div>
          <div class="profile-photo">
              <img src="/images/admin/logos/atlanticSemfundo.png">
          </div>
      </div>
  </div>
  <!--end top-->
  <div class="recent-updates">
      <h2>Ultimas avaliações</h2>
      <div class="updates">
          <div class="update">
              <div class="profile-photo">
                  <img src="/images/admin/img1.jpg">
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
                  <img src="/images/admin/img2.jpg">
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
                  <img src="/images/admin/img3.jpg">
              </div>
              <div class="message">
                  <p><b>Oslove</b> <span class="material-icons-sharp">stars</span>
                      <span class="material-icons-sharp">stars</span>

                  </p>
              </div>
          </div>
          <div class="update">
              <div class="profile-photo">
                  <img src="/images/admin/img5.jpg">
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
  <!------------------- end recent updates --------------------->
  <div class="sales-analytics">
      <h2>Cardapio via pdf</h2>
      <div class="item online">
          <div class="icon">
              <span class="material-icons-sharp">download</span>
          </div>
          <div class="icon">
            
          </div>
      </div>
  </div>
  <!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>


@endsection