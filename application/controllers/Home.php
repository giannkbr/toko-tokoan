<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelproduk');
		$this->load->model('Modelkategori');
		$this->load->model('Modelkonfigurasi');

	}

	// Halaman Utama Website - Homepage
	public function index()
	{
		$site = $this->Modelkonfigurasi->listing();
		$kategori = $this->Modelkonfigurasi->nav_produk();
		$produk = $this->Modelproduk->home();
		// Ambil Data kategori (kotak kategori yg di dashboard)
		$list_kategori 	= $this->Modelkategori->listing();
		// Ambil data keranjang
		// $keranjang	= $this->cart->contents();

		$data = array(	'title'		=> $site->namaweb.' | '.$site->tagline, 
						'keywords' 	=> $site->keywords,
						'deskripsi' => $site->deskripsi,
						'site'		=> $site,
						'kategori'	=> $kategori,
						'produk'	=> $produk,
						'list_kategori'	=> $list_kategori,
						// 'keranjang'	=> $keranjang,
						'page' 		=> 'user/home/list'
					);

		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

	public function tatacara(){
		$site = $this->Modelkonfigurasi->listing();
			$data = array(	'title'		=> $site->namaweb.' | '.$site->tagline, 
						'keywords' 	=> $site->keywords,
						'deskripsi' => $site->deskripsi,
						'site'		=> $site,
						// 'keranjang'	=> $keranjang,
						'page' 		=> 'user/home/tatacara'
					);

		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

	public function bayar(){
		$site = $this->Modelkonfigurasi->listing();
			$data = array(	'title'		=> $site->namaweb.' | '.$site->tagline, 
						'keywords' 	=> $site->keywords,
						'deskripsi' => $site->deskripsi,
						'site'		=> $site,
						// 'keranjang'	=> $keranjang,
						'page' 		=> 'user/home/bayar'
					);

		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

	public function syarat(){
		$site = $this->Modelkonfigurasi->listing();
			$data = array(	'title'		=> $site->namaweb.' | '.$site->tagline, 
						'keywords' 	=> $site->keywords,
						'deskripsi' => $site->deskripsi,
						'site'		=> $site,
						// 'keranjang'	=> $keranjang,
						'page' 		=> 'user/home/syarat'
					);

		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

	public function kebijakan(){
		$site = $this->Modelkonfigurasi->listing();
			$data = array(	'title'		=> $site->namaweb.' | '.$site->tagline, 
						'keywords' 	=> $site->keywords,
						'deskripsi' => $site->deskripsi,
						'site'		=> $site,
						// 'keranjang'	=> $keranjang,
						'page' 		=> 'user/home/kebijakan'
					);

		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

	public function kontak(){
		$site = $this->Modelkonfigurasi->listing();
			$data = array(	'title'		=> $site->namaweb.' | '.$site->tagline, 
						'keywords' 	=> $site->keywords,
						'deskripsi' => $site->deskripsi,
						'site'		=> $site,
						// 'keranjang'	=> $keranjang,
						'page' 		=> 'user/home/kontak'
					);

		$this->load->view('user/layout/wrapper', $data, FALSE);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */