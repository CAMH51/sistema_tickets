<?php
session_start();
require_once('./master/template.php');


function contenido()
{
  require_once './models/consultas.model.php';

  $consulta = new Consultas;
  if($_SESSION['permiso']=='usuario'){

    $criterio='where'.' desarrollador=\''.$_GET['u'].'\'';
  }else{
    $criterio='';
  }
  $sistemas = $consulta->getAllSistem($criterio);
?>




  <h4 class="text-center">Listado de Sistemas</h4>

  <div class="row">
    <div class="col-sm-12 col-md-12">
      <ol class="list-group list-group-numbered">
        <?php  if($sistemas== false){ ?>
          <li class="list-group-item list-group-item-action">No existen Registros</li>
          <?php }else{ ?>
            <?php  foreach($sistemas as $sistema){ ?>
              <?php if($_GET['e']== 'all'){ ?>
                <li class="list-group-item list-group-item-action"><a href="./detalles_sistemas.php?s=<?php echo $sistema['id_sistema']; ?>"> <?php echo $sistema['descrip_sistema']  ?></a></li>
                <?php  }else{ ?>
                  <li class="list-group-item list-group-item-action"><a href="./listas_tickets.php?s=<?php echo $sistema['id_sistema']; ?>&e=<?php  echo $_GET['e'];?>"> <?php echo $sistema['descrip_sistema']  ?></a></li>
                  <?php  } ?>
              <?php  } ?>
            <?php  } ?>
      </ol>
    </div>
  </div>


  <script src="./assets/js/alerts.js"></script>
  <script src="./assets/js/sistemas.js"></script>
  <script>
  </script>

<?php
}
?>