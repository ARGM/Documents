<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
	public function index()
	{
		
		if($this->session->userdata('datos'))
	   {
	     $session_data = $this->session->userdata('datos');
	     $data['id'] = $session_data['id'];
	     $this->load->view('welcome_message',$data);
	   }
	   else
	   {
	     //If no session, redirect to login page
	     $this->load->view('welcome_message');
	   }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */