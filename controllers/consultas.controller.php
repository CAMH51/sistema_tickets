<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once '../models/consultas.model.php';

$consultas = new Consultas;

if($_GET['o']=='login'){ //Inicio de Sesión
    $login = $consultas->login($_POST['txtUsuario'],$_POST['txtClaveAcceso']);
    if ($login == false){
    
        $json = [
            'estatus'=>false,
            'msj'=>'USUARIO Y/O CONTRASEÑA INCORRECTA'
        ];
    
        $array[]=$json;
        echo json_encode($array);
     }else{
    
         foreach($login as $item){
            $_SESSION['id']=$item['id_usuario'];
            $_SESSION['username']=$item['nombre_usuario'];
            $_SESSION['usuario']= $item['email'];
            $_SESSION['permiso']= $item['permiso'];
            $_SESSION['estatus']=$item['estatus'];
        
        }
    
        $json = [
            'estatus'=>true,
            'msj'=>'ACCESO CORRECTO'
        ];
    
        $array[]=$json;
        echo json_encode($array);
     }
    
    $array=[]; 
   
}else if($_GET['o']=='getAllTicket'){  //Consulta de todos los tickets

    $getAllTickets = $consultas->getAllTickets();

    if($getAllTickets == false){
        $json=[
            'estatus'=>false,
            'msj'=>'No existen Registros'
        ];

        $valor[]=$json;
        echo json_encode($valor);
    }else{

        foreach($getAllTickets as $ticket){
            $json=[
                'estatus'=>true,
                'id_ticket'=>$ticket['id_ticket'],
                'nombre_usuario'=>$ticket['nombre_usuario'],
                'email'=>$ticket['email'],
                'asunto'=>$ticket['asunto'],
                'prioridad'=>$ticket['prioridad'],
                'sistema'=>$ticket['descrip_sistema'],
                'gestor'=>$ticket['gestor'],
                'descripcion_ticket'=>$ticket['descripcion'],
                'fecha_creacion_ticket'=>$ticket['fecha_creacion_ticket'],
                'fecha_atencion'=>$ticket['fecha_atencion'],
                'estatus'=>$ticket['status'],
                'area_requiriente'=>$ticket['area_requiriente'],
                'usuario_requiriente'=>$ticket['usuario_requiriente'],
                'entidad_federativa'=>$ticket['ent_federativa'],
                'fecha_solicitud'=>$ticket['fecha_solicitud']
            ];
            $valor[]=$json;
        }
        echo json_encode($valor);
    }
}else if($_GET['o']=='getAllTicketxCriterio'){  //Consulta de todos los tickets

    $getAllTickets = $consultas->getAllTickets();

    if($getAllTickets == false){
        $json=[
            'estatus'=>false,
            'msj'=>'No existen Registros'
        ];

        $valor[]=$json;
        echo json_encode($valor);
    }else{

        foreach($getAllTickets as $ticket){
            $json=[
                'estatus'=>true,
                'id_ticket'=>$ticket['id_ticket'],
                'nombre_usuario'=>$ticket['nombre_usuario'],
                'email'=>$ticket['email'],
                'asunto'=>$ticket['asunto'],
                'prioridad'=>$ticket['prioridad'],
                'sistema'=>$ticket['descrip_sistema'],
                'gestor'=>$ticket['gestor'],
                'descripcion_ticket'=>$ticket['descripcion'],
                'fecha_creacion_ticket'=>$ticket['fecha_creacion_ticket'],
                'fecha_atencion'=>$ticket['fecha_atencion'],
                'estatus'=>$ticket['status'],
                'area_requiriente'=>$ticket['area_requiriente'],
                'usuario_requiriente'=>$ticket['usuario_requiriente'],
                'entidad_federativa'=>$ticket['ent_federativa'],
                'fecha_solicitud'=>$ticket['fecha_solicitud']
            ];
            $valor[]=$json;
        }
        echo json_encode($valor);
    }
}
else if($_GET['o']=='getTicket'){  //Consulta de todos los tickets
}else if($_GET['o']=='getAllSistem'){//Consulta todos los sistemas
    $sistemas = $consultas->getAllSistem('');

    if($sistemas == false){
        $json=[
            'estatus'=>false,
            'msj'=>'No existen Registros'
        ];

        $valor[]=$json;
        echo json_encode($valor);
    }else{

        foreach($sistemas as $sistema){
            $json=[
                'estatus'=>true,
                'id_sistema'=>$sistema['id_sistema'],
                'sistema'=>$sistema['descrip_sistema'],
                'gestor'=>$sistema['gestor'],
                'id_usuario'=>$sistema['id_usuario'],
                'usuario'=>$sistema['nombre_usuario'],
                'email'=>$sistema['email']
            ];
            $valor[]=$json;
        }
        echo json_encode($valor);
    }
}else if($_GET['o']=='getSistem'){//Consulta un sistema

}else if($_GET['o']=='getAllUsuarios'){//Consulta todos los Usuarios
    $usuarios = $consultas->getAllUser();

    if($usuarios == false){
        $json=[
            'estatus'=>false,
            'msj'=>'No existen Registros'
        ];

        $valor[]=$json;
        echo json_encode($valor);
    }else{

        foreach($usuarios as $usuario){
            $json=[
                'estatus'=>true,
                'id_usuario'=>$usuario['id_usuario'],
                'nombre_usuario'=>$usuario['nombre_usuario'],
                'permiso'=>$usuario['permiso'],
                'email'=>$usuario['email'],
                'area'=>$usuario['area'],
                'contrasena'=>$usuario['contrasena'],
                'estatus'=>$usuario['estatus']
            ];
            $valor[]=$json;
        }
        echo json_encode($valor);
    }
}else if($_GET['o']=='getUsuario'){//Consulta un Usuario

}else if($_GET['o']=='userPagination'){//Consulta un Usuario
    $totalRegistro = $_GET['t'];
    $itemporpaginas = $_GET['ixp'];
    $numPagina = $_GET['n'];

    $limit = $itemporpaginas;
    $offset = ($numPagina - 1) * $itemporpaginas;
    $paginas = ceil($totalRegistro / $itemporpaginas);
    $paginacion = $consultas->userPagination($limit,$offset);

    foreach($paginacion as $usuario){
        $json=[
            'status'=>true,
            'id_usuario'=>$usuario['id_usuario'],
            'nombre_usuario'=>$usuario['nombre_usuario'],
            'permiso'=>$usuario['permiso'],
            'email'=>$usuario['email'],
            'area'=>$usuario['area'],
            'contrasena'=>$usuario['contrasena'],
            'estatus'=>$usuario['estatus'],
            'paginas'=>$paginas
        ];
        $valor[]=$json;
    }
    echo json_encode($valor);

}else if($_GET['o']=='systemPagination'){//Consulta un Usuario
    $totalRegistro = $_GET['t'];
    $itemporpaginas = $_GET['ixp'];
    $numPagina = $_GET['n'];

    $limit = $itemporpaginas;
    $offset = ($numPagina - 1) * $itemporpaginas;
    $paginas = ceil($totalRegistro / $itemporpaginas);
    $paginacion = $consultas->systemPagination($limit,$offset);

    foreach($paginacion as $system){
        $json=[
            'status'=>true,
            'id_sistema'=>$system['id_sistema'],
            'descrip_sistema'=>$system['descrip_sistema'],
            'gestor'=>$system['gestor'],
            'nombre_usuario'=>$system['nombre_usuario'],
            'paginas'=>$paginas
        ];
        $valor[]=$json;
    }
    echo json_encode($valor);

}
?>