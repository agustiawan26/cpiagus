<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kriteria_model");
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
          redirect('login');
        }
    }

    public function index()
    {
        if ($this->input->post('addkriteriapara')) {
          $jumlahpara = $this->input->post('jumlahpara');
          redirect(base_url('kriteria/createKriteriaWP/' . $this->input->post('jumlahpara')));
        } elseif ($this->input->post('addkriteria')) {
          redirect(base_url('kriteria/createKriteria/'));
        } else {
          //$data['alternatif'] = $this->kriteria_model->get_alternatifs();
          $data['kriteria'] = $this->kriteria_model->get_kriterias();
          $data['kriteriawp'] = $this->kriteria_model->get_kriteriaswp();
          //$data['message'] = $this->session->flashdata('msg');
          $this->load->view("kriteria/kriteria", $data);
        }
    }

    public function createKriteriaWP($id)
    {
      if ($this->input->post('tambahkriteria')) {
        if (!is_numeric($this->input->post('bobot'))) {
          //notify('Gagal Memasukan Data, Bobot Harus Angka', 'error', 'kriteria/listKriteria');
        } else {
          $this->kriteria_model->createkriteriawp($id);
          redirect(base_url('kriteria'));
          
          //notify('Berhasil Menambah Kriteria', 'success', 'kriteria');
        }
      } elseif ($this->input->post('back')) {
        redirect(base_url('kriteria'));
      } else {
        
        $data['gen'] = $this->kriteria_model->getMaxKode();

        //var_dump($data['gen']); die;

        $data['jumlahpara'] = $id;
        $this->load->view('kriteria/kriteria_new_wp', $data);
      }
    }

    public function createKriteria()
    {
      
      if ($this->input->post('tambahkriteria')) {
        
          $this->kriteria_model->createkriteria();
          redirect(base_url('kriteria'));
        
      } else {

        $data['gen'] = $this->kriteria_model->getMaxKode();
        
        $this->load->view('kriteria/kriteria_new', $data);
      }
    }

    public function updateKriteriaWP($id)
    {
      if ($this->input->post('updatekriteriawp')) {
        if (!is_numeric($this->input->post('bobot'))) {
          //notify('Gagal Memasukan Data, Bobot Harus Angka', 'error', 'kriteria/listKriteria');
        } else {
          $this->kriteria_model->updatekriteriawp($id);
          redirect(base_url('kriteria'));
          //notify('Berhasil Menambah Kriteria', 'success', 'kriteria');
        }
      } elseif ($this->input->post('back')) {
        redirect(base_url('kriteria'));
      } else {
        
        $data['jumlahpara'] = $id;
        $data['select'] = $this->kriteria_model->getselectedkriteria($id);
        $data['parameter'] = $this->kriteria_model->getselectedParameter($id);
        $data['jumlahpara'] = $this->kriteria_model->countParameter($id);
        $this->load->view('kriteria/kriteria_edit_wp', $data);
      }
    }

    public function updateKriteria($id)
    {
      if ($this->input->post('updatekriteria')) {
        $this->kriteria_model->updatekriteria($id);
          redirect(base_url('kriteria'));
      } elseif ($this->input->post('back')) {
        redirect(base_url('kriteria'));
      } else {
        $data['select'] = $this->kriteria_model->getselectedkriteria($id);
        $this->load->view('kriteria/kriteria_edit', $data);
      }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
      
        $this->kriteria_model->delete_kriteria($id);
        redirect(base_url('kriteria'));
    }

}