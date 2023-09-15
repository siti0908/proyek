<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MDokumen_akhir extends CI_Model
{

    public $table = 'dokumen_akhir';
    public $id = 'id_dokumen_akhir';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
    $this->db->like('id_dokumen_akhir', $q);
	$this->db->or_like('npm', $q);
	$this->db->or_like('id_mahasiswa', $q);
	$this->db->or_like('tanggal_kumpul', $q);
	$this->db->or_like('upload_file', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
    //join tabel dosen dan tabel mahasiswa
    $this->db->select('da.*,m.npm,m.nama_mahasiswa');
    $this->db->from('dokumen_akhir da');
    $this->db->join('mahasiswa m', 'm.id_mahasiswa = da.id_mahasiswa');




    $this->db->order_by('da.id_dokumen_akhir', $this->order);
    $this->db->like('da.id_dokumen_akhir', $q);
	$this->db->or_like('da.npm', $q);
	$this->db->or_like('da.id_mahasiswa', $q);
	$this->db->or_like('da.tanggal_kumpul', $q);
	$this->db->or_like('da.upload_file', $q);
	$this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

