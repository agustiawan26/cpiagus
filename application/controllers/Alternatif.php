<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("alternatif_model");
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
    }

    public function index()
    {       
        if ($this->input->post('addalternatif')) {
            redirect(base_url('createAlternatif/'));
        } else {
            $data['alternatif'] = $this->alternatif_model->getAll();
            //$data['kriteria'] = $this->alternatif_model->get_kriterias();
            $this->load->view("alternatif/alternatif", $data);
        }
    }

    public function createAlternatif()
    {
      
        if ($this->input->post('tambahalternatif')) {
            
            $this->alternatif_model->createalternatif();
            redirect(base_url('alternatif'));
        } else {
            $data['gen'] = $this->alternatif_model->getMaxKode();
        
            $this->load->view('alternatif/alternatif_new', $data);
        }
    }

    public function updateAlternatif($id)
    {
        if ($this->input->post('updatealternatif')) {
    
            $this->alternatif_model->updatealternatif($id);
            redirect(base_url('alternatif'));
            //notify('Berhasil Menambah Kriteria', 'success', 'kriteria');
        
        } elseif ($this->input->post('back')) {
            redirect(base_url('alternatif'));
        } else {
            $data['select'] = $this->alternatif_model->getselectedalternatif($id);
            $this->load->view('alternatif/alternatif_edit', $data);
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        $this->alternatif_model->delete_alternatif($id);
        redirect(base_url('alternatif'));
        
    }
 
}