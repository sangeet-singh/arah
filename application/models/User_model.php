<?php
class User_model extends CI_Model {

	public function construct(){
		parent::__construct();
		$this->load->database();
		
	}
	public function login($login_data){
		$this->db->select('u_pass');
		$this->db->where('u_name',$login_data['username']);
		$q = $this->db->get('user');
		$pass = $q->result_array();
		if(empty($pass)){
			$_SESSION['loggedin'] = 0;
			return;
		}
		$password = $pass[0]['u_pass'];
		if($password==$login_data['password']){
			$_SESSION['loggedin'] = 1;
			$this->db->select('u_name , institute, year , branch');
			$this->db->where('u_name',$login_data['username']);
			$query = $this->db->get('user');
			$query = $query->result_array();
			$_SESSION['u_name'] = $login_data['username'];
			$_SESSION['institute'] = $query[0]['institute'];
			$_SESSION['branch'] = $query[0]['branch'];
			$_SESSION['year'] = $query[0]['year'];
		}
		else
			$_SESSION['loggedin'] = 0;
	}
}
?>