<form id="agregar">

<div class="modal fade" id="modal-agregar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Agregar</h4>
			</div>
			<div class="modal-body">

            <div class="form-group">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control" required onchange="Mayusculas(this)">
            </div>

            <div class="form-group">
            <label>Apellidos</label>
            <input type="text" name="apellidos" class="form-control" required onchange="Mayusculas(this)">
            </div>

            <div class="form-group">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" required >
            </div>

            <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="user" class="form-control" required >
            </div>

            <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="pass" class="form-control" required>
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