<?php 

class Menu extends Conexion
{

protected $nombre;
protected $item;

function __construct($nombre='',$item='')
{

 $this->nombre = $nombre;
 $this->item   = $item;

}


function conexion()
{
  return $this->get_conexion();
}

function  agregar()
{

try {
	
$conexion   = $this->get_conexion();
$query      = "SELECT  * FROM menu WHERE nombre=:nombre";
$statement  = $conexion->prepare($query);
$statement->bindParam('nombre',$this->nombre);
$statement->execute();
$result     = $statement->fetchAll();
if (count($result)>0)
{
 return 'existe';
}
else
{

$query      =  "INSERT INTO menu(nombre,item) VALUES(:nombre,:item)";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':nombre',$this->nombre);
$statement->bindParam(':item',$this->item);
$statement->execute();
return 'ok';

}

	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}



function actualizar($id)
{

try {

$conexion   = $this->get_conexion();
$query      =  "UPDATE menu SET nombre=:nombre,item=:item WHERE id=:id";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':nombre',$this->nombre);
$statement->bindParam(':item',$this->item);
$statement->bindParam(':id',$id);
$statement->execute();   
return 'ok';

	
} catch (Exception $e) {

 echo "Error: ".$e->getMessage();
	
}


}


function eliminar($id)
{

try {

$conexion   = $this->get_conexion();
$query      =  "UPDATE menu SET flagDelete=1 WHERE id=:id";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
return 'ok';

	
} catch (Exception $e) {

 echo "Error: ".$e->getMessage();
	
}


}


function  consulta($id,$campo)
{

try {
	
$conexion   =  $this->get_conexion();
$query      =  "SELECT * FROM menu  WHERE id=:id;";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result = $statement->fetch();
return $result[$campo];
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}


function  lista()
{

try {
	
$conexion   = $this->get_conexion();
$query      =  "SELECT * FROM menu WHERE flagDelete=0 ORDER BY item";
$statement  =  $conexion->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
return $result;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}




function  lista_nav()
{

try {

$conexion   =  $this->conexion();
$query      =  "SELECT * FROM menu m INNER JOIN 
(
SELECT id_menu FROM submenu s INNER JOIN (
SELECT id_submenu FROM permiso_submenu WHERE id_usuario=".$_SESSION[KEY.ID]." AND estado=1) p
ON s.id=p.id_submenu
GROUP BY id_menu) p ON m.id=p.id_menu WHERE flagDelete=0 ORDER BY item";
$statement  =  $conexion->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}




}

 ?>