<?php if(!defined('BASEPATH')) exit('no direct access script allowed');



class Login extends CI_Controller {

	public function __construct() {
		
		parent::__construct(); 
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		//$this->load->library('session');
		$this->load->model('Login_auth_db');
		$this->load->library('session');

	}
		
	public function index() {
		$data['base_url'] = base_url();
		$this->load->view('login',$data);
	}
	
	public function login_auth() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$role = $this->input->post('role');

		if ($this->form_validation->run() == false) {
			
			// validation not ok, send valid
			if($role == "admin"){
				redirect('Admin/login', 'refresh');
			}else{
				redirect('Login', 'refresh');
			}
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			

			if($role == "admin"){
				if ($this->Login_auth_db->login_admin($username, $password)) {
					
					$this->session->set_userdata('logged_in', true);
					$this->session->set_userdata('id_user', $username);
				
					// user login ok
					$data_to_view['selected'] = 'dashboard';
					$data_to_view['content'] = 'dashboard';
						$this->load->view('index', $data_to_view);
					redirect('Admin', 'refresh');
				} else {
				
					redirect('Admin/login', 'refresh');
				
				}
			}else{
				if ($this->Login_auth_db->login($username, $password)) {
				$user_data = $this->Login_auth_db->get_user_data($username);
				
				$user_detail = array(
					'name'	=> $user_data['name'],
					'username'	=> $user_data['username'],
					'level'	=> "member",
					'id' => $user_data['id_member']

				);
				$this->session->set_userdata('user_data_session', $user_detail);
				$this->session->set_userdata('logged_in', true);
				$this->session->set_userdata('id_member', $user_data['id_member']);
				
				// user login ok
				$data_to_view['selected'] = 'dashboard';
				$data_to_view['content'] = 'dashboard';
				$this->load->view('index', $data_to_view);
				redirect('Home', 'refresh');
			} else {
				
				redirect('Login', 'refresh');
				
			}
			}
			
			
			
		}
	}

	public function login_api() {
		
		// set variables from the form
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		if ($this->Login_auth_db->login($email, $password)) {
			$user_data = $this->Login_auth_db->get_user_data($email);
			$data['status'] = 1;
			$data['user'] =  $user_data;
			echo json_encode($data);

		} else {
			
			$data['status'] = 0;
			$data['message'] =  "Login Gagal";
			echo json_encode($data);
			
		}
	}
}