<?php
    $mvc = new MvcController();
?>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Formulario para agregar equipos</h3>
        </div>
        <form method="POST" role="form">
            <div class="box-body">
   
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" required="" name="nombre_jugador" placeholder="Nombre del jugador">
            </div>

            <div class="form-group">
                <label>Número de jugador</label>
                <input type="text" class="form-control" required="" name="numero_jugador" placeholder="Número de jugador">
            </div>
            <!-- Checkbox de los equipos -->
            <? $mvc->getEquiposCB();?>

        <div class="box-footer">
           <button type="submit" class="btn btn-primary">Agregar</button>
         </div>
    </form>
</div>

<!-- Funcion para agregar equipos -->
<?php
    $mvc->addEquiposController();
?>