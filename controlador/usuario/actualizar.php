<?php 

include'../../autoload.php';
$session     = new Session();
$funciones   = new Funciones();
$message     = new Message();

$session->validity();

$id          =  $funciones->validar_xss($_POST['id']);
$nombres     =  $funciones->validar_xss($_POST['nombres']);
$apellidos   =  $funciones->validar_xss($_POST['apellidos']);
$estado      =  $funciones->validar_xss($_POST['estado']);
$correo      =  $funciones->validar_xss($_POST['correo']);
$tipo        =  $funciones->validar_xss($_POST['tipo']);
$objeto      =  new Usuario($nombres,$apellidos,$correo,'','',$estado,$tipo);
$data        =  $objeto->actualizar($id);

switch ($data) {
	case 'ok':
$message->sweetalert('Buen Trabajo','success','Registro Actualizado',2);
		break;
	default:
$message->sweetalert('Error','error','Consulte al área de soporte',2);
		break;
}



?>