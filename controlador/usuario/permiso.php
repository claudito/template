<?php 

include'../../autoload.php';
$session        = new Session();
$funciones      = new Funciones();
$message        = new Message();
$permisoSubmenu = new PermisoSubmenu();
$objeto         = new Submenu();

$usuario       =   $_POST['usuario']; 

$session->validity();

foreach ($objeto->lista() as $key => $value) {
	
   $estado   =  (isset($_POST[$value['id']])) ? 1 : 0;
   $submenu  =  $value['id'];
    
  $permisoSubmenu->actualizar($submenu,$usuario,$estado);
   
}

echo '<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	Permisos Actualizados.
</div>';

 ?>