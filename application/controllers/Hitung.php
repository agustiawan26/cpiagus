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
        $data['counttp'] = $this->hitung_model->getCountKriteriaTP()->jumlah;
        $data['alternatif'] = $this->hitung_model->getAlternatif();
        $data['kriteria'] = $this->hitung_model->getKriteria();
        $data['nilai'] = $this->hitung_model->getNilai();
        $datatp['nilai_tren_positif'] = $this->hitung_model->getNilaiTrenPositif();
        $datatn['nilai_tren_negatif'] = $this->hitung_model->getNilaiTrenNegatif();

        //$data['kriteriatp'] = $this->hitung_model->getKriteriaTP();

        $datamin['nilai_min'] = $this->hitung_model->getNilaiMinimum();
        $data['nilai_min'] = $this->nilai_model->getNilaiMinimum();
        $data['transform'] = $this->hitung_model->getTransform();

        $datatren['tren'] = $this->hitung_model->getTren();
        $data['tren'] = $this->nilai_model->getTren();

        //$data['trenn'] = $this->nilai_model->getNilaiTren();

        

        $rows = $this->nilai_model->getAlternatif();
        foreach($rows as $row){
            $ALT[$row->alternatif_id] = $row->alternatif;
        } 
        $data['alt'] = $ALT;

        //untuk header  nilai
        $bariss = $this->hitung_model->getKriteria();
        foreach($bariss as $baris){
            $KRITERIAA[$baris->kriteria_id] = $baris->kriteria;
        } 
        $data['kriteriaa'] = $KRITERIAA;

        //untuk header di perhitungan transformasi nilai dengan tren positif
        $rows = $this->hitung_model->getKriteriaTP();
        foreach($rows as $row){
            $KRTP[$row->kriteria_id] = $row->kriteria;
        } 
        //$data['krtp'] = array_slice($KRTP,0);
        $data['krtp'] = array_filter(array_merge(array(0), $KRTP));


        //untuk header di perhitungan transformasi nilai dengan tren negatif
        $rows = $this->hitung_model->getKriteriaTN();
        foreach($rows as $row){
            $KRTN[$row->kriteria_id] = $row->kriteria;
        } 
        
        //$data['krtn'] = array_slice($KRTN,0);
        $data['krtn'] = array_filter(array_merge(array(0), $KRTN));

        //untuk header di perhitungan transformasi nilai dengan tren negatif
        // $rows = $this->hitung_model->getKriteriaTN();
        // foreach($rows as $row){
        //     $KRTN[$row->kriteria_id] = $row->kriteria;
        // } 
        // $data['krtn'] = array_slice($KRTN,0);

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
        
        $data['cpi'] = new Cpi($data['nilai'], $datamin['nilai_min'], $datatren['tren'], $datatp['nilai_tren_positif'], $datatn['nilai_tren_negatif'],  $bobot);

        //var_dump($data['krtn']);die;
        
        $this->load->view("perhitungan", $data);
    }

    public function peringkat()
    {        
        // $data['count'] = $this->hitung_model->getCountKriteria()->jumlah;
        $data['alternatif'] = $this->hitung_model->getAlternatif();
        $data['kriteria'] = $this->hitung_model->getKriteria();
        $data['nilai'] = $this->hitung_model->getNilai();
        $datatp['nilai_tren_positif'] = $this->hitung_model->getNilaiTrenPositif();
        $datatn['nilai_tren_negatif'] = $this->hitung_model->getNilaiTrenNegatif();
        $datamin['nilai_min'] = $this->hitung_model->getNilaiMinimum();
        $data['nilai_min'] = $this->nilai_model->getNilaiMinimum();
        $data['transform'] = $this->hitung_model->getTransform();
        $datatren['tren'] = $this->hitung_model->getTren();
        $data['tren'] = $this->nilai_model->getTren();


        $rows = $this->nilai_model->getAlternatif();
        foreach($rows as $row){
            $ALT[$row->alternatif_id] = $row->alternatif;
        } 
        $data['alt'] = $ALT;

        //untuk header 
        $bariss = $this->nilai_model->getKriteria();
        foreach($bariss as $baris){
            $KRITERIAA[$baris->kriteria_id] = $baris->kriteria;
        } 
        $data['kriteriaa'] = $KRITERIAA;


        //untuk header di perhitungan transformasi nilai dengan tren positif
        $rows = $this->hitung_model->getKriteriaTP();
        foreach($rows as $row){
            $KRTP[$row->kriteria_id] = $row->kriteria;
        } 
        $data['krtp'] = $KRTP;

        //untuk header di perhitungan transformasi nilai dengan tren negatif
        $rows = $this->hitung_model->getKriteriaTN();
        foreach($rows as $row){
            $KRTN[$row->kriteria_id] = $row->kriteria;
        } 
        $data['krtn'] = $KRTN;

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
        
        $data['cpi'] = new Cpi($data['nilai'], $datamin['nilai_min'], $datatren['tren'], $datatp['nilai_tren_positif'], $datatn['nilai_tren_negatif'],  $bobot);

        //var_dump($data['cpi']);die;
        $data['rank'] = $this->get_rank($data['cpi']->nilaicpi);
        $this->load->view("peringkat", $data);
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