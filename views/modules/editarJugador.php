<?php
    $mvc = new MvcController();
    $stmt = $mvc->getJugador();
?>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Formulario para editar a un juagdor</h3>
        </div>
        <form method="POST">
            <div class="box-body">

            <input type="hidden" value="<?= $stmt["idJugador"]?>" name="idJugador">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre_jugador" value="<?= $stmt["nombre_jugador"]?>">
            </div>

            <div class="form-group">
                <label>Número de jugador</label>
                <input type="text" class="form-control" name="numero_jugador" value="<?= $stmt["numero_jugador"]?>">
            </div>
            <select name="idEquipo">
                <option selected disabled>Seleccione un equipo</option>
                <? $mvc->getEquiposCB();?>
            </select>              

        <div class="box-footer">
           <button type="submit" class="btn btn-primary">Actualizar</button>
         </div>
    </form>
</div>

<!-- Funcion para agregar al jugador -->
<?php
    $mvc->updateJugadorController();
?>
