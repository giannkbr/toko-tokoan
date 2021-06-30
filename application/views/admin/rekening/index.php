<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<a href="<?= base_url('backend/rekening/tambah'); ?>"><button class="btn btn-primary btn-block mb-2">
						<i class="fa fa-plus-circle"></i> Tambah Data
					</button>
				</a>
				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<tr>
							<th>No </th>
							<th>Nama Bank</th>
							<th>Nomor Rekening</th>
							<th>Pemilik</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($rekening as $rekening) { ?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $rekening->nama_bank ?></td>
								<td><?php echo $rekening->nomor_rekening ?></td>
								<td><?php echo $rekening->nama_pemilik ?></td>
								<td>
									<a href="<?php echo base_url('backend/rekening/edit/' . $rekening->id_rekening) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
									<a href="<?php echo base_url('backend/rekening/delete/' . $rekening->id_rekening) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus Data?')"><i class="fa fa-trash"></i> Hapus</a>
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
