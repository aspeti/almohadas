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
                              <button type="button" class="btn btn-sm btn-primary btn-check"  value="<?php echo $dataClient = $producto->id_producto."*".$producto->codigo."*".$producto->nombre."*".$producto->precio;?>">
                              <i class="fas fa-store"></i> Agregar
                              </button>                               
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
                                        
                                        <form action="<?php echo base_url();?>pedidos/agregarventa" method="POST" class="form-horizontal" onsubmit=" return validarForm();">
                                        <div class="form-group row">                                                  
                                                <div class="col-md-3">
                                                    <label for="comprobante">Comprobante:</label>                                                    
                                                    <select name="comprobante" id="comprobante" class="form-control" required>
                                                        <option value="">Seleccione...</option> 
                                                        <?php foreach($comprobantes as $comprobante): ?>
                                                            <?php $dataComprobante = $comprobante->id_comprobante.'*'.$comprobante->cantidad.'*'.$comprobante->serie;?>
                                                            <option value="<?php echo $dataComprobante;?>"><?php echo $comprobante->nombre ;?></option>  
                                                        <?php endforeach;?>
                                                    </select>                                                  
                                                    <input type="hidden" id="idcomprobante" name="idcomprobante">
                                                    <input type="hidden" id="igv">
                                                </div>                                                
                                                <div class="col-md-3">
                                                    <label for="">Serie:</label>
                                                    <input type="text" class="form-control" name="serie" id="serie" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Numero:</label>
                                                    <input type="text" class="form-control" name="numero"  id="numero" readonly>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label for="">Cliente:</label>
                                                    <?php if($this->session->userdata('rol') == 1) { ?>  
                                                    <div class="input-group">
                                                        <input type="hidden" name="deposito" id="deposito" value="1">
                                                        <input type="hidden" name="idcliente" id="idcliente">
                                                        <input type="text" class="form-control" disabled="disabled" id="cliente">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                                                        </span>
                                                    </div><!-- /input-group -->
                                                    <?php } else{?>  
                                                      <div class="input-group">
                                                      <input type="hidden" name="deposito" id="deposito" value="0">
                                                        <input type="hidden" name="idcliente" id="idcliente" value="<?php echo $this->session->userdata('id_usuario');?>  ">
                                                        <input type="text" class="form-control" disabled="disabled" id="cliente" value="<?php echo $this->session->userdata("nombre");?>">                                                       
                                                    </div><!-- /input-group -->
                                                    <?php }?>  
                                                </div> 
                                                <div class="col-md-3">
                                                    <label for="">Fecha de entrega:</label>
                                                    <input type="date" class="form-control" name="fecha" id="fecha" required>
                                                </div>
                                            </div>                 
                                            <table id="tbventas" class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Codigo</th>
                                                        <th>Nombre</th>
                                                        <th>Precio en Bs</th>                                                
                                                        <th>Cantidad</th>
                                                        <th>Importe</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody_detalle">
                                                
                                                </tbody>
                                            </table>

                                            <div class="form-group row">                        
                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Total: </span>
                                                        <input type="text" class="form-control" placeholder="0.00" name="txttotal" id="txttotal" readonly="readonly">
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
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!--button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></-button-->
                                <h4 class="modal-title">Lita de Clientes</h4>
                            </div>
                            <div class="modal-body">
                                <table id="listamodal" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Documento</th>
                                            <th>Opcion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($clientes)):?>
                                        <?php $cont = 1;?>
                                        <?php foreach($clientes as $cliente):?>
                                        <tr>
                                            <td><?php echo $cont;?></td>
                                            <td><?php echo $cliente->nombre." ".$cliente->apellido ;?></td>
                                            <td><?php echo $cliente->apellido;?></td>                   
                                            <td>
                                                <button type="button" class="btn btn-success btn-check-cliente" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataClient = $cliente->id_usuario."*". $cliente->nombre." ". $cliente->apellido;?>">
                                                    <span class="fa fa-check"></span>
                                                </button>                                                
                                            </td>  
                                        </tr>
                                        <?php $cont++;?>  
                                        <?php endforeach;?>
                                        <?php endif; ?>      
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
        </div>
        <!-- /.card-footer -->

        
                

      </div>
      <!-- /.card -->      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
 var arr_ids = []; 

 document.addEventListener("DOMContentLoaded", function(event) {  

  $(".btn-check").on("click",function(){  ///btn-check es clase
      var producto = $(this).val();
    //  alert(producto);
      infoProducto = producto.split("*");
      let id_producto = infoProducto[0];
      let codigo = infoProducto[1];
      let nombre = infoProducto[2];
      let precio = infoProducto[3];  
  
     // $("#idprodname").val(infoProducto[3]);      
      //$("#cliente").val(producto);  

      //let fila = getRowDetalle(id_producto,codigo,nombre,precio);
        //  $('#tbody_detalle').append(fila);

      if(id_producto=='')
          return;
        if( arr_ids.indexOf(id_producto) > -1 ){
            setCantidad(id_producto,precio,true);
        }
        else{

            let fila = getRowDetalle(id_producto,codigo,nombre,precio);
            $('#tbody_detalle').append(fila);

        }
        calcularTotal();
    })

 });

function getRowDetalle(id,codigo,descripcion,precio){
    let html = '<tr id="fila_'+id+'">';
    html+='<td><input type="hidden" name="idcodigo[]" value="'+id+'"/>'+codigo+'</td>';
    html+='<td><input type="hidden" name="iddescripcion[]" value="'+id+'"/>'+descripcion+'</td>';
    html+='<td><input type="hidden" name="precios[]" value="'+precio+'"/>'+precio+'</td>';
   // html+='<td><input type="hidden" name="stock[]" value="'+stock+'"/>'+stock+'</td>';
    html+='<td><input id="cantidad_'+id+'" name="cantidad[]" type="number" value="1" min="1" max="9" onkeyup="setCantidad('+id+','+precio+')" onchange="setCantidad('+id+','+precio+')"/></td>';
    html+='<td><input  type="text" id="txt_subtotal_'+id+'" class="txt_subtotal disable" value="'+precio+'" readonly/></td>';
    html+='<td><button class="btn btn-danger" type="button" onclick="eliminarDetalle('+id+')"><i class="fa fa-trash"></i> </button></td>';
    html+='</tr>';
    arr_ids.push(id);

    return html;
  }

  function eliminarDetalle(id){
      if(confirm('Está seguro que desea eliminar este detalle?')){
        $('#fila_'+id).remove();
        calcularTotal();
        let idx = arr_ids.indexOf(id);
        arr_ids.splice(idx,1);
      }
  }

  function calcularTotal(){
      let total = 0;
     $('.txt_subtotal').each(function(){
          let val = parseFloat($(this).val());
          total += val;
      });

      $('#txttotal').val(total.toFixed(2));
  }

  function setCantidad(id,precio,aumentar = false){

  let temp_cant = $('#cantidad_'+id).val();
  if(aumentar)
  temp_cant++;
  let subt = temp_cant * precio;
  $('#cantidad_'+id).val(temp_cant);
  $('#txt_subtotal_'+id).val(subt.toFixed(2));
  calcularTotal();
  }

  function validarForm(){
      isValid = true;
      let nfilas = $('#tbody_detalle tr').length;
      console.log(nfilas);
      if(nfilas == 0){
          isValid = false;
          alert('Debe agregar al menos un detalle');
      }
      return isValid;
  }
 </script>