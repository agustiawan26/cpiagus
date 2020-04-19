<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("parameter_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["parameter"] = $this->parameter_model->getAll();
        $this->load->view("admin/parameter/list", $data);
    }

    public function add()
    {
        $parameter = $this->parameter_model;
       
        $validation = $this->form_validation;
        
        $validation->set_rules($parameter->rules());

        if ($validation->run()) {
            $parameter->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/parameter/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/parameter');
       
        $parameter = $this->parameter_model;
        $validation = $this->form_validation;
        $validation->set_rules($parameter->rules());

        if ($validation->run()) {
            $parameter->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["parameter"] = $parameter->getById($id);
        if (!$data["parameter"]) show_404();
        
        $this->load->view("admin/parameter/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->parameter_model->delete($id)) {
            redirect(site_url('admin/parameter'));
        }
    }
}