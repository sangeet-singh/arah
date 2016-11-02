<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->helper('url');
        $this->load->library('session');
        $this->data = array
        	('assets'=> $this->config->item('assets'),
        	'base_url'=> $this->config->item('base_url'));
        $this->load->model('cpp_model');
        $this->load->model('user_model');
        $this->load->model('question_model');
        $this->load->database();
    }	

	public function index()
	{
		$data = $this->data;
		$data['loggedin'] = 0;
		if(isset($_SESSION['loggedin'])){
			if($_SESSION['loggedin']==1){
				$data['loggedin'] = 1;
				$data['name'] = $_SESSION['u_name'];
				$data['institute'] = $_SESSION['institute'];
				$data['branch'] = $_SESSION['branch'];
				$data['year'] = $_SESSION['year'];
				$this->load->view('dashboard.php',$data);
			}
			else
				redirect($data['base_url'] . 'welcome/login/');
		}
		else
			redirect($data['base_url'] . 'welcome/login/');
	}
	public function allquestions()
	{
		$data = $this->data;
		$data['loggedin'] = 0;
		if(isset($_SESSION['loggedin'])){
			if($_SESSION['loggedin']==1){
				$data['loggedin'] = 1;
				$data['name'] = $_SESSION['u_name'];
				$data['institute'] = $_SESSION['institute'];
				$data['branch'] = $_SESSION['branch'];
				$data['year'] = $_SESSION['year'];
				$data['questions'] = $this->question_model->getquestions();
				$this->load->view('index.php',$data);
			}
			else
				redirect($data['base_url'] . 'welcome/login/');
		}
		else
			redirect($data['base_url'] . 'welcome/login/');
	}
	public function question($qid)
	{
		$data = $this->data;
		$data['loggedin'] = 0;
		if(isset($_SESSION['loggedin'])){
			if($_SESSION['loggedin']==1){
				$data['loggedin'] = 1;
				$data['name'] = $_SESSION['u_name'];
				$data['institute'] = $_SESSION['institute'];
				$data['branch'] = $_SESSION['branch'];
				$data['year'] = $_SESSION['year'];
				$data['question'] = $this->question_model->getquestionbyid($qid);
				$_SESSION['question'] = $data['question'];
				if($data['question'] == 0){
					show_404();
				}
				if(isset($_SESSION['error_message'])){
					$data['error_message'] = $_SESSION['error_message'];
					$data['code'] = $_SESSION['code'];
				}
				$this->load->view('question.php',$data);
			}
			else
				redirect($data['base_url'] . 'welcome/login/');
		}
		else
			redirect($data['base_url'] . 'welcome/login/');
	}
	public function compile_all()
	{
		echo $_POST['editor1'];
		$data = $this->data;
		$data['editor1'] = $_POST['editor1'];
		$data['filename'] = uniqid();
		$_SESSION['filename'] = $data['filename'];
		$_SESSION['qid'] = 1;				//hardcoding for testing purpose
		$data['qid'] = $_SESSION['qid'];
		$compile = $this->cpp_model->compile($data);
		if( $compile['status'] ){
			foreach ($compile['message'] as $key => $message) {
				$pos = strpos($message, '.cpp') + 3;
				$compile['message'][$key] = substr($message, $pos);
			}
		$_SESSION['error_message'] = $compile['message'];
		$_SESSION['code'] = $data['editor1'];
		redirect($data['base_url'] . 'welcome/question/' . $_SESSION['qid']);
		}
		else{
			$status = $this->cpp_model->execute($data);
			if(!$status)
				$this->load->view('success.php',$data);
		}
	}

	public function login(){
		$data = $this->data;
		if(isset($_SESSION['loggedin'])){
			if($_SESSION['loggedin']==1){
				$data['loggedin'] = 1;
				$data['u_name'] = $_SESSION['u_name'];
				redirect($data['base_url'] . 'welcome/index/');
			}
		}
		if(isset($_POST['username'])&&isset($_POST['password'])){
			$login_data['username'] = $_POST['username'];
			$login_data['password'] = $_POST['password'];
			$this->user_model->login($login_data);
			if($_SESSION['loggedin']==1)
				redirect($data['base_url']. 'welcome/index/');
			else
				$this->load->view('login.php',$data);
		}
		else{
			$this->load->view('login.php',$data);
		}
	}

	public function logout(){
		$data = $this->data;
		unset($_SESSION['loggedin']);
		unset($_SESSION['u_name']);
		redirect($data['base_url'] . 'welcome/login/');
	}

	//here signin = signup
	public function signin(){
		$data = $this->data;
		if(isset($_SESSION['loggedin'])){
			if($_SESSION['loggedin']==1){
				$data['loggedin'] = 1;
				$data['u_name'] = $_SESSION['u_name'];
				redirect($data['base_url'] . 'welcome/index/');
			}
		}
		if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['institute'])&&isset($_POST['year'])&&isset($_POST['branch'])){//u_name,pass,institute,year,branch
			$signin_data['u_name'] = $_POST['username'];
			$signin_data['u_pass'] = $_POST['password'];
			$signin_data['institute'] = $_POST['institute'];
			$signin_data['year'] = $_POST['year'];
			$signin_data['branch'] = $_POST['branch'];
			$this->user_model->signin($signin_data);
			if($_SESSION['loggedin']==1)
				redirect($data['base_url']. 'welcome/index/');
			else
				$this->load->view('signin.php',$data);
		}
		else{
			$this->load->view('signin.php',$data);
		}
	}
}