    <main class="page projects-page">
        <section>
            <div class="container" style="padding-top: 153px;">
                <div class="row">
                    <div class="col">				<div class="caption v-middle text-center">
					<h3 class="cd-headline clip">
			            <span class="blc">Toko Leather Cleaner | </span>
			            <span class="cd-words-wrapper">
			              <b class="is-visible">Aman.</b>
			              <b>Terjangkau.</b>
			              <b>Handal.</b>
			            </span>
	          		</h3>
				</div></div>
                </div>
            </div>
        </section>
        <section class="portfolio-block projects-cards" id="produk">
            <div class="container">
                <div class="heading">
                    <h2>Produk kami</h2>
                </div>
                <div class="row">
                    <?php foreach ($data as $produk) { ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0"><a href="#"><img style="width: 349px; height: 233px;" class="card-img-top scale-on-hover" src="<?= base_url('assets/upload/image/'). $produk['gambar'] ?>" alt="Card Image"></a>
                            <div class="card-body">
                                <h6><a href="#"><?= $produk['nama_produk'] ?></a></h6>
                                <p>Merk</p>
                                <p class="text-muted card-text"><?= $produk['harga'] ?></p><button class="btn btn-primary" type="button" style="border-radius: 12px;">Masukan keranjang</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </section>
        <section id="profil">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="contact-info portfolio-info-card">
                            <h2 style="text-align: center;">Toko Leather Cleaner</h2>
                            <div class="row">
                                <div class="col-9"><span>Merupakan sebuah toko dengan menjual berbagai macam merk leather cleaner dengan kualitas baik</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="contact-info portfolio-info-card">
                            <h2 class="text-center">Alamat</h2>
                            <div class="row">
                                <div class="col-1"><i class="icon ion-map icon"></i></div>
                                <div class="col-9"><span><?= $profil->alamat ?></span></div>
                            </div>
                            <div class="row">
                                <div class="col-1"><i class="icon ion-email icon"></i></div>
                                <div class="col-9"><span><?= $profil->email ?></span></div>
                            </div>
                            <div class="row">
                                <div class="col-1"><i class="icon ion-ios-telephone icon"></i></div>
                                <div class="col-9"><span>+<?= $profil->telepon ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>