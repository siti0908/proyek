<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Plotting_pembimbing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('MPlotting_pembimbing', 'MMahasiswa', 'MDosen'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'plotting_pembimbing/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'plotting_pembimbing/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'plotting_pembimbing/index?q';
            $config['first_url'] = base_url() . 'plotting_pembimbing/index?q';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MPlotting_pembimbing->total_rows($q);
        $plotting_pembimbing = $this->MPlotting_pembimbing->get_limit_data($config['per_page'], $start, $q);
        

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'plotting_pembimbing_data' => $plotting_pembimbing,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'plotting_pembimbing/plotting_pembimbing_list';
        $this->load->view('template', $data);
        //$this->load->view('plotting_pembimbing/plotting_pembimbing_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MPlotting_pembimbing->get_by_id($id);
        if ($row) {
            $data = array(
		'id_plotting_pembimbing' => $row->id_plotting_pembimbing,
		'id_dosen' => $row->id_dosen,
		'nama_dosen' => $row->nama_dosen,
		'nama_mahasiswa' => $row->nama_mahasiswa,
		'id_mahasiswa' => $row->id_mahasiswa,
		'tingkat' => $row->tingkat,
	    );
             $data['page'] = 'plotting_pembimbing/plotting_pembimbing_read';
            $this->load->view('template', $data);
            //$this->load->view('plotting_pembimbing/plotting_pembimbing_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('plotting_pembimbing'));
        }
    }

    public function create() 
    {
        $data = array(
        'button' => 'Create',
        'action' => site_url('plotting_pembimbing/create_action'),
	    'id_plotting_pembimbing' => set_value('id_plotting_pembimbing'),
	    'id_dosen' => set_value('id_dosen'),
	    'nama_dosen' => set_value('nama_dosen'),
	    'nama_mahasiswa' => set_value('nama_mahasiswa'),
	    'id_mahasiswa' => set_value('id_mahasiswa'),
	    'tingkat' => set_value('tingkat'),
	);
         //join tabel mahasiswa dan tabel mahasiswa
        $data['list_mahasiswa'] =  $this->MMahasiswa->get_all();
        $data['list_dosen'] =  $this->MDosen->get_all();
        $data['page'] = 'plotting_pembimbing/plotting_pembimbing_form';
        $this->load->view('template', $data);
        //$this->load->view('plotting_pembimbing/plotting_pembimbing_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        $nama_dosen = $this->MDosen->get_by_id($this->input->post('id_dosen',TRUE));
        $nama_mahasiswa = $this->MMahasiswa->get_by_id($this->input->post('id_mahasiswa',TRUE));
        $tingkat = $this->MMahasiswa->get_by_id($this->input->post('id_mahasiswa',TRUE));


        $data = array(
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'nama_dosen' => $nama_dosen->nama_dosen,
        'nama_mahasiswa' =>$nama_mahasiswa->nama_mahasiswa,
		'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
		'tingkat' =>$tingkat->tingkat,
	    );

            $this->MPlotting_pembimbing->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('plotting_pembimbing'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MPlotting_pembimbing->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('plotting_pembimbing/update_action'),
		'id_plotting_pembimbing' => set_value('id_plotting_pembimbing', $row->id_plotting_pembimbing),
		'id_dosen' => set_value('id_dosen', $row->id_dosen),
		'nama_dosen' => set_value('nama_dosen', $row->nama_dosen),
		'nama_mahasiswa' => set_value('nama_mahasiswa', $row->nama_mahasiswa),
		'id_mahasiswa' => set_value('id_mahasiswa', $row->id_mahasiswa),
		'tingkat' => set_value('tingkat', $row->tingkat),
	    );
             //join tabel mahasiswa dan tabel mahasiswa
           $data['list_mahasiswa'] =  $this->MMahasiswa->get_all();
           $data['list_dosen'] =  $this->MDosen->get_all();

            $data['page'] = 'plotting_pembimbing/plotting_pembimbing_form';
            $this->load->view('template', $data);
            //$this->load->view('plotting_pembimbing/plotting_pembimbing_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('plotting_pembimbing'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_plotting_pembimbing', TRUE));
        } else {
            $data = array(
		'id_dosen' => $this->input->post('id_dosen',TRUE),
		'nama_dosen' => $this->input->post('nama_dosen',TRUE),
		'nama_mahasiswa' => $this->input->post('nama_mahasiswa',TRUE),
		'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
		'tingkat' => $this->input->post('tingkat',TRUE),
	    );

            $this->MPlotting_pembimbing->update($this->input->post('id_plotting_pembimbing', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('plotting_pembimbing'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MPlotting_pembimbing->get_by_id($id);

        if ($row) {
            $this->MPlotting_pembimbing->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('plotting_pembimbing'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('plotting_pembimbing'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_dosen', 'id dosen', 'trim|required');
	//$this->form_validation->set_rules('nama_dosen', 'nama dosen', 'trim|required');
	//$this->form_validation->set_rules('nama_mahasiswa', 'nama mahasiswa', 'trim|required');
	$this->form_validation->set_rules('id_mahasiswa', 'id mahasiswa', 'trim|required');
	//$this->form_validation->set_rules('tingkat', 'tingkat', 'trim|required');

	//$this->form_validation->set_rules('id_plotting_pembimbing', 'id_plotting_pembimbing', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "plotting_pembimbing.xls";
        $judul = "plotting_pembimbing";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Dosen");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Mahasiswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Mahasiswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Tingkat");

	foreach ($this->MPlotting_pembimbing->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_dosen);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_dosen);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_mahasiswa);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_mahasiswa);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->tingkat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Plotting_pembimbing.php */
/* Location: ./application/controllers/Plotting_pembimbing.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-18 19:51:58 */
/* http://harviacode.com */