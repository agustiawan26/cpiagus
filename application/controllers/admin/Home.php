<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("alternatif_model");
        $this->load->model("kriteria_model");
        $this->load->model("user_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["jml_alternatif"] = $this->alternatif_model->getCountAlternatif();
        $data["jml_kriteria"] = $this->kriteria_model->getCountKriteria();
        $data["jml_user"] = $this->user_model->getCountUser();

        $this->load->view("admin/overview", $data);
    }
}