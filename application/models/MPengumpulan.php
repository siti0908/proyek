<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MPengumpulan extends CI_Model
{

    public $table = 'pengumpulan';
    public $id = 'id_pengumpulan';
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
        $this->db->like('id_pengumpulan', $q);
    $this->db->or_like('npm', $q);
	$this->db->or_like('id_mahasiswa', $q);
	
	$this->db->or_like('tanggal_kumpul', $q);
    $this->db->or_like('judul', $q);
    $this->db->or_like('pembimbing', $q);
	$this->db->or_like('proposal', $q);
	$this->db->or_like('laporan', $q);
	$this->db->or_like('dpl', $q);
	$this->db->or_like('buku_bimbingan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
    //join tabel mahasiswa
    $this->db->select('p.*,m.npm,m.nama_mahasiswa');
    $this->db->from('pengumpulan p');
    $this->db->join('mahasiswa m', 'm.id_mahasiswa = p.id_mahasiswa');

    $this->db->order_by('p.id_pengumpulan', $this->order);
 //    $this->db->like('p.id_pengumpulan', $q);
 //    $this->db->or_like('p.npm', $q);
	// $this->db->or_like('p.id_mahasiswa', $q);
     //$this->db->or_like('p.judul', $q);
	// $this->db->or_like('p.tanggal_kumpul', $q);
	// $this->db->or_like('p.proposal', $q);
	// $this->db->or_like('p.laporan', $q);
	// $this->db->or_like('p.dpl', $q);
	// $this->db->or_like('p.buku_bimbingan', $q);
    if($_SESSION['hak_akses']=='M'){
        $this->db->where('m.npm',$_SESSION['npm']);
    }
    
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
        //echo $this->db->last_query();exit;
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
