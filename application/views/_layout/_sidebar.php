<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
  
		
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/images/<?php echo $userdata->pengguna_photo; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $userdata->pengguna_nama; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<a href="<?php echo base_url('Home'); ?>" class="nav-link <?php if ($page == 'home') {echo 'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Dashboard
              </p>
            </a>
		  
          </li>
          
          
			<li class="nav-item has-treeview <?php if ($page == 'Menu'or $page == 'Bahan' or $page == 'Pengguna' or $page == 'Supplier') {echo 'menu-open';} ?>">
            <a href="#" class="nav-link <?php if ($page == 'Menu'or $page == 'Bahan' or $page == 'Pegawai' or $page == 'Supplier') {echo 'active';} ?>">
              <i class="nav-icon fa fa-edit"></i>
              <p>
               Masterdata
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php if ($judul == 'Menu') {echo 'active';}?>">
        <a href="<?php echo base_url('Menu'); ?>"  class="nav-link <?php if ($judul == 'Daftar Menu') {echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Menu</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Bahan') {echo 'active';} ?>">
        <a href="<?php echo base_url('Bahan'); ?>"  class="nav-link <?php if ($judul == 'Bahan Baku') {echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bahan Baku</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Daftar Pengguna') {echo 'active';} ?>">
        <a href="<?php echo base_url('Pengguna'); ?>"  class="nav-link <?php if ($judul == 'Daftar Pengguna') {echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Lainnya') {echo 'active';} ?>">
        <a href="<?php echo base_url('Lainnya'); ?>"  class="nav-link <?php if ($judul == 'Lainnya') {echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier</p>
                </a>
              </li>
            </ul>
          </li>
		  
		<li class="nav-item has-treeview <?php if ($page == 'Proses') {echo 'menu-open';} ?>">
            <a href="#" class="nav-link <?php if ($page == 'Proses') {echo 'active';} ?>">
              <i class="nav-icon fa fa-edit"></i>
              <p>
               Data Transaksi
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
				<li class="nav-item <?php if ($judul == 'Proses Pengiriman') {echo 'active';}?>">
        <a href="<?php echo base_url('Pengiriman'); ?>"  class="nav-link <?php if ($judul == 'Proses Pengiriman') {echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item <?php if ($judul == 'Obat') {echo 'active';} ?>">
        <a href="<?php echo base_url('Apotik/Obat'); ?>"  class="nav-link <?php if ($judul == 'Obat') {echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembelian Bahan</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Supplier') {echo 'active';} ?>">
        <a href="<?php echo base_url('Transaksi/Apotik'); ?>"  class="nav-link <?php if ($judul == 'Suplier') {echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembayaran Lainnya</p>
                </a>
              </li>
            </ul>
          </li>
         
          <?php if (($userdata->pengguna_level =='1') or $userdata->User_Type =='supervisor'){
	echo'  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p> User Management<i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="'.base_url('Profile/AddUser').'" class="nav-link">
                  <i class="fa fa-user-plus"></i>
                  <p>Tambah Pengguna</p>
                </a>
              </li>
            </ul>
          </li>';}
			?>
        </ul>
      </nav>
    </div>
  </aside>