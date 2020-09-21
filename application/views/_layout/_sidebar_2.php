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
          <li class="nav-item has-treeview <?php if ($page == 'Master') {echo 'menu-open';} ?>">
            <a href="#" class="nav-link <?php if ($page == 'Master') {echo 'active';} ?>">
              <i class="nav-icon fa fa-edit"></i>
              <p>
               Master Data
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php if ($judul == 'Konsumen') {echo 'active';} ?>">
        <a href="<?php echo base_url('Masterdata/konsumen'); ?>"  class="nav-link <?php if ($judul == 'Konsumen') {echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Konsumen</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Satuan') {echo 'active';} ?>">
        <a href="<?php echo base_url('Masterdata/Satuan'); ?>"  class="nav-link <?php if ($judul == 'Satuan') {echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Satuan Barang</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Fee') {echo 'active';} ?>">
        <a href="#"  class="nav-link <?php if ($judul == 'Fee') {echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Cargo') {echo 'active';} ?>">
        <a href="<?php echo base_url('Masterdata/Cargo'); ?>"  class="nav-link <?php if ($judul == 'Cargo') {echo 'active';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kargo</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Wilayah') {echo 'active';} ?>">
        <a href="<?php echo base_url('Masterdata/wilayah'); ?>"  class="nav-link <?php if ($judul == 'Wilayah') {echo 'show';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wilayah</p>
                </a>
              </li>
              </li>
            </ul>
          </li>
			
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Laporan
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php if ($judul == 'Laporan Harian') {echo 'active';} ?>">
                <a href="<?php echo base_url('Report/harian'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Harian</p>
                </a>
              </li>
             <li class="nav-item <?php if ($judul == 'Laporan Harian') {echo 'active';} ?>">
                <a href="<?php echo base_url('Report/Setoran'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setoran</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Laporan Harian') {echo 'active';} ?>">
                <a href="<?php echo base_url('Report/pengiriman'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengiriman</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Laporan Harian') {echo 'active';} ?>">
                <a href="<?php echo base_url('Report/pengiriman_pertanggal'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengiriman Pertanggal</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Laporan Harian') {echo 'active';} ?>">
                <a href="<?php echo base_url('Absensi/location'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>S T Barang</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Laporan Harian') {echo 'active';} ?>">
                <a href="<?php echo base_url('Report/harian'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap MBC</p>
                </a>
              </li>
				
				<li class="nav-item <?php if ($judul == 'Laporan Harian') {echo 'active';} ?>">
                <a href="<?php echo base_url('Report/harian'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Load Manifest MBC</p>
                </a>
              </li>
            </ul>
          </li> 
	 <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Grafik
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?php if ($judul == 'Laporan Harian') {echo 'active';} ?>">
                <a href="<?php echo base_url('Report/harian'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi</p>
                </a>
              </li>
             <li class="nav-item <?php if ($judul == 'Laporan Harian') {echo 'active';} ?>">
                <a href="<?php echo base_url('Report/Setoran'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Per Asal</p>
                </a>
              </li>
				<li class="nav-item <?php if ($judul == 'Laporan Harian') {echo 'active';} ?>">
                <a href="<?php echo base_url('Report/pengiriman'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Per Asal</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
			<nav id="menu">
				<ul>
					<li class="Selected">
						<a href="#close">
							<i class="fa fa-times-circle"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/home'?>">
							<i class="fa fa-home"></i>Home
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/menu/cart'?>">
							<i class="fa fa-shopping-cart"></i>Keranjang Belanja (<?=$this->cart->total_items();?>)
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/menu/makanan'?>">
							<i class="fa fa-cutlery"></i>Makanan
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'mobile/menu/minuman'?>">
							<i class="fa fa-glass"></i>Minuman
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/menu/favorite'?>">
							<i class="fa fa-star"></i>Favorite
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/menu'?>">
							<i class="fa fa-fire"></i>Hot Promo
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url().'mobile/tracker'?>">
							<i class="fa fa-crosshairs"></i>Tracker
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/member/register'?>">
							<i class="fa fa-user"></i>Mendaftar
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'mobile/gallery'?>">
							<i class="fa fa-camera-retro"></i>Gallery
						</a>
					</li>
					
					
					<?php if($this->session->userdata('online') == TRUE):?>
					<li>
						<a href="<?php echo base_url().'mobile/konfirmasi'?>">
							<i class="fa fa-exchange"></i>Konfirmasi
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url().'mobile/myfood'?>">
							<i class="fa fa-cutlery"></i>My Food
						</a>
					</li>

					<li>
						<a href="<?php echo base_url().'mobile/member/logout'?>">
							<i class="fa fa-sign-out"></i>Logout
						</a>
					</li>
					<?php else:?>
					<li>
						<a href="<?php echo base_url().'mobile/member'?>">
							<i class="fa fa-sign-in"></i>Login
						</a>
					</li>
					<?php endif;?>
				</ul>

      </nav>
    </div>
  </aside>