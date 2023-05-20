<link rel="stylesheet" href="./lib/bootstrap5/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/css/style.css">



<script src="./lib/bootstrap5/js/bootstrap.min.js"></script>
<script src="./lib/bootstrap5/js/jquery-3.6.1.min.js"></script>
<script src="./lib/axios/axios.min.js"></script>
<script src="./lib/bootbox/bootbox.all.min.js"></script>
<div class="container">

  <h4 class="text-center mt-3">Sistema de Incidencias TIC'S</h4>
</div>

<main class="form-signin text-center">
  <form action='' method='POST' id='formLogin'>
    <img class="mb-4" src="./assets/img/insabi_logo.png" alt="" width="250" height="100">
    <h1 class="h3 mb-3 fw-normal">BIENVENID@</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="txtUsuario" placeholder="name@example.com">
      <label for="floatingInput">Usuario</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="txtClaveAcceso" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>

    <!--     <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div> -->
  </form>
  <button class="w-100 btn btn-primary" onclick="login();">Iniciar Sesión</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2021</p>

  <script src="./assets/js/alerts.js"></script>
  <script src="./assets/js/usuarios.js"></script>
</main>