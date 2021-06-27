<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelkonfigurasi', 'konfigurasi');
		is_login();
		is_admin();
	}

	public function index()
	{
		$konfigurasi = $this->konfigurasi->listing();

		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules(
			'namaweb',
			'Nama website',
			'required',
			array('required'		=> '%s harus diisi')
		);

		if ($valid->run() === FALSE) {
			// End validasi

			$data = [
				'title' => 'Data konfigurasi',
				'page' => 'admin/konfigurasi/index',
				'subtitle' => 'konfigurasi',
				'subtitle2' => 'Index',
				'konfigurasi' => $konfigurasi
			];

			$this->load->view('templates/app', $data);
			// Masuk database
		} else {
			$i 				= $this->input;
			$data 			= array(
				'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
				'id_user'				=> $this->session->userdata('id_user'),
				'namaweb'				=> $i->post('namaweb'),
				'tagline'				=> $i->post('tagline'),
				'email'					=> $i->post('email'),
				'website'				=> $i->post('website'),
				'keywords'				=> $i->post('keywords'),
				'metatext'				=> $i->post('metatext'),
				'telepon'				=> $i->post('telepon'),
				'alamat'				=> $i->post('alamat'),
				'facebook'				=> $i->post('facebook'),
				'instagram'				=> $i->post('instagram'),
				'deskripsi'				=> $i->post('deskripsi'),
			);
			$this->konfigurasi->edit($data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Konfigurasi Berhasil Dihapus!", "success");');
			redirect(base_url('backend/konfigurasi'), 'refresh');
		}
		// End masuk database
	}
}

/* End of file Konfigurasi.php */
