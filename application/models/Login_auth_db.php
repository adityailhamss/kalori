<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Login_auth_db extends CI_Model {
	
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}

	function login_admin($username, $password) {
		
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get()->row();
		
		if (!empty($query)) {
			return true;
		} else {
			return false;
		}
	}
	
	function login($email, $password) {
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		$query = $this->db->get()->row();
		
		if (!empty($query)) {
			
			return true;
			
		} else {
			
			return false;
			
		}
		
	}
	
	function get_admin_data($username) {
		
		//$this->load->library('session');
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('user', $username);	
		$query = $this->db->get();
		
		$user_data = array(
			'username'	=> $query->row('username')
			);
		
		return $user_data;
		
	}
	
	function get_user_data($email) {
		
		//$this->load->library('session');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);	
		$query = $this->db->get();
		
		$user_data = array(
			'email'	=> $query->row('email'),
			'umur'	=> $query->row('umur'),
			'jenis_kelamin'	=> $query->row('jenis_kelamin'),
			'level'	=> 'user',
			'tinggi_badan'	=> $query->row('tinggi_badan'),
			'berat_badan' => $query->row('berat_badan'),
			'nilai_aktivitas' => $query->row('nilai_aktivitas')
			);
		
		return $user_data;
		
	}
	
}