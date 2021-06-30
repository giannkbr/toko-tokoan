<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body {
			font-family: Arial;
			font-size: 12px;
		}

		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}

		table {
			border: solid thin #000;
			border-collapse: collapse;
		}

		td,
		th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}

		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
	<style type="text/css" media="screen">
		body {
			font-family: Arial;
			font-size: 12px;
		}

		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}

		table {
			border: solid thin #000;
			border-collapse: collapse;
		}

		td,
		th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}

		th {
			background-color: #f5f5f5;
			font-weight: bold;
		}

		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
</head>

<body onload="print()">
	<div class="cetak">
		<h1>DETAIL TRANSAKSI <?php echo $site->namaweb ?></h1>
		<table class="table table-bordered">
			<tbody>
				<tr font-weight="bold">
					<td width="20%">NAMA PELANGGAN</td>
					<td>: <?php echo $detailtransaksi->nama_pelanggan ?></td>
				</tr>
				<tr style="font-weight: bold;">
					<td width="20%">KODE TRANSAKSI</td>
					<td>: <?php echo $detailtransaksi->kode_transaksi ?></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>: <?php echo date('d-m-Y', strtotime($detailtransaksi->tanggal_transaksi)) ?></td>
				</tr>
				<tr>
					<td>Jumlah Total</td>
					<td>: <?php echo number_format($detailtransaksi->jumlah_transaksi) ?></td>
				</tr>
				<tr>
					<td>Status Bayar</td>
					<td>: <?php echo $detailtransaksi->status_bayar ?></td>
				</tr>
				<tr>
					<td>Bukti Bayar</td>
					<td>: <?php if ($detailtransaksi->bukti_bayar == "") {
								echo 'Belum ada';
							} else { ?>
							<img src="<?php echo base_url('assets/upload/image/' . $detailtransaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200">
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td>Tanggal Bayar</td>
					<td>: <?php echo date('d-m-Y', strtotime($detailtransaksi->tanggal_bayar)) ?></td>
				</tr>
				<tr>
					<td>Jumlah Bayar</td>
					<td>: Rp. <?php echo number_format($detailtransaksi->jumlah_bayar, '0', '.', '.') ?></td>
				</tr>
				<tr>
					<td>Pembayaran Dari</td>
					<td>: <?php echo $detailtransaksi->nama_bank ?> No. Rekening <?php echo $detailtransaksi->rekening_pembayaran ?> a.n <?php echo $detailtransaksi->rekening_pelanggan ?></td>
				</tr>
				<tr>
					<td>Pembayaran ke rekening</td>
					<td>: <?php echo $detailtransaksi->bank ?> No. Rekening <?php echo $detailtransaksi->nomor_rekening ?> a.n <?php echo $detailtransaksi->nama_pemilik ?></td>
				</tr>
			</tbody>
		</table>
		<hr>
		<table class="table" width="100%">
			<thead class="alert alert-success">
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama Produk</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Sub Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;
				foreach ($transaksi as $transaksi) { ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $transaksi->kode_produk ?></td>
						<td><?php echo $transaksi->nama_produk ?></td>
						<td><?php echo number_format($transaksi->jumlah) ?></td>
						<td><?php echo number_format($transaksi->harga) ?></td>
						<td><?php echo number_format($transaksi->total_harga) ?></td>
					</tr>
				<?php $i++;
				} ?>
			</tbody>
		</table>
	</div>
</body>

</html>
