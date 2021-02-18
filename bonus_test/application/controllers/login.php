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
			redirect('home');
		}
		$this->load->view("login/login"); 
	}

	function login_aksi() 
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password") ; 
		$deviceid = $this->input->post("deviceid") ; 
		if ( $this->login_m->login_aksi($username, $password) == 1 )
		{	
			$data		= $this->login_m->get_user_data($username,$password);
			$cek = $this->db->query("SELECT * FROM mscomp a WHERE id_comp='".$deviceid."'")->num_rows();
			$session_data	= array 
			(
				'username'		=> $data->UsrKd,
				'user_id'		=> $data->UsrANo,
				'group'			=> $data->UsrGrpANo,
				'nama'		    => $data->UsrNm,
				'logged_in'		=> 'TRUE',
				'print_service'	=> ($cek>0),
				'last_notif'	=> "2000-01-01 00:00:00",
				'date'			=> date('Y-m-d H:i:s'),
			);
			$tr = array(
				'UsrANo' => $data->UsrANo,
				'tanggal' => date('Ymd'),
				'kode' => acak(5),
			);
			$q = $this->db->query("select * from traprove where UsrANo='".$data->UsrANo."' and tanggal='".date('Ymd')."'");
			if ($q->num_rows()==0) {
				$this->db->insert('traprove', $tr);
			}

			$this->session->set_userdata($session_data);
			redirect("home") ; 
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
