<?php if(!defined('BASEPATH')) exit('no direct access script allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Admin extends CI_Controller {

	public function __construct() {
		
		parent::__construct(); 
		
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Users_db');
		$this->load->model('Record_db');
		$this->load->helper(array('form', 'url'));
		
	}
		
	public function index() {
		if(!$this->session->logged_in){
			redirect("Admin/login");
		}
		$data['base_url'] = base_url();
		$data['page'] = "index";
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);	
		$this->load->view('admin_index',$data);
		$this->load->view('template/footer',$data);
	}

	public function login() {
		$data['base_url'] = base_url();
		$data['role'] = "admin";
		$this->load->view('login',$data);
	}

	public function users() {
		if(!$this->session->logged_in){
			redirect("Admin/login");
		}
		
		$data['users'] = $this->Users_db->select();
		$data['base_url'] = base_url();
		$data['page'] = "users";

		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);	
		$this->load->view('users',$data);
		$this->load->view('template/footer',$data);
	}

	public function delete_user() {
		if(!$this->session->logged_in){
			redirect("Admin/login");
		}
		
		$id = addslashes($this->input->get("id"));
		$hapus= $this->Users_db->hapus($id);
		if($hapus){
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data has been deleted</div>");
			redirect('Admin/users');
		}
	}

	public function tambah_user() {
		if(!$this->session->logged_in){
			redirect("Admin/login");
		}
		$data['aksi'] = "tambah";
		$data['page'] = "users";
		$data['base_url'] = base_url();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);	
		$this->load->view('tambah_user',$data);
		$this->load->view('template/footer',$data);
	}

	public function edit_user() {
		if(!$this->session->logged_in){
			redirect("Admin/login");
		}

		$id = addslashes($this->input->get("id"));
		$data_users = $this->Users_db->get_users($id);
		$data['users'] = $data_users;

		$data['aksi'] = "edit";
		$data['page'] = "users";
		$data['base_url'] = base_url();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);	
		$this->load->view('tambah_user',$data);
		$this->load->view('template/footer',$data);
	}

	public function simpan_user(){
		if(!$this->session->logged_in){
			redirect("Admin/login");
		}

		
		$jenis_kelamin = addslashes($this->input->post("jenis_kelamin"));
		$email = addslashes($this->input->post("email"));
		$tanggal_lahir = addslashes($this->input->post("tanggal_lahir"));
		$berat = addslashes($this->input->post("berat_badan"));
		$pass = addslashes($this->input->post("password"));
		$tinggi = addslashes($this->input->post("tinggi_badan"));
		$level_aktivitas  = addslashes($this->input->post("level_aktivitas"));

		if ($this->Users_db->add_user($email,$jenis_kelamin,$pass,$tanggal_lahir,$berat,$tinggi,$level_aktivitas)) {
				redirect('Admin/users');
          
        }
	}

	public function update_user(){
		if(!$this->session->logged_in){
			redirect("Admin/login");
		}

		$jenis_kelamin = addslashes($this->input->post("jenis_kelamin"));
		$email = addslashes($this->input->post("id"));
		$tanggal_lahir = addslashes($this->input->post("tanggal_lahir"));
		$berat = addslashes($this->input->post("berat_badan"));
		$pass = addslashes($this->input->post("password"));
		$tinggi = addslashes($this->input->post("tinggi_badan"));
		$level_aktivitas  = addslashes($this->input->post("level_aktivitas"));

		if ($this->Users_db->update_users($email,$jenis_kelamin,$pass,$tanggal_lahir,$berat,$tinggi,$level_aktivitas)) {
				redirect('Admin/users');
          
        }
	}


	public function record() {
		if(!$this->session->logged_in){
			redirect("Admin/login");
		}
		
		$data['record'] = $this->Record_db->select();
		$data['base_url'] = base_url();
		$data['page'] = "record";

		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);	
		$this->load->view('record',$data);
		$this->load->view('template/footer',$data);
	}

	public function delete_record() {
		if(!$this->session->logged_in){
			redirect("Admin/login");
		}
		
		$id = addslashes($this->input->get("id"));
		$hapus= $this->Record_db->hapus($id);
		if($hapus){
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data has been deleted</div>");
			redirect('Admin/record');
		}
	}

	public function tambah_record() {
		if(!$this->session->logged_in){
			redirect("Admin/login");
		}
		$data['aksi'] = "tambah";
		$data['page'] = "record";
		$data['base_url'] = base_url();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);	
		$this->load->view('tambah_record',$data);
		$this->load->view('template/footer',$data);
	}

	public function edit_record() {
		if(!$this->session->logged_in){
			redirect("Admin/login");
		}

		$id = addslashes($this->input->get("id"));
		$data_record = $this->Record_db->select_record($id);
		$data['record'] = $data_record;

		$data['aksi'] = "edit";
		$data['page'] = "record";
		$data['base_url'] = base_url();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);	
		$this->load->view('tambah_record',$data);
		$this->load->view('template/footer',$data);
	}


	public function register_api(){
	
		$email = addslashes($this->input->post("email"));
		$pass = addslashes($this->input->post("password"));

		if ($this->Users_db->create_account($email,$pass)) {
				$user_data = $this->Users_db->get_users($email);
			    $data['status'] = 1;
			    $data['user'] =  $user_data;
			    echo json_encode($data);
          
        }else {
			
			$data['status'] = 0;
			$data['message'] =  "Register Gagal";
			echo json_encode($data);
			
		}
	}
	
	public function update_user_api(){
	
		$jenis_kelamin = addslashes($this->input->post("jenis_kelamin"));
		$email = addslashes($this->input->post("email"));
		$tanggal_lahir = addslashes($this->input->post("tanggal_lahir"));
		$berat = addslashes($this->input->post("berat_badan"));
		$pass = addslashes($this->input->post("password"));
		$tinggi = addslashes($this->input->post("tinggi_badan"));
		$level_aktivitas = addslashes($this->input->post("level_aktivitas"));

		if ($this->Users_db->add_user($email,$jenis_kelamin,$pass,$tanggal_lahir,$berat,$tinggi,$level_aktivitas)) {
				$user_data = $this->Users_db->get_users($email);
			    $data['status'] = 1;
			    $data['user'] =  $user_data;
			    echo json_encode($data);
          
        }else {
			
			$data['status'] = 0;
			$data['message'] =  "Login Gagal";
			echo json_encode($data);
			
		}
	}
	
	public function get_user_profile() {
	    $email = addslashes($this->input->post("email"));
		$data['user'] = $this->Users_db->get_users($email);
		$data['status'] = 1;
		$data['message'] =  "Success Get Data";
		echo json_encode($data);
	}
	
	public function get_record_today() {
	    $email = addslashes($this->input->post("email"));
	    $date = date("Y/m/d");
		$data['sarapan'] = $this->Record_db->get_record_sarapan($email,$date);
		$data['siang'] = $this->Record_db->get_record_siang($email,$date);
		$data['malam'] = $this->Record_db->get_record_malam($email,$date);
		$data['cemilan'] = $this->Record_db->get_record_cemilan($email,$date);
		$data['kalori'] = $this->Record_db->get_record_kalori($email,$date);
		$data['status'] = 1;
		$data['message'] =  "Success Get Data";
		echo json_encode($data);
	}
	
	public function get_recomendasi() {
	    $email = addslashes($this->input->post("email"));
	    $tipe = addslashes($this->input->post("tipe"));
		$data['menu'] = $this->Record_db->get_rekomendasi($email,$tipe);
		$data['status'] = 1;
		$data['message'] =  "Success Get Data";
		echo json_encode($data);
	}
	
	public function get_history() {
	    $email = addslashes($this->input->post("email"));
	    $date = addslashes($this->input->post("tanggal"));
	    
		$data['sarapan'] = $this->Record_db->get_record_sarapan($email,$date);
		$data['siang'] = $this->Record_db->get_record_siang($email,$date);
		$data['malam'] = $this->Record_db->get_record_malam($email,$date);
		$data['cemilan'] = $this->Record_db->get_record_cemilan($email,$date);
		$data['kalori'] = $this->Record_db->get_record_kalori($email,$date);
		$data['status'] = 1;
		$data['message'] =  "Success Get Data";
		echo json_encode($data);
	}
	
	public function simpan_record_api(){
		
		$user = addslashes($this->input->post("email"));
		$tanggal = addslashes($this->input->post("tanggal"));
		$kalori = addslashes($this->input->post("kalori"));
		$makanan = addslashes($this->input->post("makanan"));
		$quantity = addslashes($this->input->post("quantity"));
		$id_makanan = addslashes($this->input->post("id_makanan"));
		$aksi = addslashes($this->input->post("jenis"));
		$total = $kalori * $quantity;

		if ($this->Record_db->add_record($user,$tanggal,$makanan,$kalori,$quantity,$total,$id_makanan,$aksi)) {
				//$user_data = $this->Users_db->get_users($email);
			    $data['status'] = 1;
			    $data['message'] =  "data berhasil ditambahkan";
			    echo json_encode($data);       
      		}
	}
	
	public function create_record_api(){
		
		$user = addslashes($this->input->post("email"));
		$tanggal = date("Y/m/d");
		
		if(empty($this->Record_db->get_record_kalori($user,$tanggal))){
		    if ($this->Record_db->create_record_harian($user,$tanggal)) {
				
			    $data['status'] = 1;
			    $data['message'] =  "data berhasil ditambahkan";
			    
		        echo json_encode($data);       
      		}else{
      		    $data['status'] = 0;
			    $data['message'] =  "gagal menambahkan data";
			    
		        echo json_encode($data);
      		}
		}else{
		    $data['status'] = 1;
			    $data['message'] =  "data sudah ada";
		}
		
	}
	
	public function update_record_api(){
		
		$id = addslashes($this->input->post("id"));
		$kalori = addslashes($this->input->post("kalori"));
		

		if ($this->Record_db->update_harian($id,$kalori)) {
				
			    $data['status'] = 1;
			    $data['message'] =  "data berhasil disimpan ";
			    echo json_encode($data);       
      		}
	}
	
	public function update_kalori_api(){
		
		$id_record = addslashes($this->input->post("id_record"));
		$aksi = addslashes($this->input->post("aksi"));
		$id = addslashes($this->input->post("id"));
		$kalori = addslashes($this->input->post("kalori"));
		$kalori_baru = addslashes($this->input->post("kalori_baru"));
		$quantity = addslashes($this->input->post("quantity"));
		$selisih = $kalori_baru - $kalori;
		
		if ($this->Record_db->update_quantity($id,$quantity,$kalori_baru,$aksi)) {
			if ($this->Record_db->update_harian($id_record,$selisih)) {
				
			    $data['status'] = 1;
			    $data['message'] =  "data berhasil disimpan";
			    echo json_encode($data);       
      		}
			           
      	}
		
	}
	
	public function edit_profile_api(){
	
		$jenis_kelamin = addslashes($this->input->post("jenis_kelamin"));
		$email = addslashes($this->input->post("email"));
		$tanggal_lahir = addslashes($this->input->post("tanggal_lahir"));
		$berat = addslashes($this->input->post("berat_badan"));
		$pass = addslashes($this->input->post("password"));
		$tinggi = addslashes($this->input->post("tinggi_badan"));
		$kalori = addslashes($this->input->post("kalori"));
		$level_aktivitas = addslashes($this->input->post("level_aktivitas"));

		if ($this->Users_db->update_users($email,$jenis_kelamin,$tanggal_lahir,$berat,$tinggi,$level_aktivitas, $kalori)) {
				$user_data = $this->Users_db->get_users($email);
			    $data['status'] = 1;
			    $data['user'] =  $user_data;
			    echo json_encode($data);
          
        }else {
			
			$data['status'] = 0;
			$data['message'] =  "Login Gagal";
			echo json_encode($data);
			
		}
	}
	
	public function send_email(){
	    
	    $code = rand(10000,99999);
        
        $email = addslashes($this->input->post("email"));
        $msg = "Konfirmasi reset password anda adalah ".$code." . harap untuk tidak membagikan kode tersebut kepada siapapun.";
        //Load email library
        
        
        
			$this->load->library("phpmailer_library");

			 // PHPMailer object
        	$mail = $this->phpmailer_library->load();

        	// SMTP configuration
        	//$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
        	$mail->isSMTP();
        	$mail->Host     = 'smtp.gmail.com';
        	$mail->SMTPAuth = true;
        	$mail->Username = 'rctprogres@gmail.com';
        	$mail->Password = 'hxjpfhhcplmqychb';
        	$mail->SMTPSecure = 'tls';
        	$mail->Port     = 587;

        	// Sender &amp; Recipient
			$mail->From = 'rctprogres@gmail.com';
			$mail->FromName = 'Kalori Account Center';
			$mail->addAddress($email);
			// Content
			$mail->isHTML(true);
			$mail->CharSet = 'UTF-8';
			$mail->Encoding = 'base64';
			$mail->Subject = 'password';
			$body = $msg;
			$mail->Body = $body;
			if($mail->send()){
			  if ($this->Users_db->generate_pass_code($email,$code)) {
			
			    $data['status'] = 1;
			    $data['message'] = "kode konfirmasi telah dikirim ke alamat email anda!";
			    echo json_encode($data);
          
            }else {
			
			    $data['status'] = 0;
			    $data['message'] =  "Gagal membuat kode";
			    echo json_encode($data);
		    }
			  
			}else{
			  $data['status'] = 0;
			    $data['message'] = "gagal mengirim kode";
			    echo json_encode($data);
			  
			}
	}
	
	
	public function cek_kode(){
	
		$email = addslashes($this->input->post("email"));
		$kode = addslashes($this->input->post("kode"));
		$data['users'] = $this->Users_db->get_users($email);
		

		if ($data['users']->reset_code == $kode) {
			    $data['status'] = 1;
			    echo json_encode($data);
          
        }else {
			
			$data['status'] = 0;
			$data['message'] =  "Kode Salah!";
			echo json_encode($data);
			
		}
	}
	
	public function update_pass_api(){
	
		$email = addslashes($this->input->post("email"));
		$pass = addslashes($this->input->post("password"));

		if ($this->Users_db->update_pass($email,$pass)) {
				
			    $data['status'] = 1;
			    $data['message'] =  "Password berhasil dirubah, silahkan login untuk melanjutkan!";
			    echo json_encode($data);
          
        }else {
			
			$data['status'] = 0;
			$data['message'] =  "Gagal merubah Password";
			echo json_encode($data);
			
		}
	}
	
	public function upload_image()
    {
    // Konfigurasi upload
    $config['upload_path'] = 'asset/img/'; // Ganti dengan direktori tujuan upload gambar
    $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Jenis file yang diizinkan
    $config['max_size'] = 4048; // Ukuran file maksimum dalam kilobita (KB)
    $config['encrypt_name'] = true; // Mengenkripsi nama file

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('image')) {
        // Jika proses upload gagal
        $error = $this->upload->display_errors();
         $data['status'] = 0;
	    $data['message'] =  $error;
	    echo json_encode($data);  
    } else {
        // Jika proses upload berhasil
        $data = $this->upload->data();
        $file_name = $data['file_name'];
        $data['status'] = 1;
        $data['file'] = $file_name;
	    $data['message'] =  "data berhasil disimpan";
	    echo json_encode($data);    
    }
    }
	
	public function info(){
	    print_r(phpinfo());
	}
	
	
}