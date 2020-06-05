<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('nilai_model');
    $this->load->model('alternatif_model');
    $this->load->helper('cpi_class');
    if (!$this->session->userdata('email')) {
      redirect('login');
    }
  }

  public function index()
  {
    $data['count'] = $this->nilai_model->getCountKriteria()->jumlah;
    $data['countwp'] = $this->nilai_model->getCountKriteriawp()->jumlah;
    $data['alternatif'] = $this->nilai_model->getAlternatif();
    $data['kriteria'] = $this->nilai_model->getKriteria();
    $data['nilai'] = $this->nilai_model->getNilai();
    $data['kriteriawp'] = $this->nilai_model->getKriteriawp();
    $data['nilaiwp'] = $this->nilai_model->getNilaiwp();
  
    //$data['message'] = $this->session->flashdata('msg');
    
    $this->load->view("nilai/nilai", $data);
    
  }

  public function updateNilai($id)
  {
    $data["form"] = $this->nilai_model->getListForm($id);
    $data["formwp"] = $this->nilai_model->getListFormwp($id);
    if ($this->input->post('updatenilai')) {
      foreach ($data["form"] as $item) {
       // $k = str_replace('ID-', '', $item->kode_kriteria);
        $this->nilai_model->updateNilai($id, $item->nilai_kriteria_id, $this->input->post($item->nilai_kriteria_id));
      }
      foreach ($data["formwp"] as $item) {
        // $k = str_replace('ID-', '', $item->kode_kriteria);
         $this->nilai_model->updateNilai($id, $item->nilai_kriteria_id, $this->input->post($item->nilai_kriteria_id));
       }
      
      $this->session->set_flashdata('msg', '<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="icofont icofont-close-line-circled"></i>
              </button>
              <strong>Berhasil Merubah Nilai</strong>
          </div>');
      redirect(base_url('nilai'));
    } elseif ($this->input->post('back')) {
      redirect(base_url('nilai'));
    } else {
      $data["selectalt"] = $this->nilai_model->getSelectedAlternatif($id);
      
      //$data['message'] = $this->session->flashdata('msg');

      //untuk value nilai di form edit
      $data['nilai_tbl'] = $this->nilai_model->getNilaialternatif($id);
      $data['nilai_tbl_wp'] = $this->nilai_model->getNilaialternatifwp($id);

      $data['parameter'] = $this->alternatif_model->getParameter();
      //var_dump($data['parameter']); die;

      $this->load->view("nilai/nilai_edit", $data);
    }
  }
}
