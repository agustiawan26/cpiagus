<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hitung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("alternatif_model");
        $this->load->model("kriteria_model");
        $this->load->model("user_model");
        $this->load->model("nilai_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $data['count'] = $this->nilai_model->getCountKriteria()->jumlah;
        $data['alternatif'] = $this->nilai_model->getAlternatif();
        $data['kriteria'] = $this->nilai_model->getKriteria();
        $data['nilai'] = $this->nilai_model->getNilai();
        $data['nilai_min'] = $this->nilai_model->getNilaiMinimum();
        $data['tren_positif'] = $this->nilai_model->getTransformpositif();
        $data['tren_negatif'] = $this->nilai_model->getTransformnegatif();



        // var_dump($data['tren-positif']);die;

        $this->load->view("admin/hitung/perhitungan", $data);
    }
}