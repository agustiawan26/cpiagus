<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("alternatif_model");
        $this->load->model("kriteria_model");
        $this->load->model("nilai_model");
		$this->load->model("hitung_model");
		
        $this->load->library('form_validation');
        $this->load->helper('cpi_class');
	}
	
	public function index()
	{
		$data['count'] = $this->hitung_model->getCountKriteria()->jumlah;
        $data['alternatiff'] = $this->nilai_model->getAlternatif(); // show in Nilai
        $data['alternatif'] = $this->nilai_model->getAlternatif(); // show in Alternatif and Hitung
        $data['kriteria'] = $this->nilai_model->getKriteria();
        $data['nilai'] = $this->nilai_model->getNilai();
        $datatp['nilai-tren-positif'] = $this->hitung_model->getNilaiTrenPositif();
        $datatn['nilai-tren-negatif'] = $this->hitung_model->getNilaiTrenNegatif();
        $datamin['nilai_min'] = $this->hitung_model->getNilaiMinimum();
        $datatren['tren'] = $this->hitung_model->getTren();
    

        $rows = $this->nilai_model->getAlternatif();
        foreach($rows as $row){
            $ALT[$row->alternatif_id] = $row->alternatif;
        } 
        $data['alt'] = $ALT;

        $rows = $this->nilai_model->getKriteria();
        foreach($rows as $row){
            $KRT[$row->kriteria_id] = array(
                'kriteria'=>$row->kriteria,
                'bobot'=>$row->bobot,
                'tren'=>$row->tren
            );
        }
        $data['krt'] = $KRT;

        foreach($data['krt'] as $key => $val){
            $bobot[$key] = $val['bobot'];
        }
        
        $data['cpi'] = new Cpi($data['nilai'], $datamin['nilai_min'], $datatren['tren'], $datatp['nilai-tren-positif'], $datatn['nilai-tren-negatif'],  $bobot);

        //var_dump($data['krtn']);die;
		$data['rank'] = $this->get_rank($data['cpi']->nilaicpi);

		// $data['count'] = $this->nilai_model->getCountKriteria()->jumlah;
		// $data['alternatif'] = $this->nilai_model->getAlternatif();
		// $data['kriteria'] = $this->nilai_model->getKriteria();
		// $data['nilai'] = $this->nilai_model->getNilai();
    
         //   var_dump($data['nilai']);die;

  
    //$data['message'] = $this->session->flashdata('msg');
    

		$this->load->view("landingpagev2", $data);
		
    }

    function get_rank($array){
        $data = $array;
        arsort($data);
        $no=1;
        $new = array();
        foreach($data as $key => $value){
            $new[$key] = $no++;
        }
        return $new;
    }
		
}
