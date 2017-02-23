<?php
class Question_model extends CI_Model {

	public function construct(){
		parent::__construct();
		$this->load->database();
		
	}
	public function getquestions(){
		$this->db->select('title,points,difficulty,qid');
		$q = $this->db->get('questions');
		$questions = $q->result_array();
		return $questions;
	}

	public function getquestionbyid($qid)
	{
		$this->db->select();
		$this->db->where('qid',$qid);
		$question = array();
		$question = $this->db->get('questions');
		$question = $question->result_array();
		if(empty($question))
			return 0;
		return $question;
	}
	public function addquestion($qs_data){
		$paths = array(
			'inputpath' => FCPATH . 'assets/files/input/',
			'resultpath' => FCPATH . 'assets/files/result/');
		$inputfile=uniqid();
		$resultfile=uniqid();
		write_file($paths['inputpath'].$inputfile.'.txt', $qs_data['input']);
		write_file($paths['resultpath'].$resultfile.'.txt', $qs_data['result']);
		$qs['qid']=$qs_data['qid'];
		$qs['html']=$qs_data['html'];
		$qs['points']=$qs_data['points'];
		$qs['difficulty']=$qs_data['difficulty'];
		$qs['title']=$qs_data['title'];
		$qs['input']=$inputfile;
		$qs['result']=$resultfile;
		$this->db->insert('questions',$qs);
	}
}
?>