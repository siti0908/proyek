<?php
class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MUser');
	}

		public function index()	
	{

		 $this->load->view('Login_view');
	}

	function validasi()
	{
		$username =$this->input->post('username');
		$password =$this->input->post('password');
		if ($this->MUser->CheckUser($username, $password) == true){
			//echo "Usename dan Password Benar";
			$row =$this->MUser->get_by_username($username);
			//print_r($row); exit;
			$data_user=array(
				'username' =>$username,
				'npm' =>$row->npm,
				'nama_lengkap'=>$row->nama_lengkap,
				'id'=>$row->id,
				'hak_akses'=>$row->hak_akses,
				'is_Login'=>true,
			);
			$this->session->set_userdata($data_user);
			redirect('Dashboard');
			exit;
		} else {
			//echo "Usename dan Password Salah";
			$this->session->set_flashdata('pesan', 'Username atau Password Anda Salah');
			redirect ('Login');
			exit;
		}
		//exit;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}
?>