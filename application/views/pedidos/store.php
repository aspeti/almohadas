  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pedido</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pedido</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">

            <tbody>
            <?php if(!empty($productos)):?>
              <?php foreach($productos as $producto):?>
                      <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                          <div class="card-header text-muted border-bottom-0">
                            Producto
                          </div>
                          <div class="card-body pt-0">
                            <div class="row">
                              <div class="col-7">
                                <h2 class="lead"><b> <?php echo $producto->nombre; ?>  </b></h2>
                                <p class="text-muted text-sm"><b>Categoria: <?php echo $producto->categoria;?></b>  </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                      <!--li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> descripcion</!li>
                                  <li-- class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Datos de Almohada</li-->
                                  <li class="small"><span class="fa-li"></span>Precio:  <?php echo $producto->precio;?> </li>
                                  <li class="small"><span class="fa-li"></span> descripcion: <?php echo $producto->descripcion;?> </li>
                                </ul>
                              </div>
                              <div class="col-5 text-center">
                                <img src="<?php echo base_url().$producto->img ;?>" alt="user-avatar" class="img-circle img-fluid">
                              </div>
                            </div>
                          </div>
                          <div class="card-footer">
                            <div class="text-right">           
                              <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-store"></i> Agregar
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>     
                
              <?php endforeach;?>
            <?php endif; ?>                                               
            </tbody>  


           
            
          </div>
        </div>
        
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>           </ul>
          </nav>
        </div>
        <!-- /.card-footer -->

        
                <!-- Content Wrapper. Contains page content -->
                <div class="container mt-3">
                    <!-- Content Header (Page header) -->             
                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="box box-solid">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <form action="<?php echo base_url();?>movimientos/ventas/store" method="POST" class="form-horizontal">
                                            
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="">Cliente:</label>
                                                    <div class="input-group">
                                                        <input type="hidden" name="idcliente" id="idcliente">
                                                        <input type="text" class="form-control" disabled="disabled" id="cliente">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                                                        </span>
                                                    </div><!-- /input-group -->
                                                </div> 
                                                <div class="col-md-3">
                                                    <label for="">Fecha de entrega:</label>
                                                    <input type="date" class="form-control" name="fecha" required>
                                                </div>
                                            </div>                 
                                            <table id="tbventas" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Codigo</th>
                                                        <th>Nombre</th>

                                                        <th>Precio</th>                                                
                                                        <th>Cantidad</th>
                                                        <th>Importe</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                </tbody>
                                            </table>

                                            <div class="form-group row">                        
                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Total:</span>
                                                        <input type="text" class="form-control" placeholder="precio Total" name="total" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-primary btn-flat">Realizar pago</button>
                                                </div>                                                
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

      </div>
      <!-- /.card -->      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->