<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->helper(array('ayuda_helper'));        
    }
    function index(){
    	$session_data = $this->session->userdata('datos');
    	$username = $session_data['username'];

        $data['query'] = $this->usuario_model->getUserData($username);
        $data['Nombre'] = $data['query'][0]->first_name.' '.$data['query'][0]->last_name;

        $data['total'] = $this->usuario_model->getAmigos($username);
    	$data['query'] = $this->usuario_model->getPublicaciones($username);
    	$data['query2'] = $this->usuario_model->get_foto_perfil($username);
    	$data['error'] = '';
		$data['img'] =  base_url().'assets/uploads/'.$data['query2'][0]->img_name;
    	
		$this->load->view('usuario/perfil', $data);
	}

    function likes(){
        // Actualizacion de los like
        $voteId=  $this->input->post('voteId');
        $upOrDown=  $this->input->post('upOrDown');

        $status ="false";
        $updateRecords = 0;
        
        if($upOrDown=='upvote'){
            $updateRecords = $this->usuario_model->updateUpVote($voteId);
        }else{
            $updateRecords = $this->usuario_model->updateDownVote($voteId);
        }

        if($updateRecords>0){
            $status = "true";
        }
        echo $status;
        //redirect('usuario/'); 
        // final de los like
    }

    function comen_post(){
        $session_data = $this->session->userdata('datos');
        $username = $session_data['username'];

        $id_post=  $this->input->post('id_post');
        $comentario=  $this->input->post('comen');
        //$datos['uno'] = $id_post;
        //$datos['dos'] = $comentario; 
        //$this->load->view('preuba',$datos);
        //$msg = 'si';
        //echo $msg;

        //$msj =$id_post.'-'.$comentario;
        
        //echo $id_post;
        $data = array(                
            'id_post' => $id_post,                
            'comentario'=> $comentario,
            'user' => $username,
            'date' => date("Y-m-d h:i:sa") 

        );
        $this->usuario_model->comentar_muro($data);
        $msj = "si";
        echo $msj;

    }

		
	function publicar(){
		$session_data = $this->session->userdata('datos');
        $id_user['id'] = $session_data['id'];
        $username = $session_data['username'];
        $datos['query'] = $this->usuario_model->getPublicaciones($username);
		
        
                            
        //set validation rules        
        $this->form_validation->set_rules('publicacion', 'Publicacion', 'required|xss_clean');
        
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('usuario/perfil',$datos);
        }
        else
        {
            $data = array(                
                'publicacion' => $this->input->post('publicacion'),                
                'username'=> $username,                        
            );

            //if valid            
            $this->usuario_model->add_publicacion($data);			
            $this->session->set_flashdata('message', '1 new entry added!');
            redirect('usuario/');            
        }
	}
	
	function editar(){
		$id_publicacion = $this->input->post('id_pos');
		$data = array(
                'body' => $this->input->post('publicacion'),                               
                                          
        );
        //if valid            
        $this->usuario_model->editarPublicacion($data,$id_publicacion);            
        redirect('usuario/'); 		
		//echo "Publicacion editada";
	}
	
	function eliminar(){
		$id_publicacion = $this->uri->segment(3);
        $this->usuario_model->delete($id_publicacion);
        redirect('usuario/');
	}
	
	function configuracion(){
		$session_data = $this->session->userdata('datos');
    	$username = $session_data['username'];
    	$data['query'] = $this->usuario_model->getUserData($username);
        $data['Nombre'] = $data['query'][0]->first_name.' '.$data['query'][0]->last_name;
		$data['query2'] = $this->usuario_model->get_foto_perfil($username);
    	$data['error'] = '';
		$data['img'] =  base_url().'assets/uploads/'.$data['query2'][0]->img_name;
    	$this->load->view('usuario/configuracion', $data);
		
	}
	
	function actualizar_nombre(){
		//set validation rules
        $this->form_validation->set_rules('fname', 'Nombre', 'required|xss_clean|max_length[200]');        
         
        $session_data = $this->session->userdata('datos');
    	$username = $session_data['username'];
    	$data['query'] = $this->usuario_model->getUserData($username);
        $data['Nombre'] = $data['query'][0]->first_name.' '.$data['query'][0]->last_name;
		$data['query2'] = $this->usuario_model->get_foto_perfil($username);
    	$data['error'] = '';
		$data['img'] =  base_url().'assets/uploads/'.$data['query2'][0]->img_name;
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('usuario/configuracion', $data);
        }else{
			$data = array(
                'fname' => $this->input->post('fname'), 
            );

            //if valid            
            $this->usuario_model->edit_nombre($data,$username);
            //$this->session->set_flashdata('message', '1 new entry added!');
            redirect('usuario/index');
		}
	}
	
	function actualizar_apellido(){
		//set validation rules        
        $this->form_validation->set_rules('lname', 'Apellido', 'required|xss_clean|max_length[200]');
         
        $session_data = $this->session->userdata('datos');
    	$username = $session_data['username'];
    	$data['query'] = $this->usuario_model->getUserData($username);
        $data['Nombre'] = $data['query'][0]->first_name.' '.$data['query'][0]->last_name;
		$data['query2'] = $this->usuario_model->get_foto_perfil($username);
    	$data['error'] = '';
		$data['img'] =  base_url().'assets/uploads/'.$data['query2'][0]->img_name;
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('usuario/configuracion', $data);
        }else{
			$data = array(
                'lname' => $this->input->post('lname'), 
            );

            //if valid            
            $this->usuario_model->edit_apellido($data,$username);
            //$this->session->set_flashdata('message', '1 new entry added!');
            redirect('usuario/index');
		}
	}
	
	function actualizar_email(){
		//set validation rules        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
         
        $session_data = $this->session->userdata('datos');
    	$username = $session_data['username'];
    	$data['query'] = $this->usuario_model->getUserData($username);
        $data['Nombre'] = $data['query'][0]->first_name.' '.$data['query'][0]->last_name;
		$data['query2'] = $this->usuario_model->get_foto_perfil($username);
    	$data['error'] = '';
		$data['img'] =  base_url().'assets/uploads/'.$data['query2'][0]->img_name;
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('usuario/configuracion', $data);
        }else{
			$data = array(
                'email' => $this->input->post('email'), 
            );

            //if valid            
            $this->usuario_model->edit_email($data,$username);
            //$this->session->set_flashdata('message', '1 new entry added!');
            redirect('usuario/index');
		}
	}
	
	function actualizar_password(){
		
		$this->load->model('usuario_model');		
		//$this->session->set_flashdata('message', 'Usted se ha registrado correctamente!');
         
        $session_data = $this->session->userdata('datos');
    	$username = $session_data['username'];
    	$data['query'] = $this->usuario_model->getUserData($username);
        $data['Nombre'] = $data['query'][0]->first_name.' '.$data['query'][0]->last_name;
		$data['query2'] = $this->usuario_model->get_foto_perfil($username);
    	$data['error'] = '';
		$data['img'] =  base_url().'assets/uploads/'.$data['query2'][0]->img_name;
 		
 		if($this->usuario_model->login($username,md5($_POST['opassword']))){
 			$this->session->set_flashdata('message', 'Password correcto');
 			//set validation rules        
        	$this->form_validation->set_rules('npassword', 'Nuevo password',  'required|matches[cpassword]');
			$this->form_validation->set_rules('cpassword', 'Confirmar password', 'required');
			
 			if ($this->form_validation->run() == FALSE)
        	{
		        //if not valid
		        $this->load->view('usuario/configuracion', $data);
        	}else{
				$data = array(
	                'password' => md5($this->input->post('npassword')), 
	            );

	            //if valid            
	            $this->usuario_model->edit_password($data,$username);
	            //$this->session->set_flashdata('message', '1 new entry added!');
	            redirect('usuario/index');
			}
			
		}else{
			$this->session->set_flashdata('message', 'Password incorrecto');
			
			//if is valid
		    $this->load->view('usuario/configuracion', $data);
			
		}
 		
      }
      
    function do_upload()
	{
		$session_data = $this->session->userdata('datos');
    	$username = $session_data['username'];
    	$data['query'] = $this->usuario_model->getPublicaciones($username);
    	
		
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			
			redirect('usuario/');
		}	
		else
		{
			$file_data = $this->upload->data();
			$data['query2'] = $this->usuario_model->get_foto_perfil($username);
    		$data['error'] = '';
    	
    		if ($data['query2']){
				$datos = array(                	
                	'img_name' => $file_data['file_name'],                          
            	);
            	$this->usuario_model->actualizar_foto_perfil($datos,$username);		
			}else{
				$datos = array(
                	'username' => $username,
                	'img_name' => $file_data['file_name'],                          
            	);
            	$this->usuario_model->add_image($datos);		
				
			}   		
            $data['img'] = base_url().'assets/uploads/'.$file_data['file_name'];            
			$this->load->view('usuario/perfil', $data);
		}
	}

    function eliminarAmigo(){
        $session_data = $this->session->userdata('datos');        
        $username = $session_data['username'];
        $toUser = $this->input->post('toUser2');
        $this->usuario_model->eliminarAmistad($username, $toUser);
        redirect('usuario/mis_amigos');
    }	
    
    function sol_amistad(){
    	$session_data = $this->session->userdata('datos');        
        $username = $session_data['username'];
        $user_to = $this->input->post('user_to');
        
        
        if(strcmp($username, $user_to) == 0){
			$data['error'] = 'Solicitud denegada'; 
		}else{
			$data = array(                
                'user_from' => $username,                
                'user_to'=> $user_to,                         
         	);
        	$data['error'] = 'Su solicitud ha sido enviada';	
        	$this->usuario_model->solicitud_amistad($data);
		}
    	$data['amistad'] = 0; 
        $data['query'] = $this->usuario_model->getUserData($user_to);
		$data['user2'] = $data['query'][0]->username;		
		$data['img']= base_url().'assets/uploads/'.$data['query'][0]->img_name;
        redirect('post/ver_perfil/'.$user_to);
		//$this->load->view('usuario/perfil_publico',$data);
	}  
   
   function notificaciones(){
   		$session_data = $this->session->userdata('datos');        
        $username = $session_data['username'];
        $data['q'] = $this->usuario_model->getUserData($username);
        $data['Nombre'] = $data['q'][0]->first_name.' '.$data['q'][0]->last_name;
   		$data['query'] = $this->usuario_model->get_notificaciones($username);
        $data['total'] = $this->usuario_model->getAmigos($username);
        $data['query2'] = $this->usuario_model->get_foto_perfil($username);
        $data['error'] = '';
        $data['img'] =  base_url().'assets/uploads/'.$data['query2'][0]->img_name;        
   		$data['ho'] = 'esta';
   		$this->load->view('usuario/notificaciones', $data);
   }
   
   function aceptar_sol(){
   		$session_data = $this->session->userdata('datos');        
        $username = $session_data['username'];
        $user_from = $this->uri->segment(3);
   		$data = array(                
                'user_from' => $user_from,                                                        
         	);
        $this->usuario_model->aceptar_solicitud($data,$username);
        $data['q'] = $this->usuario_model->getUserData($username);
        $data['Nombre'] = $data['q'][0]->first_name.' '.$data['q'][0]->last_name;
        $data['query'] = $this->usuario_model->get_notificaciones($username);
        $data['total'] = $this->usuario_model->getAmigos($username);
        $data['query2'] = $this->usuario_model->get_foto_perfil($username);
        $data['error'] = '';
        $data['img'] =  base_url().'assets/uploads/'.$data['query2'][0]->img_name;        
        $data['ho'] = 'esta';
        $this->load->view('usuario/notificaciones', $data);
        	
   }

  function buscar_amigos(){    
    if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $this->usuario_model->buscar_amigos($q);
    }
  }

  function verificar_usuario(){    
    if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $this->usuario_model->verificar_usuario($q);
    }
  }

  function ir_perfil(){
   if (empty($_POST["usuario"]))
    {
        redirect('usuario/');
    }else{
        $data['error'] = '';

        
        $session_data = $this->session->userdata('datos');        
        $username = $session_data['username'];
            
        $data['user_to'] = $this->input->post('usuario');
        //$data['query2'] = $this->usuario_model->getPublicaciones($data['user_to']);
        
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
                
                //$data['query'] = $this->usuario_model->getUserData($data['user_to']);
                //$data['Nombre'] = $data['query'][0]->first_name.' '.$data['query'][0]->last_name;
                //$data['query2'] = $this->usuario_model->getPublicaciones($data['user_to']);                              
                //$data['user2'] = $data['query'][0]->username;       
                //$data['img']= base_url().'assets/uploads/'.$data['query'][0]->img_name;
                //$data['amistad']=1;
                redirect('post/ver_perfil/'.$data['user_to']);
                //$this->load->view('usuario/perfil_publico', $data);
                //echo $data['amistad'][0]->aceptada;
                                
            }else{
                //$data['query'] = $this->usuario_model->getUserData($data['user_to']);
                //$data['query2'] = $this->usuario_model->getPublicaciones($data['user_to']);
                //$data['user2'] = $data['query'][0]->username;       
                //$data['img']= base_url().'assets/uploads/'.$data['query'][0]->img_name;
                //$data['amistad'] = 0;
                //$this->load->view('usuario/perfil_publico', $data);
                redirect('usuario/index');             
                //echo $data['amistad'][0]->aceptada;
            }
                    
        }
    }
  }

  function mis_amigos(){
    $session_data = $this->session->userdata('datos');        
    $username = $session_data['username'];
    $data['query'] = $this->usuario_model->getUserData($username);
    $data['Nombre'] = $data['query'][0]->first_name.' '.$data['query'][0]->last_name;
    $data['total'] = $this->usuario_model->getAmigos($username);
    $data['query2'] = $this->usuario_model->misAmigos($username);
    $data['Nombre'] = $data['query'][0]->first_name.' '.$data['query'][0]->last_name;
    //$data['total'] = $data['query2'][0]->total;
    $data['img']= base_url().'assets/uploads/'.$data['query'][0]->img_name;
    $this->load->view('usuario/amigos', $data);

  }


   function mensajeInterno()
   {
        $session_data = $this->session->userdata('datos');        
        $username = $session_data['username'];
        $data['query'] = $this->usuario_model->getUserData($username);
        $data['Nombre'] = $data['query'][0]->first_name.' '.$data['query'][0]->last_name;
        $data['total'] = $this->usuario_model->getAmigos($username);
        $data['query2'] = $this->usuario_model->misAmigos($username);
        $data['Nombre'] = $data['query'][0]->first_name.' '.$data['query'][0]->last_name;
        $data['img']= base_url().'assets/uploads/'.$data['query'][0]->img_name;

        //set validation rules        
        $this->form_validation->set_rules('mensaje', 'Mensaje', 'required|xss_clean');
        $this->form_validation->set_rules('toUser', 'Destinatario', 'required|xss_clean');
       
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('usuario/amigos',$data);
        }
        else
        {
            $data = array(                
                'texto' => $this->input->post('mensaje'),
                'toUser' => $this->input->post('toUser'),                                
                'fromUser'=> $username,
                'fecha'=> date("Y-m-d h:i:sa")                            
            );

            //if valid            
            $this->usuario_model->mensajeInterno($data);           
            //$this->session->set_flashdata('message', '1 new entry added!');
            $this->session->set_flashdata('message', 'Su mensaje ha sido enviado!');
            redirect('usuario/mis_amigos');            
        }
       
   } 

   function verMensajesInternos(){
        $session_data = $this->session->userdata('datos');        
        $username = $session_data['username'];
        $data['q'] = $this->usuario_model->getUserData($username);
        $data['Nombre'] = $data['q'][0]->first_name.' '.$data['q'][0]->last_name;
        $data['query'] = $this->usuario_model->getMenInter($username);
        $data['total'] = $this->usuario_model->getAmigos($username);
        $data['query2'] = $this->usuario_model->get_foto_perfil($username);
        $data['error'] = '';
        $data['img'] =  base_url().'assets/uploads/'.$data['query2'][0]->img_name;        
        $data['ho'] = 'esta';
        $this->load->view('usuario/verMensajesInternos', $data);
   }

   function actualizaMenInter(){
     // Actualizacion de los like
        $Id=  $this->input->post('Id');
        //$upOrDown=  $this->input->post('upOrDown');

        $status ="false";
        $updateRecords = 0;
        $updateRecords = $this->usuario_model->updateMenInter($Id);

        if($updateRecords>0){
            $status = "true";
        }
        echo $status;
   }
}
	
	
 
?>