<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_login();
		$this->load->model('user_model', 'user');
	}



	public function index()
	{
		$data = [
			'title' => 'Toko Leather Cleaner',
			'page' => 'user/keranjang/keranjang',
			'subtitle' => 'Keranjang',
			'subtitle2' => 'Keranjang',
			'data' => $this->db->get('transaksi')->result_array(),
		];

		$this->load->view('templates/appuser', $data, FALSE);
	}

}

/* End of file Keranjang.php */
