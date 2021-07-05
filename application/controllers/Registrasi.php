<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelpelanggan');
		$this->load->model('Modelproduk');
		$this->load->model('Modelkategori');
		$this->load->model('Modelkonfigurasi');
	}

	// Halaman registrasi
	public function index()
	{
		// Validasi input
		$valid = $this->form_validation;
		
		$valid->set_rules('nama_pelanggan','Nama lengkap','required',
			array(	'required'		=> '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email|is_unique[pelanggan.email]',
			array(	'required'		=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid',
					'is_unique'		=> '%s sudah terdaftar. Gunakan email lain!'));

		$valid->set_rules('password','Password','required',
			array(	'required'	=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Registrasi Pelanggan',
						'page'		=> 'user/registrasi/list'
					);
		$this->load->view('user/layout/wrapper', $data, FALSE);
		
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'status_pelanggan'	=> 'Pending',
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'email'				=> $i->post('email'),
							'password'			=> SHA1($i->post('password')),
							'telepon'			=> $i->post('telepon'),
							'alamat'			=> $i->post('alamat'),
							'tanggal_daftar'	=> date('Y-m-d H:i:s')
						);
			$this->Modelpelanggan->tambah($data);

			// Create session login pelanggan
			// $this->session->set_userdata('email',$i->post('email'));
			// $this->session->set_userdata('nama_pelanggan',$i->post('nama_pelanggan'));
			// End create session

			$this->session->set_flashdata('sukses','Registrasi berhasil');
			redirect(base_url('registrasi/sukses'),'refresh');
		}
		// End masuk database
	}

	public function sukses()
	{
		$data = array(	'title'		=> 'Registrasi Pelanggan',
						'page'		=> 'user/registrasi/sukses'
					);
		$this->load->view('user/layout/wrapper', $data, FALSE);
	}
}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */