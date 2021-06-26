<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Modelproduk extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all produk 
	public function listing()
	{
		$this->db->select('produk.*,
							users.nama,
							merk.nama_merk,
							merk.slug_merk,
							COUNT(gambar.id_gambar) AS total_gambar'); // Ngitung total gambar
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_users = produk.id_users', 'left');
		$this->db->join('merk', 'merk.id_merk = produk.id_merk', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left'); // Ngitung total gambar
		// END JOIN
		$this->db->group_by('produk.id_produk'); // Ngitung total gambar
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all produk home 
	public function home()
	{
		$this->db->select('produk.*,
							users.nama,
							merk.nama_merk,
							merk.slug_merk,
							COUNT(gambar.id_gambar) AS total_gambar'); // Ngitung total gambar
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_users = produk.id_users', 'left');
		$this->db->join('merk', 'merk.id_merk = produk.id_merk', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left'); // Ngitung total gambar
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk'); // Ngitung total gambar
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}

	// Read produk 
	public function read($slug_produk)
	{
		$this->db->select('produk.*,
							users.nama,
							merk.nama_merk,
							merk.slug_merk,
							COUNT(gambar.id_gambar) AS total_gambar'); // Ngitung total gambar
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_users = produk.id_users', 'left');
		$this->db->join('merk', 'merk.id_merk = produk.id_merk', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left'); // Ngitung total gambar
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.slug_produk', $slug_produk);
		$this->db->group_by('produk.id_produk'); // Ngitung total gambar
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing Produk 
	public function produk($limit, $start)
	{
		$this->db->select('produk.*,
							users.nama,
							merk.nama_merk,
							merk.slug_merk,
							COUNT(gambar.id_gambar) AS total_gambar'); // Ngitung total gambar
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_users = produk.id_users', 'left');
		$this->db->join('merk', 'merk.id_merk = produk.id_merk', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left'); // Ngitung total gambar
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk'); // Ngitung total gambar
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}

	// Total produk
	public function total_produk()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$query	= $this->db->get();
		return $query->row();
	}

	// Listing merk Produk 
	public function merk($id_merk, $limit, $start)
	{
		$this->db->select('produk.*,
							users.nama,
							merk.nama_merk,
							merk.slug_merk,
							COUNT(gambar.id_gambar) AS total_gambar'); // Ngitung total gambar
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_users = produk.id_users', 'left');
		$this->db->join('merk', 'merk.id_merk = produk.id_merk', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left'); // Ngitung total gambar
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.id_merk', $id_merk);
		$this->db->group_by('produk.id_produk'); // Ngitung total gambar
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}

	// Total merk produk
	public function total_merk($id_merk)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$this->db->where('id_merk', $id_merk);
		$query	= $this->db->get();
		return $query->row();
	}

	// Listing merk
	public function listing_merk()
	{
		$this->db->select('produk.*,
							users.nama,
							merk.nama_merk,
							merk.slug_merk,
							COUNT(gambar.id_gambar) AS total_gambar'); // Ngitung total gambar
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_users = produk.id_users', 'left');
		$this->db->join('merk', 'merk.id_merk = produk.id_merk', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left'); // Ngitung total gambar
		// END JOIN
		$this->db->group_by('produk.id_merk'); // Ngitung total gambar
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail produk 
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail gambar produk 
	public function detail_gambar($id_gambar)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_gambar', $id_gambar);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Gambar
	public function gambar($id_produk)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('produk', $data);
	}

	// Tambah Gambar
	public function tambah_gambar($data)
	{
		$this->db->insert('gambar', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk', $data);
	}

	// Delete gambar
	public function delete_gambar($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar', $data);
	}
}


/* End of file Modelproduk.php */
