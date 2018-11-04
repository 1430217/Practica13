<?php
    $mvc = new MvcController();
    if(isset($_SESSION['sesion'])){
?>


<div class="page-header">
  <h1>Dashboard <small>En esta pagina se podrá administrar los juagdores y equipo</small></h1>
</div>

<div class="row">
    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3></h3>
                <p>Equipos</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="index.php?action=equipos" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>


    <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3> </h3>
                <p>Jugadores</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <a href="index.php?action=jugadores" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
  



<?php
    }else{
    header('Location: index.php?action=login');
    }
?>