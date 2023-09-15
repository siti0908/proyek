<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembimbing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MPembimbing');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembimbing/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembimbing/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembimbing/index.html';
            $config['first_url'] = base_url() . 'pembimbing/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MPembimbing->total_rows($q);
        $pembimbing = $this->MPembimbing->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembimbing_data' => $pembimbing,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'pembimbing/pembimbing_list';
        $this->load->view('template', $data);
        //$this->load->view('pembimbing/pembimbing_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MPembimbing->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pembimbing' => $row->id_pembimbing,
		'nik_penguji' => $row->nik_penguji,
		'nama_pembimbing' => $row->nama_pembimbing,
		'jenis_kelamin' => $row->jenis_kelamin,
	    );
            $data['page'] = 'pembimbing/pembimbing_read';
            $this->load->view('template', $data);
            //$this->load->view('pembimbing/pembimbing_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembimbing'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembimbing/create_action'),
	    'id_pembimbing' => set_value('id_pembimbing'),
	    'nik_penguji' => set_value('nik_penguji'),
	    'nama_pembimbing' => set_value('nama_pembimbing'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	);
        $data['page'] = 'pembimbing/pembimbing_form';
        $this->load->view('template', $data);
        //$this->load->view('pembimbing/pembimbing_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik_penguji' => $this->input->post('nik_penguji',TRUE),
		'nama_pembimbing' => $this->input->post('nama_pembimbing',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
	    );

            $this->MPembimbing->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembimbing'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MPembimbing->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembimbing/update_action'),
		'id_pembimbing' => set_value('id_pembimbing', $row->id_pembimbing),
		'nik_penguji' => set_value('nik_penguji', $row->nik_penguji),
		'nama_pembimbing' => set_value('nama_pembimbing', $row->nama_pembimbing),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
	    );
            $data['page'] = 'pembimbing/pembimbing_form';
            $this->load->view('template', $data);
            //$this->load->view('pembimbing/pembimbing_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembimbing'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembimbing', TRUE));
        } else {
            $data = array(
		'nik_penguji' => $this->input->post('nik_penguji',TRUE),
		'nama_pembimbing' => $this->input->post('nama_pembimbing',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
	    );

            $this->MPembimbing->update($this->input->post('id_pembimbing', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembimbing'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MPembimbing->get_by_id($id);

        if ($row) {
            $this->MPembimbing->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembimbing'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembimbing'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik_penguji', 'nik penguji', 'trim|required');
	$this->form_validation->set_rules('nama_pembimbing', 'nama pembimbing', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');

	$this->form_validation->set_rules('id_pembimbing', 'id_pembimbing', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pembimbing.xls";
        $judul = "pembimbing";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pembimbing");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");

	foreach ($this->MPembimbing->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nik_penguji);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pembimbing);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pembimbing.php */
/* Location: ./application/controllers/Pembimbing.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-06-26 13:37:35 */
/* http://harviacode.com */