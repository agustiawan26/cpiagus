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
    $data['nilai_kolom'] = $this->nilai_model->getNilaikolom();
    
    // $data['view_name'] = "nilai/nilai";
    $data['message'] = $this->session->flashdata('msg');
    //$data['kriteria'] = $this->nilai_model->getkriteria();
    // $data['parameter'] = $this->alternatif_model->getParameter();
    // var_dump($data['nilai_kolom']);die;
    $this->load->view("admin/nilai/list", $data);
    
  }

  public function updateNilai($id)
  {
    $data["form"] = $this->nilai_model->getListForm($id);
    if ($this->input->post('updatenilai')) {
      foreach ($data["form"] as $item) {
       // $k = str_replace('ID-', '', $item->kode_kriteria);
        $this->nilai_model->updateNilai($id, $item->kriteria_id, $this->input->post($item->kriteria_id));
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
      
      $data['message'] = $this->session->flashdata('msg');
      $data['nilai_tbl'] = $this->nilai_model->getNilaitabel();
      $this->load->view("admin/nilai/edit_form", $data);
    }
  }

  public function getListForm($id){
    //    $query = $this->db->query("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria,ra.nilai FROM tbl_relasi ra INNER JOIN tbl_kriteria k ON k.kode_kriteria=ra.kode_kriteria  WHERE kode_alternatif='$id' ORDER BY kode_kriteria");
        
    // return $this->db->query('SELECT a.ID, a.kode_kriteria, a.nilai ,b.nama_parameter,c.nama_kriteria FROM tbl_relasi as a INNER JOIN tbl_parameter as b on (a.kode_kriteria = b.kode_kriteria and a.nilai= b.nilai_parameter), tbl_kriteria as c WHERE kode_alternatif= "'.$id.'" and c.kode_kriteria = a.kode_kriteria ORDER BY kode_kriteria')->result();
    return $this->db->query('SELECT a.ID, a.kriteria_id, a.nilai ,c.kriteria FROM nilai as a INNER JOIN tbl_kriteria as c WHERE alternatif_id = "'.$id.'" and c.kriteria_id = a.kriteria_id ORDER BY kriteria_id')->result();

      }
}
