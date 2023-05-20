<?php
session_start();
require_once('./master/template.php');

function contenido()
{
    require_once './models/consultas.model.php';

    $consulta = new Consultas;

    $tickets_totales =$consulta->getAllTicketxCriterio('')==false?0:count($consulta->getAllTicketxCriterio(''));
    $tickets_pendientes=$consulta->getAllTicketxCriterio('where status=0')==false ?0:count($consulta->getAllTicketxCriterio('where status=0'));
    $tickets_seguimiento=$consulta->getAllTicketxCriterio('where status=2')== false?0:count($consulta->getAllTicketxCriterio('where status=2'));
    $tickets_terminado=$consulta->getAllTicketxCriterio('where status=1') == false?0:count($consulta->getAllTicketxCriterio('where status=1'));
    $tickets_cancelados=$consulta->getAllTicketxCriterio('where status=3') == false?0:count($consulta->getAllTicketxCriterio('where status=3')); 
?>


    <div class="row mt-3">
        <div class="col-sm-12 col-md-3 text-center">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">

                            <img src="./assets/img/ticket.gif" alt="" width="50px">
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <h5 class="text-center">Tickets Totales</h5>

                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-sm-12 col-md-12">
                            <span class="badge bg-info">
                                <h2><?php echo $tickets_totales;  ?></h2>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                        <a href="./listado_sistemas.php?u=<?php  echo $_SESSION['id']; ?>&e=all" class="btn btn-success">Ingresar</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-sm-12 col-md-3 text-center">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">

                            <img src="./assets/img/pendiente.gif" alt="" width="50px">
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <h5 class="text-center">Tickets Pendientes</h5>

                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-sm-12 col-md-12">
                            <span class="badge bg-warning">
                                <h2><?php echo $tickets_pendientes;  ?></h2>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                        <a href="./listado_sistemas.php?u=<?php  echo $_SESSION['id']; ?>&e=0" class="btn btn-success">Ingresar</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-sm-12 col-md-3 text-center">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">

                            <img src="./assets/img/editar.gif" alt="" width="50px">
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <h5 class="text-center">Tickets En Seguimiento</h5>

                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-sm-12 col-md-12">
                            <span class="badge bg-secondary">
                                <h2><?php echo $tickets_seguimiento;  ?></h2>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                        <a href="./listado_sistemas.php?u=<?php  echo $_SESSION['id']; ?>&e=2" class="btn btn-success">Ingresar</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-sm-12 col-md-3 text-center">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">

                            <img src="./assets/img/terminado.gif" alt="" width="50px">
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <h5 class="text-center">Tickets Terminados</h5>

                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-sm-12 col-md-12">
                            <span class="badge bg-success">
                                <h2><?php echo $tickets_terminado;  ?></h2>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                        <a href="./listado_sistemas.php?u=<?php  echo $_SESSION['id']; ?>&e=1" class="btn btn-success">Ingresar</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="row mt-3">
    <div class="col-sm-12 col-md-3 text-center">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">

                            <img src="./assets/img/eliminar.gif" alt="" width="50px">
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <h5 class="text-center">Tickets Cancelados</h5>

                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">

                        <div class="col-sm-12 col-md-12">
                            <span class="badge bg-danger">
                                <h2><?php echo $tickets_cancelados;  ?></h2>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                        <a href="./listado_sistemas.php?u=<?php  echo $_SESSION['id']; ?>&e=3" class="btn btn-success">Ingresar</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
<!--         <div class="col-sm-12 col-md-3 text-center">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">

                            <img src="./assets/img/system.gif" alt="" width="50px">
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <h5 class="text-center">Sistemas Agregados</h5>

                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">

                        <div class="col-sm-12 col-md-12">
                            <span class="badge bg-primary">
                                <h2>10</h2>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <a href="./listado_sistemas.php?u=<?php  echo $_SESSION['id']; ?>&p=" class="btn btn-success">Ver Por Sistemas</a>

                        </div>
                    </div>
                </div>

            </div>
        </div> -->
        <div class="col-ms-12 col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Grafica de Ticket</h4>
                </div>
            </div>
        </div>
    </div>
<?php

}
?>