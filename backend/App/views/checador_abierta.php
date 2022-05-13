<?php echo $header; ?>
<div class="container body">
  <div class="main_container">

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left" style="width: 100%!important;">
            <h3><?php echo $tipoPeriodo; ?></h3>
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Periodo <?php echo $msjPeriodo; ?></h2>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h5>Colaboradores <?php echo $tituloIncentivos; ?></h5>
              </div>

              <div class="x_content">

                <form name="all1" id="all1" action="<?php echo $form; ?>" method="POST">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color:white;"> - </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <button type="submit" class="btn btn-info col-md-12 col-sm-12 col-xs-12 col-lg-12" value="Buscar" id="btnAplicar">
                            <span class="glyphicon glyphicon-search"> Buscar</span>
                          </button>
                        </div>
                      </div>
                    </div>

                  </div>
                </form>

                <form name="all" id="all" action="/Checador/" method="POST">
                  <div class="panel-body">
                    <div class="dataTable_wrapper">
                      <table class="table table-striped table-bordered table-hover" id="muestra-colaboradores">
                        <thead>
                          <tr>
                            <th style="text-align:center; vertical-align:middle;">Foto</th>
                            <th style="text-align:center; vertical-align:middle;">Nombre</th>
                            <th style="text-align:center; vertical-align:middle;">Informaci&oacute;n</th>
                            <th style="text-align:center; vertical-align:middle;">Empresa</th>
                            <th style="text-align:center; vertical-align:middle;">Nº Empleado</th>
                            <th style="text-align:center; vertical-align:middle;">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php echo $tabla; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
    <!-- /page content -->

  </div>
</div>


<?php echo $footer; ?>