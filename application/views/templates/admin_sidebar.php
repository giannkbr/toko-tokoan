	<div class="navbar-custom">
		<div class="container-fluid">

			<div id="navigation">

				<!-- Navigation Menu-->
				<ul class="navigation-menu">

					<li class="has-submenu">
						<a href="<?= base_url('Admin') ?>"><i class="icon-accelerator"></i> Dashboard</a>
					</li>
					<li class="has-submenu">
						<a href="#"><i class="icon-pencil-ruler"></i> Data Produk <i class="mdi mdi-chevron-down mdi-drop"></i></a>
						<ul class="submenu megamenu">
							<li>
								<ul>
									<a href="<?php echo base_url('backend/merk') ?>"> Data Merk Produk</a>
									<a href="<?php echo base_url('backend/produk') ?>"> Data Produk</a>
								</ul>
							</li>
						</ul>
					</li>

					<li class="has-submenu">
						<a href="#"><i class="icon-pencil-ruler"></i> Transaksi <i class="mdi mdi-chevron-down mdi-drop"></i></a>
						<ul class="submenu megamenu">
							<li>
								<ul>
									<li><a href="<?php echo base_url('backend/transaksi') ?>"> Sudah Konfirmasi</a></li>
									<li><a href="<?php echo base_url('backend/transaksi/sudah_bayar') ?>">Sudah Bayar</a></li>
									<li><a href="<?php echo base_url('backend/transaksi/belum_bayar') ?>"> Belum Bayar</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="has-submenu">
						<a href="<?php echo base_url('backend/rekening') ?>"><i class="icon-pencil-ruler"></i> Data Rekening</a>
					</li>
					<li class="has-submenu">
						<a href="#"><i class="icon-pencil-ruler"></i> Konfigurasi Website <i class="mdi mdi-chevron-down mdi-drop"></i></a>
						<ul class="submenu megamenu">
							<li>
								<ul>
									<li>
									<a href="<?php echo base_url('backend/konfigurasi') ?>">Konfigurasi Website</a>
									</li>
									<li><a href="<?php echo base_url('backend/konfigurasi/logo') ?>">Konfigurasi Logo</a></li>
									<li><a href="<?php echo base_url('backend/konfigurasi/icon') ?>">Konfigurasi Icon</a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
				<!-- End navigation menu -->
			</div>
			<!-- end #navigation -->
		</div>
		<!-- end container -->
	</div>
