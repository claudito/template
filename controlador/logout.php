<?php 

include'../autoload.php';
$session = new Session();
$acceso  = new Acceso();

$session->validity();
$acceso->logout();

 ?>