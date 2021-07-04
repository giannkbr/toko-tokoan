<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modelrekening', 'rekening');
		// is_login();
		// is_admin();
	}

	public function index()
	{
		$rekening = $this->rekening->listing();

		$data = [
			'title' => 'Data Rekening',
			'page' => 'admin/rekening/index',
			'subtitle' => 'Rekening',
			'subtitle2' => 'Index',
			'rekening' => $this->rekening->listing()
		];

		$this->load->view('templates/app', $data);
	}

	// Tambah rekening
	public function tambah()
	{
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama_bank',
			'Nama rekening',
			'required',
			array('required'		=> '%s harus diisi')
		);

		$valid->set_rules(
			'nama_pemilik',
			'Nama pemilik rekening',
			'required',
			array('required'		=> '%s harus diisi')
		);

		$valid->set_rules(
			'nomor_rekening',
			'Nomor rekening',
			'required|is_unique[rekening.nomor_rekening]',
			array(
				'required'		=> '%s harus diisi',
				'is_unique'		=> '%s sudah ada. Buat nomor rekening baru'
			)
		);

		if ($valid->run() === FALSE) {
			// End validasi

			$data = [
				'title' => 'Tambah Data Rekening',
				'page' => 'admin/rekening/tambahrekening',
				'subtitle' => 'Tambah Data Rekening',
				'subtitle2' => 'Index',
			];

			$this->load->view('templates/app', $data);
			// Masuk database
		} else {
			$i 				= $this->input;
			$data 			= array(
				'id_users'		=> $this->session->userdata('id_users'),
				'nama_bank'		=> $i->post('nama_bank'),
				'nomor_rekening' => $i->post('nomor_rekening'),
				'nama_pemilik'	=> $i->post('nama_pemilik')
			);
			$this->rekening->tambah($data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Rekening Berhasil Dihapus!", "success");');
			redirect(base_url('backend/rekening'), 'refresh');
		}
		// End masuk database
	}

	// Edit rekening
	public function edit($id_rekening)
	{
		// Ambil data rekening yang akan diedit
		$rekening = $this->rekening->detail($id_rekening);
		// Validasi input
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama_bank',
			'Nama rekening',
			'required',
			array('required'		=> '%s harus diisi')
		);

		if ($valid->run() === FALSE) {
			// End validasi
			$data = [
				'title' => 'Tambah Data Rekening',
				'page' => 'admin/rekening/editrekening',
				'subtitle' => 'Tambah Data Rekening',
				'subtitle2' => 'Index',
				'rekening'	=>	$rekening,
			];

			$this->load->view('templates/app', $data);
			// Masuk database
		} else {
			$i 				= $this->input;
			$data 			= array(
				'id_rekening'		=> $id_rekening,
				'id_users'			=> $this->session->userdata('id_users'),
				'nama_bank'			=> $i->post('nama_bank'),
				'nomor_rekening'	=> $i->post('nomor_rekening'),
				'nama_pemilik'		=> $i->post('nama_pemilik')
			);
			$this->rekening->edit($data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Rekening Berhasil Diedit!", "success");');
			redirect(base_url('backend/rekening'), 'refresh');
		}
		// End masuk database
	}

	// Delete rekening
	public function delete($id_rekening)
	{
		$data = array('id_rekening'	=> $id_rekening);
		$this->rekening->delete($data);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Rekening Berhasil Dihapus!", "success");');
		redirect(base_url('backend/rekening'), 'refresh');
	}
}

/* End of file Rekening.php */
