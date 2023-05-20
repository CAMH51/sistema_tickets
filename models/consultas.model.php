<?php
if (file_exists('./../cnx/driverPSQL.php')) {

    include_once('./../cnx/driverPSQL.php');
} else {
    include_once('./cnx/driverPSQL.php');
}
class Consultas
{

    //Login de inicio de sesión
    function login($usuario, $pass)
    {
        $cnx = new cnx;
        $qry = "SELECT u.id_usuario,u.nombre_usuario,u.email,u.area,u.permiso,u.estatus
        FROM usuarios u 
        WHERE u.email = '$usuario' AND u.contrasena='$pass'";
        /*  echo $sql; */
        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }


    /***********************************************************************************TICKETS*******************************************************************************/
    //Recuperar todos los tickets generados
    function getAllTickets()
    {
        $cnx = new cnx;
        $qry = "SELECT  t.id_ticket,u.nombre_usuario,u.email,t.asunto,t.prioridad,s.descrip_sistema,s.gestor,t.descripcion, t.fecha_creacion_ticket,t.fecha_atencion,t.status,t.area_requiriente,t.usuario_requiriente,t.ent_federativa,t.fecha_solicitud
				FROM  tickets t 
                join usuarios u on t.id_usuario=u.id_usuario
                join sistemas s on t.id_sistema=s.id_sistema order by t.id_ticket";

        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }

