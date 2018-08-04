<?php 
$assets  =  new Assets();
$message =  new Message();
$assets->title('Home');
$assets->head();
$assets->jqueryiu();
$assets->sweetalert();
$assets->datatables();
$assets->datatables_export();
$message->sweetalert('Bienvenido','success',$_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS],2);
$assets->nav('./');
?>

<div class="row">
<div class="col-md-12">

<div class="jumbotron">
	<div class="container">
		<h1><i class="fa fa-home"></i> Template</h1>
		<p>Versión 1.0</p><!--  
		<p>
			<a  data-toggle="modal" href="#modal-who"  class="btn btn-primary btn-lg">Acerca de Query Manager...</a>
		</p>-->
	</div>
</div>

</div>
</div>

<br>

<?php 
$assets->footer();
 ?>


 <div class="modal fade" id="modal-who">
 	<div class="modal-dialog modal-lg">
 		<div class="modal-content">
 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 				<h4 class="modal-title">PharmaString</h4>
 			</div>
 			<div class="modal-body">

 			<ol>
 			<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat at dolores, labore dolore facilis corporis error amet officiis, vel nam quaerat delectus eius itaque beatae sequi accusamus iste nihil minus.</li>
 			<li>Quae debitis repellendus neque culpa enim perspiciatis illo aperiam tempora. Maiores beatae cupiditate quod quas magni? Distinctio vitae, unde ad! Ut, dolores odit illum perferendis natus itaque voluptas blanditiis culpa.</li>
 				
 			</div>
 		</div>
 	</div>
 </div>




