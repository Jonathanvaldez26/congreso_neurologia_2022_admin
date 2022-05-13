<?php echo $header;?>
<div class="right_col">
  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
    <div class="x_panel tile fixed_height_240">
      <div class="x_title">
        <br><br>
        <h1> Datos de la Responsable <small> con id <?php echo $responsable['catalogo_responsable_id']; ?> </small></h1>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form class="form-horizontal" id="edit" action="/Responsable/responsableEdit" method="POST">
          <div class="form-group ">

            <div class="dashboard-widget-content">
              <ul class="list-unstyled timeline widget">
                <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                        <a>ID:</a>
                      </h2>
                      <div class="byline"></div>
                      <p class="excerpt"><?php echo $responsable['catalogo_responsable_id']; ?></p>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                        <a>Nombre del Responsable</a>
                      </h2>
                      <div class="byline"></div>
                      <p class="excerpt"><?php echo $responsable['nombre']; ?></p>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                        <a>Apellido Paterno</a>
                      </h2>
                      <div class="byline"></div>
                      <p class="excerpt"><?php echo $responsable['apellido_paterno']; ?></p>
                    </div>
                  </div>
                </li>
                      
              </ul>

              <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <a class="btn btn-success col-md-2 col-sm-2 col-xs-2" type="submit" id="btnCancel">
                  <span class="glyphicon glyphicon-chevron-left pull-left"></span> Regresar
                </a>
              </div>
            </div>
            </div>


          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php echo $footer;?>
