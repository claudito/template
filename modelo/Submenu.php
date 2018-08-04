<?php 

class Submenu extends Conexion
{


protected $nombre;
protected $item;
protected $url;
protected $id_menu;

function __construct($nombre='',$item='',$url='',$id_menu='')
{

 $this->nombre        = $nombre;
 $this->item          = $item;
 $this->url           = $url;
 $this->id_menu       = $id_menu;

}



function conexion()
{
  return $this->get_conexion();
}

function  agregar()
{

try {
	
$conexion   = $this->get_conexion();
$query      = "SELECT  * FROM submenu WHERE nombre=:nombre AND id_menu=:id_menu";
$statement  = $conexion->prepare($query);
$statement->bindParam('nombre',$this->nombre);
$statement->bindParam('id_menu',$this->id_menu);
$statement->execute();
$result     = $statement->fetchAll();
if (count($result)>0)
{
 return 'existe';
}
else
{

$query      =  "INSERT INTO submenu(nombre,item,url,id_menu) VALUES(:nombre,:item,:url,:id_menu)";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':nombre',$this->nombre);
$statement->bindParam(':item',$this->item);
$statement->bindParam(':url',$this->url);
$statement->bindParam(':id_menu',$this->id_menu);
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
$query      =  "UPDATE submenu SET nombre=:nombre,item=:item,url=:url,id_menu=:id_menu WHERE id=:id";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':nombre',$this->nombre);
$statement->bindParam(':item',$this->item);
$statement->bindParam(':url',$this->url);
$statement->bindParam(':id_menu',$this->id_menu);
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
$query      =  "UPDATE submenu SET flagDelete=1 WHERE id=:id";
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
$query      =  "SELECT s.id_menu,m.nombre menu,s.id,s.nombre,s.item,s.url FROM 
               menu m INNER JOIN submenu s ON m.id=s.id_menu WHERE s.id=:id";
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
$query      = "SELECT s.id_menu,m.nombre menu,s.id,s.nombre,s.item,s.url FROM menu m 
               INNER JOIN submenu s ON m.id=s.id_menu WHERE s.flagDelete=0";
$statement  =  $conexion->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
return $result;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}





function  lista_nav($menu)
{

try {

$conexion   =  $this->conexion();
$query     =  "SELECT * FROM submenu WHERE id_menu=:menu AND flagDelete=0 ORDER BY item";
$statement =  $conexion->prepare($query);
$statement->bindParam(':menu',$menu);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}







}

 ?>