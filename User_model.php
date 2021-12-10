<?php

class User_model extends CI_Model
{
	private $_table ="users";

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["user_id" => $id])->row();
	}

	public function doLogin(){
		$post = $this->input->post();

		$this->db->where('username', $post["username"]);
		$user = $this->db->get($this->_table)->row();

		if($user){
			$isPasswordTrue = password_verify($post["password"], $user->password);
			$isAdmin = $user->role =="admin";
			if($isPasswordTrue && $isAdmin){
				$this->session->set_userdata(['user_logged' => $user]);
				$this->_updateLastLogin($user->user_id);
				return true;
			}
		}
		return false;
	}

		public function isNotLogin(){
			if(empty($this->session->userdata('user_logged')));
		}
		
		private function _updateLastLogin($user_id){
			$sql = "UPDATE {$this->_table} SET last_login=now() where user_id={$user_id}";
			$this->db->query($sql);
	}
}