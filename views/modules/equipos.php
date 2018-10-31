<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de equipos</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <a href="index.php?action=addEquipo">
                        <button class="btn btn-success">Agregar equipo</button>
                    </a>
                </div>
              </div>
            </div>

            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nombre del equipo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $mvc = new MvcController();
                        $mvc->getEquiposController();
                        $mvc->deleteEquipoController();
                    ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
