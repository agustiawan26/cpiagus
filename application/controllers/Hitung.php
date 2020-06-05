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
        if (!$this->session->userdata('email')) {
            redirect('login');
        }

    }

    public function index()
    {
        $a = $this->nilai_model->getNilaiNilai();
        if($a !== 0){

            $data['nilai'] = $this->hitung_model->getNilai(); // untuk perhitungan
            $datatp['nilai_tren_positif'] = $this->hitung_model->getNilaiTrenPositif(); // untuk mendapatkan nilai dg tren positif
            $datatn['nilai_tren_negatif'] = $this->hitung_model->getNilaiTrenNegatif(); // untuk mendapatkan nilai dg tren positif
            $datamin['nilai_min'] = $this->hitung_model->getNilaiMinimum(); // datamin untuk perhitungan
            $data['nilai_min'] = $this->nilai_model->getNilaiMinimum(); //untuk menampilkan nilai min tiap kriteria tahap 1
            $data['tren'] = $this->nilai_model->getTren();   //untuk menampilkan tren tiap kriteria tahap 1      

            // menampilkan data alternatif
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
            $data['kriteriaa'] = array_filter(array_merge(array(0), $KRITERIAA));

            //untuk header di perhitungan transformasi nilai dengan tren positif
            $rows = $this->hitung_model->getKriteriaTP();
            foreach($rows as $row){
                $KRTP[$row->kriteria_id] = $row->kriteria;
            } 
            $data['krtp'] = array_filter(array_merge(array(0), $KRTP));

            //untuk header di perhitungan transformasi nilai dengan tren negatif
            $rows = $this->hitung_model->getKriteriaTN();
            foreach($rows as $row){
                $KRTN[$row->kriteria_id] = $row->kriteria;
            }             
            $data['krtn'] = array_filter(array_merge(array(0), $KRTN));

            //untuk perhitungan nilai CPI
            $rows = $this->hitung_model->getKriteria();
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
            
            $data['cpi'] = new Cpi($data['nilai'], $datamin['nilai_min'], $datatp['nilai_tren_positif'], $datatn['nilai_tren_negatif'],  $bobot);

            
            //var_dump($a);die;
            $this->load->view("perhitungan", $data);
        } else {
            //ini masih belum work
            $this->load->view("nilai/nilai", $data);
            //set flashdata jika ada nilai 0 disini
        }
    }

    public function peringkat()
    {        
        $data['nilai'] = $this->hitung_model->getNilai(); // untuk perhitungan
        $datatp['nilai_tren_positif'] = $this->hitung_model->getNilaiTrenPositif(); // untuk mendapatkan nilai dg tren positif
        $datatn['nilai_tren_negatif'] = $this->hitung_model->getNilaiTrenNegatif(); // untuk mendapatkan nilai dg tren positif
        $datamin['nilai_min'] = $this->hitung_model->getNilaiMinimum(); // datamin untuk perhitungan
        $data['nilai_min'] = $this->nilai_model->getNilaiMinimum(); //untuk menampilkan nilai min tiap kriteria tahap 1
        $data['tren'] = $this->nilai_model->getTren();   //untuk menampilkan tren tiap kriteria tahap 1      

        $rows = $this->nilai_model->getAlternatif();
        foreach($rows as $row){
            $ALT[$row->alternatif_id] = $row->alternatif;
        } 
        $data['alt'] = $ALT;

        //untuk header 
        $bariss = $this->hitung_model->getKriteria();
        foreach($bariss as $baris){
            $KRITERIAA[$baris->kriteria_id] = $baris->kriteria;
        } 
        $data['kriteriaa'] = array_filter(array_merge(array(0), $KRITERIAA));


        //untuk header di perhitungan transformasi nilai dengan tren positif
        $rows = $this->hitung_model->getKriteriaTP();
        foreach($rows as $row){
            $KRTP[$row->kriteria_id] = $row->kriteria;
        } 
        $data['krtp'] = array_filter(array_merge(array(0), $KRTP));

        //untuk header di perhitungan transformasi nilai dengan tren negatif
        $rows = $this->hitung_model->getKriteriaTN();
        foreach($rows as $row){
            $KRTN[$row->kriteria_id] = $row->kriteria;
        } 
        $data['krtn'] = $KRTN;

        $rows = $this->hitung_model->getKriteria();
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
        
        $data['cpi'] = new Cpi($data['nilai'], $datamin['nilai_min'], $datatp['nilai_tren_positif'], $datatn['nilai_tren_negatif'],  $bobot);

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