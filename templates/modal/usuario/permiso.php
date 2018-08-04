<?php 

include'../../../autoload.php';
$id  = $_GET['id'];
$objeto         = new Usuario();
$assets         = new Assets();
$permisoSubmenu = new PermisoSubmenu();

//agregar 
$permisoSubmenu->agregar($id);


 ?>
<form id="permiso">
	
<div class="modal-body">

<div id="mensaje_permiso"></div>

<input type="hidden" name="usuario" value="<?= $id ?>">

<?php $menu = new Menu(); foreach ($menu->lista() as $key => $value): ?>
<ul>
<li style="list-style: none"><strong><?= $value['nombre'] ?>:</strong></li>
<ul>
<?php $submenu = new Submenu(); foreach ($submenu->lista_nav($value['id']) as $key => $value): ?>
<?php if ($permisoSubmenu->consulta_nav($id,$value['id'])==1): ?>

<div class="checkbox">
<label>
<li style="list-style: none"><input type="checkbox" name="<?= $value['id'] ?>"  checked> <?= $value['nombre'] ?></li>
</label>
</div>

<?php else: ?>

<div class="checkbox">
<label>
<li style="list-style: none"><input type="checkbox" name="<?= $value['id'] ?>" > <?= $value['nombre'] ?></li>
</label>
</div>

<?php endif ?>

<?php endforeach ?>
</ul>
</ul>
<?php endforeach ?>




</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Actualizar</button>
</div>
</div>


</form>

<script>
    $("#permiso").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/usuario/permiso.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje_permiso").html("Cargando...");
            },
          success: function(datos){
          $("#mensaje_permiso").html(datos);
          loadMenu();
          }
      });
  });
</script>