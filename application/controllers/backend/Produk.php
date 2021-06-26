<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('Modelproduk', 'produk');
		$this->load->model('Modelmerk', 'merk');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Produk',
			'page' => 'admin/produk/index',
			'subtitle' => 'produk',
			'subtitle2' => 'Index',
			'produk' => $this->produk->listing()
		];

		$this->load->view('templates/app', $data);
	}

	// Delete produk
	public function delete($id_produk)
	{
		// Proses hapus gambar
		$produk = $this->produk->detail($id_produk);
		unlink('./assets/upload/image/' . $produk->gambar);
		unlink('./assets/upload/image/thumbs/' . $produk->gambar);

		$data = array('id_produk'	=> $id_produk);
		$this->produk->delete($data);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Produk Berhasil Dihapus!", "success");');
		redirect(base_url('backend/produk'), 'refresh');
	}

	// Delete gambar produk
	public function delete_gambar($id_produk, $id_gambar)
	{
		// Proses hapus gambar
		$gambar = $this->produk->detail_gambar($id_gambar);
		unlink('./assets/upload/image/' . $gambar->gambar);
		unlink('./assets/upload/image/thumbs/' . $gambar->gambar);

		$data = array('id_gambar'	=> $id_gambar);
		$this->produk->delete_gambar($data);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Produk Berhasil Dihapus!", "success");');
		redirect(base_url('backend/produk/gambar/' . $id_produk), 'refresh');
	}

	// Gambar
	public function gambar($id_produk)
	{
		$produk 	= $this->produk->detail($id_produk);
		$gambar 	= $this->produk->gambar($id_produk);

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules(
			'judul_gambar',
			'Judul/Nama gambar',
			'required',
			array('required'		=> '%s harus diisi')
		);


		if ($valid->run()) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; // Dalam Kb
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				// End validasi

				$data = [
					'title'		=>	'Tambah Gambar Produk: ' . $produk->nama_produk,
					'page' => 'admin/produk/tambahgambar',
					'subtitle' => 'Produk',
					'subtitle2' => 'Tambah Gambar',
					'produk'	=>	$produk,
					'gambar'	=>	$gambar,
					'error'		=>	$this->upload->display_errors(),
				];

				$this->load->view('templates/app', $data);
				// Masuk database
			} else {
				$upload_gambar = array('upload_data' => $this->upload->data());

				// Create Thumbnail Gambar
				$config['image_library']	= 'gd2';
				$config['source_image']		= './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
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

				$data = array(
					'id_produk'		=> $id_produk,
					'judul_gambar'	=> $i->post('judul_gambar'),
					// Disimpan nama file gambar
					'gambar'		=> $upload_gambar['upload_data']['file_name']
				);
				$this->produk->tambah_gambar($data);
				$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Gambar Berhasil Ditambah!", "success");');
				redirect(base_url('backend/produk/gambar/' . $id_produk), 'refresh');
			}
		}
		// End masuk database
		$data = [
			'title'		=>	'Tambah Gambar Produk: ' . $produk->nama_produk,
			'page' => 'admin/produk/tambahgambar',
			'subtitle' => 'Produk',
			'subtitle2' => 'Tambah Gambar',
			'produk'	=>	$produk,
			'gambar'	=>	$gambar,
		];

		$this->load->view('templates/app', $data);
	}

	// Tambah produk
	public function tambah()
	{
		// Ambil data merk
		$merk = $this->merk->listing();

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama_produk',
			'Nama produk',
			'required',
			array('required'		=> '%s harus diisi')
		);

		$valid->set_rules(
			'kode_produk',
			'Kode produk',
			'required|is_unique[produk.kode_produk]',
			array(
				'required'		=> '%s harus diisi',
				'is_unique'		=> '%s sudah ada. Buat kode baru'
			)
		);


		if ($valid->run()) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; // Dalam Kb
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				// End validasi
				$data = [
					'title'		=>	'Tambah Data Produk',
					'page' => 'admin/produk/tambahproduk',
					'subtitle' => 'Produk',
					'subtitle2' => 'Tambah Produk',
					'merk'	=>	$merk,
					'error'		=>	$this->upload->display_errors(),
				];

				$this->load->view('templates/app', $data);
			} else {
				$upload_gambar = array('upload_data' => $this->upload->data());

				// Create Thumbnail Gambar
				$config['image_library']	= 'gd2';
				$config['source_image']		= './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
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
				// SLUG PRODUK
				$slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);

				$data = array(
					'id_users'		=> $this->session->userdata('id_users'),
					'id_merk'	=> $i->post('id_merk'),
					'kode_produk'	=> $i->post('kode_produk'),
					'nama_produk'	=> $i->post('nama_produk'),
					'slug_produk'	=> $slug_produk,
					'keterangan'	=> $i->post('keterangan'),
					// 'keywords'		=> $i->post('keywords'),
					'harga'			=> $i->post('harga'),
					'stok'			=> $i->post('stok'),
					// Disimpan nama file gambar
					'gambar'		=> $upload_gambar['upload_data']['file_name'],
					// 'ukuran'		=> $i->post('ukuran'),
					'status_produk'	=> $i->post('status_produk'),
					'tanggal_post'	=> date('Y-m-d H:i:s')
				);
				$this->produk->tambah($data);
				$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Produk Berhasil Dihapus!", "success");');
				redirect(base_url('backend/produk'), 'refresh');
			}
		}
		// End masuk database
		$data = [
			'title'		=>	'Tambah Data Produk',
			'page' => 'admin/produk/tambahproduk',
			'subtitle' => 'Produk',
			'subtitle2' => 'Tambah Produk',
			'merk'	=>	$merk,
		];

		$this->load->view('templates/app', $data);
	}


	// Edit produk
	public function edit($id_produk)
	{
		// Ambil data produk yang akan diedit
		$produk = $this->produk->detail($id_produk);
		// Ambil data merk
		$merk = $this->merk->listing();
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama_produk',
			'Nama produk',
			'required',
			array('required'		=> '%s harus diisi')
		);

		$valid->set_rules(
			'kode_produk',
			'Kode produk',
			'required',
			array('required'		=> '%s harus diisi')
		);

		if ($valid->run()) {
			// Check jika gambar diganti
			if (!empty($_FILES['gambar']['name'])) {

				$config['upload_path'] = './assets/upload/image/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '2400'; // Dalam Kb
				$config['max_width']  = '2024';
				$config['max_height']  = '2024';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					// End validasi
					$data = [
						'title'		=>	'Edit Data Produk',
						'page' => 'admin/produk/editproduk',
						'subtitle' => 'Produk',
						'subtitle2' => 'Tambah Produk',
						'merk'	=>	$merk,
						'produk'	=>	$produk,
						'error'		=>	$this->upload->display_errors(),
					];

					$this->load->view('templates/app', $data);
				} else {
					$upload_gambar = array('upload_data' => $this->upload->data());

					// Create Thumbnail Gambar
					$config['image_library']	= 'gd2';
					$config['source_image']		= './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
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
					// SLUG PRODUK
					$slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);

					$data = array(
						'id_produk'		=> $id_produk,
						'id_users'		=> $this->session->userdata('id_users'),
						'id_merk'	=> $i->post('id_merk'),
						'kode_produk'	=> $i->post('kode_produk'),
						'nama_produk'	=> $i->post('nama_produk'),
						'slug_produk'	=> $slug_produk,
						'keterangan'	=> $i->post('keterangan'),
						'harga'			=> $i->post('harga'),
						'stok'			=> $i->post('stok'),
						// Disimpan nama file gambar
						'gambar'		=> $upload_gambar['upload_data']['file_name'],
						// 'ukuran'		=> $i->post('ukuran'),
						'status_produk'	=> $i->post('status_produk')
					);
					$this->produk->edit($data);
					$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Produk Berhasil Diedit!", "success");');
					redirect(base_url('backend/produk'), 'refresh');
				}
			} else {
				// Edit produk tanpa ganti gambar
				$i = $this->input;
				// SLUG PRODUK
				$slug_produk = url_title($this->input->post('nama_produk') . '-' . $this->input->post('kode_produk'), 'dash', TRUE);

				$data = array(
					'id_produk'		=> $id_produk,
					'id_users'		=> $this->session->userdata('id_users'),
					'id_merk'	=> $i->post('id_merk'),
					'kode_produk'	=> $i->post('kode_produk'),
					'nama_produk'	=> $i->post('nama_produk'),
					'slug_produk'	=> $slug_produk,
					'keterangan'	=> $i->post('keterangan'),

					'harga'			=> $i->post('harga'),
					'stok'			=> $i->post('stok'),
					// Disimpan nama file gambar (gambar tidak diganti)
					// 'gambar'		=> $upload_gambar['upload_data']['file_name'],

					'status_produk'	=> $i->post('status_produk')
				);
				$this->produk->edit($data);
				$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Produk Berhasil Diedit!", "success");');
				redirect(base_url('backend/produk'), 'refresh');
			}
		}
		// End masuk database

		$data = [
			'title'		=>	'Edit Data Produk',
			'page' => 'admin/produk/editproduk',
			'subtitle' => 'Produk',
			'subtitle2' => 'Tambah Produk',
			'merk'	=>	$merk,
			'produk'	=>	$produk,
		];

		$this->load->view('templates/app', $data);
	}
}

/* End of file Produk.php */
