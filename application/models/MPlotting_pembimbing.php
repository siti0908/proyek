<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MPlotting_pembimbing extends CI_Model
{

    public $table = 'plotting_pembimbing';
    public $id = 'id_plotting_pembimbing';
    public $order = 'ASC';

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
    $this->db->like('id_plotting_pembimbing', $q);
	$this->db->or_like('id_dosen', $q);
	$this->db->or_like('nama_dosen', $q);
	$this->db->or_like('nama_mahasiswa', $q);
	$this->db->or_like('id_mahasiswa', $q);
	$this->db->or_like('tingkat', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
    //join tabel dosen dan tabel mahasiswa
    $this->db->select('pp.*,d.nik_dosen,m.nama_mahasiswa,m.npm');
    $this->db->from('plotting_pembimbing pp');
    $this->db->join('dosen d', 'd.id_dosen = pp.id_dosen');
    $this->db->join('mahasiswa m', 'm.id_mahasiswa = pp.id_mahasiswa');


    $this->db->order_by('pp.id_plotting_pembimbing', $this->order);
    $this->db->like('pp.id_plotting_pembimbing', $q);
	$this->db->or_like('pp.id_dosen', $q);
	$this->db->or_like('pp.nama_dosen', $q);
	$this->db->or_like('pp.nama_mahasiswa', $q);
	$this->db->or_like('pp.id_mahasiswa', $q);
	$this->db->or_like('pp.tingkat', $q);
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
