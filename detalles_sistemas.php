<?php
session_start();
require_once('./master/template.php');

function contenido()
{

    require_once './models/consultas.model.php';
    $consulta = new Consultas;
    $tickets = $consulta->getAllTicketSistem($_GET['s']);
    $sistema = $consulta->getSistem($_GET['s']);

    //Consultamos Sistema
    foreach ($sistema as $item) {
        $sistem = $item['descrip_sistema'];
    }
    //totales
    $pendientes = 0;
    $seguimiento = 0;
    $terminado = 0;
    $cancelados = 0;
    if ($tickets != false) {
        foreach ($tickets as $ticket) {
            if ($ticket['status'] == 0) {
                $pendientes = $pendientes + 1;
            } else if ($ticket['status'] == 1) {
                $terminado = $terminado + 1;
            } else if ($ticket['status'] == 2) {
                $seguimiento = $seguimiento + 1;
            } else if ($ticket['status'] == 3) {
                $cancelados = $cancelados + 1;
            }
        }
    }
?>

    <h4 class="text-center mt-3">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <img src="./assets/img/regresar.png" width="16px" alt=""><a href="#" onclick="regresar();" style="text-decoration: none; color:#fff;">Regresar</a>
            </div>
            <div class="col-sm-12 col-md-6">
                Tickets del Sistema (<?php echo $sistem ?>)
            </div>
        </div>
    </h4>

<!--     <div class="row">
        <div class="col-sm-12 col-md-3">
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Pendientes</div>
                    </div>
                    <span class="badge bg-primary rounded-pill"><?php echo $pendientes ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">En Seguimiento</div>
                    </div>
                    <span class="badge bg-primary rounded-pill"><?php echo $seguimiento ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Terminados</div>
                    </div>
                    <span class="badge bg-primary rounded-pill"><?php echo $terminado ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Cancelados</div>
                    </div>
                    <span class="badge bg-primary rounded-pill"><?php echo $cancelados ?></span>
                </li>
            </ol>
        </div>
    </div> -->

    <h3 class="text-center">Listado de Tickets</h3>
    <hr>
    <div class="row mt-4">
        <div class="col-sm-12 col-md-12">

            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <span class="badge bg-warning" style="font-size: 18px;">Pendientes <span class="badge bg-dark"><?php  echo $pendientes; ?></span></span>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <?php if ($tickets == false) { ?>
                            No Existen Tickets Generados
                        <?php  } else { ?>
                            <?php foreach ($tickets as $ticket) { ?>
                                <?php if ($ticket['status'] == 0) { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-1">
                                            <?php echo $ticket['id_ticket'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                            <?php echo $ticket['asunto'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                            <strong>Sistema:</strong><?php echo $ticket['descrip_sistema'] ?>
                                            <br>
                                            <strong>Fecha Solicitud:</strong><?php echo $ticket['fecha_solicitud'] ?>
                                            <br>
                                            <strong>Usuario Requiriente:</strong><?php echo $ticket['usuario_requiriente'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-2">
                                                <a href="./detalles_ticket.php?t=<?php echo $ticket['id_ticket'] ;  ?>" class="btn btn-success">Ver</a>
                                                </div>
                                        </div>
                                    </div>

                                    <br>
                                <?php  } ?>
                            <?php  } ?>
                        <?php  } ?>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <span class="badge bg-secondary" style="font-size: 18px;">En Seguimiento <span class="badge bg-dark"><?php  echo $seguimiento; ?></span></span>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <?php if ($tickets == false) { ?>
                            No Existen Tickets Generados
                        <?php  } else { ?>
                            <?php foreach ($tickets as $ticket) { ?>
                                <?php if ($ticket['status'] == 2) { ?>
                                    <div class="alert alert-secondary" role="alert">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-1">
                                            <?php echo $ticket['id_ticket'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                            <?php echo $ticket['asunto'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                            <strong>Sistema:</strong><?php echo $ticket['descrip_sistema'] ?>
                                            <br>
                                            <strong>Fecha Solicitud:</strong><?php echo $ticket['fecha_solicitud'] ?>
                                            <br>
                                            <strong>Usuario Requiriente:</strong><?php echo $ticket['usuario_requiriente'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-2">
                                                <a href="./detalles_ticket.php?t=<?php echo $ticket['id_ticket'] ;  ?>" class="btn btn-success">Ver</a>
                                                </div>
                                        </div>
                                    </div>
                                <?php  } ?>
                            <?php  } ?>
                        <?php  } ?>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <span class="badge bg-success" style="font-size: 18px;">Terminados <span class="badge bg-dark"><?php  echo $terminado; ?></span></span>
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <?php if ($tickets == false) { ?>
                            No Existen Tickets Generados
                        <?php  } else { ?>
                            <?php foreach ($tickets as $ticket) { ?>
                                <?php if ($ticket['status'] == 1) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-1">
                                            <?php echo $ticket['id_ticket'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                            <?php echo $ticket['asunto'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                            <strong>Sistema:</strong><?php echo $ticket['descrip_sistema'] ?>
                                            <br>
                                            <strong>Fecha Solicitud:</strong><?php echo $ticket['fecha_solicitud'] ?>
                                            <br>
                                            <strong>Usuario Requiriente:</strong><?php echo $ticket['usuario_requiriente'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-2">
                                                <a href="./detalles_ticket.php?t=<?php echo $ticket['id_ticket'] ;  ?>" class="btn btn-success">Ver</a>
                                                </div>
                                        </div>
                                    </div>
                                <?php  } ?>
                            <?php  } ?>
                        <?php  } ?>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            <span class="badge bg-danger" style="font-size: 18px;">Cancelados <span class="badge bg-dark"><?php  echo $cancelados; ?></span></span>
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <?php if ($tickets == false) { ?>
                            No Existen Tickets Generados
                        <?php  } else { ?>
                            <?php foreach ($tickets as $ticket) { ?>
                                <?php if ($ticket['status'] == 3) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-1">
                                            <?php echo $ticket['id_ticket'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                            <?php echo $ticket['asunto'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                            <strong>Sistema:</strong><?php echo $ticket['descrip_sistema'] ?>
                                            <br>
                                            <strong>Fecha Solicitud:</strong><?php echo $ticket['fecha_solicitud'] ?>
                                            <br>
                                            <strong>Usuario Requiriente:</strong><?php echo $ticket['usuario_requiriente'] ?>
                                            </div>
                                            <div class="col-sm-12 col-md-2">
                                                <a href="./detalles_ticket.php?t=<?php echo $ticket['id_ticket'] ;  ?>" class="btn btn-success">Ver</a>
                                                </div>
                                        </div>
                                    </div>
                                <?php  } ?>
                            <?php  } ?>
                        <?php  } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="./assets/js/regresar.js"></script>


<?php
}
?>