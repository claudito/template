<?php 

include'../../../autoload.php';

$assets = new Assets();
$objeto = new Submenu();

$id  = $_GET['id'];

 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?= $id ?>">

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Item</label>
<input type="number" min="1" name="item" class="form-control" required value="<?= $objeto->consulta($id,'item'); ?>">
</div>
</div>
<div class="col-md-8">
<div class="form-group">
<label>Nombre</label>
<input type="text" name="nombre" class="form-control" required onchange="Mayusculas(this)" value="<?= $objeto->consulta($id,'nombre'); ?>">
</div>	
</div>
</div>


<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Menú</label>
<select name="id_menu"  class="form-control" required="">
<option value="<?= $objeto->consulta($id,'id_menu'); ?>"><?= $objeto->consulta($id,'menu'); ?></option>
<?php $menu = new Menu(); foreach ($menu->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'id_menu')!==$value['id']): ?>
<option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>	
<?php endif ?>	
<?php endforeach ?>
</select>
</div>
</div>
<div class="col-md-8">
<div class="form-group">
<label>Url</label>
<input type="text" name="url" class="form-control" required value="<?= $objeto->consulta($id,'url'); ?>">
</div>	
</div>
</div>



<button class="btn btn-primary">Actualizar</button>

</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/submenu/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $("#modal-actualizar").modal("hide"); //ocultar modal
          $("body").removeClass("modal-open");//removal clase modal
          $("body").removeAttr("style");//remove creados por el modal
          $(".modal-backdrop").remove();// remover clase fondo gris modal
          loadTable();
          loadMenu();
          }
      });
  });
</script>