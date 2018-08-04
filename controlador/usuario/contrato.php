<?php 

include'../../autoload.php';

$contrato        = new Contrato();
$contratoUsuario = new ContratoUsuario();
$usuario         = $_POST['usuario'];

foreach ($contrato->lista() as $key => $value) {
	
   $estado   =  (isset($_POST[$value['id']])) ? 1 : 0;
   $contrato =  $value['id'];
    
   $contratoUsuario->actualizar($usuario,$contrato,$estado);
   
}

echo '<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	Permisos Actualizados
</div>';


 ?>