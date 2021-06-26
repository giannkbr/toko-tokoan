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
			<div class="card-body">
				<form action="<?= base_url('backend/produk/gambar/' . $produk->id_produk) ?>" method="post" enctype="multipart/form-data">

					<div class="form-group form-group-lg">
						<label class="col-md-2 control-label">Judul Gambar</label>
						<div class="col-md-8">
							<input type="text" name="judul_gambar" class="form-control" placeholder="Judul gambar" value="<?php echo set_value('judul_gambar') ?>" required>
						</div>
					</div>

					<div class="form-group form-group-md mb-2">
						<label class="col-md-2 control-label">Unggah Gambar</label>
						<div class="col-md-6">
							<input type="file" name="gambar" class="form-control" placeholder="Gambar produk" value="<?php echo set_value('gambar') ?>" required>
						</div>
						<br>
						<div class="col-md-4">
							<button class="btn btn-success" name="submit" type="submit">
								<i class="fa fa-save"></i> Simpan
							</button>
							<button class="btn btn-info" name="reset" type="reset">
								<i class="fa fa-times"></i> Reset
							</button>
						</div>
					</div>

					<table class="table table-bordered" id="example1">
						<caption></caption>
						<thead>
							<tr>
								<th>No</th>
								<th>Gambar</th>
								<th>Judul</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>
									<img src="<?php echo base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
								</td>
								<td><?php echo $produk->nama_produk ?></td>
								<td>

								</td>
							</tr>
							<?php $no = 2;
							foreach ($gambar as $gambar) { ?>
								<tr>
									<td><?php echo $no ?></td>
									<td>
										<img src="<?php echo base_url('assets/upload/image/thumbs/' . $gambar->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
									</td>
									<td><?php echo $gambar->judul_gambar ?></td>
									<td>
										<a href="<?php echo base_url('backend/produk/delete_gambar/' . $produk->id_produk . '/' . $gambar->id_gambar) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus gambar ini?')"><i class="fa fa-trash-o"></i> Hapus</a>
									</td>
								</tr>
							<?php $no++;
							} ?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
