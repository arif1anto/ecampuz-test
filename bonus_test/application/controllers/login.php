<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	function __construct()
	{
        // Call the Model constructor
		parent::__construct();
		$this->load->model('login_m');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == 'TRUE')
		{
			redirect('instansi');
		}
		$this->load->view("login/login"); 
	}

	function login_aksi() 
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password") ; 
		if ( $this->login_m->login_aksi($username, $password) == 1 )
		{	
			$data		= $this->login_m->get_user_data($username,$password);
			$session_data	= array 
			(
				'username'		=> $data->UsrKd,
				'user_id'		=> $data->UsrANo,
				'group'			=> $data->UsrGrpANo,
				'nama'		    => $data->UsrNm,
				'logged_in'		=> 'TRUE',
				'date'			=> date('Y-m-d H:i:s'),
			);

			$this->session->set_userdata($session_data);
			redirect("instansi") ; 
		}else{
			$this->session->set_userdata("report","maaf akses ditolak");
			redirect("login") ; 
		}
	}


	function logout_post()
	{
		$this->session->unset_userdata("logged_in");
		$this->session->sess_destroy();
		redirect("login") ; 
	}

}
