<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
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
			'page' => 'user/pesanan/pesanan',
			'subtitle' => 'Pesanan Saya',
			'subtitle2' => 'Pesanan Saya',
			// 'data' => $this->db->get('transaksi')->result_array(),
		];

		$this->load->view('templates/appuser', $data, FALSE);
	}

	public function detailpesanan()
	{
		$data = [
			'title' => 'Toko Leather Cleaner',
			'page' => 'user/pesanan/detailpesanan',
			'subtitle' => 'Detail Pesanan Saya',
			'subtitle2' => 'Detail Pesanan Saya',
			// 'data' => $this->db->get('transaksi')->result_array(),
		];

		$this->load->view('templates/appuser', $data, FALSE);
	}

}

/* End of file Keranjang.php */
