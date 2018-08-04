<?php 

class PermisoSubmenu extends Conexion

{

function conexion()
{
  return $this->get_conexion();
}


function agregar($id_usuario)
{

try {
	
$conexion   = $this->conexion();
$query      = "SELECT  * FROM permiso_submenu WHERE id_usuario=:id_usuario";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id_usuario',$id_usuario);
$statement->execute();
$result     = $statement->fetchAll();
if (count($result)>0) 
{

$query      = "INSERT INTO permiso_submenu(id_submenu,id_usuario)
SELECT s.id,".$id_usuario." FROM submenu s LEFT JOIN (SELECT  id_submenu FROM permiso_submenu where id_usuario=:id_usuario) p ON 
s.id=p.id_submenu WHERE id_submenu IS NULL";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id_usuario',$id_usuario);
$statement->execute();
return "ok";


} 
else
{

$query      = "INSERT INTO permiso_submenu(id_submenu,id_usuario)
SELECT s.id,".$id_usuario." FROM submenu s";
$statement  = $conexion->prepare($query);
$statement->execute();
return "ok";

}


} catch (Exception $e) {
 
  echo "Error: ".$e->getMessage();

}

}


function actualizar($id_submenu,$id_usuario,$estado)
{

try {
	
$conexion   =  $this->conexion();
$query      =  "UPDATE permiso_submenu SET estado=:estado WHERE id_usuario=:id_usuario AND id_submenu=:id_submenu";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id_submenu',$id_submenu);
$statement->bindParam(':id_usuario',$id_usuario);
$statement->bindParam(':estado',$estado);
$statement->execute();
return "ok";

} catch (Exception $e) {
 
  echo "Error: ".$e->getMessage();

}

}



function lista($id_usuario)
{

try {
	
$conexion   =  $this->conexion();
$query      =  "SELECT  * FROM permiso_submenu WHERE id_usuario=:id_usuario";
$statement  = $conexion->prepare($query);
$statement->bindParam(':id_usuario',$id_usuario);
$statement->execute();
$result     = $statement->fetchAll();
return $result;


} catch (Exception $e) {
 
  echo "Error: ".$e->getMessage();

}

}



function  consulta_nav($usuario,$submenu)
{

try {

$conexion   =  $this->conexion();
$query      =  "SELECT  * FROM permiso_submenu WHERE id_usuario=:usuario AND id_submenu=:submenu";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':usuario',$usuario);
$statement->bindParam(':submenu',$submenu);
$statement->execute();
$result = $statement->fetch();
return $result['estado'];
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}




}

 ?>