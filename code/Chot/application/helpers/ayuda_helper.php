<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos 
if(!function_exists('get_comentarios'))
{
	function get_comentarios($id_post)
	{
        //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();
		$ci->db->where('id_post',$id_post);
		$ci->db->order_by("date","desc");
		$query = $ci->db->get('comentario_muro');
		return $query->result();
 
	}

	function get_numeroMensajes($user)
	{
        //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();		 		
 		$sql = "SELECT * FROM mensajeInterno WHERE toUser = ? and leido = 'no' "; 
		$q = $ci->db->query($sql, $user);		
		if($q->num_rows()>0){
			return $q->num_rows();
		}else{
			return 0;
		}
	}

	function get_numNotificaciones($user)
	{
        //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();		 		
 		$sql = "SELECT * FROM friend_requests WHERE user_to = ? and aceptada = 0"; 
		$q = $ci->db->query($sql, $user);		
		if($q->num_rows()>0){
			return $q->num_rows();
		}else{
			return 0;
		}
	}
}