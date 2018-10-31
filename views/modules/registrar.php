<body>
  <div>
    <p class="login-box-msg">Registro de usuarios</p>

    <form method="POST">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nombre de usuario" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
        </div>
      </div>

    </form>
  </div>
  

  <!-- Lo hice para verificar si los datos se enviaban por post    
  < ?php
        echo $_POST['username'];
        echo '<br>';
        echo $_POST['password'];
        echo '<br>';
  ?>-->

</body>

<?php
  $mvc = new MvcController();
  $mvc->registrarUsuarioController();

  if (isset($_GET['action'])) {
	  if ($_GET['action'] === 'ok') 
      echo 'Registro Exitoso';
  }
?>
