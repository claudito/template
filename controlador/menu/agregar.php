<?php 

include'../../autoload.php';
$session     = new Session();
$funciones   = new Funciones();
$message     = new Message();

$session->validity();

$nombre  =  $funciones->validar_xss($_POST['nombre']);
$item    =  $funciones->validar_xss($_POST['item']);

$objeto  = new Menu($nombre,$item);
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