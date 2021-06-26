<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Merk extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('Modelmerk', 'merk');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Merk',
			'page' => 'admin/merk/index',
			'subtitle' => 'Merk',
			'subtitle2' => 'Index',
			'merk' => $this->merk->listing()
		];

		$this->load->view('templates/app', $data);
	}

	public function delete($id_merk)
	{
		$data = array('id_merk' => $id_merk);
		$this->merk->delete($data);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Merk Berhasil Dihapus!", "success");');

		redirect(base_url('backend/merk'), 'refresh');
	}

	public function tambah()
	{
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama_merk',
			'Nama merk',
			'required|is_unique[merk.nama_merk]',
			array(
				'required'		=> '%s harus diisi',
				'is_unique'		=> '%s sudah ada. Buat merk baru'
			)
		);

		if ($valid->run()) {
			$config['upload_path'] = './assets/upload/merk/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400'; // Dalam Kb
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				// End validasi
				$data = [
					'title' => 'Tambah Data Merk',
					'page' => 'admin/merk/tambahdatamerk',
					'subtitle' => 'Merk',
					'subtitle2' => 'Tambah Data',
					'error'	=>	$this->upload->display_errors(),
				];

				$this->load->view('templates/app', $data);
				// Masuk database
			} else {
				$upload_gambar = array('upload_data' => $this->upload->data());

				// Create Thumbnail Gambar
				$config['image_library']	= 'gd2';
				$config['source_image']		= './assets/upload/merk/image/' . $upload_gambar['upload_data']['file_name'];
				// Lokasi folder thumbnail
				$config['new_image']		= './assets/upload/merk/image/thumbs/';

				$config['create_thumb']		= TRUE;
				$config['maintain_ratio']	= TRUE;
				$config['width']			= 250; // Pixel
				$config['height']      		= 250; //Pixel
				$config['thumb_marker']		= '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
				// End Thumnail Gambar

				$i 				= $this->input;
				$slug_merk	= url_title($this->input->post('nama_merk'), 'dash', TRUE);
				$data 			= array(
					'slug_merk'		=> $slug_merk,
					'nama_merk'		=> $i->post('nama_merk'),
					// Disimpan nama file gambar
					'gambar'			=> $upload_gambar['upload_data']['file_name'],
					'urutan'			=> $i->post('urutan')
				);
				$this->merk->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('backend/merk'), 'refresh');
			}
		}
		// End masuk database
		$data = [
			'title' => 'Tambah Data Merk',
			'page' => 'admin/merk/tambahdatamerk',
			'subtitle' => 'Merk',
			'subtitle2' => 'Tambah Data',
		];

		$this->load->view('templates/app', $data);
	}

	public function edit($id_merk)
	{
		// Ambil data merk yang akan diedit
		$merk = $this->merk->detail($id_merk);
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama_merk',
			'Nama merk',
			'required',
			array('required'		=> '%s harus diisi')
		);

		if ($valid->run()) {
			// Check jika gambar diganti
			if (!empty($_FILES['gambar']['name'])) {

				$config['upload_path'] = './assets/upload/merk/image/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '2400'; // Dalam Kb
				$config['max_width']  = '2024';
				$config['max_height']  = '2024';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					// End validasi

					$data = [
						'title' => 'Edit Data Merk',
						'page' => 'admin/merk/editdatamerk',
						'subtitle' => 'Merk',
						'subtitle2' => 'Index',
						'merk' => $merk,
						'error'	=>	$this->upload->display_errors(),
					];
					$this->load->view('templates/app', $data);
					// Masuk database
				} else {
					$upload_gambar = array('upload_data' => $this->upload->data());

					// Create Thumbnail Gambar
					$config['image_library']	= 'gd2';
					$config['source_image']		= './assets/upload/merk/image/' . $upload_gambar['upload_data']['file_name'];
					// Lokasi folder thumbnail
					$config['new_image']		= './assets/upload/merk/image/thumbs/';

					$config['create_thumb']		= TRUE;
					$config['maintain_ratio']	= TRUE;
					$config['width']			= 250; // Pixel
					$config['height']      		= 250; //Pixel
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();
					// End Thumnail Gambar

					$i 				= $this->input;
					$slug_merk	= url_title($this->input->post('nama_merk'), 'dash', TRUE);
					$data 			= array(
						'id_merk'	=> $id_merk,
						'slug_merk'	=> $slug_merk,
						'nama_merk'	=> $i->post('nama_merk'),
						// Disimpan nama file gambar
						'gambar'		=> $upload_gambar['upload_data']['file_name'],
						'urutan'		=> $i->post('urutan')
					);
					$this->merk->edit($data);
					$this->session->set_flashdata('sukses', 'Data telah diedit');
					redirect(base_url('backend/merk'), 'refresh');
				}
			} else {
				// Edit produk tanpa ganti gambar
				$i 				= $this->input;
				$slug_merk	= url_title($this->input->post('nama_merk'), 'dash', TRUE);
				$data 			= array(
					'id_merk'	=> $id_merk,
					'slug_merk'	=> $slug_merk,
					'nama_merk'	=> $i->post('nama_merk'),
					// Disimpan nama file gambar
					// 'gambar'		=> $upload_gambar['upload_data']['file_name'],
					'urutan'		=> $i->post('urutan')
				);
				$this->merk->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diedit');
				redirect(base_url('backend/merk'), 'refresh');
			}
		}

		$data = [
			'title' => 'Edit Data Merk',
			'page' => 'admin/merk/editdatamerk',
			'subtitle' => 'Merk',
			'subtitle2' => 'Index',
			'merk' => $merk,
		];
		$this->load->view('templates/app', $data);
	}
}
/* End of file Merk.php */
