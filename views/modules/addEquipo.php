<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Formulario para agregar equipos</h3>
        </div>

        <form method="POST" role="form">
            <div class="box-body">
  
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" placeholder="Nombre del equipo" required="">
            </div>

        <div class="box-footer">
           <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </form>
</div>

<!-- Funcion para aregar un equipo -->
<?php
    $mvc = new MvcController();
    $mvc->addEquiposController();
?>