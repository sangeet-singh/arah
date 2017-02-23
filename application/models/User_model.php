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
		if($password==sha1($login_data['password'])){
			$_SESSION['loggedin'] = 1;
			$this->db->select('u_id, u_name , institute, year , branch, is_admin');
			$this->db->where('u_name',$login_data['username']);
			$query = $this->db->get('user');
			$query = $query->result_array();
			$_SESSION['u_id'] = $query[0]['u_id'];
			$_SESSION['u_name'] = $login_data['username'];
			$_SESSION['institute'] = $query[0]['institute'];
			$_SESSION['branch'] = $query[0]['branch'];
			$_SESSION['year'] = $query[0]['year'];
			$_SESSION['is_admin'] = $query[0]['is_admin'];
		}
		else
			$_SESSION['loggedin'] = 0;
	}
	public function signin($signin_data){			//signup
		$signin_data['u_pass'] = sha1($signin_data['u_pass']);
		$this->db->insert('user',$signin_data);
		$_SESSION['loggedin'] = 1;
		$_SESSION['u_name'] = $signin_data['u_name'];
		$_SESSION['institute'] = $signin_data['institute'];
		$_SESSION['branch'] = $signin_data['branch'];
		$_SESSION['year'] = $signin_data['year'];
		return;
	}
	public function success($data){
		$paths = array(
			'inputpath' => FCPATH . 'assets/files/input/',
			'outputpath' => FCPATH . 'assets/files/output/',
			'codepath' => FCPATH . 'assets/files/code/',
			'exepath' => FCPATH . 'assets/files/exe/',
			'resultpath' => FCPATH . 'assets/files/result/');
		$this->db->select('score');
		$this->db->where('u_id',$_SESSION['u_id']);
		$this->db->where('qid',$data['qid']);
		$q = $this->db->get('gameplay');
		$update = array(
			'u_id' => $_SESSION['u_id'],
			'qid' => $data['qid'],
			'filename' => $data['filename'],
			'score' => $data['score']
			);
		if($q->num_rows() > 0){
			$score = $q->result_array();
			if($score[0]['score']<$data['score']){
				unlink($paths['codepath'] . $score[0]['filename'] . '.cpp');
				unlink($paths['exepath'] . $score[0]['filename'] . '.exe');
				unlink($paths['outputpath'] . $score[0]['filename'] . '.txt');
				$this->db->replace('gameplay',$update);	//delete code and output file in else
			}
			else{
				unlink($paths['codepath'] . $data['filename'] . '.cpp');
				unlink($paths['exepath'] . $data['filename'] . '.exe');
				unlink($paths['outputpath'] . $data['filename'] . '.txt');
			}
		}
		else{
			$this->db->insert('gameplay',$update);
		}
	}
}
?>