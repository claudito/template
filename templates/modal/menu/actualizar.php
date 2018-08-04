<?php 

include'../../../autoload.php';

$assets = new Assets();
$objeto = new Menu();

$id  = $_GET['id'];

 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?= $id ?>">


<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>Item</label>
<input type="number" min="1" name="item" class="form-control" value="<?= $objeto->consulta($id,'item'); ?>" onchange="Mayusculas(this)" required>
</div>
</div>
<div class="col-md-9">
<div class="form-group">
<label>Nombre</label>
<input type="text" name="nombre" class="form-control" value="<?= $objeto->consulta($id,'nombre'); ?>" onchange="Mayusculas(this)" required onchange="Mayusculas(this)">
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
          url: "../controlador/menu/actualizar.php",
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
