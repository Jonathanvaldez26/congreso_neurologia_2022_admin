<?php echo $header;?>
<div class="right_col">
  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
    <div class="x_panel tile fixed_height_240">
      <div class="x_title">
        <br><br>
        <h1> Editar Responsable</h1>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form class="form-horizontal" id="edit" action="/Responsable/responsableEdit" method="POST">
          <div class="form-group ">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="catalogo_empresa_id">Empresa <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="catalogo_empresa_id" id="catalogo_empresa_id" class="form-control col-md-7 col-xs-12" placeholder="Empresa del Responsable" value="<?php echo $responsable['catalogo_empresa_id']; ?>">
              </div>
              <span id="availability"></span>
            </div>

            <!-- <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripci&oacute;n <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripci&oacute;n la responsable"><?php echo $responsable['descripcion']; ?></textarea>
              </div>
            </div> -->

            <!-- <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Status<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="status" id="status">
                  <option value="" disabled selected>Selecciona un estatus</option>
                  <?php echo $status; ?>
                </select>
              </div>
            </div> -->

            <input type="hidden" name="catalogo_responsable_id" id="catalogo_responsable_id" value="<?php echo $responsable['catalogo_responsable_id']; ?>">

            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-danger col-md-5 col-sm-5 col-xs-5" type="button" id="btnCancel">Cancelar</button>
                <button class="btn btn-success col-md-5 col-sm-5 col-xs-5" id="btnAdd" type="submit">Actualizar</button>
              </div>
            </div>


          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php echo $footer;?>
