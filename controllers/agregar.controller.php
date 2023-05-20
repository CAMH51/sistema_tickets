<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('America/Mexico_City');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './../lib/PHPMailer/src/PHPMailer.php';
require './../lib/PHPMailer/src/SMTP.php';
require './../lib/PHPMailer/src/Exception.php';
include_once('../models/agregar.model.php');

include_once '../models/agregar.model.php';
include_once '../models/consultas.model.php';

$agregar = new Agregar;
$consultas = new Consultas;

if($_GET['o']=='addticket'){


    $datos = [
        'usuario' => $_SESSION['id'],
        'asunto'=> $_POST['txtasunto'],
        'prioridad' => $_POST['prioridad'],
        'sistema'=>$_POST['sistema'],
        'descripcion'=>$_POST['txtdescripcion'],
        'fecha_creacion_ticket'=> date("Y").'/'.date("m").'/'.date("d").' '.date("H").':'.date("i").':'.date("s"),
        'fecha_atencion'=> '2022/'.'01/01'.' '.'00:'.'00:00',
        'status'=>0,
        'imagen'=>'',
        'area_requiriente'=>$_POST['arearequiriente'],
        'usuario_requiriente'=>$_POST['usuariorequiriente'],
        'ent_federativa'=>$_POST['entidad'],
        'fecha_solicitud'=>$_POST['fechasolicitud']

    ];

    $ticket=$agregar->AddTicket($datos);
    $valor[]=$datos ;

    echo json_encode($valor);


    $valor[] = $consultas->obtenerNumTicket();

foreach($valor as $item){
    $val=$item;
    
}
echo $val;
$result =$consultas->buscarTicket($val);
foreach($result as $res){
   
    $asunto=$res[0];
    $prioridad=$res[1];
    $sistema=$res[2];
    $descripcion=$res[3];
    $requiriente = $res[4];
/* 
    enviarCorreo($val,$asunto,$prioridad,$sistema,$descripcion,$requiriente); */
    //header("Location:../detalle_ticket.php?id=".$val);
}

    if($_FILES['evidencia']['name'] != null){


        //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
        foreach($_FILES["evidencia"]['tmp_name'] as $key => $tmp_name)
        {
            //Validamos que el archivo exista
            if($_FILES["evidencia"]["name"][$key]) {
                $filename = $_FILES["evidencia"]["name"][$key]; //Obtenemos el nombre original del archivo
                $source = $_FILES["evidencia"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                
                $directorio = '../upload/docs/'.$val; //Declaramos un  variable con la ruta donde guardaremos los archivos
                $directorioDB ='./upload/docs/'.$val;
                //Validamos si la ruta de destino existe, en caso de no existir la creamos
                if(!file_exists($directorio)){
                    mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
                }
                
                $dir=opendir($directorio); //Abrimos el directorio de destino
                $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
                $target_path_DB = $directorioDB.'/'.$filename;
                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                if(move_uploaded_file($source, $target_path)) {	
                    //echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                    $Fecha =date("Y").'/'.date("m").'/'.date("d").' '.date("H").':'.date("i").':'.date("s");
                    $datos2 = [
                        'nombre_doc' => $filename,
                        'ruta_doc'=> $target_path_DB,
                        'fecha'=> $Fecha
                       
                    ];
                    $docTicket=$agregar->addDocTicket($datos2);
                    } else {	
                    echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                }
        
                closedir($dir); //Cerramos el directorio de destino
               
            }
        }
        }


}if($_GET['o']=='addDocTicket'){

}

?>