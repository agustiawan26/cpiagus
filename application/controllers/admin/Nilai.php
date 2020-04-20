<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('nilai_model');
    $this->load->model('alternatif_model');
    // if (!$this->session->userdata['login']) {
    //   // redirect(base_url('login'));
    //   notify('Session Anda Sudah Habis, Silakan Login Ulang', 'Warning', 'login');
    // }
  }

  public function index()
  {
    $data['count'] = $this->nilai_model->getCountKriteria()->jumlah;
    $data['alternatif'] = $this->nilai_model->getAlternatif();
    $data['kriteria'] = $this->nilai_model->getKriteria();
    $data['nilai'] = $this->nilai_model->getNilai();
    
    
    // $data['view_name'] = "nilai/nilai";
    $data['message'] = $this->session->flashdata('msg');
    //$data['kriteria'] = $this->nilai_model->getkriteria();
    // $data['parameter'] = $this->alternatif_model->getParameter();
    //var_dump($data['nilai_min']);die;
    $this->load->view("admin/nilai/list", $data);
    
  }

  public function updateNilai($id)
  {
    $data["form"] = $this->nilai_model->getListForm($id);
    if ($this->input->post('updatenilai')) {
      foreach ($data["form"] as $item) {
       // $k = str_replace('ID-', '', $item->kode_kriteria);
        $this->nilai_model->updateNilai($id, $item->nilai_kriteria_id, $this->input->post($item->nilai_kriteria_id));
      }
      $this->session->set_flashdata('msg', '<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="icofont icofont-close-line-circled"></i>
              </button>
              <strong>Berhasil Merubah Nilai</strong>
          </div>');
      redirect(base_url('admin/nilai'));
    } elseif ($this->input->post('back')) {
      redirect(base_url('admin/nilai'));
    } else {
      $data["selectalt"] = $this->nilai_model->getSelectedAlternatif($id);
      
      $data['message'] = $this->session->flashdata('msg');
      $data['nilai_tbl'] = $this->nilai_model->getNilaialternatif($id);
      $this->load->view("admin/nilai/edit_form", $data);
    }
  }

}
