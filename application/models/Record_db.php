<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Record_db extends CI_Model {
	
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}

	public function select(){
		$this->db->select('*');
		$this->db->from('kalori_user');
		$query = $this->db->get();
		return $query->result();
	}
	
	function select_sarapan() {
		
		$this->db->select('*');
		$this->db->from('sarapan');	
		$this->db->join('users','sarapan.id_user=users.email');
		$query = $this->db->get();
        return $result = $query->result();
	}
	
	function select_siang() {
		
		$this->db->select('*');
		$this->db->from('siang');	
		$this->db->join('siang','sarapan.id_user=users.email');
		$query = $this->db->get();
        return $result = $query->result();
	}
	
	function select_malam() {
		
		$this->db->select('*');
		$this->db->from('malam');	
		$this->db->join('users','malam.id_user=users.email');
		$query = $this->db->get();
        return $result = $query->result();
	}
	
	function select_cemilan() {
		
		$this->db->select('*');
		$this->db->from('cemilan');	
		$this->db->join('users','cemilan.id_user=users.email');
		$query = $this->db->get();
        return $result = $query->result();
	}

	function get_sarapan($id){
		$this->db->select('*');
		$this->db->from('sarapan');
		$this->db->join('users','sarapan.id_user=users.email');
		$this->db->where("id_sarapan",$id);
		$query = $this->db->get();
		$result = $query->result();
		if(count($result) > 0){
			return $result[0];
		}
        return null;
	}
	
	function get_record_sarapan($email,$date){
		$this->db->select('*');
		$this->db->from('sarapan');
		$this->db->where("id_user",$email);
		$this->db->where("tanggal",$date);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function get_record_siang($email,$date){
		$this->db->select('*');
		$this->db->from('siang');
		$this->db->where("id_user",$email);
		$this->db->where("tanggal",$date);
		$query = $this->db->get();
		$result = $query->result();
		
        return $result;
	}
	
	function get_record_malam($email,$date){
		$this->db->select('*');
		$this->db->from('malam');
		$this->db->join('users','malam.id_user=users.email');
		$this->db->where("id_user",$email);
		$this->db->where("tanggal",$date);
		$query = $this->db->get();
		$result = $query->result();
		
        return $result;
	}
	
	function get_record_cemilan($email,$date){
		$this->db->select('*');
		$this->db->from('cemilan');
		$this->db->join('users','cemilan.id_user=users.email');
		$this->db->where("id_user",$email);
		$this->db->where("tanggal",$date);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	function get_record_kalori($email,$date){
		$this->db->select('*');
		$this->db->from('kalori_user');
		$this->db->join('users','kalori_user.id_user=users.email');
		$this->db->where("id_user",$email);
		$this->db->where("tanggal",$date);
		$query = $this->db->get();
		$result = $query->result();
		if(count($result) > 0){
			return $result[0];
		}
        return null;
	}
	
	function get_kalori($id){
		$this->db->select('*');
		$this->db->from('kalori_user');
		$this->db->where("id_kalori",$id);
		$query = $this->db->get();
		$result = $query->result();
		if(count($result) > 0){
			return $result[0];
		}
        return null;
	}
	
	function get_rekomendasi($id_user,$tipe){
		if($tipe == "sarapan"){
        $this->db->select('id_makanan,kalori,nama_makanan_sarapan, quantity, COUNT(*) AS total_konsumsi')
            ->from('sarapan')
            ->where('id_user', $id_user)
            ->group_by('nama_makanan_sarapan')
            ->order_by('total_konsumsi', 'DESC')
            ->limit(5);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    } else if($tipe == "siang"){
        $this->db->select('id_makanan,kalori,nama_makanan_siang, quantity, COUNT(*) AS total_konsumsi')
            ->from('siang')
            ->where('id_user', $id_user)
            ->group_by('nama_makanan_siang')
            ->order_by('total_konsumsi', 'DESC')
            ->limit(5);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    } else if($tipe == "malam"){
        $this->db->select('id_makanan,kalori,nama_makanan_malam, quantity, COUNT(*) AS total_konsumsi')
            ->from('malam')
            ->where('id_user', $id_user)
            ->group_by('nama_makanan_malam')
            ->order_by('total_konsumsi', 'DESC')
            ->limit(5);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    } else if($tipe == "cemilan"){
        $this->db->select('id_makanan,kalori,nama_makanan_cemilan, quantity, COUNT(*) AS total_konsumsi')
            ->from('cemilan')
            ->where('id_user', $id_user)
            ->group_by('nama_makanan_cemilan')
            ->order_by('total_konsumsi', 'DESC')
            ->limit(5);

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    return null;
	}


	function add_record($user,$tanggal,$makanan, $kalori, $quantity,$total,$id_makanan, $aksi) {
		if($aksi == "sarapan"){
		    $query="insert into sarapan values('','$user','$tanggal','$makanan','$kalori', '$quantity', '$total','$id_makanan')";
		    $result = $this->db->query($query);
       
		    return $result;
		}else if($aksi == "siang"){
		    $query="insert into siang values('','$user','$tanggal','$makanan','$kalori', '$quantity', '$total','$id_makanan')";
		    $result = $this->db->query($query);
       
		    return $result;
		}else if($aksi == "malam"){
		    $query="insert into malam values('','$user','$tanggal','$makanan','$kalori', '$quantity', '$total','$id_makanan')";
		    $result = $this->db->query($query);
       
		    return $result;
		}else{
		    $query="insert into cemilan values('','$user','$tanggal','$makanan','$kalori', '$quantity', '$total','$id_makanan')";
		    $result = $this->db->query($query);
       
		    return $result;
		}
		return false;
	}
	
	function create_record_harian($user,$tanggal) {
		
		$query="insert into kalori_user values('','$user','$tanggal','0')";
		$result = $this->db->query($query);
       
		return $result;
	}

	function update_record($id,$user,$tanggal,$makanan, $kalori, $quantity,$total, $aksi) {
		if($aksi == "sarapan"){
		    $query="UPDATE sarapan SET id_user='$user', tanggal='$tanggal', nama_makanan_sarapan='$makanan', kalori='$kalori', quantity = '$quantity', jumlah_kalori_sarapan = '$total' Where id_record='$id'";
		    $result = $this->db->query($query);
       
		    return $result;
		}else if($aksi == "siang"){
		    $query="UPDATE siang SET id_user='$user', tanggal='$tanggal', nama_makanan_siang='$makanan', kalori='$kalori', quantity = '$quantity', jumlah_kalori_siang = '$total' Where id_record='$id'";
		    $result = $this->db->query($query);
       
		    return $result;
		}else if($aksi == "malam"){
		    $query="UPDATE malam SET id_user='$user', tanggal='$tanggal', nama_makanan_malam='$makanan', kalori='$kalori', quantity = '$quantity', jumlah_kalori_malam = '$total' Where id_record='$id'";
		    $result = $this->db->query($query);
       
		    return $result;
		}else{
		    $query="UPDATE cemilan SET id_user='$user', tanggal='$tanggal', nama_makanan_cemilan='$makanan', kalori='$kalori', quantity = '$quantity', jumlah_kalori_cemilan = '$total' Where id_record='$id'";
		    $result = $this->db->query($query);
       
		    return $result;
		}
		return null;
	}
	
	function update_quantity($id, $quantity,$total, $aksi) {
		if($aksi == "sarapan"){
		    $query="UPDATE sarapan SET  quantity = '$quantity', jumlah_kalori_sarapan = '$total' Where id_sarapan='$id'";
		    $result = $this->db->query($query);
       
		    return $result;
		}else if($aksi == "siang"){
		    $query="UPDATE siang SET  quantity = '$quantity', jumlah_kalori_siang = '$total' Where id_siang='$id'";
		    $result = $this->db->query($query);
       
		    return $result;
		}else if($aksi == "malam"){
		    $query="UPDATE malam SET quantity = '$quantity', jumlah_kalori_malam = '$total' Where id_malam='$id'";
		    $result = $this->db->query($query);
       
		    return $result;
		}else{
		    $query="UPDATE cemilan SET quantity = '$quantity', jumlah_kalori_cemilan = '$total' Where id_cemilan='$id'";
		    $result = $this->db->query($query);
       
		    return $result;
		}
		return null;
	}
	
	function update_harian($id,$kalori) {
	    $query_select = "SELECT jumlah_kalori FROM kalori_user WHERE id_kalori = '$id'";
	    $result_select = $this->db->query($query_select)->row();
	    $kalori_tersimpan = 0;
	    if(!empty($result_select)){
	        $kalori_tersimpan = $result_select->jumlah_kalori;
	    }
	    $kalori_tersimpan += $kalori;
	    $query="UPDATE kalori_user SET jumlah_kalori = '$kalori_tersimpan' Where id_kalori='$id'";
		
		
		$result = $this->db->query($query);
       
		return $result;
	}
	
	function update_quantiti($id,$kalori) {
	    $query_select = "SELECT jumlah_kalori FROM kalori_user WHERE id_kalori = '$id'";
	    $result_select = $this->db->query($query_select)->row();
	    $kalori_tersimpan = 0;
	    if(!empty($result_select)){
	        $kalori_tersimpan = $result_select->jumlah_kalori;
	    }
	    $kalori_tersimpan += $kalori;
	    $query="UPDATE kalori_user SET jumlah_kalori = '$kalori' Where id_kalori='$id'";
		
		
		$result = $this->db->query($query);
       
		return $result;
	}

	function hapus_hasil($id) {
		$query="DELETE FROM kalori_user WHERE id_kalori='$id'";
		$result = $this->db->query($query);
		return $result;
	}
	
	function hapus_record($id, $aksi) {
	    
	    if($aksi == "sarapan"){
		    $query="DELETE FROM sarapan WHERE id_sarapan='$id'";
		    $result = $this->db->query($query);
		    return $result;
		}else if($aksi == "siang"){
		    $query="DELETE FROM siang WHERE id_siang='$id'";
		    $result = $this->db->query($query);
		    return $result;
		}else if($aksi == "malam"){
		    $query="DELETE FROM malam WHERE id_malam='$id'";
		    $result = $this->db->query($query);
		    return $result;
		}else{
		    $query="DELETE FROM cemilan WHERE id_cemilan='$id'";
		    $result = $this->db->query($query);
		    return $result;
		}
		return false;
		
	}
	
}