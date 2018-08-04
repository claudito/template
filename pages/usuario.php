<?php 
include'../autoload.php';
$assets  = new Assets();
$session = new Session();
$session->validity();
$session->acceso();
$assets->title('Usuarios');
$assets->sweetalert();
$assets->datatables();
$assets->head();
?>
<div id="loaderMenu"></div>
<?php $assets->breadcrumbs('ADMINISTRACCIÓN','USUARIOS');
$assets->modal('usuario/agregar');
?>



<div class="row">

<div class="col-md-12">

<!-- Modal Agregar -->
<div class="pull-right">
<button class="btn btn-primary" data-toggle="modal" href="#modal-agregar">Agregar</button>
</div>

<div id="mensaje"></div>
<div id="loader" class="text-center"></div>
<div id="table"></div>



</div>

</div>



<script src="../ajax/app/usuario.js"></script>
<script>loadTable()</script>
<script>loadMenu()</script>
<?php  $assets->footer();  ?>