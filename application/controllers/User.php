<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('login');
            
        }
    }

    public function index()
    {
        if($this->session->userdata('role')==='admin'){
            $data["user"] = $this->user_model->getUser();
            $this->load->view("user/user", $data);
        }else{
            // echo "Access Denied";
            show_404();
        }
    }

  public function createUser()
    {
        if($this->session->userdata('role')==='admin'){
            if ($this->input->post('tambahuser')) {
                //var_dump($_POST);die;
                $this->user_model->createuser();
                //var_dump($_POST);die;
                redirect(base_url('user'));
            } else {
                $data['gen'] = $this->user_model->getMaxKode();
                //var_dump($data['gen']);die;
                $this->load->view('user/user_new', $data);
            }
        }else{
            // echo "Access Denied";
            show_404();
        }        
    }

    public function updateUser($id)
    {
        if($this->session->userdata('role')==='admin'){
            if ($this->input->post('updateuser')) {
                //($_POST);die;
                $this->user_model->updateuser($id);
                redirect(base_url('user'));
                //notify('Berhasil Menambah Kriteria', 'success', 'kriteria');
            } elseif ($this->input->post('back')) {
                redirect(base_url('user'));
            } else {
                //$data['gen'] = $this->kriteria_model->getMaxKode();
                $data['select'] = $this->user_model->getselecteduser($id);
                
                $this->load->view('user/user_edit', $data);
            }
        }else{
            // echo "Access Denied";
            show_404();
        }   
    }

    public function delete($id=null)
    {
        if($this->session->userdata('role')==='admin'){
            if (!isset($id)) show_404();
        
            $this->user_model->delete_user($id);
            redirect(base_url('user'));
        }else{
            // echo "Access Denied";
            show_404();
        }   
    }
    
}