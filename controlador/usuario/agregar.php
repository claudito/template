<?php 

include'../../autoload.php';
$session     = new Session();
$funciones   = new Funciones();
$message     = new Message();

$session->validity();

$nombres   =  $funciones->validar_xss($_POST['nombres']);
$apellidos =  $funciones->validar_xss($_POST['apellidos']);
$correo    =  $funciones->validar_xss($_POST['correo']);
$user      =  $funciones->validar_xss($_POST['user']);
$pass      =  $funciones->validar_xss($_POST['pass']);

$objeto  = new Usuario($nombres,$apellidos,$correo,$user,md5($pass));
$data    =  $objeto->agregar();

switch ($data) {
	case 'existe':
$message->sweetalert('Registro Duplicado','warning','Verificar de Nuevo',2);
		break;
	case 'ok':
$message->sweetalert('Buen Trabajo','success','Registro Agregado',2);
		break;
	default:
$message->sweetalert('Error','error','Consulte al área de soporte',2);
		break;
}



?>