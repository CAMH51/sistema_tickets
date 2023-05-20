<?php
session_start();
require_once('./master/template.php');

function contenido()
{
    require_once './models/consultas.model.php';
    $consulta = new Consultas;
    $usuarios = $consulta->getAllUser();
    $totalUsuarios = count($usuarios);
    $itemporpagina = 10;

    $pagina = 1;
    if (isset($_GET["pagina"])) {
        $pagina = $_GET["pagina"];
    }
    $limit = $itemporpagina;
    $offset = ($pagina - 1) * $itemporpagina;
    $paginas = ceil($totalUsuarios / $itemporpagina);

    $paginacionUsuario = $consulta->userPagination($limit, $offset);
?>

    <h4 class="text-center">Nuevo Usuario</h4>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Usuario</button>

 <!--    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="form-floating">
                <select class="form-select" aria-label="Default select example" id="registroxpagina">
                    <option selected>--Seleccione--</option>
                    <option value="1">3</option>
                    <option value="1">5</option>
                    <option value="2">10</option>
                </select>
                <label for="floatingInput">Registros por Pagina</label>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <table class="table table-striped table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre de Usuario</th>
                        <th scope="col">Permiso</th>
                        <th scope="col">Email</th>
                        <th scope="col">Área</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody id="Tusuario">

                </tbody>
                <!--                 <tbody>
                    <?php foreach ($paginacionUsuario as $paginacion) { ?>
                        <tr>
                            <td><?php echo $paginacion['id_usuario'] ?></td>
                            <td><?php echo $paginacion['nombre_usuario'] ?></td>
                            <td><?php echo $paginacion['permiso'] ?></td>
                            <td><?php echo $paginacion['email'] ?></td>
                            <td><?php echo $paginacion['area'] ?></td>
                        </tr>
                    <?php  } ?>
                </tbody> -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" name="formUsuario" id="formUsuario">
                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Nombre del Usuario</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>--Seleccione--</option>
                                        <option value="usuario">Usuario</option>
                                        <option value="susuario">SuperUsuario</option>
                                    </select>
                                    <label for="floatingInput">Permiso</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Correo Electronico</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Área</label>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Contraseña</label>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Agregar Usuario</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/alerts.js"></script>
    <script src="./assets/js/usuarios.js"></script>
    <script>
        datosPaginacion(<?php echo $totalUsuarios; ?>,<?php echo $itemporpagina ?>,<?php echo 1; ?>);
        //getAllUsuarios();
    </script>
<?php
}
?>