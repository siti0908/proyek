<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MMahasiswa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mahasiswa/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mahasiswa/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mahasiswa/index?q';
            $config['first_url'] = base_url() . 'mahasiswa/index?q';
        }

        $config['per_page'] = 8;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MMahasiswa->total_rows($q);
        $mahasiswa = $this->MMahasiswa->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mahasiswa_data' => $mahasiswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'mahasiswa/mahasiswa_list';
        $this->load->view('template', $data);
        //$this->load->view('mahasiswa/mahasiswa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MMahasiswa->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mahasiswa' => $row->id_mahasiswa,
		'npm' => $row->npm,
		'nama_mahasiswa' => $row->nama_mahasiswa,
		'tingkat' => $row->tingkat,
		'Jenis_Kelamin' => $row->Jenis_Kelamin,
	    );
            $data['page'] = 'mahasiswa/mahasiswa_read';
            $this->load->view('template', $data);
            //$this->load->view('mahasiswa/mahasiswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mahasiswa/create_action'),
	    'id_mahasiswa' => set_value('id_mahasiswa'),
	    'npm' => set_value('npm'),
	    'nama_mahasiswa' => set_value('nama_mahasiswa'),
	    'tingkat' => set_value('tingkat'),
	    'Jenis_Kelamin' => set_value('Jenis_Kelamin'),
	);
        $data['page'] = 'mahasiswa/mahasiswa_form';
        $this->load->view('template', $data);
        //$this->load->view('mahasiswa/mahasiswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'npm' => $this->input->post('npm',TRUE),
		'nama_mahasiswa' => $this->input->post('nama_mahasiswa',TRUE),
		'tingkat' => $this->input->post('tingkat',TRUE),
		'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin',TRUE),
	    );

            $this->MMahasiswa->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MMahasiswa->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mahasiswa/update_action'),
		'id_mahasiswa' => set_value('id_mahasiswa', $row->id_mahasiswa),
		'npm' => set_value('npm', $row->npm),
		'nama_mahasiswa' => set_value('nama_mahasiswa', $row->nama_mahasiswa),
		'tingkat' => set_value('tingkat', $row->tingkat),
		'Jenis_Kelamin' => set_value('Jenis_Kelamin', $row->Jenis_Kelamin),
	    );
            $data['page'] = 'mahasiswa/mahasiswa_form';
            $this->load->view('template', $data);
            //$this->load->view('mahasiswa/mahasiswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mahasiswa', TRUE));
        } else {
            $data = array(
		'npm' => $this->input->post('npm',TRUE),
		'nama_mahasiswa' => $this->input->post('nama_mahasiswa',TRUE),
		'tingkat' => $this->input->post('tingkat',TRUE),
		'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin',TRUE),
	    );

            $this->MMahasiswa->update($this->input->post('id_mahasiswa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MMahasiswa->get_by_id($id);

        if ($row) {
            $this->MMahasiswa->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mahasiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('npm', 'npm', 'trim|required');
	$this->form_validation->set_rules('nama_mahasiswa', 'nama mahasiswa', 'trim|required');
	$this->form_validation->set_rules('tingkat', 'tingkat', 'trim|required');
	$this->form_validation->set_rules('Jenis_Kelamin', 'jenis kelamin', 'trim|required');

	$this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mahasiswa.xls";
        $judul = "mahasiswa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Npm");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Mahasiswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Tingkat");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");

	foreach ($this->MMahasiswa->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->npm);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_mahasiswa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tingkat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jenis_Kelamin);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-08-10 19:06:48 */
/* http://harviacode.com */