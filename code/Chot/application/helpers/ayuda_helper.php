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
		$query = $ci->db->get('comentario_muro');
		return $query->result();
 
	}
}