<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('welcome');
		}
		if(isset($_POST['password'])){
			$this->load->model('usuario_model');		

			if ($this->usuario_model->login($_POST['username'],md5($_POST['password']))) {
				$fila = $this->usuario_model->getUserId($_POST['username']);
				$data = array(
					'username' =>  $_POST['username'],
					'id'	   => $fila->id
					);
				$this->session->set_userdata('datos',$data);				
				redirect('usuario/'); 
			} else {
				redirect('login');
			}
			
		}
		$this->load->view('register/index');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */