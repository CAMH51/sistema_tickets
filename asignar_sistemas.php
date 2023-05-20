<?php
session_start();
require_once('./master/template.php');

function contenido()
{
    require_once './models/consultas.model.php';
    $consulta = new Consultas;
    $sistemas = $consulta->getAllSistem('');
    $usuarios = $consulta->getAllUser();


?>

    <h4 class="text-center mt-3">Asignar Sistemas</h4>



    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Asignar Sistema</button>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Sistema</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAsignar">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                            <div class="form-floating">
                                    <select class="form-select" aria-label="Default select example" id="sistemas" name="sistemas">
                                        <option value="" selected>-Seleccione-</option>
                                        <?php if ($usuarios == false) { ?>
                                            <option value="">No existen Registros</option>
                                        <?php  } else { ?>
                                            <?php foreach ($usuarios as $usuario) { ?>
                                                <option value="<?php echo $usuario['id_usuario']; ?>"><?php echo $usuario['nombre_usuario']; ?></option>
                                            <?php  } ?>
                                        <?php  } ?>

                                    </select>
                                    <label for="floatingInput">Usuario</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Default select example" id="sistemas" name="sistemas">
                                        <option value="" selected>-Seleccione-</option>
                                        <?php if ($sistemas == false) { ?>
                                            <option value="">No existen Registros</option>
                                        <?php  } else { ?>
                                            <?php foreach ($sistemas as $sistema) { ?>
                                                <option value="<?php echo $sistema['id_sistema']; ?>"><?php echo $sistema['descrip_sistema']; ?></option>
                                            <?php  } ?>
                                        <?php  } ?>

                                    </select>
                                    <label for="floatingInput">Sistema</label>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Asignar Sistema</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/alerts.js"></script>
    <script src="./assets/js/sistemas.js"></script>
    <script>

    </script>

<?php
}
?>