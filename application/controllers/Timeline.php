<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Timeline extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MTimeline');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'timeline/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'timeline/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'timeline/index';
            $config['first_url'] = base_url() . 'timeline/index';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MTimeline->total_rows($q);
        $timeline = $this->MTimeline->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'timeline_data' => $timeline,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $data['page'] = 'timeline/timeline_list';
         $this->load->view('template', $data);
         //$this->load->view('timeline/timeline_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MTimeline->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kegiatan' => $row->kegiatan,
		'waktu' => $row->waktu,
	    );
            $data['page'] = 'timeline/timeline_read';
            $this->load->view('template', $data);
            //$this->load->view('timeline/timeline_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('timeline'));
        }
    }

    public function create() 
    {
        $data = array(
        'button' => 'Create',
        'action' => site_url('timeline/create_action'),
	    'id' => set_value('id'),
	    'kegiatan' => set_value('kegiatan'),
	    'waktu' => set_value('waktu'),
	);
         $data['page'] = 'timeline/timeline_form';
         $this->load->view('template', $data);
         //$this->load->view('timeline/timeline_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kegiatan' => $this->input->post('kegiatan',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
	    );

            $this->MTimeline->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('timeline'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MTimeline->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('timeline/update_action'),
		'id' => set_value('id', $row->id),
		'kegiatan' => set_value('kegiatan', $row->kegiatan),
		'waktu' => set_value('waktu', $row->waktu),
	    );
            $data['page'] = 'timeline/timeline_form';
            $this->load->view('template', $data);
            //$this->load->view('timeline/timeline_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('timeline'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kegiatan' => $this->input->post('kegiatan',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
	    );

            $this->MTimeline->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('timeline'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MTimeline->get_by_id($id);

        if ($row) {
            $this->MTimeline->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('timeline'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('timeline'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kegiatan', 'kegiatan', 'trim|required');
	$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "timeline.xls";
        $judul = "timeline";
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
	    xlsWriteLabel($tablehead, $kolomhead++, "Kegiatan");
	    xlsWriteLabel($tablehead, $kolomhead++, "Waktu");

	foreach ($this->MTimeline->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kegiatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}
