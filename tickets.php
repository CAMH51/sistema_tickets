<?php
session_start();
require_once('./master/template.php');

function contenido()
{
    require_once './models/consultas.model.php';
    $consulta = new Consultas;

    $sistemas = $consulta->getAllSistem('');

    $ent_fed = [
        'AGUASCALIENTES',
        "BAJA CALIFORNIA",
        "BAJA CALIFORNIA SUR",
        "CAMPECHE",
        "COAHUILA",
        "COLIMA",
        "CHIAPAS",
        "CHIHUAHUA",
        "CIUDAD DE MEXICO",
        "DURANGO",
        "GUANAJUATO",
        "GUERRERO",
        "HIDALGO",
        "JALISCO",
        "MEXICO",
        "MICHOACAN",
        "MORELOS",
        "NAYARIT",
        "NUEVO LEON",
        "OAXACA",
        "PUEBLA",
        "QUERETARO",
        "QUINTANA ROO",
        "SAN LUIS POTOSI",
        "SINALOA",
        "SONORA",
        "TABASCO",
        "TAMAULIPAS",
        "TLAXCALA",
        "VERACRUZ",
        "YUCATAN",
        "ZACATECAS"
    ];
?>

    <h4 class="text-center">Nuevo Ticket</h4>

    <form action="" method="post" name="formTicket" id="formTicket" enctype="multipart/form-data">

        <div class="row mt-3">
            <div class="col-sm-12 col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="txtsolicita" name="txtsolicita" value="<?php echo $_SESSION['username']?>" readonly>
                    <label for="floatingInput">Solicita *</label>
                </div>
            </div>

            <div class="col-sm-12 col-md-8">
                <div class="form-floating">
                    <input type="text" class="form-control" id="txtasunto" name="txtasunto">
                    <label for="floatingInput">Asunto *</label>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12 col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="arearequiriente" name="arearequiriente">
                    <label for="floatingInput">Área Requiriente *</label>
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="usuariorequiriente" name="usuariorequiriente">
                    <label for="floatingInput">Usuario Requiriente *</label>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" id="entidad" name="entidad">
                        <option value="" selected>-Seleccione-</option>
                        <option value="CIUDAD DE MEXICO" selected>CIUDAD DE MEXICO</option>
                        <?php foreach ($ent_fed as $item) {  ?>
                            <option value='<?php echo $item; ?>'><?php echo $item; ?></option>
                        <?php  } ?>
                    </select>
                    <label for="floatingInput">Entidad Federativa *</label>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12 col-md-3">
                <div class="form-floating">
                <?php $fecha=date("Y").'-'.date("m").'-'.date("d") ?>
                    <input type="date" class="form-control" id="fechasolicitud" name="fechasolicitud" min="<?php if($_SESSION['permiso'] == 'usuario') echo $fecha; ?>"  max="<?php if($_SESSION['permiso'] == 'usuario') echo $fecha; ?>" value="<?php echo
                    $fecha;  ?>" readonly>
                    <label for="floatingInput">Fecha Solicitud *</label>
                </div>
            </div>

            <div class="col-sm-12 col-md-3">
                <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" id="prioridad" name="prioridad">
                        <?php if($_SESSION['permiso']=='usuario') {?>
                            <option value="porDefinir">Por Definir</option>
                            <?php  }else{ ?>
                                <option value="" selected>-Seleccione-</option>
                                <option value="Urgente">Urgente</option>
                                <option value="Alto">Alto</option>
                                <option value="Medio">Medio</option>
                                <option value="Bajo">Bajo</option>
                                <?php  } ?>
                    </select>
                    <label for="floatingInput">Prioridad *</label>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-floating">
                    <select class="form-select" aria-label="Default select example" id="sistema" name="sistema">
                        <option value="" selected>-Seleccione-</option>
                        <?php if ($sistemas == false) { ?>
                            <option value="">No existen Registros</option>
                        <?php  } else { ?>
                            <?php foreach ($sistemas as $sistema) { ?>
                                <option value="<?php echo $sistema['id_sistema']; ?>"><?php echo $sistema['descrip_sistema']; ?></option>
                            <?php  } ?>
                        <?php  } ?>

                    </select>
                    <label for="floatingInput">Sistema *</label>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12 col-md-12">
                <div class="form-floating">
                    <textarea class="form-control" rows="10" cols="10" id="txtdescripcion" name="txtdescripcion"></textarea>
                    <label for="floatingInput">Descripción *</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <label>Subir Evidencia</label>
                <input class="form-control" type="file" id="evidencia[]" name="evidencia[]" multiple>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <button class="btn btn-success" onclick="addTicket();">Generar Ticket</button>
        </div>
    </div>

    <script src="./assets/js/alerts.js"></script>
    <script src="./assets/js/tickets.js"></script>
<?php
}
?>