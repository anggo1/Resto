<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
	}
	
	public function index() {
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('login');
		} else {
			redirect('Home');
		}
	}

	public function login() {
		$this->form_validation->set_rules('UserName', 'UserName', 'required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('Password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$username = trim($_POST['UserName']);
			$password = trim($_POST['Password']);

			$data = $this->M_auth->login($username, $password);
            

			if ($data == false) {
				$this->session->set_flashdata('error_msg', 'UserName / Password Anda Salah.');
				redirect('Auth');
			} else {
                $level = $data->pengguna_level;
				$session =['userdata' => $data,'status' => "Loged in"];
				$this->session->set_userdata($session);
            }
                if($level === '1'){
				redirect('Home');
			}
            if($level === '4'){
				redirect('mobile/Transaksi');
			}
            
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Auth');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('Auth');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */