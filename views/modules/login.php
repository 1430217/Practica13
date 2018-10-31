<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Login</b>TAW</a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Inicie sesión para entrar al sistema</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nombre de usuario" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-5">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>

<?php
    $mvc = new MvcController();
    $mvc->loginController();

    if (isset($_GET['action'])) {
		if ($_GET['action'] == 'fallo') 
			echo 'Error al iniciar sesión';
	}
?>