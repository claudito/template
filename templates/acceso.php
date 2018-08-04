<?php 

$assets = new Assets();
$assets->title('Acceso');
$assets->head();
$assets->sweetalert();
?>
<script src="https://blueimp.github.io/JavaScript-MD5/js/md5.js"></script>
<link rel="stylesheet" href="<?php echo URL ?>assets/css/login.css">




<div class="row">
<div class="col-md-12">

<div class="container" style="margin-top:40px">
<div class="row">
<div class="col-sm-6 col-md-4 col-md-offset-4">
<div class="panel panel-default">
<div class="panel-heading text-center">
<div id="mensaje"></div>
<strong>Login</strong>
</div>
<div class="panel-body">
<form role="form"  method="POST" autocomplete="off">
<fieldset>
<div class="row">
<div class="center-block"><!--  
<img class="profile-img"
src="<?php //echo URL; ?>assets/img/user.png" alt="">-->

<h1 class="text-center"><i class="fa fa-user-circle fa-4x"></i></h1>

</div>
</div>
<div class="row">
<div class="col-sm-12 col-md-10  col-md-offset-1 ">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon">
<i class="glyphicon glyphicon-user"></i>
</span> 
<input class="form-control" placeholder="Usuario" id="user" type="text" autofocus required="">
</div>
</div>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon">
<i class="glyphicon glyphicon-lock"></i>
</span>
<input class="form-control" placeholder="Contraseña" id="pass" type="password"  required="">
</div>
</div>




<input type="hidden" id="url" value="<?php echo URL ?>">


<div class="form-group">
<input type="submit" class="btn btn-lg btn-primary btn-block" value="Ingresar" id="login">
</div>
</div>
</div>
</fieldset>
</form>
</div>
<div class="panel-footer ">
&nbsp;
</div>
</div>
</div>
</div>
</div>




</div>
</div>

<script src="ajax/login.js"></script>

<?php 
$assets->footer();
?>