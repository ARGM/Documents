<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        
    }
 
    function get_my_posts($id)
    {
        //get all entry
        //$query = $this->db->get('post');
        //return $query->result();
        $this->db->where('id_user',$id);
        $this->db->order_by("date","desc");
		$query = $this->db->get('post');
		return $query->result();
    }
    
    function get_matematica()
    {        
        $sql = "SELECT usuarios.username,
        		post.date, post.title, post.description, post.id_post
        		FROM post
        		INNER JOIN usuarios ON post.id_user = usuarios.id  
        		WHERE post.categoria = 'matematicas'";
        
        $q = $this->db->query($sql);
        if($q->num_rows()>0){
			return $q->result();
		}else{
			return null;
		}
    }
    
      function get_fisica()
    {
        //get all entry
         //= $this->db->query('SELECT * FROM post where categoria = matematicas ');
        // $this->db->where('categoria','fisica');
        // $this->db->order_by("date","desc");
        // $query = $this->db->get('post');
        // return $query->result();
        $sql = "SELECT usuarios.username,
                post.date, post.title, post.description, post.id_post
                FROM post
                INNER JOIN usuarios ON post.id_user = usuarios.id  
                WHERE post.categoria = 'fisica'";
        
        $q = $this->db->query($sql);
        if($q->num_rows()>0){
            return $q->result();
        }else{
            return null;
        }
    }
    
    function get_programacion()
    {
        //get all entry
         //= $this->db->query('SELECT * FROM post where categoria = matematicas ');
        // $this->db->where('categoria','programacion');
        // $this->db->order_by("date","desc");
        // $query = $this->db->get('post');
        // return $query->result();
         $sql = "SELECT usuarios.username,
                post.date, post.title, post.description, post.id_post
                FROM post
                INNER JOIN usuarios ON post.id_user = usuarios.id  
                WHERE post.categoria = 'programacion'";
        
        $q = $this->db->query($sql);
        if($q->num_rows()>0){
            return $q->result();
        }else{
            return null;
        }
    }
    
      function get_otros()
    {
        //get all entry
         //= $this->db->query('SELECT * FROM post where categoria = matematicas ');
        // $this->db->where('categoria','otros');
        // $this->db->order_by("date","desc");
        // $query = $this->db->get('post');
        // return $query->result();
        $sql = "SELECT usuarios.username,
                post.date, post.title, post.description, post.id_post
                FROM post
                INNER JOIN usuarios ON post.id_user = usuarios.id  
                WHERE post.categoria = 'otros'";
        
        $q = $this->db->query($sql);
        if($q->num_rows()>0){
            return $q->result();
        }else{
            return null;
        }
    }
 
    function add_new_entry($data)
    {
        $data = array(
            'title' => $data['title'],
            'description' => $data['description'],
            'categoria' => $data['categoria'],
            'id_user' => $data['id_user'],
            'date' => $data['date']
        );
        $this->db->insert('post',$data);
    }
	
	function get_one_Post($id){
		$this->db->where('id_post',$id);        
        $query = $this->db->get('post');
        return $query->result();		
	}
	
	function edit($data,$id){
		$datos = array(
            'title' => $data['title'],
            'description' => $data['description'],
            'categoria' => $data['categoria']            
        );
        $this->db->where('id_post',$id);
		$query = $this->db->update('post', $datos);
        
	}
	
	function delete($id){		
        
		$this->db->delete('post',array('id_post'=>$id));

        
	}
	
	function add_comment($data)
    {
        $data = array(
            'id_post' => $data['id_post'],
            'username' => $data['username'],
            'comment' => $data['comentario'],
            'date'=> date("Y-m-d h:i:sa")            
        );
        $this->db->insert('comentarios',$data);
    }

    function delete_comments($id){
        $this->db->where('id_post',$id);
        $this->db->delete('comentarios');
        //$this->db->delete('comentarios',array('id_post'=>$id));
    }
    
    function get_comments($id){
    	$this->db->where('id_post',$id);
    	$this->db->order_by("date","desc");        
        $query = $this->db->get('comentarios');
        return $query->result();		
	}

    function updateDownVote($voteId){
        $sql = "UPDATE comentarios set DOWN_VOTE = down_vote+1 WHERE id_comentario =?";
        $this->db->query($sql, array($voteId));
        return $this->db->affected_rows();
    }

    function updateUpVote($voteId){
        $sql = "UPDATE comentarios set UP_VOTE = up_vote+1 WHERE id_comentario =?";
        $this->db->query($sql, array($voteId));
        return $this->db->affected_rows();
    }
}
 
/* End of file blog_model.php */
/* Location: ./application/models/blog_model.php */