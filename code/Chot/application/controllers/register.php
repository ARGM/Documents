<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Register extends CI_Controller
	{
		function __construct()
    	{
	        parent::__construct();
	        $this->load->model('register_model');
	        $this->load->model('usuario_model');  	        
    	}
    	
    	function index(){
			$this->load->view('register/index');
		}
		
		function registrar(){
			//set validation rules
			$this->form_validation->set_rules('fname', 'Nombre', 'required|xss_clean|max_length[200]');
			$this->form_validation->set_rules('lname', 'Apellido', 'required|xss_clean|max_length[200]');
			$this->form_validation->set_rules('username', 'Usuario', 'required|xss_clean|max_length[20]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password',  'required|matches[cpassword]');
			$this->form_validation->set_rules('cpassword', 'Confirmar Password', 'required');
	        
	 
	        if ($this->form_validation->run() == FALSE)
	        {
	            //if not valid
	            $this->load->view('register/index');
	        }
	        else
	        {
	            $data = array(
	                'first_name' => $this->input->post('fname'),
	                'last_name' => $this->input->post('lname'),
	                'username' => $this->input->post('username'),
	                'email' => $this->input->post('email'),
	                'password' => md5($this->input->post('password'))              
	            );
	            
	           $datos = array(
                	'username' => $this->input->post('username'),
                	'img_name' => 'uno.gif',                          
            	);
            	$this->usuario_model->add_image($datos);
            	
	            //if valid            
	            $this->register_model->add_new_user($data);
	            $this->session->set_flashdata('message', 'Usted se ha registrado correctamente!');
	            redirect('register');            
	        }			
		}
    	
	}
?>