<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	
	public function _construct()
	{
		parent::_construct();
	}

	# 123-admin
	public function login($username,$password){
		$sql = "SELECT * FROM usuarios WHERE username = ? and password = ?"; 

		$q = $this->db->query($sql, array($username, $password));		
		if($q->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function getUserId($username='')
	{
		$sql = "SELECT * FROM usuarios WHERE username = ?"; 
		$q = $this->db->query($sql, $username);		
		if($q->num_rows()>0){
			return $q->row();
		}else{
			return null;
		}
	}
	
	public function getUserData($username='')
	{
		//$this->db->where('username',$username);        
		//$query = $this->db->get('usuarios');
		//return $query->result();
		
		$sql = "SELECT usuarios.first_name,
				usuarios.email,
        		usuarios.last_name,
        		usuarios.username,
        		uploads.img_name
        		FROM usuarios
        		INNER JOIN uploads ON usuarios.username = uploads.username
        		WHERE usuarios.username = ?";
        
        $q = $this->db->query($sql, $username);
        if($q->num_rows()>0){
			return $q->result();
		}else{
			return null;
		}	
	}
	
	public function add_publicacion($data){
		$data = array(
            'body' => $data['publicacion'],
            'username' => $data['username'],
            'date_added'=> date("Y-m-d h:i:sa")                     
        );
        $this->db->insert('muro',$data);
	}
	
	public function getPublicaciones($username='')
	{
		$this->db->where('username',$username);
		$this->db->order_by("date_added","desc");        
        $query = $this->db->get('muro');
        return $query->result();
	}
	
	
	function delete($id){		
        
		$this->db->delete('muro',array('id'=>$id));
        
	}

	function eliminarAmistad($username, $toUser){
		$sql = "DELETE FROM friend_requests WHERE 
		       (user_to='$username' AND user_from='$toUser') OR  
		       (user_to='$toUser' AND user_from = '$username')";
		$this->db->query($sql);
	}
	
	function editarPublicacion($data, $id){
		$datos = array(
            'body' => $data['body'],
                        
        );
        $this->db->where('id',$id);
		$query = $this->db->update('muro', $datos);
	}
	
	function edit_nombre($data, $username){
		$datos = array(
            'first_name' => $data['fname'],
                        
        );
        $this->db->where('username',$username);
		$query = $this->db->update('usuarios', $datos);
	}
	
	function edit_apellido($data, $username){
		$datos = array(
            'last_name' => $data['lname'],
                        
        );
        $this->db->where('username',$username);
		$query = $this->db->update('usuarios', $datos);
	}
	
	function edit_email($data, $username){
		$datos = array(
            'email' => $data['email'],
                        
        );
        $this->db->where('username',$username);
		$query = $this->db->update('usuarios', $datos);
	}
	
	function edit_password($data, $username){
		$datos = array(
            'password' => $data['password'],
                        
        );
        $this->db->where('username',$username);
		$query = $this->db->update('usuarios', $datos);
	}
	
	function add_image($data)
	{
		$this->db->insert('uploads',$data);
	}
	
	function get_foto_perfil($username=''){	
		$sql = "SELECT * FROM uploads WHERE username = ?"; 
		$q = $this->db->query($sql, $username);		
		if($q->num_rows()>0){
			return $q->result();
		}else{
			return null;
		}	
	}
	
	function actualizar_foto_perfil($data, $username){
		$datos = array(
            'img_name' => $data['img_name'],
                        
        );
        $this->db->where('username',$username);
		$query = $this->db->update('uploads', $datos);
	}

	function solicitud_amistad($data){
		$data = array(
            'user_from' => $data['user_from'],
            'user_to' => $data['user_to'],
            'enviada' => 1                     
        );
        $this->db->insert('friend_requests',$data);
		
	}
	
	function get_notificaciones($username=''){
		$sql = "SELECT user_from FROM friend_requests WHERE user_to = ? and aceptada = 0"; 
		$q = $this->db->query($sql, $username);		
		if($q->num_rows()>0){
			return $q->row();
		}else{
			return null;
		}		
	}
	
	function aceptar_solicitud($data, $username){
		$sql = "UPDATE friend_requests SET aceptada=1 WHERE user_to=? and user_from = '$data[user_from]'";		
        $q = $this->db->query($sql, $username);	
		
	}
	
	function ver_amistad($user_to, $user_from){
				
		$this->db->select('*');
		$this->db->from('friend_requests');
		$where = "(user_to='$user_to' AND user_from='$user_from') OR (user_to='$user_from' AND user_from='$user_to')";
		$this->db->where($where);		
		$q = $this->db->get();
		if($q->num_rows()>0){
			return $q->result();
		}else{
			return null;
		}
	}



	function buscar_amigos($q){
	    $this->db->select('*');
	    $this->db->like('username', $q);
	    $query = $this->db->get('usuarios');
	    if($query->num_rows > 0){
	      foreach ($query->result_array() as $row){
	        //$row_set['label'] = htmlentities(stripslashes($row['username'])); //build an array
	        //$new_row['value']=htmlentities(stripslashes($row['email']));
	        $row_set[] = htmlentities(stripslashes($row['username']));
        	//$row_set[] = $new_row; //build an array
	        
	         
	      }
	      echo json_encode($row_set); //format the array into json data
	    }else{
	    	 $row_set[] = htmlentities(stripslashes('Usuario no encontrado'));
	    	 echo json_encode($row_set); //format the array into json data
	    }
  	}

  	function verificar_usuario($q){
	    $this->db->select('*');
	    $this->db->like('username', $q);
	    $query = $this->db->get('usuarios');
	    if($query->num_rows > 0){
	      //foreach ($query->result_array() as $row){
	        //$row_set['label'] = htmlentities(stripslashes($row['username'])); //build an array
	        //$new_row['value']=htmlentities(stripslashes($row['email']));
	        $row_set[] = htmlentities(stripslashes('Usuario no disponible'));
	        
        	//$row_set[] = $new_row; //build an array
	        
	         
	      //}
	      echo json_encode($row_set);
	    }else{
	    	 $row_set[] = htmlentities(stripslashes('Usuario disponible'));
	    	 echo json_encode($row_set); //format the array into json data
	    }
  	}

  	function updateDownVote($voteId){
		$sql = "UPDATE muro set DOWN_VOTE = down_vote+1 WHERE id =?";
		$this->db->query($sql, array($voteId));
		return $this->db->affected_rows();
	}

	function updateUpVote($voteId){
		$sql = "UPDATE muro set UP_VOTE = up_vote+1 WHERE id =?";
		$this->db->query($sql, array($voteId));
		return $this->db->affected_rows();
	}

	function comentar_muro($data){
		
		//$sql = "INSERT INTO comentario_muro values comentario = '$comentario' WHERE id_post =?";
		//$this->db->query($sql, array($id_post));
		$this->db->insert('comentario_muro',$data);
		
	}

	public function getAmigos($username)
	{
		$this->db->select('count(user_from) as total');
		$this->db->from('friend_requests');
		$where = "(user_from='$username' AND aceptada = 1)";
		$this->db->where($where);		
		$q1 = $this->db->get();
		if($q1->num_rows()>0){
			$row = $q1->row();
			$a = $row->total;   
		}else{
			$a = 0;
		}

		$this->db->select('count(user_to) as total');
		$this->db->from('friend_requests');
		$where = "(user_to='$username' AND aceptada = 1)";
		$this->db->where($where);		
		$q2 = $this->db->get();
		if($q2->num_rows()>0){
			$row = $q2->row();
			$b = $row->total; 
		}else{
			$b =  0;
		}

		return $a+$b;		
	}

	public function misAmigos($username){

		$this->db->select('user_to as amigo');
		$this->db->distinct();
		$this->db->from('friend_requests');
		$where = "(user_from='$username' AND aceptada = 1)";
		$this->db->where($where);		
		$this->db->get();
		$query1 = $this->db->last_query();
		
		$this->db->select('user_from as amigo');
		$this->db->distinct();
		$this->db->from('friend_requests');
		$where = "(user_to='$username' AND aceptada = 1)";
		$this->db->where($where);		
		$this->db->get();
		$query2 = $this->db->last_query();

		$query = $this->db->query($query1." UNION ".$query2);

		if($query->num_rows()>0){
			return $query->result();
		}else{
			return null;
		}
	}

	public function mensajeInterno($data)
	{
		$data = array(
            'toUser' => $data['toUser'],
            'fromUser' => $data['fromUser'],
            'fecha' => $data['fecha'],
            'texto' => $data['texto'],
            'leido' => 'no',                                                               
        );
        $this->db->insert('mensajeInterno',$data);
	}

	public function getMenInter($username='')
	{
		$sql = "SELECT * FROM mensajeInterno WHERE toUser = ? order by fecha desc"; 

		$q = $this->db->query($sql, $username);		
		if($q->num_rows()>0){
			return $q->result();
		}else{
			return null;
		}	
	}

	function updateMenInter($Id){
        $sql = "UPDATE mensajeInterno set leido = 'si' WHERE id =?";
        $this->db->query($sql, array($Id));
        return $this->db->affected_rows();
    }

	
}

/* End of file welcome.php */
/* Location: ./application/models/usuario_model.php */