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
		$breaks = array("<br />","<br>","<br/>","<br />","&lt;br /&gt;","&lt;br/&gt;","&lt;br&gt;");
		$file['code'] = html_entity_decode(strip_tags(str_ireplace($breaks,"\r\n", $data['editor1'])));
		$this->db->select('filename');
		$this->db->where('qid', $data['qid']);
		$q = $this->db->get('questions');
		$inputfile = $q->result_array();
		if(! write_file($paths['codepath'].$data['filename'].'.cpp', $file['code'])){
			show_404();
		}
		exec('g++ ' . $paths['codepath'] . $data['filename'] . '.cpp -o ' . $paths['exepath'] . $data['filename'] . '.exe 2>&1', $error['message'], $error['status']);
		return $error;
	}
	public function execute($data){
		$paths = array(
			'inputpath' => FCPATH . 'assets/files/input/',
			'outputpath' => FCPATH . 'assets/files/output/',
			'codepath' => FCPATH . 'assets/files/code/',
			'exepath' => FCPATH . 'assets/files/exe/',
			'resultpath' => FCPATH . 'assets/files/result/');
		$this->db->select('filename');
		$this->db->where('qid', $data['qid']);
		$q = $this->db->get('questions');
		$inputfile = $q->result_array();
		system($paths['exepath'] . $data['filename'] . '.exe < ' . $paths['inputpath'] . $inputfile[0]['filename'] . '.txt > ' . $paths['outputpath'] . $data['filename'] . '.txt', $status);
		return $status;
	}

}
?>