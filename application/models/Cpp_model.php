<?php
class Cpp_model extends CI_Model {

	public function construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('file');
	}

	public function compile($data){
		$paths = array(
			'inputpath' => FCPATH . 'assets/files/input/',
			'outputpath' => FCPATH . 'assets/files/output/',
			'codepath' => FCPATH . 'assets/files/code/',
			'exepath' => FCPATH . 'assets/files/exe/',
			'resultpath' => FCPATH . 'assets/files/result/');
		//$breaks = array("<br />","<br>","<br/>","<br />","&lt;br /&gt;","&lt;br/&gt;","&lt;br&gt;");
		//$file['code'] = html_entity_decode(strip_tags(str_ireplace($breaks,"\r\n", $data['editor1'])));
		$file['code'] = $data['editor1'];
		if(! write_file($paths['codepath'].$data['filename'].'.cpp', $file['code'])){
			show_404();
		}
		exec('g++ ' . $paths['codepath'] . $data['filename'] . '.cpp -o ' . $paths['exepath'] . $data['filename'] . '.exe 2>&1', $error['message'], $error['status']);
		if($error['status']){
			unlink($paths['codepath'] . $data['filename'] . '.cpp');
		}
		return $error;
	}
	public function execute($data){
		$paths = array(
			'inputpath' => FCPATH . 'assets/files/input/',
			'outputpath' => FCPATH . 'assets/files/output/',
			'codepath' => FCPATH . 'assets/files/code/',
			'exepath' => FCPATH . 'assets/files/exe/',
			'resultpath' => FCPATH . 'assets/files/result/');
		$this->db->select('input');
		$this->db->where('qid', $data['qid']);
		$q = $this->db->get('questions');
		$inputfile = $q->result_array();
		system($paths['exepath'] . $data['filename'] . '.exe < ' . $paths['inputpath'] . $inputfile[0]['input'] . '.txt > ' . $paths['outputpath'] . $data['filename'] . '.txt', $status);
		return $status;
	}
	public function matchSolution($data){
		$paths = array(
			'inputpath' => FCPATH . 'assets/files/input/',
			'outputpath' => FCPATH . 'assets/files/output/',
			'codepath' => FCPATH . 'assets/files/code/',
			'exepath' => FCPATH . 'assets/files/exe/',
			'resultpath' => FCPATH . 'assets/files/result/');
		$this->db->select('result, points');
		$this->db->where('qid',$data['qid']);
		$q = $this->db->get('questions');
		$query = $q->result_array();
		$resultfile = $query[0]['result'];
		$points = $query[0]['points'];
		$result = read_file($paths['resultpath']. $resultfile . '.txt');
		$userAnswer = read_file($paths['outputpath']. $data['filename'] . '.txt');
		$i = 0;
		$resultArray = array();
		foreach(preg_split("/((\r?\n)|(\r\n?))/", $result) as $line){
			$resultArray[$i] = $line;
			$i = $i + 1;
		}
		$j = 0;
		$userAnswerArray = array();
		foreach(preg_split("/((\r?\n)|(\r\n?))/", $userAnswer) as $line){
			$userAnswerArray[$j] = $line;
			$j = $j + 1;
		}
		$testcases = $i;
		$ppl = $points/$testcases;			//points per line
		$score = 0;
		for($k = 0; $k < $i; $k = $k + 1){
			if(isset($userAnswerArray[$k])&&isset($resultArray[$k])){
				if($userAnswerArray[$k] == $resultArray[$k]){
					$score = $score + $ppl;
				}
			}
			else
				break;
		}
		$returndata = array();				//data to be returned
		if($score == $points)
			$returndata['correct'] = 1;
		else
			$returndata['correct'] = 0;
		$returndata['score'] = $score;
		return $returndata;
	}
}
?>