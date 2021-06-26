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
				<form action="<?= base_url('backend/merk/edit/' . $merk->id_merk); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-2 control-label">Nama merk</label>
						<div class="col-md-5">
							<input type="text" name="nama_merk" class="form-control" placeholder="Nama merk" value="<?php echo $merk->nama_merk ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Urutan</label>
						<div class="col-md-5">
							<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo $merk->urutan ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Upload gambar produk</label>
						<div class="col-md-5">
							<input type="file" name="gambar" class="form-control">
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
