<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dokumen_akhir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('MDokumen_akhir', 'MMahasiswa'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'dokumen_akhir/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dokumen_akhir/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dokumen_akhir/index.html';
            $config['first_url'] = base_url() . 'dokumen_akhir/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MDokumen_akhir->total_rows($q);
        $dokumen_akhir = $this->MDokumen_akhir->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dokumen_akhir_data' => $dokumen_akhir,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'dokumen_akhir/dokumen_akhir_list';
        $this->load->view('template', $data);
        //$this->load->view('dokumen_akhir/dokumen_akhir_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MDokumen_akhir->get_by_id($id);
        if ($row) {
        $data = array(
		'id_dokumen_akhir' => $row->id_dokumen_akhir,
		'npm' => $row->npm,
		'id_mahasiswa' => $row->id_mahasiswa,
		'tanggal_kumpul' => $row->tanggal_kumpul,
		'upload_file' => $row->upload_file,
	    );
            $data['page'] = 'dokumen_akhir/dokumen_akhir_read';
            $this->load->view('template', $data);
            //$this->load->view('dokumen_akhir/dokumen_akhir_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dokumen_akhir'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dokumen_akhir/create_action'),
	    'id_dokumen_akhir' => set_value('id_dokumen_akhir'),
	    'npm' => set_value('npm'),
	    'id_mahasiswa' => set_value('id_mahasiswa'),
	    'tanggal_kumpul' => set_value('tanggal_kumpul'),
	    'upload_file' => set_value('upload_file'),
	);
          //join tabel mahasiswa
        $data['list_mahasiswa'] =  $this->MMahasiswa->get_all();
        $data['page'] = 'dokumen_akhir/dokumen_akhir_form';
        $this->load->view('template', $data);
        //$this->load->view('dokumen_akhir/dokumen_akhir_form', $data);
    }
    
    public function create_action() 
    {
        //print_r($_FILES);
             //print_r($_POST);
             //exit();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
             $npm = $this->MMahasiswa->get_by_id($this->input->post('id_mahasiswa',TRUE));

            $Upload_File = $_FILES['upload_file'];
            if($Upload_File=''){}else{
            $config['upload_path']   ='./assets/file/dokumen_akhir';
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
		'npm' => $npm->npm,
		'id_mahasiswa' =>  $this->input->post('id_mahasiswa',TRUE),
		
		'upload_file' =>$Upload_File,
	    );

            $this->MDokumen_akhir->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dokumen_akhir'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MDokumen_akhir->get_by_id($id);

        if ($row) {
            $data = array(
        'button' => 'Update',
        'action' => site_url('dokumen_akhir/update_action'),
		'id_dokumen_akhir' => set_value('id_dokumen_akhir', $row->id_dokumen_akhir),
		'npm' => set_value('npm', $row->npm),
		'id_mahasiswa' => set_value('id_mahasiswa', $row->id_mahasiswa),
		'tanggal_kumpul' => set_value('tanggal_kumpul', $row->tanggal_kumpul),
		'upload_file' => set_value('upload_file', $row->upload_file),
	    );
            //join tabel mahasiswa 
            $data['list_mahasiswa'] =  $this->MMahasiswa->get_all();
            $data['page'] = 'dokumen_akhir/dokumen_akhir_form';
            $this->load->view('template', $data);
            //$this->load->view('dokumen_akhir/dokumen_akhir_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dokumen_akhir'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dokumen_akhir', TRUE));
        } else {
            $data = array(
		'npm' => $this->input->post('npm',TRUE),
		'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
		'upload_file' => $this->input->post('upload_file',TRUE),
	    );

            $this->MDokumen_akhir->update($this->input->post('id_dokumen_akhir', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dokumen_akhir'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MDokumen_akhir->get_by_id($id);

        if ($row) {
            $this->MDokumen_akhir->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dokumen_akhir'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dokumen_akhir'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('npm', 'npm', 'trim|required');
	$this->form_validation->set_rules('id_mahasiswa', 'id mahasiswa', 'trim|required');
	//$this->form_validation->set_rules('tanggal_kumpul', 'tanggal kumpul', 'trim|required');
	//$this->form_validation->set_rules('upload_file', 'upload file', 'trim|required');

	//$this->form_validation->set_rules('id_dokumen_akhir', 'id_dokumen_akhir', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "dokumen_akhir.xls";
        $judul = "dokumen_akhir";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Mahasiswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Kumpul");
	xlsWriteLabel($tablehead, $kolomhead++, "Upload File");

	foreach ($this->MDokumen_akhir->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->npm);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_mahasiswa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_kumpul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->upload_file);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Dokumen_akhir.php */
/* Location: ./application/controllers/Dokumen_akhir.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-07 21:02:03 */
/* http://harviacode.com */