        //Recuperar todos los tickets generados
        function getAllTicketxCriterio($criterio)
        {
            $cnx = new cnx;
            $qry = "SELECT  t.id_ticket,u.nombre_usuario,u.email,t.asunto,t.prioridad,s.descrip_sistema,s.gestor,t.descripcion, t.fecha_creacion_ticket,t.fecha_atencion,t.status,t.area_requiriente,t.usuario_requiriente,t.ent_federativa,t.fecha_solicitud
                    FROM  tickets t 
                    join usuarios u on t.id_usuario=u.id_usuario
                    join sistemas s on t.id_sistema=s.id_sistema $criterio order by t.id_ticket";
        //echo $qry;
            $exe = pg_query($cnx->connectDB(), $qry);
            $valor = pg_num_rows($exe);
            if ($valor > 0) {
                while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                    $res[] = $row;
                }
                return $res;
            } else {
                return false;
            }
        }
    

    //Recuperar un ticket generado
    function getTickets($id_ticket)
    {
        $cnx = new cnx;
        $qry = "SELECT  t.id_ticket,u.nombre_usuario,u.email,t.asunto,t.prioridad,s.descrip_sistema,s.gestor,t.descripcion, t.fecha_creacion_ticket,t.fecha_atencion,t.status,t.area_requiriente,t.usuario_requiriente,t.ent_federativa,t.fecha_solicitud
                   FROM  tickets t 
                   join usuarios u on t.id_usuario=u.id_usuario
                   join sistemas s on t.id_sistema=s.id_sistema where t.id_ticket ='$id_ticket' order by t.id_ticket";

        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }

    //Recuperar un ticket generado
    function getTicketsxStatus($id_sistema,$estatus)
    {
        $cnx = new cnx;
        $qry = "SELECT t.id_ticket,u.nombre_usuario,u.email,t.asunto,t.prioridad,s.descrip_sistema,s.gestor,t.descripcion, 
        t.fecha_creacion_ticket,t.fecha_atencion,t.status,t.area_requiriente,t.usuario_requiriente,t.ent_federativa,t.fecha_solicitud 
        FROM tickets t 
        left join usuarios u on t.id_usuario=u.id_usuario 
        left join sistemas s on t.id_sistema=s.id_sistema
        where s.id_sistema ='$id_sistema' and t.status='$estatus' order by t.id_ticket";
        //echo $qry; 

        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }

    //Recuperar todos los Tickets por sistema
    function getAllTicketSistem($id_sistema)
    {
        $cnx = new cnx;
        $qry = "SELECT t.id_ticket,u.nombre_usuario,u.email,t.asunto,t.prioridad,s.descrip_sistema,s.gestor,t.descripcion, t.fecha_creacion_ticket,t.fecha_atencion,t.status,t.area_requiriente,t.usuario_requiriente,t.ent_federativa,t.fecha_solicitud
        FROM  tickets t 
        join usuarios u on t.id_usuario=u.id_usuario
        join sistemas s on t.id_sistema=s.id_sistema WHERE t.id_sistema='$id_sistema' order by t.id_ticket";
        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }


    //Recuperar documento del ticket
    function getDocument($id_ticket)
    {
        $cnx = new cnx;
        $qry = "SELECT  id_documentos,id_ticket,nombre_doc,ruta_doc,fecha
                       FROM  documentos_ticket where id_ticket ='$id_ticket' order by id_ticket";

        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }

    function obtenerNumTicket(){
        $cnx = new cnx;
        $sql = "SELECT MAX(id_ticket) AS id FROM tickets ";
        $check = pg_query($cnx->connectDB(), $sql);
                if($row = pg_fetch_array($check)){
                    $id= trim($row[0]);
                }
                return $id;
     }

     function buscarTicket($id){
        $conexion = new cnx();
        $sql = "SELECT  t.asunto,t.prioridad,s.descrip_sistema,t.descripcion,t.usuario_requiriente FROM tickets t INNER JOIN sistemas s ON t.id_sistema=s.id_sistema WHERE t.id_ticket='$id';";
        $check = pg_query($conexion->connectDB(), $sql);
                if($row = pg_fetch_array($check)){
                    $res[]= $row;
                }
                return $res;
     }

    /***********************************************************************************SISTEMAS******************************************************************************/

    //Recuperar todos los Sistemas generados
    function getAllSistem($criterio)
    {
        $cnx = new cnx;
        if ($criterio == '') {

            $qry = "SELECT  s.id_sistema,s.descrip_sistema,s.gestor,s.desarrollador,u.nombre_usuario,u.email
				FROM  sistemas s
                left join usuarios u on s.desarrollador=u.id_usuario order by s.desarrollador";
        } else {
            $qry = "SELECT  s.id_sistema,s.descrip_sistema,s.gestor,s.desarrollador,u.nombre_usuario,u.email
            FROM  sistemas s
            left join usuarios u on s.desarrollador=u.id_usuario $criterio order by s.desarrollador";
        }
        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }

    //Recuperar el Sistemas generados
    function getSistem($id_sistema)
    {
        $cnx = new cnx;
        $qry = "SELECT  s.id_sistema,s.descrip_sistema,s.gestor,s.desarrollador,u.nombre_usuario,u.email
                    FROM  sistemas s
                    left join usuarios u on s.desarrollador=u.id_usuario where s.id_sistema='$id_sistema' order by s.desarrollador";
        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }

    function systemPagination($limit, $offset)
    {
        $cnx = new cnx;
        $qry = "SELECT  s.id_sistema,s.descrip_sistema,s.gestor,s.desarrollador,u.nombre_usuario,u.email
        FROM  sistemas s
        left join usuarios u on s.desarrollador=u.id_usuario order by s.id_sistema ASC limit $limit offset $offset";
        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }

    /***********************************************************************************SEGUIMIENTOS*************************************************************************/

    //Recuperar los seguimientos del ticket
    function getSeguimientos($id_ticket)
    {
        $cnx = new cnx;
        $qry = "SELECT  s.id_seguimiento, s.id_ticket, s.comentario, s.fecha_seguimiento, s.observacion,s.fecha_ter_seguimiento,s.estatus,u.nombre_usuario
                    FROM  seguimientos s
                    join tickets t on t.id_ticket=s.id_ticket
                    join usuarios u on u.id_usuario=t.id_usuario where s.id_ticket='$id_ticket' order by s.id_ticket";
        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }


    //Recuperar el Sistemas generados
    function getDocSeguimientos($id_seguimiento)
    {
        $cnx = new cnx;
        $qry = "SELECT  id_doc_seguimiento,id_seguimiento,nombredoc,rutadoc,fecha_registro,estatus
                          FROM  doc_seguimiento  where id_seguimiento='$id_seguimiento'";
        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }


    /***********************************************************************************USUARIOS*************************************************************************/

    //Recuperar todos los Ususarios generados
    function getAllUser()
    {
        $cnx = new cnx;
        $qry = "SELECT  id_usuario,nombre_usuario,permiso,email,area,contrasena,estatus
				FROM  usuarios order by id_usuario";
        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }

    //Recuperar el Usuario generados
    function getUser($id_usuario)
    {
        $cnx = new cnx;
        $qry = "SELECT  id_usuario,nombre_usuario,permiso,email,area,contrasena,estatus
        FROM  usuarios where id_usuario='$id_usuario' order by id_usuario";
        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }

    function userPagination($limit, $offset)
    {
        $cnx = new cnx;
        $qry = "SELECT  id_usuario,nombre_usuario,permiso,email,area,contrasena,estatus
        FROM  usuarios limit $limit offset $offset";
        $exe = pg_query($cnx->connectDB(), $qry);
        $valor = pg_num_rows($exe);
        if ($valor > 0) {
            while ($row = pg_fetch_array($exe, NULL, PGSQL_ASSOC)) {
                $res[] = $row;
            }
            return $res;
        } else {
            return false;
        }
    }
}
