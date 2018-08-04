<?php 

include'../../autoload.php';
$session     = new Session();
$funciones   = new Funciones();
$message     = new Message();

$session->validity();

$id      =  $funciones->validar_xss($_POST['id']);
$nombre  =  $funciones->validar_xss($_POST['nombre']);
$item    =  $funciones->validar_xss($_POST['item']);
$url     =  $funciones->validar_xss($_POST['url']);
$id_menu =  $funciones->validar_xss($_POST['id_menu']);

$objeto  = new Submenu($nombre,$item,$url,$id_menu);
$data    =  $objeto->actualizar($id);

switch ($data) {
	case 'ok':
$message->sweetalert('Buen Trabajo','success','Registro Actualizado',2);
		break;
	default:
$message->sweetalert('Error','error','Consulte al área de soporte',2);
		break;
}



?>