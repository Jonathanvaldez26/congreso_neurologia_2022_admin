<?php echo $header; ?>
<div class="right_col">
  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
    <div class="panel panel-default">
      <div class="x_title">
        <br><br>
        <h1> <!--Catálogo de Gestión de Colaboradores</small> --> <?php echo $tituloColaboradores; ?></h1>
        <div class="clearfix"></div>
      </div>
      <form name="all1" id="all1" action="/Colaboradores/index" method="POST">
        <div class="panel-body">
          <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">

            <div class="form-group col-md-4 col-sm-4 col-xs-4 col-lg-4">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_catalogo_empresa">Empresa<span class="required">*</span></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="catalogo_empresa_id" id="catalogo_empresa_id">
                  <option value="" >Selecciona una Empresa</option>
                  <?php echo $idEmpresa; ?>
                </select>
              </div>
            </div>

            <div class="form-group col-md-4 col-sm-4 col-xs-4 col-lg-4">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_catalogo_ubicacion">Ubicación<span class="required">*</span></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="catalogo_ubicacion_id" id="catalogo_ubicacion_id">
                  <option value="" >Selecciona una Ubicación</option>
                  <?php echo $idUbicacion; ?>
                </select>
              </div>
            </div>

            <div class="form-group col-md-4 col-sm-4 col-xs-4 col-lg-4">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_catalogo_departamento">Departamento<span class="required">*</span></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="catalogo_departamento_id" id="catalogo_departamento_id">
                  <option value="" >Selecciona un Departamento</option>
                  <?php echo $idDepartamento; ?>
                </select>
              </div>
            </div>

            <div class="form-group col-md-4 col-sm-4 col-xs-4 col-lg-4">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_catalogo_puesto">Puesto<span class="required">*</span></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="catalogo_puesto_id" id="catalogo_puesto_id">
                  <option value="" >Selecciona un Puesto</option>
                  <?php echo $idPuesto; ?>
                </select>
              </div>
            </div>

            <div class="form-group col-md-4 col-sm-4 col-xs-4 col-lg-4">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Nomina<span class="required">*</span></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="form-control" name="status" id="status">
                <option value="">Selecciona una nomina</option>
                <?php echo $nomina; ?>
                </select>
              </div>
            </div>

            <div class="form-group col-md-4 col-sm-4 col-xs-4 col-lg-4">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status"></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <button type="submit" class="btn btn-info col-md-12 col-sm-12 col-xs-12 col-lg-12" value="Buscar" id="btnAplicar">
                  <span class="glyphicon glyphicon-search"> Buscar</span>
                </button>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 55px;">
              <a href="/Colaboradores/existente" type="button" class="btn btn-primary btn-circle"  <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo Colaborador</b></i></a>
              <button id="delete" type="button" class="btn btn-danger btn-circle"  <?= $eliminarHidden?>><i class="fa fa-remove"> <b>Eliminar</b></i></button>
              <button id="btnPDF" type="button" class="btn btn-info btn-circle" <?= $pdfHidden ?>><i class="fa fa-file-pdf-o"> <b>Exportar a PDF</b></i></button>
              <button id="btnExcel" type="button" class="btn btn-success btn-circle" <?= $excelHidden?>><i class="fa fa-file-excel-o"> <b>Exportar a Excel</b></i></button>
              <button class="btn btn-warning" type="reset" id="btnReiniciar">Reiniciar Busqueda</button>
            </div>
          </div>

        </div>
      </form>
      <form name="all" id="all" action="/Colaboradores/delete" method="POST">
        <div class="panel-body">
          <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="muestra-cupones">
              <thead>
                <tr>
                  <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                  <th></th>
                  <th># Empleado</th>
                  <th>Nombre</th>
                  <th>Empresa</th>
                  <th>Departamento</th>
                  <th>Pago</th>
                  <th>Identificador</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody id="registros">
                <?= $tabla; ?>
              </tbody>
            </table>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<?php echo $footer; ?>
