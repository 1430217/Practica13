<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de jugadores</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="index.php?action=addJugador">
                        <button class="btn btn-success">Agregar nuevo jugador</button>
                    </a>
                </div>
              </div>
            </div>

            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                    <tr>
                    <th>Nombre del jugador</th>
                    <th>Numero del jugador</th>
                    <th>Equipos a los que pertenece</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $mvc = new MvcController();
                        $mvc->getJugadores();
                        $mvc->deleteJugadorController();
                    ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
