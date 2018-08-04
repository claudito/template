<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo URL; ?>"><i class="fa fa-home"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
  
      


      <?php $menu = new Menu(); foreach ($menu->lista_nav() as $key => $value): ?>
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $value['nombre'] ?> <span class="caret"></span></a>
      <ul class="dropdown-menu">
      
      <?php $submenu = new Submenu(); foreach ($submenu->lista_nav($value['id']) as $key => $value): ?>
      <?php $permiso = new PermisoSubmenu(); 
      if ($permiso->consulta_nav($_SESSION[KEY.ID],$value['id'])==1): ?>

      <li><a href="<?php echo URL.$value['url']; ?>"><?php echo $value['nombre'] ?></a></li>
      
      <?php endif ?>
      <?php endforeach ?>

      </ul>
      </li>
       <?php endforeach ?>




      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user text-success"></i> <?php echo $_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS] ?></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
          <ul class="dropdown-menu"><!--  
            <li><a href="#"><i class="fa fa-cog"></i> CONFIGURACIÓN</a></li>
            <li><a href="#"><i class="fa fa-address-book-o"></i> PERFIL</a></li>
            <li class="divider"></li> -->
            <li><a style="cursor:pointer;"  onclick="logout();"><i class="fa fa-sign-out"></i>  SALIR</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>