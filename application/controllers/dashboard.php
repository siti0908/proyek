<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function index()
	{
		$data['page'] = 'dashboard_view';
		$data['jml_pengumpulan']=$this->db->query("SELECT * from pengumpulan")->num_rows();
		$data['jml_sidang']=$this->db->query("SELECT * from sidang")->num_rows();
		$data['jml_dokumen_akhir']=$this->db->query("SELECT * from dokumen_akhir")->num_rows();
		$data['jml_user']=$this->db->query("SELECT * from user")->num_rows();
		// print_r($jml_pengumpulan);die;
		$this->load->view('template', $data);
		//$this->load->view('dashboard_view');
	}
}
