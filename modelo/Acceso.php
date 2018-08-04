<?php 
class Acceso extends Conexion
{

private $user;
private $pass;

function __construct($user='',$pass='')
{

$this->user     = addslashes($user);
$this->pass     = addslashes($pass);

}

function conexion()
{
  return $this->get_conexion();
}


function login()
{

try {

$conexion  = $this->get_conexion();
$query     = "SELECT * FROM usuario WHERE  UPPER(user)=UPPER(:user) AND pass=:pass";
$statement = $conexion->prepare($query);
$statement->bindParam(':user',$this->user);
$statement->bindParam(':pass',$this->pass);
$statement->execute();
$result    = $statement->fetchAll();
if (count($result)>0) 
{
  
$dato   =  $result[0];
#Creación de Sesiones
session_start();
$_SESSION[KEY.ID]        = $dato['id'];
$_SESSION[KEY.NOMBRES]   = $dato['nombres'];
$_SESSION[KEY.APELLIDOS] = $dato['apellidos'];

return true;

} 
else 
{
  return false;
}



} catch (Exception $e) {
	
	 echo "Error: ".$e->getMessage();
}



}


function logout()
{


  
   unset($_SESSION[KEY.ID]);
   unset($_SESSION[KEY.NOMBRES]);
   unset($_SESSION[KEY.APELLIDOS]);
   unset($_SESSION['fecha']);
   unset($_SESSION['contrato']);


}




}



 ?>