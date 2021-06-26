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
				<form action="<?= base_url('backend/rekening/edit/' . $rekening->id_rekening); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-2 control-label">Nama Bank</label>
						<div class="col-md-12">
							<input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo $rekening->nama_bank ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Nomor Rekening</label>
						<div class="col-md-12">
							<input type="number" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening" value="<?php echo $rekening->nomor_rekening ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Nama Pemilik Rekening</label>
						<div class="col-md-12">
							<input type="text" name="nama_pemilik" class="form-control" placeholder="Nama Pemilik Rekening" value="<?php echo $rekening->nama_pemilik ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-12">
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
