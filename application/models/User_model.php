<?php

class User_model extends CI_Model
{
    private $_table = "user";

    public $user_id;
    public $full_name;
    public $password;
    public $email;
    public $role;

    public function rules()
    {
        return [
            ['field' => 'full_name',
            'label' => 'Name',
            'rules' => 'required'],
			
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[3]'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getUser()
    {
        $query = $this->db->get('user');
		return $query;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->username = $post["username"];
        $this->full_name = $post["full_name"];
        $this->email = $post["email"];
        $this->phone = $post["phone"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->role = $post["role"] ?? "manager";
        $this->photo = $this->_uploadPhoto();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->user_id = $post["id"];
        $this->username = $post["username"];
        $this->full_name = $post["full_name"];
        $this->email = $post["email"];
        $this->phone = $post["phone"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->role = $post["role"] ?? "manager";

        if (!empty($_FILES["photo"]["name"])) {
            $this->photo = $this->_uploadPhoto();
        } else {
            $this->photo = $post["old_photo"];
		}

        $this->db->update($this->_table, $this, array('user_id' => $post['id']));
    }

    public function doLogin(){
		$post = $this->input->post();

        $this->db->where('email', $post["email"])
                ->or_where('username', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        if($user){
            $isPasswordTrue = password_verify($post["password"], $user->password);
            $isAdmin = $user->role == "admin";
            if($isPasswordTrue && $isAdmin){ 
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->user_id);
                return true;
            }
		}
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

    public function delete($id)
    {
        $this->_deletePhoto($id);
        return $this->db->delete($this->_table, array("user_id" => $id));
    }

    private function _uploadPhoto()
	{
		$config['upload_path']          = './upload/user/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->user_id;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('photo')) {
			return $this->upload->data("file_name");
		}
        
        // print_r($this->upload->display_errors());
		return "user.png";
	}

	private function _deletePhoto($id)
	{
		$user = $this->getById($id);
		if ($user->photo != "user.png") {
			$filename = explode(".", $user->photo)[0];
			return array_map('unlink', glob(FCPATH."upload/user/$filename.*"));
		}
    }
    
    public function countUser()
    {
        //$query = $this->db->get('count_admin');
        $query = $this
            ->db
            ->query("SELECT COUNT(user_id) as jumlah_user FROM user");
        return $query->row();
    }
    public function getCountUser(){
        $query = $this->db->query("SELECT COUNT(*) as jumlah_user FROM user");
        return $query->row();
    }

    // DELETE
	function delete_user($id){
		$this->db->trans_start();
            $this->_deletePhoto($id);
            $this->db->delete($this->_table, array("user_id" => $id));
		$this->db->trans_complete();
	}
}
