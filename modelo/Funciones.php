<?php 


class Funciones extends Conexion
{


function conexion()
{
  return $this->get_conexion();
}

  

function validar_xss($string)
{


return htmlspecialchars(trim($string), ENT_QUOTES,'UTF-8');


}



function sumarmin($horainicio,$minutos)
{
$horaInicial  = $horainicio;
$minutoAnadir = $minutos;
 
$segundos_horaInicial=strtotime($horaInicial);
 
$segundos_minutoAnadir=$minutoAnadir*60;
 
$nuevaHora=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
 
return $nuevaHora;
}


function buttons_export($orientacion='letter')
{

$buttons = <<<EOF
<script>
$(document).ready(function() {
$('#consulta').DataTable( {
dom: 'Bfrtip',
buttons: [
{
extend:    'copyHtml5',
text:      '<i class="fa fa-files-o"></i>',
titleAttr: 'Copiar Filas'
},
{
extend:    'excelHtml5',
text:      '<i class="fa fa-file-excel-o"></i>',
titleAttr: 'Exportar en documento Excel'
},
{
extend:    'print',
text:      '<i class="fa fa-print"></i>',
titleAttr: 'Imprimir Documento'
},
{
extend:    'pdfHtml5',
text:      '<i class="fa fa-file-pdf-o"></i>',
titleAttr: 'Exporta en Documento PDF',
orientation: '$orientacion',
pageSize: 'LEGAL'
}

]
} );
} );
</script>
EOF;

echo  $buttons;

}


function select_dependiente($idselect,$iddata,$url)
{

echo '
<script>
$(document).ready(function() {
// Parametros para el combo
$("#'.$idselect.'").change(function () {
$("#'.$idselect.' option:selected").each(function () {
elegido=$(this).val();
$.post("'.$url.'", { elegido: elegido }, 
function(data){
$("#'.$iddata.'").html(data);
});     
});
});    
});
</script>';

}


function  input($type='',$codigo='',$placeholder='')
{

//switch
switch ($type) {
case 'text':
echo '<div class="form-group">
     <input type="text"   name="'.$codigo.'"   placeholder="'.$placeholder.'" class="form-control" required>
     </div>';
    break;
case 'number':
echo '<div class="form-group">
     <input type="number"   name="'.$codigo.'"   placeholder="'.$placeholder.'" class="form-control" required>
     </div>';
    break;
case 'date':
echo '<div class="form-group">
     <input type="text"   name="'.$codigo.'"   id="datepicker'.substr($codigo,1,2).'" placeholder="'.$placeholder.'" class="form-control" required>
     </div>';
echo "<script>
    $( function() {
    $('#datepicker".substr($codigo,1,2)."').datepicker({dateFormat:'yy-mm-dd'});
    } );
    </script>
     ";
    break;
  default:
echo "elemnto html sin registrar";
    break;
}

////


}



function query($sql)
{

try {
  
$conexion  = $this->get_conexion();
$query    = $sql;
$statement= $conexion->prepare($sql);
$statement->execute();
$result     =  $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;

} catch (Exception $e) {
  
 echo "Error: ".$e->getMessage();

}



}





}


 ?>