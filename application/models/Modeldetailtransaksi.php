<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Modeldetailtransaksi extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all detail_transaksi konfirmasi
	public function listing()
	{
		$this->db->select('detail_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('detail_transaksi');
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = detail_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = detail_transaksi.id_pelanggan', 'left');
		// End Join
		$this->db->group_by('detail_transaksi.id_detail_transaksi');
		$this->db->where('detail_transaksi.status_bayar', 'Konfirmasi');
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all detail_transaksi Sudah Bayar
	public function sudah()
	{
		$this->db->select('detail_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('detail_transaksi');
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = detail_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = detail_transaksi.id_pelanggan', 'left');
		// End Join
		$this->db->group_by('detail_transaksi.id_detail_transaksi');
		$this->db->where('detail_transaksi.status_bayar', 'Menunggu Konfirmasi');
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all detail_transaksi Belum Bayar
	public function belum()
	{
		$this->db->select('detail_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('detail_transaksi');
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = detail_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = detail_transaksi.id_pelanggan', 'left');
		// End Join
		$this->db->group_by('detail_transaksi.id_detail_transaksi');
		$this->db->where('detail_transaksi.status_bayar', 'Belum');
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all detail_transaksi 
	public function pelanggan($id_pelanggan)
	{
		$this->db->select('detail_transaksi.*,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('detail_transaksi');
		$this->db->where('detail_transaksi.id_pelanggan', $id_pelanggan);
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = detail_transaksi.kode_transaksi', 'left');
		// End Join
		$this->db->group_by('detail_transaksi.id_detail_transaksi');
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail detail_transaksi 
	public function kode_transaksi($kode_transaksi)
	{
		$this->db->select('detail_transaksi.*,
							pelanggan.nama_pelanggan,
							rekening.nama_bank AS bank,
							rekening.nomor_rekening,
							rekening.nama_pemilik,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('detail_transaksi');
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = detail_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = detail_transaksi.id_pelanggan', 'left');
		$this->db->join('rekening', 'rekening.id_rekening = detail_transaksi.id_rekening', 'left');
		// End Join
		$this->db->group_by('detail_transaksi.id_detail_transaksi');
		$this->db->where('transaksi.kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail detail_transaksi 
	public function detail($id_detail_transaksi)
	{
		$this->db->select('*');
		$this->db->from('detail_transaksi');
		$this->db->where('id_detail_transaksi', $id_detail_transaksi);
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('detail_transaksi', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_detail_transaksi', $data['id_detail_transaksi']);
		$this->db->update('detail_transaksi', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_detail_transaksi', $data['id_detail_transaksi']);
		$this->db->delete('detail_transaksi', $data);
	}
}

/* End of file Modeldetailtransaksi.php */
