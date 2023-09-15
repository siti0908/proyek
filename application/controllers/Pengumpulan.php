<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengumpulan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('MPengumpulan', 'MMahasiswa'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        // print_r($_SESSION);die;
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pengumpulan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pengumpulan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pengumpulan/index?q';
            $config['first_url'] = base_url() . 'pengumpulan/index?q';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MPengumpulan->total_rows($q);
        $pengumpulan = $this->MPengumpulan->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pengumpulan_data' => $pengumpulan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['page'] = 'pengumpulan/pengumpulan_list';
        $this->load->view('template', $data);
        //$this->load->view('pengumpulan/pengumpulan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MPengumpulan->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pengumpulan' => $row->id_pengumpulan,
        'npm' => $row->npm,
		'id_mahasiswa' => $row->id_mahasiswa,
		'tanggal_kumpul' => $row->tanggal_kumpul,
        'judul' => $row->judul,
         'pembimbing' => $row->pembimbing,
		'proposal' => $row->proposal,
		'laporan' => $row->laporan,
		'dpl' => $row->dpl,
		'buku_bimbingan' => $row->buku_bimbingan,
	    );
             $data['page'] = 'pengumpulan/pengumpulan_read';
        $this->load->view('template', $data);
            //$this->load->view('pengumpulan/pengumpulan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengumpulan'));
        }
    }

    public function create() 
    {
        // print_r($_SESSION);die;
        $data = array(
        'button' => 'Create',
        'action' => site_url('pengumpulan/create_action'),
	    'id_pengumpulan' => set_value('id_pengumpulan'),
        'npm' => set_value('npm'),
	    'id_mahasiswa' => set_value('id_mahasiswa'),	   
	    'tanggal_kumpul' => set_value('tanggal_kumpul'),
        'judul' => set_value('judul'),
        'pembimbing' => set_value('pembimbing'),
	    'proposal' => set_value('proposal'),
	    'laporan' => set_value('laporan'),
	    'dpl' => set_value('dpl'),
	    'buku_bimbingan' => set_value('buku_bimbingan'),
	);
         //join tabel mahasiswa
        $data['list_mahasiswa'] =  $this->MMahasiswa->get_mhs();
         $data['page'] = 'pengumpulan/pengumpulan_form';
        $this->load->view('template', $data);
        //$this->load->view('pengumpulan/pengumpulan_form', $data);
    }
    
    public function create_action() 
    {

            // print_r($_POST);die;

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $judul=$this->input->post("judul");
             $pembimbing=$this->input->post("pembimbing");
            $npm= $this->MMahasiswa->get_by_id($this->input->post('id_mahasiswa',TRUE));
            $config['upload_path']   ='./assets/file/proposal';
            $config['allowed_types'] = 'jpg|jpeg|gif|pdf|docx';
            $this->load->library('upload',$config);

            //proposal
            if(!empty($_FILES['proposal']['name'])){
               $this->upload->do_upload('proposal');
               $data=$this->upload->data();
               $proposal=$data['file_name'];
            }
              else {
                $proposal=null;
            }
            //laporan
            if(!empty($_FILES['laporan']['name'])){
               $this->upload->do_upload('laporan');
               $data=$this->upload->data();
               $laporan=$data['file_name'];
            }
            else {
                $laporan=null;
            }
            //dpl
            if(!empty($_FILES['dpl']['name'])){
               $this->upload->do_upload('dpl');
               $data=$this->upload->data();
               $dpl=$data['file_name'];
            }
             else {
                $dpl=null;
            }


             //buku_bimbingan
            if(!empty($_FILES['buku_bimbingan']['name'])){
               $this->upload->do_upload('buku_bimbingan');
               $data=$this->upload->data();
               $buku_bimbingan=$data['file_name'];
            }
             else {
                $buku_bimbingan=null;
            }

            if ($this->form_validation->run())
            {
                $username=$_SESSION['username'];
                $id_mahasiswa= $this->db->query("SELECT * FROM user join mahasiswa on(user.npm=mahasiswa.npm) where user.username='$username'")->row();
                $npm =$id_mahasiswa->npm;
                $name=$id_mahasiswa->id_mahasiswa;
                $data=['id_mahasiswa'=>$name, 'judul'=>$judul,'pembimbing'=>$pembimbing,'proposal'=>$proposal,'npm'=>$npm, 'laporan'=>$laporan, 'dpl'=>$dpl, 'buku_bimbingan'=>$buku_bimbingan];
                $insert=$this->db->insert('pengumpulan',$data);
                if ($insert){
                $this->session->set_flashdata('pesan','<div class="alert alert-seccess">Data Berhasil Disimpan</div>');
                    redirect('pengumpulan');
                }
            }

    $data = array(
		'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
		'npm' => $npm->npm,
         'tanggal_kumpul' => $this->input->post('tanggal_kumpul',TRUE), 
        'judul' => $judul,
         'pembimbing' => $pembimbing,
		'proposal' =>$proposal,
        'laporan' =>$laporan,		
	    'dpl' =>$dpl,
        'buku_bimbingan' =>$buku_bimbingan,

	    );

            $this->MPengumpulan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengumpulan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MPengumpulan->get_by_id($id);

        if ($row) {

            $data = array(
        'button' => 'Update',
        'action' => site_url('pengumpulan/update_action'),
		'id_pengumpulan' => set_value('id_pengumpulan', $row->id_pengumpulan),
        'npm' => set_value('npm', $row->npm),
		'id_mahasiswa' => set_value('id_mahasiswa', $row->id_mahasiswa),
		'tanggal_kumpul' => set_value('tanggal_kumpul', $row->tanggal_kumpul),
        'judul' => set_value('judul', $row->judul),
        'pembimbing' => set_value('pembimbing', $row->pembimbing),
		'proposal' => set_value('proposal', $row->proposal),
		'laporan' => set_value('laporan', $row->laporan),
		'dpl' => set_value('dpl', $row->dpl),
		'buku_bimbingan' => set_value('buku_bimbingan', $row->buku_bimbingan),
	    );
             //join tabel mahasiswa
             $data['list_mahasiswa'] =  $this->MMahasiswa->get_all();
             $data['page'] = 'pengumpulan/pengumpulan_form';
             $this->load->view('template', $data);
            //$this->load->view('pengumpulan/pengumpulan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengumpulan'));
        }
    }
    
    public function update_action() 
    {
        // print_r($_FILES);die;
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengumpulan', TRUE));
        } else {
            $data['title']="belajar cara upload file lebih dari satu";
            $config['upload_path']   ='./assets/file/proposal';
            $config['allowed_types'] = 'jpg|jpeg|gif|pdf|docx';
            $this->load->library('upload',$config);

            $pengumpulan= $this->MPengumpulan->get_by_id($this->input->post('id_pengumpulan', TRUE));
            print_r($_FILES['laporan']);
            //proposal
            if(!empty($_FILES['proposal']['name'])){
               $this->upload->do_upload('proposal');
               $data=$this->upload->data();
               $proposal=$data['file_name'];
            }
            else {
                $proposal=$pengumpulan->proposal;
            }
          
            //laporan
            if(!empty($_FILES['laporan']['name'])){
               $this->upload->do_upload('laporan');
               $data1=$this->upload->data();
               $laporan=$data1['file_name'];
               print_r($data1); echo('masuk');
            }
             else {
                $laporan=$pengumpulan->laporan;
                echo "tidak masuk";
            }
            //dpl
            if(!empty($_FILES['dpl']['name'])){
               $this->upload->do_upload('dpl');
               $data=$this->upload->data();
               $dpl=$data['file_name'];
            }
             else {
                $dpl=$pengumpulan->dpl;
            }
            
             //buku_bimbingan
            if(!empty($_FILES['buku_bimbingan']['name'])){
               $this->upload->do_upload('buku_bimbingan');
               $data=$this->upload->data();
               $buku_bimbingan=$data['file_name'];
            }
             else {
                $buku_bimbingan=$pengumpulan->buku_bimbingan;
            }
            

        $data = array(
		'id_mahasiswa' => $this->input->post('id_mahasiswa',TRUE),
		'npm' => $this->input->post('npm',TRUE),
		'tanggal_kumpul' => $this->input->post('tanggal_kumpul',TRUE),
        'judul' => $this->input->post('judul',TRUE),
        'pembimbing' => $this->input->post('pembimbing',TRUE),
		'proposal' =>$proposal,
        'laporan' =>$laporan,       
        'dpl' =>$dpl,
        'buku_bimbingan' =>$buku_bimbingan,

	    );

            $this->MPengumpulan->update($this->input->post('id_pengumpulan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengumpulan'));

        }
    }
    
    public function delete($id) 
    {
        $row = $this->MPengumpulan->get_by_id($id);

        if ($row) {
            $this->MPengumpulan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengumpulan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengumpulan'));
        }
    }

    public function _rules() 
    {
   //$this->form_validation->set_rules('npm', 'npm', 'trim|required');
	// $this->form_validation->set_rules('id_mahasiswa', 'id mahasiswa', 'trim|required');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
    //$this->form_validation->set_rules('pembimbing', 'pembimbing', 'trim|required');
	//$this->form_validation->set_rules('proposal', 'proposal', 'trim|');
	//$this->form_validation->set_rules('laporan', 'laporan', 'trim|required');
	//$this->form_validation->set_rules('dpl', 'dpl', 'trim|required');
	// $this->form_validation->set_rules('buku_bimbingan', 'buku bimbingan', 'trim|required');

	$this->form_validation->set_rules('id_pengumpulan', 'id_pengumpulan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

