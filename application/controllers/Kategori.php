<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelproduk');
		$this->load->model('Modelkategori');
		$this->load->model('Modelkonfigurasi');
	}

	public function index()
	{
		$site 			= $this->Modelkonfigurasi->listing();
		// Ambil Data kategori (kotak kategori)
		$list_kategori 	= $this->Modelkategori->listing();
		

		$data = array(	'title' 			=> 'kategori',
						'site'				=> $site,
						'list_kategori'		=> $list_kategori,
		 				'page'				=> 'user/kategori/list',
		 			);
		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */