<?php 

if (!isset($_POST['user']) || !isset($_POST['pass']) )
{
 echo "...";
}
else
{

include'../autoload.php';
$funciones=  new Funciones();
$user     = $funciones->validar_xss($_POST['user']);
$pass     = $funciones->validar_xss($_POST['pass']);

if (strlen($user)==0 AND strlen($pass)==0) 
{
   echo "userpassvacio";
} 
else if (strlen($user)==0)
{
   echo "uservacio";
}
else if (strlen($pass)==0)
{
   echo "passvacio";
}
else 
{
    
$acceso  = new Acceso($user,$pass);

echo $acceso->login();

}


}


 ?>