<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD || Cliente</title>

      <!--Load the AJAX API-->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!--ionIcons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!--links pages-->
    <link rel="stylesheet" href="/css/admin/style.css">
    <link rel="stylesheet" href="/css/admin/cadasRes.css">
    <link rel="stylesheet" href="/css/admin/lightbox.css">

    <!--Material CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
</head>

 <!--side bar-->
 <div class="container">
    <aside>
        <div class="top">
            <div class="logo">
                <img src="/images/admin/logos/LogoApp.png">
                <h2>Location<span class="primary">fast</span></h2>
            </div>
        </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp">close</span>
        </div>

        <div class="sidebar">
            <a href="../dash/admi.php" class="active">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Dashboard</h3>
            </a>
            <!--crud restaurante-->
            <div class="dropdownRes">
                <a class="active">
                    <span class="material-icons-sharp">east</span>
                    <h3>Dados do restaurante</h3>
                </a>
                <div class="dropdown-contentRes">
                    <a href="/restaurantes/create" class="active">
                        <span class="material-icons-sharp">inventory</span>
                        <h3>Alterar dados(restaurante)</h3>
                    </a>
                    <a href="../restaurante/visualizarRestaurante.php" class="active">
                        <span class="material-icons-sharp">insights</span>
                        <h3>Visualizar Restaurante(s)</h3>
                    </a>
                    <a href="../restaurante/excluirRestaurante.php" class="active">
                        <span class="material-icons-sharp">report_gmailerrorred</span>
                        <h3>Excluir restaurante</h3>
                        </a>
                    <a href="../dash/admi.php" class="active">
                    </a>
                       </a>
                    <a href="../dash/admi.php" class="active">
                    </a>
                </div>
            </div>

            <a href="../diverso/horario.php" class="active">
                <span class="material-icons-sharp">event</span>
                <h3>Horarios uteis</h3>
            </a>
            <a href="../diverso/mesas.php" class="active">
                <span class="material-icons-sharp">table_bar</span>
                <h3>total de mesas</h3>
            </a>
            <a href="../diverso/cardapio.php" class="active">
                <span class="material-icons-sharp">restaurant_menu</span>
                <h3>Cardapio</h3>
            </a>

            <a href="#" class="active">
                <span class="material-icons-sharp">mail_outline</span>
                <h3>Messages</h3>
                <span class="message-count">26</span>
            </a>
            <form class="form-logout" method="POST" action="/logout">
                @csrf
                  
                  <a class="active" href="#" onclick="event.preventDefault();
                  this.closest('form').submit();">
                  <span class="material-icons-sharp">logout</span>
                  <h3>Sair</h3>
                  
                </a>
            </form>
        </div>
    </aside>

    <!---------------- end aside ---------------->
    @yield('content')

    <!--JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--links internos-->
    <script src="/js/admin/style.js"></script>
    <script src="/js/admin/cep.js"></script>
    <!--<script src="/js/admin/lightbox.min.js"></script>-->


    </body>

    </html>