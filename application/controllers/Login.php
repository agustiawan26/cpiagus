<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }

  function index(){
    $this->load->view('loginv2');
  }

  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = password_verify($this->input->post('password', TRUE));
    $validate = $this->login_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $username  = $data['username'];
        $email = $data['email'];
        $role = $data['role'];
        $photo = $data['photo'];
        $sesdata = array(
            'username'  => $username,
            'email'     => $email,
            'role'     => $role,
            'photo' => $photo,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($role === 'admin'){
            redirect('admin');

        // access login for staff
        
        // access login for author
        }else{
            redirect('manager');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('login');
    }
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }

}
