<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MSidang extends CI_Model
{

    public $table = 'sidang';
    public $id = 'id_sidang';
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
        $this->db->like('id_sidang', $q);
	$this->db->or_like('tanggal_sidang', $q);
	$this->db->or_like('id_mahasiswa', $q);
	$this->db->or_like('id_dosen', $q);
	$this->db->or_like('id_penguji', $q);
	$this->db->or_like('hasil_keputusan_sidang', $q);
	$this->db->or_like('catatan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
    //join
    $this->db->select('s.*,d.nama_dosen, m.nama_mahasiswa, p.nama_penguji');
    $this->db->from('sidang s');
    $this->db->join('dosen d', 'd.id_dosen = s.id_dosen');
    $this->db->join('mahasiswa m', 'm.id_mahasiswa = s.id_mahasiswa');
    $this->db->join('penguji p', 'p.id_penguji = s.id_penguji');

    $this->db->order_by('s.id_sidang', $this->order);
    $this->db->like('s.id_sidang', $q);
	$this->db->or_like('s.tanggal_sidang', $q);
	$this->db->or_like('s.id_mahasiswa', $q);
	$this->db->or_like('s.id_dosen', $q);
	$this->db->or_like('s.id_penguji', $q);
	$this->db->or_like('s.hasil_keputusan_sidang', $q);
	$this->db->or_like('s.catatan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
    function get_laporan_kelulusan( $awal = NULL , $akhir = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('tanggal_sidang >=', $awal);
        $this->db->where('tanggal_sidang <=', $akhir);
       return $this->db->get($this->table)->result();
       //$this->db->get($this->table)->result();
       //echo $this->db->last_query(); exit;
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
