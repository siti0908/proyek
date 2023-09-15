<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bimbingan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('MBimbingan', 'MMahasiswa', 'MDosen'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bimbingan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bimbingan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bimbingan/index?q';
            $config['first_url'] = base_url() . 'bimbingan/index?q';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MBimbingan->total_rows($q);
        $bimbingan = $this->MBimbingan->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bimbingan_data' => $bimbingan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'bimbingan/bimbingan_list';
        $this->load->view('template', $data);
        //$this->load->view('bimbingan/bimbingan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MBimbingan->get_by_id($id);
        if ($row) {
            $data = array(
		'id_bimbingan' => $row->id_bimbingan,
		'id_dosen' => $row->id_dosen,
		'id_mahasiswa' => $row->id_mahasiswa,
		'npm' => $row->npm,
		'tanggal_bimbingan' => $row->tanggal_bimbingan,
		'materi' => $row->materi,
		'upload_file' => $row->upload_file,
	    );
            $data['page'] = 'bimbingan/bimbingan_read';
            $this->load->view('template', $data);
            //$this->load->view('bimbingan/bimbingan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bimbingan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bimbingan/create_action'),
	    'id_bimbingan' => set_value('id_bimbingan'),
	    'id_dosen' => set_value('id_dosen'),
	    'id_mahasiswa' => set_value('id_mahasiswa'),
	    'npm' => set_value('npm'),
	    'tanggal_bimbingan' => set_value('tanggal_bimbingan'),
	    'materi' => set_value('materi'),
	    'upload_file' => set_value('upload_file'),
	);
        //join tabel mahasiswa dan tabel mahasiswa
        $data['list_mahasiswa'] =  $this->MMahasiswa->get_all();
        $data['list_dosen'] =  $this->MDosen->get_all();
        $data['page'] = 'bimbingan/bimbingan_form';
        $this->load->view('template', $data);
        //$this->load->view('bimbingan/bimbingan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        $npm = $this->MMahasiswa->get_by_id($this->input->post('id_mahasiswa',TRUE));
    

            $Upload_File = $_FILES['upload_file'];
            if($Upload_File=''){}else{
            $config['upload_path']   ='./assets/file/bimbingan';
            $config['allowed_types'] = 'jpg|jpeg|gif|pdf|docx';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('upload_file')){
                echo "Upload Gagal"; die();
            }else{

                $Upload_File=$this->upload->data('file_name');
                print_r($Upload_File);
            }
        }
            $data = array(
        'upload_file' =>$Upload_File,
        'npm' =>$_SESSION['username'],
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
		'materi' => $this->input->post('materi',TRUE),
		
	    );

            $this->MBimbingan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bimbingan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MBimbingan->get_by_id($id);

        if ($row) {
            $data = array(
        'button' => 'Update',
        'action' => site_url('bimbingan/update_action'),
		'id_bimbingan' => set_value('id_bimbingan', $row->id_bimbingan),
		'id_dosen' => set_value('id_dosen', $row->id_dosen),
		'id_mahasiswa' => set_value('id_mahasiswa', $row->id_mahasiswa),
		'npm' => set_value('npm', $row->npm),
		'tanggal_bimbingan' => set_value('tanggal_bimbingan', $row->tanggal_bimbingan),
		'materi' => set_value('materi', $row->materi),
		'upload_file' => set_value('upload_file', $row->upload_file),
	    );
            //join tabel mahasiswa dan tabel mahasiswa
            $data['list_mahasiswa'] =  $this->MMahasiswa->get_all();
            $data['list_dosen'] =  $this->MDosen->get_all();
            $data['page'] = 'bimbingan/bimbingan_form';
            $this->load->view('template', $data);
            //$this->load->view('bimbingan/bimbingan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bimbingan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bimbingan', TRUE));
        } else {
       
            $data = array(
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
		'npm' => $this->input->post('npm',TRUE),
		'materi' => $this->input->post('materi',TRUE),
		'upload_file' => $this->input->post('upload_file',TRUE),
	    );

            $this->MBimbingan->update($this->input->post('id_bimbingan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bimbingan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MBimbingan->get_by_id($id);

        if ($row) {
            $this->MBimbingan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bimbingan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bimbingan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_dosen', 'id dosen', 'trim|required');
	$this->form_validation->set_rules('id_mahasiswa', 'id mahasiswa', 'trim|required');
	//$this->form_validation->set_rules('npm', 'npm', 'trim|required');
	//$this->form_validation->set_rules('materi', 'materi', 'trim|required');
	//$this->form_validation->set_rules('upload_file', 'upload file', 'trim|required');

	//$this->form_validation->set_rules('id_bimbingan', 'id_bimbingan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "bimbingan.xls";
        $judul = "bimbingan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Mahasiswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Npm");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Bimbingan");
	xlsWriteLabel($tablehead, $kolomhead++, "Materi");
	xlsWriteLabel($tablehead, $kolomhead++, "Upload File");

	foreach ($this->MBimbingan->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_dosen);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_mahasiswa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->npm);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_bimbingan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->materi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->upload_file);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}
