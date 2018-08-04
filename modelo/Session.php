<?php 

class Session extends Conexion
{

function conexion()
{
  return $this->get_conexion();
}

function validity()
{

session_start();

if (!isset($_SESSION[KEY.ID])) 
{

 header('Location: '.URL.'');

} 

}


function acceso()
{

try {


$url = substr($_SERVER['REQUEST_URI'], strlen(FOLDER));
//$url = substr($_SERVER['REQUEST_URI'], 1);
$conexion =  $this->conexion();
$query =  "SELECT  url,estado  FROM submenu s INNER JOIN permiso_submenu p ON
s.id=p.id_submenu WHERE s.url=:url";
$statement = $conexion->prepare($query);
$statement->bindParam(':url',$url);
$statement->execute();
$result    = $statement->fetch();

if ($result['estado']==0)
{
  
  header('Location: '.URL.'');
	
}


	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}


}





 ?>