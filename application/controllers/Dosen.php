<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MDosen');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'dosen/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dosen/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dosen/index?q';
            $config['first_url'] = base_url() . 'dosen/index?q';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MDosen->total_rows($q);
        $dosen = $this->MDosen->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dosen_data' => $dosen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'dosen/dosen_list';
        $this->load->view('template', $data);
        //$this->load->view('dosen/dosen_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MDosen->get_by_id($id);
        if ($row) {
            $data = array(
		'id_dosen' => $row->id_dosen,
		'nik_dosen' => $row->nik_dosen,
		'nama_dosen' => $row->nama_dosen,
	    );
            $data['page'] = 'dosen/dosen_read';
            $this->load->view('template', $data);
            //$this->load->view('dosen/dosen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function create() 
    {
        $data = array(
        'button' => 'Create',
        'action' => site_url('dosen/create_action'),
	    'id_dosen' => set_value('id_dosen'),
	    'nik_dosen' => set_value('nik_dosen'),
	    'nama_dosen' => set_value('nama_dosen'),
	);
        $data['page'] = 'dosen/dosen_form';
        $this->load->view('template', $data);
        //$this->load->view('dosen/dosen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik_dosen' => $this->input->post('nik_dosen',TRUE),
		'nama_dosen' => $this->input->post('nama_dosen',TRUE),
	    );

            $this->MDosen->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dosen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MDosen->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dosen/update_action'),
		'id_dosen' => set_value('id_dosen', $row->id_dosen),
		'nik_dosen' => set_value('nik_dosen', $row->nik_dosen),
		'nama_dosen' => set_value('nama_dosen', $row->nama_dosen),
	    );
            $data['page'] = 'dosen/dosen_form';
            $this->load->view('template', $data);
            //$this->load->view('dosen/dosen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dosen', TRUE));
        } else {
            $data = array(
		'nik_dosen' => $this->input->post('nik_dosen',TRUE),
		'nama_dosen' => $this->input->post('nama_dosen',TRUE),
	    );

            $this->MDosen->update($this->input->post('id_dosen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dosen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MDosen->get_by_id($id);

        if ($row) {
            $this->MDosen->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dosen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik_dosen', 'nik dosen', 'trim|required');
	$this->form_validation->set_rules('nama_dosen', 'nama dosen', 'trim|required');

	$this->form_validation->set_rules('id_dosen', 'id_dosen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "dosen.xls";
        $judul = "dosen";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nik Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Dosen");

	foreach ($this->MDosen->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nik_dosen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_dosen);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-01 09:08:46 */
/* http://harviacode.com */