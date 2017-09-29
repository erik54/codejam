<?php
class Home_model extends CI_Model{
	
	function get_users($data){
		if($this->home_model->is_UserExist($data['username']) == 0 ){
			return "not_registered";
		}else{
			$where = "username =" . "'" . $data['username'] . "'";
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($where);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return "success";
			} else {
				return "failed";
			}
		}
	} 
	
	function get_users_level($username){
        $query = "select level from users where username = '".$username."'";
        return $this->db->query($query)->row();
    }

    function get_users_pass($username){
        $query = "select password from users where username = '".$username."'";
        return $this->db->query($query)->row();
    }

	function is_UserExist($username){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		return $query = $this->db->get()->num_rows();
	}
}