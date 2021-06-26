<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<a href="<?= base_url('backend/merk/tambah'); ?>"><button class="btn btn-primary btn-block mb-2">
						<i class="fa fa-plus-circle"></i> Tambah Data
					</button>
				</a>
				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar</th>
							<th>Nama</th>
							<th>Slug</th>
							<th>Urutan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($merk as $merk) { ?>
							<tr>
								<td><?php echo $no ?></td>
								<td>
									<img src="<?php echo base_url('assets/upload/merk/image/thumbs/' . $merk->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
								</td>
								<td><?php echo $merk->nama_merk ?></td>
								<td><?php echo $merk->slug_merk ?></td>
								<td><?php echo $merk->urutan ?></td>
								<td>
									<a href="<?php echo base_url('backend/merk/edit/' . $merk->id_merk) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
									<a href="<?php echo base_url('backend/merk/delete/' . $merk->id_merk) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Data?')"><i class="fa fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php $no++;
						} ?>
					</tbody>
				</table>

			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
