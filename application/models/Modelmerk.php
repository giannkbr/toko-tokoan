<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Modelmerk extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all merk 
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('merk');
		$this->db->order_by('id_merk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail merk 
	public function detail($id_merk)
	{
		$this->db->select('*');
		$this->db->from('merk');
		$this->db->where('id_merk', $id_merk);
		$this->db->order_by('id_merk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail slug merk 
	public function read($slug_merk)
	{
		$this->db->select('*');
		$this->db->from('merk');
		$this->db->where('slug_merk', $slug_merk);
		$this->db->order_by('id_merk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data)
	{
		$this->db->insert('merk', $data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_merk', $data['id_merk']);
		$this->db->update('merk', $data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('id_merk', $data['id_merk']);
		$this->db->delete('merk', $data);
	}
}

/* End of file Modelmerk.php */
