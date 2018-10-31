<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Formulario para editar un equipo</h3>
        </div>

        <?php
            $mvc = new MvcController();
            $r = $mvc->getEquipo();
        ?>

        <form method="POST" role="form">
            <div class="box-body">
  
            <div class="form-group">
                <input type="hidden" name="idEquipo" value="<?= $r['idEquipo']?>">
                <label>Nombre</label>
                <input type="text" class="form-control" value="<?= $r['nombre_equipo']?>" required="" name="nombre_equipo" placeholder="Nombre del equipo">
            </div>

        <div class="box-footer">
           <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </form>
</div>

<?php
    $mvc->updateEquiposController();
?>