  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reporte de Ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Reportes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
                      <!-- Small Box (Stat card) -->
            <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php $TotalPagos = 0;?> 
                     <?php if(!empty($ventas)):?>                        
                          <?php foreach($ventas as $venta):?>
                            <?php $TotalPagos = $TotalPagos + $venta->total;?> 
                          <?php endforeach;?>
                    <?php endif; ?>  
                <h3><?php echo $TotalPagos; ?></h3>

                <p>TOTAL INGRESOS</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">
                ventas <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>  

        <!-- /.row -->         
          </div>  

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!--h3 class="card-title">lISTA DE VENTAS</!h3-->    
                                            
                  <form action="<?php echo base_url() ?>reportes" method="POST">
                      <div class=" form-group  row">
                        <label for="" class="control-label">Fecha Inicio:</label>   
                        <div class="col-md-2 mr-4">                          
                          <input type="date" class="form-control" name="fechainicio" id="fechainicio" value="<?php echo !empty($fecha_inicio)? $fecha_inicio:'';?>" required/>
                        </div>
                        <label for="" class="control-label">Fecha Fin:</label>   
                        <div class="col-md-2 mr-4">                          
                          <input type="date" class="form-control" name="fechafin" id="fechafin" value="<?php echo !empty($fecha_fin)? $fecha_fin:'';?>" required/>
                        </div>
                        <div class=" col-5">   
                          <input type="submit" class="btn btn-success" name="filtrar" id=filtrar value="Filtrar" >  
                          <a href="<?php echo base_url();?>reportes" type="button" class="btn btn-warning">Reestablecer</a>                       
                        </div> 
                      </div> 
                  </form>
                  <div class="row">
                        <div class="ml-3 mr-5">
                        <form action="<?php echo base_url() ?>reportes/reporte/" method="POST"  target="_blank" >
                            <div class=" form-group  row"> 
                                <input type="hidden" class="form-control" name="inicio" id="inicio" value="<?php echo !empty($fecha_inicio)? $fecha_inicio:'';?>"/>
                                <input type="hidden" class="form-control" name="fin" id="fin" value="<?php echo !empty($fecha_fin)? $fecha_fin:'';?>"/>
                                <input type="submit" class="btn btn-primary" name="filtrar" id=filtrar value="Exportar reporte">                         
                            </div>
                        </form> 
                        </div> 
                        <form action="<?php echo base_url() ?>reportes/estadistica" method="POST"  target="_blank" >
                            <div class=" form-group  row">                       
                                <input type="submit" class="btn btn-success" name="estadistica" id="estadistica" value="Productos mas vendidos">  
                            </div> 
                        </form>    
                  </div>  
                                
              </div>  
        
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>num de recibo</th>
                    <th>Fecha de Venta</th>
                    <th>Total</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($ventas)):?>
                      <?php $cont = 1;?>      
                      <?php foreach($ventas as $venta):?>
                  <tr>
                    <td><?php echo $cont;?></td>
                    <td><?php echo $venta->cliente;?></td>
                    <td><?php echo $venta->num_documento;?></td>
                    <td><?php echo $venta->fecha_creacion;?></td>
                    <td><?php echo $venta->total;?></td>                                
                    <td>
                        <div class="btn-group">
                        <a class="btn btn-warning" href="<?php echo base_url();?>reportes/comprobante/<?php echo $venta->id_venta;?>" class="btn btn-info" target="_blank"><span class="fas fa-file-text" ></span></a>                       
                        </div>
                    </td>  
                  </tr>
                      <?php $cont++;?>                 
                  <?php endforeach;?>
                  <?php endif; ?>  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>num de recibo</th>
                    <th>Fecha de Venta</th>
                    <th>Total</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>