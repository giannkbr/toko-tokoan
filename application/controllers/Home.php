<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelproduk');
		$this->load->model('Modelmerk');
		$this->load->model('Modelkonfigurasi');

	}

	// Halaman Utama Website - Homepage
	public function index()
	{
		$site = $this->Modelkonfigurasi->listing();
		$merk = $this->Modelkonfigurasi->nav_produk();
		$produk = $this->Modelproduk->home();
		// Ambil Data merk (kotak merk yg di dashboard)
		$list_merk 	= $this->Modelmerk->listing();
		// Ambil data keranjang
		// $keranjang	= $this->cart->contents();

		$data = array(	'title'		=> $site->namaweb.' | '.$site->tagline, 
						'keywords' 	=> $site->keywords,
						'deskripsi' => $site->deskripsi,
						'site'		=> $site,
						'merk'	=> $merk,
						'produk'	=> $produk,
						'list_merk'	=> $list_merk,
						// 'keranjang'	=> $keranjang,
						'page' 		=> 'user/home/list'
					);

		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */