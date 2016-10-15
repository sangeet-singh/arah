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
}
?>