<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('Modelproduk', 'produk');
		$this->load->model('Modelmerk', 'merk');
		$this->load->model('Modeldetailtransaksi', 'detailtransaksi');
		$this->load->model('Modeltransaksi', 'transaksi');
		$this->load->model('Modelkonfigurasi', 'konfigurasi');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Transaksi',
			'page' => 'admin/transaksi/index',
			'subtitle' => 'transaksi',
			'subtitle2' => 'Index',
			'detailtransaksi' => $this->detailtransaksi->listing()
		];

		$this->load->view('templates/app', $data);
	}

	// Load data transaksi
	public function sudah_bayar()
	{
		$detailtransaksi = $this->detailtransaksi->sudah();
		$data = array(
			'title' => 'Data Transaksi Sudah Bayar',
			'page' => 'admin/transaksi/sudahbayar',
			'subtitle' => 'transaksi',
			'subtitle2' => 'Index',
			'detailtransaksi'	=> $detailtransaksi,
		);
		$this->load->view('templates/app', $data);
	}

	// Load data transaksi
	public function belum_bayar()
	{
		$detailtransaksi = $this->detailtransaksi->belum();
		$data = array(
			'title' => 'Data Transaksi Sudah Bayar',
			'page' => 'admin/transaksi/sudahbayar',
			'subtitle' => 'transaksi',
			'subtitle2' => 'Index',
			'detailtransaksi'	=> $detailtransaksi,
		);
		$this->load->view('templates/app', $data);
	}

	// Detail
	public function detail($kode_transaksi)
	{
		$detailtransaksi 	= $this->detailtransaksi->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi->kode_transaksi($kode_transaksi);
		$data = array(
			'title' => 'Data Transaksi Sudah Bayar',
			'page' => 'admin/transaksi/sudahbayar',
			'subtitle' => 'transaksi',
			'subtitle2' => 'Index',
			'detailtransaksi'	=> $detailtransaksi,
			'transaksi' => $transaksi
		);
		$this->load->view('templates/app', $data);
	}

	// Konfirmasi
	public function konfirmasi($kode_transaksi)
	{
		$detailtransaksi 	= $this->detailtransaksi->kode_transaksi($kode_transaksi);

		$i = $this->input;

		$data = array(
			'status_bayar'			=> 'Konfirmasi',
			'id_detail_transaksi'	=> $detailtransaksi->id_detail_transaksi,
		);
		$this->detailtransaksi->edit($data);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Konnfirmasi Pembayaran Berhasil!", "success");');
		redirect(base_url('backend/transaksi/sudah_bayar'), 'refresh');
	}

	// Cetak
	public function cetak($kode_transaksi)
	{
		$detailtransaksi 	= $this->detailtransaksi->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi->listing();

		$data = array(
			'title' 			=> 'Detail Transaksi',
			'detailtransaksi'	=> $detailtransaksi,
			'transaksi'			=> $transaksi,
			'site'				=> $site
		);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
	}

	// Cetak
	public function cetak_kirim($kode_transaksi)
	{
		$detailtransaksi 	= $this->detailtransaksi->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi->listing();

		$data = array(
			'title' 			=> 'Detail Transaksi',
			'detailtransaksi'	=> $detailtransaksi,
			'transaksi'			=> $transaksi,
			'site'				=> $site
		);
		$this->load->view('admin/transaksi/kirim', $data, FALSE);
	}

	// Unduh pdf laporan
	public function pdf($kode_transaksi)
	{
		$detailtransaksi 	= $this->detailtransaksi->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi->listing();

		$data = array(
			'title' 			=> 'Detail Transaksi',
			'detailtransaksi'	=> $detailtransaksi,
			'transaksi'			=> $transaksi,
			'site'				=> $site
		);
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('admin/transaksi/cetak', $data, true);
		$mpdf = new \Mpdf\Mpdf();
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		// Output a PDF file directly to the browser
		$nama_file_pdf = 'detail-transaksi-' . $kode_transaksi . '.pdf';
		$mpdf->Output($nama_file_pdf, 'I');
	}

	// Unduh pengiriman
	public function kirim($kode_transaksi)
	{
		$detailtransaksi 	= $this->detailtransaksi->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi->listing();

		$data = array(
			'title' 			=> 'Detail Transaksi',
			'detailtransaksi'	=> $detailtransaksi,
			'transaksi'			=> $transaksi,
			'site'				=> $site
		);
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('admin/transaksi/kirim', $data, true);
		$mpdf = new \Mpdf\Mpdf();
		// SETTING HEADER DAN FOOTER
		$mpdf->SetHTMLHeader('
		<div style="text-align: left; font-weight: bold;">
		    <img src="' . base_url('assets/upload/image/' . $site->logo) . '" style="height: 40px; width: auto;">
		</div>');
		$mpdf->SetHTMLFooter('
			<div style="padding: 10px 20px; border: solid thin #000; font-size: 12px;">' . $site->namaweb .
			'<br>Alamat:  ' . $site->alamat . '<br>
				Telepon: ' . $site->telepon . '
			</div>
		');
		// END SETTING HEADER DAN FOOTER
		// Write some HTML code:
		$mpdf->WriteHTML($html);
		// Output tampil dengan nama baru
		$nama_file_pdf = url_title($site->namaweb, 'dash', 'true') . '-' . $kode_transaksi . '.pdf';
		$mpdf->Output($nama_file_pdf, 'I');
	}

	// Delete transaksi pelanggan yang tidak bayar
	public function delete_belum($id_detail_transaksi)
	{
		// Ambil data traksaksi
		$detailtransaksi	= $this->detailtransaksi->detail($id_detail_transaksi);
		// // Proses hapus gambar bukti bayar di header transaksi
		// unlink('./assets/upload/image/'.$detailtransaksi->bukti_bayar);
		// unlink('./assets/upload/image/thumbs/'.$detailtransaksi->bukti_bayar);

		$data = array('id_detail_transaksi'	=> $id_detail_transaksi);
		$this->detailtransaksi->delete($data);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Berhasil Dihapus!", "success");');
		redirect(base_url('backend/transaksi/belum_bayar'), 'refresh');
	}

	// Delete riwayat transaksi pelanggan yang telah diproses 
	public function delete_tolak($id_detail_transaksi)
	{
		$data = array(
			'status_bayar'			=> 'Belum',
			'jumlah_bayar'			=> null,
			'rekening_pembayaran'	=> null,
			'rekening_pelanggan'	=> null,
			'id_rekening'			=> null,
			'tanggal_bayar'			=> null,
			'nama_bank'				=> null,
			'id_detail_transaksi'	=> $id_detail_transaksi,
		);
		$this->detailtransaksi->edit($data);

		// Ambil data traksaksi
		$detailtransaksi	= $this->detailtransaksi->detail($id_detail_transaksi);
		// Proses hapus gambar bukti bayar di header transaksi
		unlink('./assets/upload/image/' . $detailtransaksi->bukti_bayar);
		unlink('./assets/upload/image/thumbs/' . $detailtransaksi->bukti_bayar);

		$this->session->set_flashdata('message', 'swal("Berhasil!", "Bukti telak ditolak!", "success");');
		redirect(base_url('backend/transaksi/sudah_bayar'), 'refresh');
	}

	// Delete riwayat transaksi pelanggan yang telah diproses 
	public function delete_riwayat_transaksi($id_detail_transaksi)
	{
		// Ambil data traksaksi
		$detailtransaksi	= $this->detailtransaksi->detail($id_detail_transaksi);
		// Proses hapus gambar bukti bayar di header transaksi
		unlink('./assets/upload/image/' . $detailtransaksi->bukti_bayar);
		unlink('./assets/upload/image/thumbs/' . $detailtransaksi->bukti_bayar);

		$data = array('id_detail_transaksi'	=> $id_detail_transaksi);
		$this->detailtransaksi->delete($data);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Berhasil Dihapus!", "success");');
		redirect(base_url('backend/transaksi'), 'refresh');
	}
}

/* End of file Transaksi.php */
