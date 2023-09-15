<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sidang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('MSidang', 'MMahasiswa', 'MDosen', 'MPenguji'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sidang/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sidang/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sidang/index?q';
            $config['first_url'] = base_url() . 'sidang/index?q';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MSidang->total_rows($q);
        $sidang = $this->MSidang->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sidang_data' => $sidang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'sidang/sidang_list';
        $this->load->view('template', $data);
        //$this->load->view('sidang/sidang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MSidang->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sidang' => $row->id_sidang,
		'tanggal_sidang' => $row->tanggal_sidang,
		'id_mahasiswa' => $row->id_mahasiswa,
		'id_dosen' => $row->id_dosen,
		'id_penguji' => $row->id_penguji,
		'hasil_keputusan_sidang' => $row->hasil_keputusan_sidang,
		'catatan' => $row->catatan,
	    );
            $data['page'] = 'sidang/sidang_read';
            $this->load->view('template', $data);
            //$this->load->view('sidang/sidang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sidang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sidang/create_action'),
	    'id_sidang' => set_value('id_sidang'),
	    'tanggal_sidang' => set_value('tanggal_sidang'),
	    'id_mahasiswa' => set_value('id_mahasiswa'),
	    'id_dosen' => set_value('id_dosen'),
	    'id_penguji' => set_value('id_penguji'),
	    'hasil_keputusan_sidang' => set_value('hasil_keputusan_sidang'),
	    'catatan' => set_value('catatan'),
	);
         //join tabel mahasiswa dan dosen
        $data['list_penguji'] =  $this->MPenguji->get_all();
        $data['list_mahasiswa'] =  $this->MMahasiswa->get_all();
        $data['list_dosen'] =  $this->MDosen->get_all();
        $data['page'] = 'sidang/sidang_form';
        $this->load->view('template', $data);
        //$this->load->view('sidang/sidang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
       

            $data = array(
		'tanggal_sidang' => $this->input->post('tanggal_sidang',TRUE),
		'id_penguji' => $this->input->post('id_penguji',TRUE),
        'id_dosen' => $this->input->post('id_dosen',TRUE),
        'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
		'hasil_keputusan_sidang' => $this->input->post('hasil_keputusan_sidang',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->MSidang->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sidang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MSidang->get_by_id($id);
        if ($row) {
            $data = array(
        'button' => 'Update',
        'action' => site_url('sidang/update_action'),
		'id_sidang' => set_value('id_sidang', $row->id_sidang),
		'tanggal_sidang' => set_value('tanggal_sidang', $row->tanggal_sidang),
		'id_mahasiswa' => set_value('id_mahasiswa', $row->id_mahasiswa),
		'id_dosen' => set_value('id_dosen', $row->id_dosen),
		'id_penguji' => set_value('id_penguji', $row->id_penguji),
		'hasil_keputusan_sidang' => set_value('hasil_keputusan_sidang', $row->hasil_keputusan_sidang),
		'catatan' => set_value('catatan', $row->catatan),
	    );
             //join tabel mahasiswa dan dosen
             $data['list_penguji'] =  $this->MPenguji->get_all();
            $data['list_mahasiswa'] =  $this->MMahasiswa->get_all();
            $data['list_dosen'] =  $this->MDosen->get_all();
             $data['page'] = 'sidang/sidang_form';
            $this->load->view('template', $data);
            //$this->load->view('sidang/sidang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sidang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sidang', TRUE));
        } else {
            $data = array(
		'tanggal_sidang' => $this->input->post('tanggal_sidang',TRUE),
		'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'id_penguji' => $this->input->post('id_penguji',TRUE),
		'hasil_keputusan_sidang' => $this->input->post('hasil_keputusan_sidang',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->MSidang->update($this->input->post('id_sidang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sidang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MSidang->get_by_id($id);

        if ($row) {
            $this->MSidang->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sidang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sidang'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('tanggal_sidang', 'tanggal sidang', 'trim|required');
	$this->form_validation->set_rules('id_mahasiswa', 'id mahasiswa', 'trim|required');
	$this->form_validation->set_rules('id_dosen', 'id dosen', 'trim|required');
	$this->form_validation->set_rules('id_penguji', 'id penguji', 'trim|required');
	//$this->form_validation->set_rules('hasil_keputusan_sidang', 'hasil keputusan sidang', 'trim|required');
	//$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');

	$this->form_validation->set_rules('id_sidang', 'id_sidang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sidang.xls";
        $judul = "sidang";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Sidang");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Mahasiswa");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Dosen");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Penguji");
    	xlsWriteLabel($tablehead, $kolomhead++, "Hasil Keputusan Sidang");
	    xlsWriteLabel($tablehead, $kolomhead++, "Catatan");

	foreach ($this->MSidang->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_sidang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_mahasiswa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_penguji);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hasil_keputusan_sidang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->catatan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Sidang.php */
/* Location: ./application/controllers/Sidang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-05 15:28:25 */
/* http://harviacode.com */