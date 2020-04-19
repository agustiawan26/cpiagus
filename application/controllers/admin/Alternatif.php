<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("alternatif_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["alternatif"] = $this->alternatif_model->getAll();
        $this->load->view("admin/alternatif/list", $data);
    }

    public function add()
    {
        $alternatif = $this->alternatif_model;
        $validation = $this->form_validation;
        $validation->set_rules($alternatif->rules());

        if ($validation->run()) {
            $alternatif->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        

        $this->load->view("admin/alternatif/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/alternatif');
       
        $alternatif = $this->alternatif_model;
        $validation = $this->form_validation;
        $validation->set_rules($alternatif->rules());

        if ($validation->run()) {
            $alternatif->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["alternatif"] = $alternatif->getById($id);
        if (!$data["alternatif"]) show_404();
        
        $this->load->view("admin/alternatif/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->alternatif_model->delete($id)) {
            redirect(site_url('admin/alternatif'));
        }
    }
}