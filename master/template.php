<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./lib/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/subirDoc.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <script src="https://kit.fontawesome.com/6037777316.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--  <script src="./lib/bootstrap5/js/jquery-3.6.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="./lib/bootstrap5/js/bootstrap.min.js"></script>
    <script src="./lib/axios/axios.min.js"></script>
    <script src="./lib/bootbox/bootbox.all.min.js"></script>


</head>

<body>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-center" id="offcanvasExampleLabel"><img src="./assets/img/lista.gif" width="32px" alt=""> Menú</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

        <ul>
            <div class="row">
                <div class="col-sm-12 col-md-12">

                    <li><a href="./tickets.php"><img src="./assets/img/ticket.gif" width="32px" alt=""> Nuevo Ticket </a></li>
                    <li><a href="./sistemas.php"><img src="./assets/img/system.gif" width="32px" alt=""> Nuevo Sistema</a></li>
                    <li>    <a href="./usuarios.php"><img src="./assets/img/user.gif" width="32px" alt=""> Nuevo Usuario</a></li>
                    <hr>
                    <li>    <a href="./asignar_sistemas.php"><img src="./assets/img/asignar.gif" width="32px" alt=""> Asignar Sistema</a></li>
                </div>
            </div>
        </ul>
  <!--           <div class="row">
                <div class="col-sm-12 col-md-7">
                    <a href="./tickets.php"><img src="./assets/img/ticket.gif" width="32px" alt="">Nuevo Ticket </a>
                </div>
                <div class="col-sm-12 col-md-2">
                    <i class="bi bi-arrow-right-square"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <a href="./sistemas.php"><img src="./assets/img/system.gif" width="32px" alt="">Nuevo Sistema</a>
                </div>
                <div class="col-sm-12 col-md-2">
                    <i class="bi bi-arrow-right-square"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <a href=""><img src="./assets/img/user.gif" width="32px" alt="">Nuevo Usuario</a>
                </div>
                <div class="col-sm-12 col-md-2">
                    <i class="bi bi-arrow-right-square"></i>
                </div>
            </div> -->
        </div>
    </div>

    </div>
    <div class="container ">

<header>
    <nav class="navbar navbar-expand-lg navbar-light mt-3">
        <div class="container-fluid">
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <i class="bi bi-border-width"></i>Menú
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="./home.php"><i class="bi bi-house-door"></i>Inicio</a>
                    </li>
                </ul>
                <span class="navbar-text">

                    <div class="dropdown mt-3">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> <?php echo $_SESSION['username'] . '(' . $_SESSION['usuario'] . ')' ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="./controllers/logout.controller.php"><i class="bi bi-indent"></i>Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </span>
            </div>
        </div>
    </nav>
</header>



        <div class="fondoEspacioTrabajo">
            <?php contenido(); ?>

        </div>

        <footer>
            <div class="pie">
                <hr class="hr_1" />
                <a href="http://www.gob.mx/salud" target="_blank"><img class="ssa" src="./assets/img/insabi_logo.png" alt="secretaria de salud al pie" /></a>
                <hr class="hr_2" />
            </div>

            <div class="direccion">
                <label ID="direccion1">

                </label>
            </div>
        </footer>
        </div>



</body>

</html>