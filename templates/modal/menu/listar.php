<?php 

include'../../../autoload.php';
$session     = new Session();
$session->validity();

$objeto = new Menu();
?>
<?php if (count($objeto->lista())>0): ?>
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">Menú</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table  id="consulta" class="table table-condensed">
<thead>
<tr>
<th>Código</th>
<th>Descripción</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<?php foreach ($objeto->lista() as $key => $value): ?>
<tr>
<td><?php echo $value['item'] ?></td>
<td><?php echo $value['nombre'] ?></td>
<td>
<button class="btn btn-primary btn-sm btn-edit"  data-id="<?php echo $value['id'] ?>"><i class="fa fa-edit"></i></button><!-- 
<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar"  data-id="<?php //echo $value['id'] ?>"><i class="glyphicon glyphicon-trash"></i></button> -->
</td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>
</div>

<script>
$('.btn-edit').click(function (){

var id         = $(this).data('id');
var parametros = {"id":id};
var url        = "../templates/modal/menu/actualizar.php";
$.get(url,parametros,function (data){

$('#form-edit').html(data);

});

$('#modal-actualizar').modal('show');

});
</script>

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