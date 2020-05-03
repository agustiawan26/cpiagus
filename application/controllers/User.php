<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("login_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('role')==='admin'){
            $data["user"] = $this->user_model->getUser();
            $this->load->view("user", $data);
        }else{
            echo "Access Denied";
        }
    }

    public function add()
    {
        if($this->session->userdata('role')==='admin'){
            $user = $this->user_model;
            $validation = $this->form_validation;
            $validation->set_rules($user->rules());

            if ($validation->run()) {
                $user->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

            $this->load->view("admin/user/new_form");
        }else{
            echo "Access Denied";
        }
        
    }

    public function edit($id = null)
    {
        if($this->session->userdata('role')==='admin'){
            if (!isset($id)) redirect('admin/user');
       
            $user = $this->user_model;
            $validation = $this->form_validation;
            $validation->set_rules($user->rules());

            if ($validation->run()) {
                $user->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }

            $data["user"] = $user->getById($id);
            if (!$data["user"]) show_404();
            
            $this->load->view("admin/user/edit_form", $data);
        }else{
            echo "Access Denied";
        }
    }

    public function delete()
    {
        if($this->session->userdata('role')==='admin'){
            $id = $this->input->post('delete_id',TRUE);
            $this->user_model->delete_user($id);
            redirect('user');
        }else{
            echo "Access Denied";
        }
    }    
    
}