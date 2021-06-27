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

		$data = [
			'title' => 'Data konfigurasi',
			'page' => 'admin/konfigurasi/index',
			'subtitle' => 'konfigurasi',
			'subtitle2' => 'Index',
			'konfigurasi' => $this->konfigurasi->listing()
		];

		$this->load->view('templates/app', $data);
	}
}

/* End of file Konfigurasi.php */
