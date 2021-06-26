<?php
if (isset($error)) {
	echo '<p class="alert alert-warning">';
	echo $error;
	echo '</p>';
}
?>
<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<form action="<?= base_url('backend/produk/edit/' . $produk->id_produk); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group form-group-lg">
						<label class="col-md-2 control-label">Nama Produk</label>
						<div class="col-md-12">
							<input type="text" name="nama_produk" class="form-control" placeholder="Nama produk" value="<?php echo $produk->nama_produk ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Kode produk</label>
						<div class="col-md-12">
							<input type="text" name="kode_produk" class="form-control" placeholder="Kode produk" value="<?php echo $produk->kode_produk ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">merk produk</label>
						<div class="col-md-12">
							<select name="id_merk" class="form-control">
								<!-- looping untuk nama-nama merk -->
								<?php foreach ($merk as $merk) { ?>
									<option value="<?php echo $merk->id_merk ?>" <?php if ($produk->id_merk == $merk->id_merk) {
																						echo "selected";
																					} ?>>
										<?php echo $merk->nama_merk ?>
									</option>
								<?php } ?>
								<!-- end looping -->
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Harga</label>
						<div class="col-md-12">
							<input type="number" name="harga" class="form-control" placeholder="Harga" value="<?php echo $produk->harga ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Stok</label>
						<div class="col-md-12">
							<input type="number" name="stok" class="form-control" placeholder="Stok" value="<?php echo $produk->stok ?>" required>
						</div>
					</div>

					<!-- <div class="form-group">
				<label class="col-md-2 control-label">Ukuran</label>
				<div class="col-md-12">
					<select name="ukuran" class="form-control">
						<option value="S">Size S</option>
						<option value="M" <?php if ($produk->ukuran == "M") {
												echo "selected";
											} ?>>Size M</option>
						<option value="L" <?php if ($produk->ukuran == "L") {
												echo "selected";
											} ?>>Size L</option>
						<option value="XL" <?php if ($produk->ukuran == "XL") {
												echo "selected";
											} ?>>Size XL</option>
						<option value="XXL" <?php if ($produk->ukuran == "XXL") {
												echo "selected";
											} ?>>Size XXL</option>
					</select>
				</div>
			</div> -->

					<div class="form-group">
						<label class="col-md-2 control-label">Keterangan</label>
						<div class="col-md-12">
							<textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor"><?php echo $produk->keterangan ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Upload gambar produk</label>
						<div class="col-md-12">
							<input type="file" name="gambar" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Status produk</label>
						<div class="col-md-12">
							<select name="status_produk" class="form-control">
								<option value="Publish">Publikasikan</option>
								<option value="Draft" <?php if ($produk->status_produk == "Draft") {
															echo "selected";
														} ?>>Simpan sebagai draft</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-5">
							<button class="btn btn-success" name="submit" type="submit">
								<i class="fa fa-save"></i> Simpan
							</button>
							<button class="btn btn-info" name="reset" type="reset">
								<i class="fa fa-times"></i> Reset
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
