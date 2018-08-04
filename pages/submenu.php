<?php 
include'../autoload.php';
$assets  = new Assets();
$session = new Session();
$session->validity();
$session->acceso();
$assets->title('Sub Menú');
$assets->sweetalert();
$assets->datatables();
$assets->head();?>
<div id="loaderMenu"></div>
<?php
$assets->breadcrumbs('ADMINISTRACIÓN','SUB MENÚ');
$assets->modal('submenu/agregar');
$assets->modal('submenu/eliminar');
?>



<div class="row">

<div class="col-md-12">


<!-- Botón Agregar -->
<div class="pull-right">
<button class="btn btn-primary" data-toggle="modal" href="#modal-agregar"><i class="fa fa-plus"></i>  Agregar</button>
</div>


<div id="mensaje"></div>
<div id="loader" class="text-center"></div>
<div id="table"></div>



</div>

</div>



<script src="../ajax/app/submenu.js"></script>
<script>loadTable()</script>
<script>loadMenu()</script>
<?php  $assets->footer();  ?>