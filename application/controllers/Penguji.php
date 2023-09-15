<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penguji extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MPenguji');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penguji/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penguji/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penguji/index.html';
            $config['first_url'] = base_url() . 'penguji/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MPenguji->total_rows($q);
        $penguji = $this->MPenguji->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penguji_data' => $penguji,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'penguji/penguji_list';
        $this->load->view('template', $data);
        //$this->load->view('penguji/penguji_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MPenguji->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penguji' => $row->id_penguji,
		'nik_penguji' => $row->nik_penguji,
		'nama_penguji' => $row->nama_penguji,
		'jenis_kelamin' => $row->jenis_kelamin,
	    );
            $data['page'] = 'penguji/penguji_read';
            $this->load->view('template', $data);
            //$this->load->view('penguji/penguji_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penguji'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penguji/create_action'),
	    'id_penguji' => set_value('id_penguji'),
	    'nik_penguji' => set_value('nik_penguji'),
	    'nama_penguji' => set_value('nama_penguji'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	);
        $data['page'] = 'penguji/penguji_form';
        $this->load->view('template', $data);
        //$this->load->view('penguji/penguji_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik_penguji' => $this->input->post('nik_penguji',TRUE),
		'nama_penguji' => $this->input->post('nama_penguji',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
	    );

            $this->MPenguji->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penguji'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MPenguji->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penguji/update_action'),
		'id_penguji' => set_value('id_penguji', $row->id_penguji),
		'nik_penguji' => set_value('nik_penguji', $row->nik_penguji),
		'nama_penguji' => set_value('nama_penguji', $row->nama_penguji),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
	    );
            $data['page'] = 'penguji/penguji_form';
            $this->load->view('template', $data);
            //$this->load->view('penguji/penguji_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penguji'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penguji', TRUE));
        } else {
            $data = array(
		'nik_penguji' => $this->input->post('nik_penguji',TRUE),
		'nama_penguji' => $this->input->post('nama_penguji',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
	    );

            $this->MPenguji->update($this->input->post('id_penguji', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penguji'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MPenguji->get_by_id($id);

        if ($row) {
            $this->MPenguji->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penguji'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penguji'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik_penguji', 'nik penguji', 'trim|required');
	$this->form_validation->set_rules('nama_penguji', 'nama penguji', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');

	$this->form_validation->set_rules('id_penguji', 'id_penguji', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penguji.xls";
        $judul = "penguji";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nik Penguji");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Penguji");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");

	foreach ($this->MPenguji->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nik_penguji);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_penguji);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Penguji.php */
/* Location: ./application/controllers/Penguji.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-21 11:33:25 */
/* http://harviacode.com */