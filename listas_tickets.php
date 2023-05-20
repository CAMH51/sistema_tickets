<?php
session_start();
require_once('./master/template.php');


function contenido()
{
    require_once './models/consultas.model.php';

    $consulta = new Consultas;
    switch ($_GET['e']) {
        case 0:
            $estatus = 'Pendientes';
            break;
        case 1:
            $estatus = 'Terminados';
            break;
        case 2:
            $estatus = 'En Seguimiento';
            break;
        case 3:
            $estatus = 'Cancelados';
            break;
    };
    $tickets = $consulta->getTicketsxStatus($_GET['s'], $_GET['e']);
?>




    <h4 class="text-center">Tickets <?php echo $estatus; ?></h4>

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <?php  if($tickets == false){ ?>
                <div class="alert alert-info" role="alert">
                    No existem Registros
                </div>
                <?php }else{ ?>
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
                                        <a href="./detalles_ticket.php?t=<?php echo $ticket['id_ticket'];  ?>" class="btn btn-success">Ver</a>
                                    </div>
                                </div>
                            </div>
                        <?php  }if ($ticket['status'] == 1) { ?>
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
                                        <a href="./detalles_ticket.php?t=<?php echo $ticket['id_ticket'];  ?>" class="btn btn-success">Ver</a>
                                    </div>
                                </div>
                            </div>
                            <?php  }if ($ticket['status'] == 2) { ?>
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
                                        <a href="./detalles_ticket.php?t=<?php echo $ticket['id_ticket'];  ?>" class="btn btn-success">Ver</a>
                                    </div>
                                </div>
                            </div>
                                <?php  }if ($ticket['status'] == 3) { ?>
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
                                        <a href="./detalles_ticket.php?t=<?php echo $ticket['id_ticket'];  ?>" class="btn btn-success">Ver</a>
                                    </div>
                                </div>
                            </div>
                                    <?php } ?>
                    <?php  } ?>
                    <?php  } ?>
        </div>
    </div>


    <script src="./assets/js/alerts.js"></script>
    <script src="./assets/js/sistemas.js"></script>
    <script>
    </script>

<?php
}
?>