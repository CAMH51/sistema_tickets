<?php
if (file_exists('./../cnx/driverPSQL.php')) {

    include_once('./../cnx/driverPSQL.php');
} else {
    include_once('./cnx/driverPSQL.php');
}
class Agregar
{


    function AddTicket($datos)
    {
        $cnx = new cnx;
        $sql = "INSERT INTO tickets(id_usuario,
                                 asunto,
                                 prioridad,
                                 id_sistema,
                                 descripcion,
                                 fecha_creacion_ticket,
                                 fecha_atencion,
                                 status,
                                 imagen,
                                 area_requiriente,
                                 usuario_requiriente,
                                 ent_federativa,
                                 fecha_solicitud) 
                                 VALUES(" . $datos['usuario'] . ",
                                        '" . $datos['asunto'] . "',
                                        '" . $datos['prioridad'] . "',
                                        " . $datos['sistema'] . ",
                                        '" . $datos['descripcion'] . "',
                                        '" . $datos['fecha_creacion_ticket'] . "',
                                        '" . $datos['fecha_atencion'] . "',
                                        " . $datos['status'] . ",
                                        '" . $datos['imagen'] . "',
                                        '" . $datos['area_requiriente'] . "',
                                        '" . $datos['usuario_requiriente'] . "',
                                        '" . $datos['ent_federativa'] . "',
                                        '" . $datos['fecha_solicitud'] . "'
                                        );";

        if (pg_query($cnx->connectDB(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function addDocTicket($datos)
    {
        $cnx = new cnx;
        $sql = "SELECT MAX(id_ticket) AS id FROM tickets";
        $check = pg_query($cnx->connectDB(), $sql);
        if ($row = pg_fetch_array($check)) {
            $id = trim($row[0]);
        }
        $sql = "INSERT INTO documentos_ticket(id_ticket,
        nombre_doc,
        ruta_doc,
        fecha
            ) 
            VALUES('$id',
            '" . $datos['nombre_doc'] . "',
            '" . $datos['ruta_doc'] . "',
            '" . $datos['fecha'] . "'
            );";

        if (pg_query($cnx->connectDB(), $sql)) {
            return true;
        } else {
            return false;
        }
    }
    function AddSistemas()
    {
        $cnx = new cnx;
    }

    function AddUsuarios()
    {
        $cnx = new cnx;
    }
}
