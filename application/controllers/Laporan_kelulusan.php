<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_kelulusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('MLaporan_kelulusan','MSidang'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan_kelulusan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan_kelulusan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan_kelulusan/index.html';
            $config['first_url'] = base_url() . 'laporan_kelulusan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MLaporan_kelulusan->total_rows($q);
        $laporan_kelulusan = $this->MLaporan_kelulusan->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_kelulusan_data' => $laporan_kelulusan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'laporan_kelulusan/laporan_kelulusan_list';
        $this->load->view('template', $data);
        //$this->load->view('laporan_kelulusan/laporan_kelulusan_list', $data);
    }
    function tampillaporan(){ 
    $awal = $this->input->post('txtTglAwal',TRUE);
    $akhir = $this->input->post('txtTglAkhir',TRUE);
    $data['laporan_kelulusan_data'] = $this->MSidang->get_laporan_kelulusan($awal, $akhir);
    $data['page'] = 'laporan_kelulusan/laporan_kelulusan_list';
    $this->load->view('template', $data);
    //$this->load->view('laporan/laporan_list', $data);
}

    public function read($id) 
    {
        $row = $this->MLaporan_kelulusan->get_by_id($id);
        if ($row) {
            $data = array(
		'id_laporan_kelulusan' => $row->id_laporan_kelulusan,
		'tanggal_sidang' => $row->tanggal_sidang,
		'id_mahasiswa' => $row->id_mahasiswa,
		'id_dosen' => $row->id_dosen,
		'id_penguji' => $row->id_penguji,
		'hasil_keputusan_sidang' => $row->hasil_keputusan_sidang,
		'catatan' => $row->catatan,
	    );
            $this->load->view('laporan_kelulusan/laporan_kelulusan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_kelulusan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan_kelulusan/create_action'),
	    'id_laporan_kelulusan' => set_value('id_laporan_kelulusan'),
	    'tanggal_sidang' => set_value('tanggal_sidang'),
	    'id_mahasiswa' => set_value('id_mahasiswa'),
	    'id_dosen' => set_value('id_dosen'),
	    'id_penguji' => set_value('id_penguji'),
	    'hasil_keputusan_sidang' => set_value('hasil_keputusan_sidang'),
	    'catatan' => set_value('catatan'),
	);
        $data['page'] = 'laporan_kelulusan/laporan_kelulusan_form';
        $this->load->view('template', $data);
        //$this->load->view('laporan_kelulusan/laporan_kelulusan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal_sidang' => $this->input->post('tanggal_sidang',TRUE),
		'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'id_penguji' => $this->input->post('id_penguji',TRUE),
		'hasil_keputusan_sidang' => $this->input->post('hasil_keputusan_sidang',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->MLaporan_kelulusan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('laporan_kelulusan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MLaporan_kelulusan->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporan_kelulusan/update_action'),
		'id_laporan_kelulusan' => set_value('id_laporan_kelulusan', $row->id_laporan_kelulusan),
		'tanggal_sidang' => set_value('tanggal_sidang', $row->tanggal_sidang),
		'id_mahasiswa' => set_value('id_mahasiswa', $row->id_mahasiswa),
		'id_dosen' => set_value('id_dosen', $row->id_dosen),
		'id_penguji' => set_value('id_penguji', $row->id_penguji),
		'hasil_keputusan_sidang' => set_value('hasil_keputusan_sidang', $row->hasil_keputusan_sidang),
		'catatan' => set_value('catatan', $row->catatan),
	    );
            $data['page'] = 'laporan_kelulusan/laporan_kelulusan_form';
            $this->load->view('template', $data);
            //$this->load->view('laporan_kelulusan/laporan_kelulusan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_kelulusan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_laporan_kelulusan', TRUE));
        } else {
            $data = array(
		'tanggal_sidang' => $this->input->post('tanggal_sidang',TRUE),
		'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'id_penguji' => $this->input->post('id_penguji',TRUE),
		'hasil_keputusan_sidang' => $this->input->post('hasil_keputusan_sidang',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->MLaporan_kelulusan->update($this->input->post('id_laporan_kelulusan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('laporan_kelulusan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MLaporan_kelulusan->get_by_id($id);

        if ($row) {
            $this->MLaporan_kelulusan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('laporan_kelulusan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporan_kelulusan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal_sidang', 'tanggal sidang', 'trim|required');
	$this->form_validation->set_rules('id_mahasiswa', 'id mahasiswa', 'trim|required');
	$this->form_validation->set_rules('id_dosen', 'id dosen', 'trim|required');
	$this->form_validation->set_rules('id_penguji', 'id penguji', 'trim|required');
	$this->form_validation->set_rules('hasil_keputusan_sidang', 'hasil keputusan sidang', 'trim|required');
	$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');

	$this->form_validation->set_rules('id_laporan_kelulusan', 'id_laporan_kelulusan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Laporan_kelulusan.php */
/* Location: ./application/controllers/Laporan_kelulusan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-27 12:11:26 */
/* http://harviacode.com */