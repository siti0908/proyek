<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembekalan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MPembekalan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembekalan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembekalan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembekalan/index.html';
            $config['first_url'] = base_url() . 'pembekalan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MPembekalan->total_rows($q);
        $pembekalan = $this->MPembekalan->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembekalan_data' => $pembekalan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $data['page'] = 'pembekalan/pembekalan_list';
         $this->load->view('template', $data);
        //$this->load->view('pembekalan/pembekalan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MPembekalan->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tanggal_pembekalan' => $row->tanggal_pembekalan,
		'daftar_hadir' => $row->daftar_hadir,
		'Materi' => $row->Materi,
	    );
            $data['page'] = 'pembekalan/pembekalan_read';
            $this->load->view('template', $data);
            //$this->load->view('pembekalan/pembekalan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembekalan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembekalan/create_action'),
	    'id' => set_value('id'),
	    'tanggal_pembekalan' => set_value('tanggal_pembekalan'),
	    'daftar_hadir' => set_value('daftar_hadir'),
	    'Materi' => set_value('Materi'),
	);
        
        $data['page'] = 'pembekalan/pembekalan_form';
        $this->load->view('template', $data);
        //$this->load->view('pembekalan/pembekalan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'daftar_hadir' => $this->input->post('daftar_hadir',TRUE),
		'Materi' => $this->input->post('Materi',TRUE),
	    );

            $this->MPembekalan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembekalan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MPembekalan->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembekalan/update_action'),
		'id' => set_value('id', $row->id),
		'tanggal_pembekalan' => set_value('tanggal_pembekalan', $row->tanggal_pembekalan),
		'daftar_hadir' => set_value('daftar_hadir', $row->daftar_hadir),
		'Materi' => set_value('Materi', $row->Materi),
	    );
            $data['page'] = 'pembekalan/pembekalan_form';
            $this->load->view('template', $data);
            //$this->load->view('pembekalan/pembekalan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembekalan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'daftar_hadir' => $this->input->post('daftar_hadir',TRUE),
		'Materi' => $this->input->post('Materi',TRUE),
	    );

            $this->MPembekalan->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembekalan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MPembekalan->get_by_id($id);

        if ($row) {
            $this->MPembekalan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembekalan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembekalan'));
        }
    }

    public function _rules() 
    {
	
	$this->form_validation->set_rules('daftar_hadir', 'daftar hadir', 'trim|required');
	$this->form_validation->set_rules('Materi', 'materi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pembekalan.xls";
        $judul = "pembekalan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pembekalan");
	xlsWriteLabel($tablehead, $kolomhead++, "Daftar Hadir");
	xlsWriteLabel($tablehead, $kolomhead++, "Materi");

	foreach ($this->MPembekalan->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pembekalan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->daftar_hadir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Materi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pembekalan.php */
/* Location: ./application/controllers/Pembekalan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-11 10:49:28 */
/* http://harviacode.com */