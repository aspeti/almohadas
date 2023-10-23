  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-white elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url();?>assets/img/estampado.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ALMOHADAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--img src="<//?php echo base_url();?>assets/img/estampado.png" class="img-circle elevation-2" alt="User Image"-->
        </div>
        <div class="info">
          <a class="d-block"><?php echo $this->session->userdata("nombre");?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">         
          <?php if($this->session->userdata('rol') == 1) { ?>  
          <li class="nav-item">
            <!--<a href="#" class="nav-link">                           
              <i class="nav-icon fas fa-cog"></i>           
              <p>
                Panel
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>-->
            <!--<ul class="nav nav-treeview">-->
              <li class="nav-item">
                <a href="<?php echo base_url();?>usuarios" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>   
            <!--</ul>-->
            <!--<ul class="nav nav-treeview">-->
              <li class="nav-item">
                <a href="<?php echo base_url();?>categorias" class="nav-link">
                  <i class="fas fa-bars nav-icon"></i>
                  <p>Categoria</p>
                </a>
              </li>   
            <!--</ul>-->
            <!--<ul class="nav nav-treeview">-->
              <li class="nav-item">
                <a href="<?php echo base_url();?>productos" class="nav-link">
                  <i class="fas fa-store nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>   
            <!--</ul>-->
          </li>  
          <li class="nav-item">
            <a href="<?php echo base_url();?>pedidos/report" class="nav-link">
            <i class="fas fa-check nav-icon"></i>
            <p>Reportes</p></p>
            </a>
          </li> 
          <?php }?>      
                   
          <?php if($this->session->userdata('login')) { ?>   
              <li class="nav-item">
                <a href="<?php echo base_url();?>pedidos" class="nav-link">
                <i class="fas fa-money-bill nav-icon"></i>
                <p>Compras</p>
                </a>
              </li>
            <li class="nav-item">
              <!--<a href="#" class="nav-link">                           
                <i class="nav-icon fas fa-cog"></i>           
                <p>
                  Profile
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>-->
              <!--<ul class="nav nav-treeview">-->
                <li class="nav-item">
                  <a href="<?php echo base_url()?>usuarios/viewprofile/<?php echo $this->session->userdata('id_usuario'); ?> " class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Perfil</p>
                  </a>
                </li>   
              <!--</ul>-->
              <!--<ul class="nav nav-treeview">-->
                <li class="nav-item">
                <a href="<?php echo base_url('usuarios/password/'.$this->session->userdata('id_usuario')); ?>" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Password</p>
                  </a>
                </li>   
              <!--</ul>   -->        
            </li>   
          <?php }?>     
                    
        </ul>
      </nav>
      <!-- /.sidebar-menu  -->
    </div>
    <!-- /.sidebar -->
  </aside>