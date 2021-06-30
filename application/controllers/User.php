<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_login();
		$this->load->model('Modeluser', 'user');
	}

	public function index()
	{
		$data = [
			'title' => 'Toko Leather Cleaner',
			'page' => 'user/index',
			'subtitle' => 'Toko Leather Cleaner',
			'subtitle2' => 'Toko Leather Cleaner',
			'data' => $this->db->get('produk')->result_array(),
			'profil'=> $this->db->get('konfigurasi')->row()
		];

		$this->load->view('templates/appuser', $data, FALSE);
	}

}

/* End of file Karyawan.php */
