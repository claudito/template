<?php 

include'../../../autoload.php';
$session     = new Session();
$session->validity();
$objeto = new Usuario();
?>
<?php if (count($objeto->lista())>0): ?>
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">Usuarios</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table  id="consulta" class="table table-condensed">
<thead>
<tr>
<th>Id</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Correo</th>
<th>Usuario</th>
<th>Estado</th>
<th>Tipo</th>
<th class="text-center">Acciones</th>
</tr>
</thead>
<tbody>
<?php foreach ($objeto->lista() as $key => $value): ?>
<tr>
<td><?php echo $value['id'] ?></td>
<td><?php echo $value['nombres'] ?></td>
<td><?php echo $value['apellidos'] ?></td>
<td><?php echo $value['correo'] ?></td>
<td><?php echo $value['user'] ?></td>
<td><?php echo ($value['estado']==1) ? 'ACTIVO' : 'INACTIVO' ; ?></td>
<td><?php echo strtoupper($value['tipo']) ?></td>
<td class="text-center">

<button class="btn btn-primary btn-sm btn-edit" data-id="<?= $value['id'] ?>"><i class="fa fa-edit"></i></button>

<button class="btn btn-success btn-sm btn-permiso" data-id="<?= $value['id'] ?>"><i class="fa fa-lock"></i></button>



</td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>
</div>

<script>
//boton actualizar
$('.btn-edit').click(function(){

var id         = $(this).data('id');
var parametros = {"id":id};
var url        = "../templates/modal/usuario/actualizar.php";

$.get(url,parametros,function (data){

$('#form-edit').html(data);

});

$('#modal-actualizar').modal('show');

});


//boton permiso
$('.btn-permiso').click(function(){

var id         = $(this).data('id');
var parametros = {"id":id};
var url        = "../templates/modal/usuario/permiso.php";

$.get(url,parametros,function (data){

$('#form-permiso').html(data);

});

$('#modal-permiso').modal('show');

});

//boton permiso
$('.btn-contrato').click(function(){

var id         = $(this).data('id');
var parametros = {"id":id};
var url        = "../templates/modal/usuario/contrato.php";

$.get(url,parametros,function (data){

$('#form-contrato').html(data);

});

$('#modal-contrato').modal('show');

});


</script>

<!-- Modal Actualizar -->
<div class="modal fade" id="modal-actualizar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Actualizar</h4>
			</div>
			<div class="modal-body">
			<div id="form-edit"></div>	
			</div>

		</div>
	</div>
</div>

<!-- Modal Permiso -->
<div class="modal fade" id="modal-permiso">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Permisos <i class="fa fa-lock"></i></h4>
			</div>
			
			<div id="form-permiso"></div>	
		

		</div>
	</div>
</div>

<!-- Modal Contrato -->
<div class="modal fade" id="modal-contrato">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Contratos</h4>
			</div>
			
			<div id="form-contrato"></div>	
		

		</div>
	</div>
</div>



<script>
$(document).ready(function() {
    $('#consulta').DataTable( {
        "language": {
            "url": "../assets/js/spanish.json"
        }
    } );
} );
</script>
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>
<?php endif ?>