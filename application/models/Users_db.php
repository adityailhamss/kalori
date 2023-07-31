<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Users_db extends CI_Model {
	
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	function select() {
		
		$this->db->select('*');
		$this->db->from('users');	
		$query = $this->db->get();
        return $result = $query->result();
	}
	
	function get_users($id){
		$this->db->select('*');
		$this->db->from('users');	
		$this->db->where("email",$id);
		$query = $this->db->get();
		$result = $query->result();
		if(count($result) > 0){
			return $result[0];
		}
        return null;
	}
	
	function create_account($email,$password) {
		
		$query="insert into users values('$email','Laki-laki',md5('$password'),'1990-01-1','0','0','0','0','')";
		$result = $this->db->query($query);
       
		return $result;
	}


	function add_user($email,$jenis_kelamin,$password,$tanggal_lahir,$berat,$tinggi,$level_aktivitas,$kalori_dibutuhkan) {
		
		$query="insert into users values('$email','$jenis_kelamin',md5('$password'),'$tanggal_lahir','$berat','$tinggi','$level_aktivitas','$kalori_dibutuhkan','')";
		$result = $this->db->query($query);
       
		return $result;
	}

	function update_users($email,$jenis_kelamin,$tanggal_lahir,$berat,$tinggi,$level_aktivitas,$kalori_dibutuhkan) {
		
		$query="UPDATE users SET jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', berat_badan='$berat', tinggi_badan='$tinggi' ,nilai_aktivitas='$level_aktivitas',kalori_dibutuhkan='$kalori_dibutuhkan' Where email='$email'";
		$result = $this->db->query($query);
		return $result;
	}
	
	function generate_pass_code($email, $code) {
		
		$query="UPDATE users SET reset_code='$code' Where email='$email'";
		$result = $this->db->query($query);
		return $result;
	}
	
	function update_pass($email, $pass) {
		
		$query="UPDATE users SET password=md5('$pass') Where email='$email'";
		$result = $this->db->query($query);
		return $result;
	}


	function hapus($id) {
		$query="DELETE FROM users WHERE email='$id'";
		$result = $this->db->query($query);
		return $result;
	}
}