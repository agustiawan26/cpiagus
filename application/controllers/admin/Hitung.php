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
        $this->load->model("hitung_model");

        $this->load->library('form_validation');
        $this->load->helper('cpi_class');

    }

    public function index()
    {
        
        $data['count'] = $this->hitung_model->getCountKriteria()->jumlah;
        $data['alternatif'] = $this->hitung_model->getAlternatif();
        $data['kriteria'] = $this->hitung_model->getKriteria();
        $data['nilai'] = $this->hitung_model->getNilai();
        $datamin['nilai_min'] = $this->hitung_model->getNilaiMinimum();
        $data['transform'] = $this->hitung_model->getTransform();
        $data['tren'] = $this->hitung_model->getTren();
        //$data['trenn'] = $this->nilai_model->getNilaiTren();

        $rows = $this->nilai_model->getAlternatif();
        foreach($rows as $row){
            $ALT[$row->alternatif_id] = $row->alternatif;
        } 
        $data['alt'] = $ALT;

        $rows = $this->nilai_model->getKriteria();
        foreach($rows as $row){
            $KRT[$row->kriteria_id] = array(
                'kriteria'=>$row->kriteria,
                'bobot'=>$row->bobot
            );
        }
        $data['krt'] = $KRT;

        foreach($data['krt'] as $key => $val){
            $bobot[$key] = $val['bobot'];
        }
        
        
        // $data['nilai'] = $this->nilai_model->getNilaiMin();
        // $data['cpi'] = new Cpi($datamin['nilai_min'], $bobot);
        $data['cpi'] = new Cpi($data['nilai'], $datamin['nilai_min'], $bobot);


var_dump($data['cpi']);die;
        $this->load->view("admin/hitung/perhitungan", $data);
    }

    public function peringkat()
    {
        $this->load->view("admin/hitung/peringkat");
    }
}