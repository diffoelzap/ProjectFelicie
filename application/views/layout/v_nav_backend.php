  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark " style="background-color:#F8D7D7">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin') ?>" class="brand-link">
    <img src="<?= base_url() ?>template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-dark" style="color:black">Admin Felicie</span>
    </a>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

           <li class="nav-item">
              <a href="<?= base_url('admin') ?>" class="nav-link <?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) != 'setting' && $this->uri->segment(2) != 'pesanan_masuk'){echo "active";}?>" <?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) != 'setting' && $this->uri->segment(2) != 'pesanan_masuk'){echo "style='background-color:#BC8F8F'";}?>>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
          </li>

          <li class="nav-item">
              <a href="<?= base_url('kategori') ?>" class="nav-link <?php if($this->uri->segment(1) == 'kategori'){echo "active";}?>" <?php if($this->uri->segment(1) == 'kategori'){echo "style='background-color:#BC8F8F'";}?>>
                <i class="nav-icon fas fa-list"></i>
                <p>Kategori</p>
              </a>
          </li>

          <li class="nav-item">
              <a href="<?= base_url('barang') ?>" class="nav-link <?php if($this->uri->segment(1) == 'barang'){echo "active";}?>" <?php if($this->uri->segment(1) == 'barang'){echo "style='background-color:#BC8F8F'";}?>>
                <i class="nav-icon fas fa-cubes"></i>
                <p>Produk</p>
              </a>
          </li>

          <li class="nav-item">
              <a href="<?= base_url('admin/pesanan_masuk') ?>" class="nav-link <?php if($this->uri->segment(2) == 'pesanan_masuk'){echo "active";}?>" <?php if($this->uri->segment(2) == 'pesanan_masuk'){echo "style='background-color:#BC8F8F'";}?>>
                <i class="nav-icon fas fa-download"></i>
                <p>Pesanan Masuk</p>
              </a>
          </li>
          
          <li class="nav-item">
              <a href="<?= base_url('admin/setting') ?>" class="nav-link <?php if($this->uri->segment(2) == 'setting'){echo "active";}?>" <?php if($this->uri->segment(2) == 'setting'){echo "style='background-color:#BC8F8F'";}?>>
                <i class="nav-icon fa fa-asterisk"></i>
                <p>Pengaturan</p>
              </a>
          </li>

           <li class="nav-item">
              <a href="<?= base_url('user') ?>" class="nav-link <?php if($this->uri->segment(1) == 'user'){echo "active";}?>" <?php if($this->uri->segment(1) == 'user'){echo "style='background-color:#BC8F8F'";}?>>
                <i class="nav-icon fas fa-user"></i>
                <p> User </p>
              </a>
          </li>      

        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
  <!-- Main content -->
  <div class="content">
      <div class="container-fluid">
        <div class="row">