<?php
// error upload
if (isset($error)) {
	echo '<p class="alert alert-warning">';
	echo $error;
	echo '</p>';
}
?>
<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="class-body">
				<?php
				echo form_open_multipart(base_url('backend/konfigurasi/logo'),' class="form-horizontal"');
					?>
					<div class="form-group form-group-lg">
					  <label class="col-md-2 control-label">Nama Website</label>
					  <div class="col-md-12">
					    <input type="text" name="namaweb" class="form-control" placeholder="Nama web" value="<?php echo $konfigurasi->namaweb ?>" required>
					  </div>
					</div>

					<div class="form-group">
					  <label class="col-md-2 control-label">Upload Logo Baru</label>
					  <div class="col-md-12">
					    <input type="file" name="logo" class="form-control" placeholder="Upload Logo Baru" value="<?php echo $konfigurasi->logo ?>" required>
					    Logo lama: <br><img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->logo) ?>" class="img img-responsive img-thumbnail" width="200">
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
					<?php echo form_close(); ?>
					</div>
				</div>
			</div> <!-- end col -->
		</div> <!-- end row -->
