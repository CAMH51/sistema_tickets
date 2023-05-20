<?php
session_start();
require_once('./master/template.php');

function contenido()
{

    require_once './models/consultas.model.php';
    $consulta = new Consultas;

    $ticket = $consulta->getTickets($_GET['t']);
    $documento = $consulta->getDocument($_GET['t']);
    $seguimientos = $consulta->getSeguimientos($_GET['t']);
?>

    <?php foreach ($ticket as $item) { ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">
                    <div class="row">
                        <div class="col-sm-12 col-md-10">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">

                                    <strong><span class="badge bg-secondary">Sistema:</span><?php echo $item['descrip_sistema'] ?></strong>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <strong><span class="badge bg-secondary">Asunto:</span> <?php echo $item['asunto'] ?></strong>

                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <?php
                                    if ($item['status'] == 0) {
                                        $estatus = 'Pendiente';
                                    } else if ($item['status'] == 1) {
                                        $estatus = 'Terminado';
                                    } else if ($item['status'] == 2) {
                                        $estatus = 'En Seguimiento';
                                    } else if ($item['status'] == 3) {
                                        $estatus = 'Cancelado';
                                    }
                                    ?>
                                    <strong><span class="badge bg-secondary">Estatus:</span><?php echo $estatus ?></strong>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-2 text-center">
                            <h5><span class="badge bg-secondary">Núm. Ticket:</span></h5s>
                                <h2><span class="badge bg-dark"><?php echo $item['id_ticket'] ?></span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <h5 class="text-center">Información Del Ticket</h5>
                <ul class="list-group">
                    <li class="list-group-item ">
                        <strong>Prioridad:</strong>
                        <select class="form-control" name="" id="">
                            <option value="" selected>-Seleccione-</option>
                            <option value="" >Indefinido</option>
                            <option value="" >Urgente</option>
                            <option value="" >Alta</option>
                            <option value="" >Media</option>
                            <option value="" >Baja</option>
                        </select>
                    </li>
                    <li class="list-group-item "><strong>Fecha De Solicitud:</strong></li>
                    <li class="list-group-item "><strong>Área Requiriente:</strong></li>
                    <li class="list-group-item "><strong>Usuario Requiriente:</strong></li>
                    <li class="list-group-item "><strong>Entidad Federativa:</strong></li>
                    <li class="list-group-item "><strong>Fecha Ticket:</strong></li>
                    <li class="list-group-item "><strong>Solicita:</strong></li>
                    <li class="list-group-item "><strong>Descripción:</strong></li>
                </ul>

            </div>  Fin 
            <div class="col-sm-12 col-md-7 ">
                <div class="row">
                    <div class="col-sm-12 col-md-12 text-center">
                        <h5>Evidencias</h5>
                            <div class="alert alert-success" role="alert">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <strong>Evidencia 1</strong>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <strong>Evidencia 2</strong>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <strong>Evidencia 3</strong>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <strong>Evidencia 4</strong>
                                    </div>
                                </div>
                            </div>
                    </div> Fin 
                    <div class="col-sm-12 col-md-12">
                        <h5 class="text-center">Seguimientos <button class="btn btn-primary">Agregar</button></h5>
                            <div class="alert alert-secondary" role="alert">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                    <h6>Inicio.</h6>
                                    <h6>23/02/2023 14:03:12</h6>
                                    <strong>Carlos Alberto Mendez</strong>
                                        <p>Seguimiento de prueba1</p>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <h6>Termino.</h6>
                                    <h6>23/02/2023 14:03:12</h6>
                                    <strong>Carlos Alberto Mendez</strong>
                                        <p>Seguimiento de prueba1</p>
                                    </div>
                                </div>
                                <div class="alert alert-success" role="alert">
                                <h6>Evidencias</h6>

                            </div>
                            </div>

                            
                    </div> Fin 
                </div>
            </div>Fin 
        </div>
    </div>
</div> Fin del Card 
 -->


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h4 class="text-center">
                        Información Del Ticket
                    </h4>
                    <div class="col-sm-12 col-md-8">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <strong>Prioridad:</strong>
                                <select class="form-control" name="" id="">
                                    <option value="">-Seleccione-</option>
                                    <option value="" selected>Indefinido</option>
                                    <option value="">Urgente</option>
                                    <option value="">Alta</option>
                                    <option value="">Media</option>
                                    <option value="">Baja</option>
                                </select>
                                <hr>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <strong>Fecha De Solicitud:</strong> <?php echo $item['fecha_solicitud'] ?>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <strong>Área Requiriente:</strong> <?php echo $item['area_requiriente'] ?>
                                <hr>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <strong>Usuario Requiriente:</strong> <?php echo $item['usuario_requiriente'] ?>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <strong>Entidad Federativa:</strong> <?php echo $item['ent_federativa'] ?>
                                <hr>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <strong>Fecha Ticket:</strong> <?php echo $item['fecha_creacion_ticket'] ?>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <strong>Solicita:</strong> <?php echo $_SESSION['username'] ?>
                                <hr>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <strong>Descripción:</strong> <?php echo $item['descripcion'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <strong>Terminar Ticket:</strong> <button class="btn btn-danger" onclick="alertQuestion('¿Desea Terminar el Ticket?')">Terminar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="text-center">Evidencias Iniciales</h4>
                                <div class="col-sm-12 col-md-12">
                                    <div class="alert alert-success" role="alert">
                                        <?php if ($documento == false) { ?>
                                            No existen Documentos
                                        <?php } else { ?>
                                            <?php foreach ($documento as $item) { ?>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <strong><a href="<?php echo $item['ruta_doc'] ?>"><?php echo $item['nombre_doc'] ?></a></strong>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php  } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">

                </div>
            <?php } ?>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h4 class="text-center">Seguimientos <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button></h4>
                    <?php if ($seguimientos == false) { ?>
                        <div class="alert alert-secondary" role="alert">
                            No existen Seguimientos
                        </div>
                    <?php } else { ?>
                        <?php foreach ($seguimientos as $seguimiento) { ?>
                            <div class="alert alert-secondary" role="alert">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <h6><span class="badge rounded-pill bg-dark">Seguimiento</span></h6>
                                        <h6><?php echo $seguimiento['fecha_seguimiento'] ?></h6>
                                        <p><?php echo $seguimiento['comentario'] ?></p>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <h6><span class="badge rounded-pill bg-dark">Observación</span></h6>
                                        <?php if ($seguimiento['observacion'] == "") { ?>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Agregar</button>
                                        <?php } else { ?>
                                            <h6><?php echo $seguimiento['fecha_ter_seguimiento'] ?></h6>
                                            <p><?php echo $seguimiento['observacion'] ?></p>
                                        <?php  } ?>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="alert alert-success" role="alert">
                                            <h6 class="text-center">Evidencias Seguimientos</h6>
                                            <hr>
                                            <?php $docSegumiento = $consulta->getDocSeguimientos($seguimiento['id_seguimiento']) ?>
                                            <?php if ($docSegumiento == false) { ?>
                                                No Existe Documento
                                                <br> <?php if ($seguimiento['observacion'] == "") { ?>
                                                    <button class="btn btn-success" onclick="modalSeguimiento(<?php  echo $seguimiento['id_seguimiento']?>)">Subir Documento</button>
                                                <?php } ?>
                                            <?php  } else { ?>
                                                <?php foreach ($docSegumiento  as $docItem) { ?>
                                                    <a href="<?php echo $docItem['rutadoc'] . '/' . $docItem['nombredoc'] ?>"><?php echo $docItem['nombredoc'] ?></a>
                                                    <br>
                                                <?php  } ?>
                                                <button class="btn btn-success" onclick="modalSeguimiento(<?php  echo $seguimiento['id_seguimiento']?>)">Subir Documento</button>
                                            <?php  } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php  } ?>
                    <?php } ?>

                </div>



            </div>
            </div>
        </div>


        <!-- Modal Agregar Seguimiento -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Seguimiento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Seguimiento</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Agregar Respuesta a Seguimiento-->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Observación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_ticket" value="<?php echo $_GET['t'] ?>">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Observación</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Agregar Documento-->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="exampleModalLabel">Subir Documento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
                        <form class="form-container" enctype='multipart/form-data'>
                            <input type="hidden" id="id_seguimiento" name="id_seguimiento">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">

                                    <div class="upload-files-container">
                                        <div class="drag-file-area">
                                            <span class="material-icons-outlined upload-icon"> file_upload </span>
                                            <h3 class="dynamic-message"> Arrastre y Suelte el Archivo Aqui !!! </h3>
                                            <label class="label"> O <span class="browse-files"> <input type="file" class="default-file-input" multiple /> <span class="browse-files-text">Buscar Archivo</span> <span>Desde el Equipo</span> </span> </label>
                                        </div>
                                        <span class="cannot-upload-message"> <span class="material-icons-outlined">error</span> Seleccione Un Archivo Primero <span class="material-icons-outlined cancel-alert-button">cancel</span> </span>
                                        <div class="file-block">
                                            <div class="file-info"> <span class="material-icons-outlined file-icon">description</span> <span class="file-name"> </span> | <span class="file-size"> </span> </div>
                                            <span class="material-icons remove-file-icon">delete</span>
                                            <div class="progress-bar"> </div>
                                        </div>
                                        <button type="button" class="upload-button"> Subir </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
<!--                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Agregar</button>
                    </div> -->
                </div>
            </div>
        </div>
        <script src="./assets/js/tickets.js"></script>
        <script src="./assets/js/alerts.js"></script>
        <script src="./assets/js/subirDoc.js"></script>
    <?php

}
    ?>