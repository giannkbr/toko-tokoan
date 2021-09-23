<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelpelanggan');
		$this->load->model('Modelproduk');
		$this->load->model('Modeldetailtransaksi');
		$this->load->model('Modeltransaksi');
		$this->load->model('Modelrekening');
		$this->load->model('Modelkonfigurasi');
		$this->simple_pelanggan->cek_login();
	}

	// Halaman dasbor
	public function index()
	{
		// Ambil data login id_pelanggan dari session
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$detail_transaksi 	= $this->Modeldetailtransaksi->pelanggan($id_pelanggan);
		$pelanggan 			= $this->Modelpelanggan->detail($id_pelanggan);

		$data = array(	'title' 			=> 'Dashboard Pelanggan', 
						'detail_transaksi'	=> $detail_transaksi,
						'pelanggan'			=> $pelanggan,
						'page'				=> 'user/dasbor/list'
					);
		$this->load->view('user/layout/wrapper', $data, FALSE);
	} 	

	// Belanja
	public function belanja()
	{
		// Ambil data login id_pelanggan dari session
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$detail_transaksi = $this->Modeldetailtransaksi->pelanggan($id_pelanggan);

		$data = array(	'title' 			=> 'Riwayat Belanja', 
						'detail_transaksi'	=> $detail_transaksi,
						'page'				=> 'user/dasbor/belanja'
					);
		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

	// Detail
	public function detail($kode_transaksi)
	{
		// Ambil data login id_pelanggan dari session
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$detail_transaksi 	= $this->Modeldetailtransaksi->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->Modeltransaksi->kode_transaksi($kode_transaksi);
		$rekening 			= $this->Modelrekening->listing();
		// Pastikan bahwa pelanggan hanya mengakses data transaksinya
		if($detail_transaksi->id_pelanggan != $id_pelanggan) {
			$this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
			redirect(base_url('masuk'));
		}
		$total_harga = $detail_transaksi->ongkir + $detail_transaksi->jumlah_transaksi;
		$data = array(	'title' 			=> 'Invoice', 
						'detail_transaksi'	=> $detail_transaksi,
						'transaksi'			=> $transaksi,
						'rekening'			=> $rekening,
						'total_harga'		=> $total_harga,
						'page'				=> 'user/dasbor/detail'
					);
		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

	// Cetak
	public function cetak($kode_transaksi)
	{
		$detailtransaksi 	= $this->Modeldetailtransaksi->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->Modeltransaksi->kode_transaksi($kode_transaksi);
		$site 				= $this->Modelkonfigurasi->listing();

		$data = array(
			'title' 			=> 'Detail Transaksi',
			'detailtransaksi'	=> $detailtransaksi,
			'transaksi'			=> $transaksi,
			'site'				=> $site
		);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
	}

	// Profil
	public function profil()
	{
		// Ambil data login id_pelanggan dari session
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$pelanggan 			= $this->Modelpelanggan->detail($id_pelanggan);

		// Validasi input
		$valid = $this->form_validation;
		
		$valid->set_rules('nama_pelanggan','Nama lengkap','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('alamat','Alamat Lengkap','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('telepon','Nomor Telepon','required',
			array(	'required'		=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title' 			=> 'Profil Saya', 
						'pelanggan'			=> $pelanggan,
						'page'				=> 'user/dasbor/profil'
					);
		$this->load->view('user/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$i = $this->input;

			// Kalau password lebih dari 6 maka password diganti
			if (strlen($i->post('password')) >= 6) {
				$data = array(	'id_pelanggan'		=> $id_pelanggan,
								'nama_pelanggan'	=> $i->post('nama_pelanggan'),
								'password'			=> SHA1($i->post('password')),
								'telepon'			=> $i->post('telepon'),
								'alamat'			=> $i->post('alamat'),
							);
			}else{
				// Kalau password kurang dari 6 maka password tidak diganti
				$data = array(	'id_pelanggan'		=> $id_pelanggan,
								'nama_pelanggan'	=> $i->post('nama_pelanggan'),
								'telepon'			=> $i->post('telepon'),
								'alamat'			=> $i->post('alamat'),
							);
			}
			// End data update

			$this->Modelpelanggan->edit($data);
			$this->session->set_flashdata('sukses','Update profil berhasil');
			redirect(base_url('dasbor/profil'),'refresh');
		}
		// End masuk database
	}

	// Konfirmasi pembayaran
	public function konfirmasi($kode_transaksi)
	{
		// $id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$detail_transaksi 	= $this->Modeldetailtransaksi->kode_transaksi($kode_transaksi);
		$rekening 			= $this->Modelrekening->listing();
		$total_harga = $detail_transaksi->ongkir + $detail_transaksi->jumlah_transaksi;
		// Validasi input
		$valid = $this->form_validation;
		
		$valid->set_rules('nama_bank','Nama Bank','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('rekening_pembayaran','Nomor Rekening','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('rekening_pelanggan','Nama Pemilik Rekening','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('tanggal_bayar','Tanggal Pembayaran','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('jumlah_bayar','Jumlah Pembayaran','required',
			array(	'required'		=> '%s harus diisi'));

		if ($valid->run()) {
			// Check jika gambar diganti
			if (!empty($_FILES['bukti_bayar']['name'])) {
				
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; // Dalam Kb
			$config['max_width']  = '3300';
			$config['max_height']  = '4800';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti_bayar')){	
			// End validasi
		
			$data = array(	'title' 			=> 	'Konfirmasi Pembayaran',
							'detail_transaksi'	=>	$detail_transaksi,
							'rekening'			=>	$rekening,
							// 'total_harga'		=> $total_harga,
							'error'				=>	$this->upload->display_errors(),
							'page'				=>	'dasbor/konfirmasi'
						);
			$this->load->view('user/layout/wrapper', $data, FALSE);

			// Masuk database
			}else{
				$upload_gambar = array('upload_data' => $this->upload->data());
				// $total_harga = $detail_transaksi->ongkir + $detail_transaksi->jumlah_transaksi;
				// Create Thumbnail Gambar
				$config['image_library']	= 'gd2';
				$config['source_image']		= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
				// Lokasi folder thumbnail
				$config['new_image']		= './assets/upload/image/thumbs/';

				$config['create_thumb']		= TRUE;
				$config['maintain_ratio']	= TRUE;
				$config['width']			= 250; // Pixel
				$config['height']      		= 250; //Pixel
				$config['thumb_marker']		= '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
				// End Thumnail Gambar

				$i = $this->input;

				$data = array(	'id_detail_transaksi'	=> $detail_transaksi->id_detail_transaksi,
								'status_bayar'			=> 'Menunggu Konfirmasi',
								'jumlah_bayar'			=>  $i->post('jumlah_bayar'),
								'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
								'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
								'bukti_bayar'			=> $upload_gambar['upload_data']['file_name'],
								'id_rekening'			=> $i->post('id_rekening'),
								'tanggal_bayar'			=> $i->post('tanggal_bayar'),
								'nama_bank'				=> $i->post('nama_bank'),
							);
				// var_dump($data);
				// exit;
				$this->Modeldetailtransaksi->edit($data);
				$this->session->set_flashdata('sukses','Konfirmasi Pembayaran Berhasil');
				redirect(base_url('dasbor/belanja'),'refresh');
				}
			}else{
				// Edit produk tanpa ganti gambar
				$i = $this->input;
				// $total_harga = $detail_transaksi->ongkir + $detail_transaksi->jumlah_transaksi;
				$data = array(	'id_detail_transaksi'	=> $detail_transaksi->id_detail_transaksi,
								'status_bayar'			=> 'Menunggu Konfirmasi',
								'jumlah_bayar'			=> $i->post('jumlah_bayar'),
								'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
								'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
								// 'bukti_bayar'	=> $upload_gambar['upload_data']['file_name'],
								'id_rekening'			=> $i->post('id_rekening'),
								'tanggal_bayar'			=> $i->post('tanggal_bayar'),
								'nama_bank'				=> $i->post('nama_bank'),
							);
				// var_dump($data);
				// exit;
				$this->Modeldetailtransaksi->edit($data);
				$this->session->set_flashdata('sukses','Konfirmasi Pembayaran Berhasil');
				redirect(base_url('dasbor/belanja'),'refresh');
			}
	}
		// End masuk database
		$data = array(	'title' 			=> 	'Konfirmasi Pembayaran',
		  				'detail_transaksi'	=>	$detail_transaksi,
		  				'rekening'			=>	$rekening,
		  				'page'				=>	'user/dasbor/konfirmasi',
						'total_harga'		=> $total_harga,
		  			);
				// 	  var_dump($data);
				// exit;
		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Dasbor.php */