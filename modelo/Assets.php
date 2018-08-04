<?php 

class Assets{

function title($titulo)
{

echo '<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>'.$titulo.' | Template </title>
<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="shortcut icon" type="image/x-icon" href="https://www.psv.com.pe/images/favicon-32x32.png">

<!-- Convertir a Mayúsculas -->
<script>
function Mayusculas(field) 
{
field.value         = field.value.toUpperCase();
}
</script>
<style>
table{font-size: 13px;}
.btn-responsive {
    white-space: normal !important;
    word-wrap: break-word;
}
</style>


	';
}


function head()
{

echo '
</head>
<body>
<div class="container-fluid">
';

}


function nav($ruta)
{
  echo '<div class="row">
        <div class="col-md-12">';
  include''.$ruta.'/templates/nav.php';
  echo '</div>
        </div>';
}


function breadcrumbs($menu='',$submenu='')
{

echo '<div class="row">
<div class="col-md-12">
<ol class="breadcrumb">
<li><a href="'.URL.'"><i class="fa fa-home"></i> INICIO</a></li>
<li>'.$menu.'</li>
<li>'.$submenu.'</li>
</ol>
</div>
</div>';

}


function modal($ruta='')
{
include'../templates/modal/'.$ruta.'.php';
}


function modal_actualizar($ruta)
{
echo '            
<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/'.trim($ruta).'/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $("#modal-actualizar").modal("hide"); //ocultar modal
          $("body").removeClass("modal-open");//removal clase modal
          $("body").removeAttr("style");//remove creados por el modal
          $(".modal-backdrop").remove();// remover clase fondo gris modal
          loadTable(); //volver a carga grilla
          }
      });
  });
</script>
 ';
}



function footer()
{
echo '
<footer>
<p class="text-center">PerúTec - '.date('Y').'</p>
</footer>
</div>
<script src="'.URL.'ajax/logout.js"></script>
</body>
</html>
	';
}


function datatables()
{
echo '<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>';
}


function datatables_export()
{
echo '<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
';
}



function sweetalert()
{
echo '  
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
';
}
function selectize()
{
echo '<link rel="stylesheet" href="https://selectize.github.io/selectize.js/css/selectize.default.css" >
<script src="https://selectize.github.io/selectize.js/js/selectize.js"></script>';
}
function jqueryiu()
{
	echo '<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">';
}


function prism()
{

echo '<link rel="stylesheet" href="'.URL.'assets/prism/prism.css">
     <script src="'.URL.'assets/prism/prism.js"></script>';  
}

function codemirror_sql()
{

echo '
<link rel="stylesheet" href="http://codemirror.net/lib/codemirror.css" />
<script src="http://codemirror.net/lib/codemirror.js"></script>
<script src="http://codemirror.net/mode/sql/sql.js"></script>
<script src="http://codemirror.net/addon/hint/show-hint.js"></script>
<script src="http://codemirror.net/addon/hint/sql-hint.js"></script>
<link rel="stylesheet" href="http://codemirror.net/theme/monokai.css">
<script src="http://codemirror.net/keymap/sublime.js"></script>';

}


function select_bootstrap()
{

echo '
<script src="https://silviomoreto.github.io/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://silviomoreto.github.io/bootstrap-select/dist/css/bootstrap-select.min.css">
 ';


}


function clipboard()
{

echo '<script src="https://norfipc.com/js/clipboard.min.js"></script>';

}




}




 ?>