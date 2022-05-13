<?php echo $header;?>
<div class="right_col">
  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
    <div class="x_panel tile fixed_height_240">
      <div class="x_title">
        <br><br>
        <h1> Datos de la Empresa <br> <?php echo $empresa['razon_social']; ?> </h1>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form class="form-horizontal" id="edit" action="/Empresa/empresaEdit" method="POST">
          <div class="form-group ">

            <div class="dashboard-widget-content">
              <ul class="list-unstyled widget">
                <li>
                  <div class="block">
                    <div class="block_content">
                      <h4 class="title">
                        <a>Id:</a>
                      <?php echo $empresa['catalogo_empresa_id']; ?></h4>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="block">
                    <div class="block_content">
                      <h4 class="title">
                        <a>Empresa:</a>
                      <?php echo $empresa['razon_social']; ?></h4>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="block">
                    <div class="block_content">
                      <h4 class="title">
                        <a>RFC:</a>
                      <?php echo $empresa['rfc']; ?></h4>
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
