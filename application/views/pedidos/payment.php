  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pago</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pago</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body row">
          <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
              <img src="<?php echo base_url()."assets\img\qr.png" ;?>?size=200x200&" alt="Código QR" />
            </div>
          </div>

          <div class="col-7">
            <div class="form-group">
              <label for="archivo">Realize el deposito y suba el comprobante</label>
              <input type="file" class="form-control-file" id="comprobante" name="imagen">
              <br>

              <div class="">
                  <button type="submit" class="btn btn-success">Enviar</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->