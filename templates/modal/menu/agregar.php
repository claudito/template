<form id="agregar" autocomplete="off">
	
<div class="modal fade" id="modal-agregar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Agregar</h4>
			</div>
			<div class="modal-body">
          
            <div class="row">
            <div class="col-md-3">
            <div class="form-group">
            <label>Item</label>
            <input type="number" min="1" name="item" class="form-control" required>
            </div>
            </div>
            <div class="col-md-9">
            <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required onchange="Mayusculas(this)">
            </div>	
            </div>
            </div>
			

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Agregar</button>
			</div>
		</div>
	</div>
</div>

</form>