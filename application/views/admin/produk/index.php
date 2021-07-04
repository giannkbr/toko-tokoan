<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<a href="<?= base_url('backend/produk/tambah'); ?>"><button class="btn btn-primary btn-block mb-2">
						<i class="fa fa-plus-circle"></i> Tambah Data
					</button>
				</a>
				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar</th>
							<th>Nama</th>
							<th>Kategori</th>
							<th>Stok</th>
							<th>Harga</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($produk as $produk) { ?>
							<tr>
								<td><?php echo $no ?></td>
								<td>
									<img src="<?php echo base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>" class="img img-responsive img-thumbnail" width="60">
								</td>
								<td><?php echo $produk->nama_produk ?></td>
								<td><?php echo $produk->nama_kategori ?></td>
								<td><?php echo $produk->stok ?></td>
								<td><?php echo number_format($produk->harga, '0', ',', '.') ?></td>
								<td><?php echo $produk->status_produk ?></td>
								<td>
									<a href="<?php echo base_url('backend/produk/gambar/' . $produk->id_produk) ?>" class="btn btn-success btn-xs"><i class="fa fa-image"></i> Gambar (<?php echo $produk->total_gambar; ?>)</a>

									<a href="<?php echo base_url('backend/produk/edit/' . $produk->id_produk) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

									<?php include('delete.php') ?>
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
