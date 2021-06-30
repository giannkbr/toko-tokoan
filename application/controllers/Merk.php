<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merk extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelproduk');
		$this->load->model('Modelmerk');
		$this->load->model('Modelkonfigurasi');
	}

	public function index()
	{
		$site 			= $this->Modelkonfigurasi->listing();
		// Ambil Data merk (kotak merk)
		$list_merk 	= $this->Modelmerk->listing();
		

		$data = array(	'title' 			=> 'Merk',
						'site'				=> $site,
						'list_merk'		=> $list_merk,
		 				'page'				=> 'user/merk/list',
		 			);
		$this->load->view('user/layout/wrapper', $data, FALSE);
	}

}

/* End of file merk.php */
/* Location: ./application/controllers/merk.php */