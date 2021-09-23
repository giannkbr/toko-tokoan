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
				<form action="<?= base_url('backend/kategori/tambah'); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-2 control-label">Nama kategori</label>
						<div class="col-md-12">
							<input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" value="<?php echo set_value('nama_kategori') ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Urutan</label>
						<div class="col-md-12">
							<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Upload gambar kategori</label>
						<div class="col-md-12">
							<input type="file" name="gambar" class="form-control" required="required">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-12">
							<button class="btn btn-primary" name="submit" type="submit">
								<i class="fa fa-save"></i> Simpan
							</button>
							<button class="btn btn-danger" name="reset" type="reset">
								<i class="fa fa-times"></i> Reset
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
