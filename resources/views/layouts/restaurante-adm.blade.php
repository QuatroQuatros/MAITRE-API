<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/img/favicons/maitre.png" rel="icon">
    <link href="" rel="apple-touch-icon">
    <title>DASHBOARD || Cliente</title>

      <!--Load the AJAX API-->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!--ionIcons-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!--links pages-->
    <link rel="stylesheet" href="/css/adm.css">
    <link rel="stylesheet" href="/css/cadasRes.css">
    <link rel="stylesheet" href="/css/lightbox.css">
    <link rel="stylesheet" href="/css/notificacao.css">

    <!--Data table-->
    
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css">

    <!--Material CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
</head>
 <!--side bar-->
 <div class="container">
     <aside>
         <div class="top">
             <div class="logo">
                 <a href="/"><img src="/img/logos/logo.png"></a>
                 <h2>MAÎ<span class="primary">TRE</span></h2>
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
             <a href="../restaurante/restaurante.php" class="active">
                 <span class="material-icons-sharp">inventory</span>
                 <h3>Dados do restaurante</h3>
             </a>
             <a href="../restaurante/visualizarRestaurante.php" class="active">
                 <span class="material-icons-sharp">insights</span>
                 <h3>Visualizar Restaurante(s)</h3>
             </a>

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

             <a href="/restaurantes/reservas" class="active">
                 <span class="material-icons-sharp">mail_outline</span>
                 <h3>Reservas</h3>
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

     @yield('content')


     <script src="/js/style.js"></script>
    <script src="/js/cep.js"></script>
    <script src="/js/lightbox.min.js"></script>
    <script src="/js/modal.js"></script>


    </body>

</html>