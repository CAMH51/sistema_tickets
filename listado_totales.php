<?php
session_start();
require_once('./master/template.php');

function contenido()
{

?>

<h4 class="text-center">Listado de Tickets Totales</h4>


<script src="./assets/js/tickets.js"></script>

<script>
    getAllTickets();
</script>
<?php
}
?>