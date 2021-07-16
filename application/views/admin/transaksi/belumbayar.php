<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<!-- <a href="<?= base_url('backend/rekening/tambah'); ?>"><button class="btn btn-primary btn-block mb-2">
						<i class="fa fa-plus-circle"></i> Tambah Data
					</button>
				</a> -->
				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<tr>
							<th>No</th>
							<th width="25%">Nama Pelanggan</th>
							<th>Kode</th>
							<th>Tanggal</th>
							<th>Jumlah Total</th>
							<th>Jumlah Item</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($detailtransaksi as $detailtransaksi) { ?>
							<tr>
								<td><?php echo $i ?></td>
								<td>
									<?php echo $detailtransaksi->nama_pelanggan ?>
									<br><small>
										Telepon: <?php echo $detailtransaksi->telepon ?>
										<br>Email: <?php echo $detailtransaksi->email ?>
										<br>Alamat Kirim:
										<br><?php echo nl2br($detailtransaksi->alamat) ?>
									</small>
								</td>
								<td>
									<a href="<?php echo base_url('backend/transaksi/detail/' . $detailtransaksi->kode_transaksi) ?>">
										<?php echo $detailtransaksi->kode_transaksi ?>
									</a>
								</td>
								<td><?php echo date('d-m-Y', strtotime($detailtransaksi->tanggal_transaksi)) ?></td>
								<td><?php echo number_format($detailtransaksi->jumlah_bayar) ?></td>
								<td><?php echo $detailtransaksi->total_item ?></td>
								<td><?php echo $detailtransaksi->status_bayar ?></td>
								<td class="text-center">
									<a href="https://api.whatsapp.com/send?phone=<?php echo $detailtransaksi->telepon ?>&text=Maaf,%20bukti%20transaksi%20anda%20TIDAK%20VALID%0AKODE%20TRANSAKSI:%20<?php echo $detailtransaksi->kode_transaksi ?>%0A%0ASegera%20lakukan%20pengiriman%20ulang%20bukti%20transaksi.%0A<?php echo base_url('dasbor/belanja') ?>" target="blank" class="btn btn-warning btn-sm"><i class="fa fa-phone"></i> Hubungi</a>
									<a href="<?php echo base_url('backend/transaksi/delete_belum/' . $detailtransaksi->id_detail_transaksi) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Riwayat Transaksi?')"><i class="fa fa-times"></i> Hapus</a>
								</td>
							</tr>
						<?php $i++;
						} ?>
					</tbody>
				</table>

			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
