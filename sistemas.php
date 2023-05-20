<?php
session_start();
require_once('./master/template.php');

function contenido()
{

  require_once './models/consultas.model.php';
  $consulta = new Consultas;
  $sistemas = $consulta->getAllSistem('');
  $totalSistemas = count($sistemas);
  $itemporpagina = 10;

  $pagina = 1;

  $limit = $itemporpagina;
  $offset = ($pagina - 1) * $itemporpagina;
  $paginas = ceil($totalSistemas / $itemporpagina);

  $paginacionUsuario = $consulta->userPagination($limit, $offset);
?>

<h4 class="text-center mt-3">Agregar Sistemas</h4>

<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Sistema</button>
<div class="row">
        <div class="col-sm-12 col-md-12">
            <table class="table table-striped table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sistema</th>
                        <th scope="col">Gestor</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody id="Tsistema">

                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12" id="paginacion">

        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Sistema</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nombre del Sistema</label>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-12 col-md-12">
            <div class="form-floating">
            <select class="form-select" aria-label="Default select example">
                    <option selected>--Seleccione--</option>
                    <option value="1">Infotec</option>
                    <option value="2">CTIC</option>
                </select>
                <label for="floatingInput">Gestor</label>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-12 col-md-12">
            <div class="form-floating">
            <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="floatingInput">Desarrollador</label>
            </div>
        </div>
    </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Agregar Sistema</button>
      </div>
    </div>
  </div>
</div>
<script src="./assets/js/alerts.js"></script>
    <script src="./assets/js/sistemas.js"></script>
<script>
  datosPaginacion(<?php echo $totalSistemas; ?>,<?php echo $itemporpagina ?>,<?php echo 1; ?>);
</script>

<?php
}
?>