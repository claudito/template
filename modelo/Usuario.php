<?php 

class  Usuario extends Conexion
{

protected $nombres;
protected $apellidos;
protected $correo;
protected $user;
protected $pass;
protected $estado;
protected $tipo;

function conexion()
{
  return $this->get_conexion();
}

function __construct($nombres='',$apellidos='',$correo='',$user='',$pass='',$estado='',$tipo='')
{

$this->nombres   = $nombres;
$this->apellidos = $apellidos;
$this->correo    = $correo;
$this->user      = $user;
$this->pass      = $pass;
$this->estado    = $estado;
$this->tipo      = $tipo;

}

function  agregar()
{

try {

$conexion   =  $this->conexion();
$query      =  "INSERT INTO usuario(nombres,apellidos,correo,user,pass)VALUES(:nombres,:apellidos,:correo,:user,:pass)";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':nombres',$this->nombres);
$statement->bindParam(':apellidos',$this->apellidos);
$statement->bindParam(':correo',$this->correo);
$statement->bindParam(':user',$this->user);
$statement->bindParam(':pass',$this->pass);
$statement->execute();
return "ok";
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}






function  lista()
{

try {

$conexion   =  $this->conexion();
$query      =  "SELECT * FROM usuario";
$statement  =  $conexion->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
return $result;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}


function  actualizar($id)
{

try {

$conexion   =  $this->conexion();
$query      =  "UPDATE usuario SET nombres=:nombres,apellidos=:apellidos,correo=:correo,estado=:estado,tipo=:tipo WHERE id=:id";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':nombres',$this->nombres);
$statement->bindParam(':apellidos',$this->apellidos);
$statement->bindParam(':correo',$this->correo);
$statement->bindParam(':estado',$this->estado);
$statement->bindParam(':tipo',$this->tipo);
$statement->bindParam(':id',$id);
$statement->execute();
return "ok";
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}



function  consulta($id,$campo)
{

try {

$conexion   =  $this->conexion();
$query      =  "SELECT * FROM usuario WHERE id=:id";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result = $statement->fetch();
return $result[$campo];
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}





}




 ?>