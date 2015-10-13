<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->helper(array('ayuda_helper'));        
    }
 
    function index()
    {
        //this function will retrive all entry in the database
        if($this->session->userdata('datos'))
	   {
	     $session_data = $this->session->userdata('datos');
	     $data['id'] = $session_data['id'];
	     $data['query'] = $this->post_model->get_my_posts($data['id']);
	     $this->load->view('post/index',$data);
	   }
	   else
	   {
	     //If no session, redirect to login page
	     $this->load->view('welcome_message');
	   }
        
    }
    
    function matematica()
    {
        //this function will retrive all entry in the database
        $data['query'] = $this->post_model->get_matematica();        
        $this->load->view('post/matematica', $data);
    }
    
    function fisica()
    {
        //this function will retrive all entry in the database
        $data['query'] = $this->post_model->get_fisica();
        $this->load->view('post/fisica',$data);
    }
    
    function programacion()
    {
        //this function will retrive all entry in the database
        $data['query'] = $this->post_model->get_programacion();
        $this->load->view('post/programacion',$data);
    }
    
    function otros()
    {
        //this function will retrive all entry in the database
        $data['query'] = $this->post_model->get_otros();
        $this->load->view('post/otros',$data);
    }
 
    function add_new_entry()
    {
        $session_data = $this->session->userdata('datos');
        $id_user['id'] = $session_data['id'];       
                 
        //set validation rules
        $this->form_validation->set_rules('title', 'Titulo', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('description', 'Pregunta', 'required|xss_clean');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required|xss_clean');
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('post/add_new_entry',$id_user);
        }
        else
        {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'categoria' => $this->input->post('categoria'),
                'id_user'=> $id_user['id'],
                'date'=> date("Y-m-d G:i:s")               
            );

            //if valid            
            $this->post_model->add_new_entry($data);
            $this->session->set_flashdata('message', '1 new entry added!');
            redirect('post/add_new_entry');            
        }
    }
    
    function editar()
    {        
        $data['id_post'] = $this->uri->segment(3);
        $data['query'] = $this->post_model->get_one_post($data['id_post']);       
                 
        //set validation rules
        $this->form_validation->set_rules('title', 'Titulo', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('description', 'Pregunta', 'required|xss_clean');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required|xss_clean');
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('post/editar/editar',$data);
        }
        else
        {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'categoria' => $this->input->post('categoria'),
                'id_user'=> $id_user['id'],                            
            );

            //if valid            
            $this->post_model->edit($data,$this->uri->segment(3));            
            redirect('post/');            
        }
    }
    
    function eliminar(){    	
        $id_post = $this->uri->segment(3);
        $this->post_model->delete_comments($id_post);
        $this->post_model->delete($id_post);
        redirect('post/');  
		
	}
	
	
	function comentar(){
		        
        $data['id_post'] = $this->uri->segment(3);
        $data['query'] = $this->post_model->get_one_post($data['id_post']);
		$session_data = $this->session->userdata('datos');
        $id_user = $session_data['id'];
        $username = $session_data['username'];       
                 
       //set validation rules       
        $this->form_validation->set_rules('comentario', 'Comentario', 'required|xss_clean');
 
        if ($this->form_validation->run() == FALSE)
        {            
            //if not valid
            $this->load->view('post/editar/comentar', $data);
        }
        else
        {
           $data = array(
                'comentario' => $this->input->post('comentario'),
                'username' => $username,                
                'id_post'=> $data['id_post']            
            );

            //if valid            
            $this->post_model->add_comment($data);            
            redirect('post/');           
        }
		
	}
	
	function ver(){
		$data['id_post'] = $this->uri->segment(3);
		$data['query'] = $this->post_model->get_one_post($data['id_post']);
		$data['query2'] =  $this->post_model->get_comments($data['id_post']);		
		$this->load->view('post/editar/ver', $data);
		
	}
	
	function ver_perfil(){
		$this->load->model('usuario_model');
		$data['error'] = '';
		
		$session_data = $this->session->userdata('datos');        
        $username = $session_data['username'];
		    
		$data['user_to'] = $this->uri->segment(3);
		
		$data['amis'] = $this->usuario_model->ver_amistad($data['user_to'],$username);
		
		if (is_null($data['amis'])){
			$data['amistad'] = 0;			
		}else{
			$data['amistad'] = $data['amis'][0]->aceptada;			
		}
				
		if(strcmp($username, $data['user_to']) == 0){
			redirect('usuario/index');
		}else{
			if($data['amistad']){
				
				$data['query'] = $this->usuario_model->getUserData($data['user_to']);
                $data['query2'] = $this->usuario_model->getPublicaciones($data['user_to']); 
				$data['user2'] = $data['query'][0]->username;		
				$data['img']= base_url().'assets/uploads/'.$data['query'][0]->img_name;
				$data['amistad']=1;
				$this->load->view('usuario/perfil_publico', $data);
				//echo $data['amistad'][0]->aceptada;
								
			}else{
				$data['query'] = $this->usuario_model->getUserData($data['user_to']);
				$data['user2'] = $data['query'][0]->username;		
				$data['img']= base_url().'assets/uploads/'.$data['query'][0]->img_name;
				$data['amistad'] = 0;
				$this->load->view('usuario/perfil_publico', $data);				
				//echo $data['amistad'][0]->aceptada;
			}
					
		}	
	}
}
 
/* End of file blog.php */
/* Location: ./application/controllers/post.php */