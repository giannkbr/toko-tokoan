<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Modelkonfigurasi extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing
	public function listing()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);
	}

	// Load menu merk produk
	public function nav_produk()
	{
		$this->db->select('produk.*,
							merk.nama_merk,
							merk.slug_merk');
		$this->db->from('produk');
		// JOIN
		$this->db->join('merk', 'merk.id_merk = produk.id_merk', 'left');
		// END JOIN
		$this->db->group_by('produk.id_merk'); // Ngitung total gambar
		$this->db->order_by('merk.urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all detailtransaksi Belum Bayar
	public function nav_header_belum($id_pelanggan)
	{
		$this->db->select('detailtransaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('detailtransaksi');
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = detailtransaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = detailtransaksi.id_pelanggan', 'left');
		// End Join
		$this->db->group_by('detailtransaksi.id_detail_transaksi');
		$this->db->where('detailtransaksi.status_bayar', 'Belum');
		$this->db->where('detailtransaksi.id_pelanggan', $id_pelanggan);
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file Modelkonfigurasi.php */