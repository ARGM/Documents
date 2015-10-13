<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Register_model extends CI_Model
	{
		public function _construct()
		{
			parent::_construct();
		}
		
		function add_new_user($data)
    	{
	        	        
	        $data = array(
	        	'first_name' => $data['first_name'],
	            'last_name' => $data['last_name'],
	            'username' => $data['username'],
	            'email' => $data['email'],
	            'password' => $data['password']              
	        );
	        $this->db->insert('usuarios',$data);
    	}
	
	
	}
	
	
?>