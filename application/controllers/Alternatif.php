<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("alternatif_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $data["alternatif"] = $this->alternatif_model->getAll();
        $data['alternatif'] = $this->alternatif_model->get_alternatifs();
		$data['kriteria'] = $this->alternatif_model->get_kriterias();
        $this->load->view("alternatif", $data);
    }

    public function add()
    {
        $alternatif = $this->alternatif_model;
        $validation = $this->form_validation;
        $validation->set_rules($alternatif->rules());

        if ($validation->run()) {
            $alternatif->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view("admin/alternatif/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/alternatif');
       
        $alternatif = $this->alternatif_model;
        $validation = $this->form_validation;
        $validation->set_rules($alternatif->rules());

        if ($validation->run()) {
            $alternatif->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["alternatif"] = $alternatif->getById($id);
        if (!$data["alternatif"]) show_404();
        
        $this->load->view("admin/alternatif/edit_form", $data);
    }

    // public function delete($id=null)
    // {
    //     if (!isset($id)) show_404();
        
    //     if ($this->alternatif_model->delete($id)) {
    //         redirect(site_url('admin/alternatif'));
    //     }
    // }

    // DELETE
	// function delete($id=null){
	// 	// $id = $this->input->post('delete_id',TRUE);
	// 	if (!isset($id)) show_404();
        
    //     if ($this->alternatif_model->delete_alternatif($id)) {
    //         redirect(site_url('admin/alternatif'));
    //     }
	// }

    //CREATE
	function create(){
		$kriteria = $this->input->post('kriteria',TRUE);
		$alternatif = $this->input->post('alternatif',TRUE);
		$kecamatan = $this->input->post('kecamatan',TRUE);
		
		$this->alternatif_model->create_alternatif($alternatif,$kecamatan,$kriteria);
		redirect('alternatif');
	}

	// GET DATA alternatif BERDASARKAN kriteria ID
	function get_kriteria_by_alternatif(){
		$alternatif_id=$this->input->post('alternatif_id');
    	$data=$this->alternatif_model->get_kriteria_by_alternatif($alternatif_id)->result();
    	foreach ($data as $result) {
    		$value[] = (float) $result->kriteria_id;
    	}
    	echo json_encode($value);
	}

	//UPDATE
	function update(){
		$id = $this->input->post('edit_id',TRUE);
		$kriteria = $this->input->post('kriteria_edit',TRUE);
        $alternatif = $this->input->post('alternatif_edit',TRUE);
        $kecamatan = $this->input->post('kecamatan_edit',TRUE);
        $nilai = $this->input->post('nilai_edit',TRUE);
		$this->alternatif_model->update_alternatif($id,$kriteria,$alternatif,$kecamatan,$nilai);
		redirect('alternatif');
	}

	// DELETE
	function delete(){
		$id = $this->input->post('delete_id',TRUE);
		$this->alternatif_model->delete_alternatif($id);
		redirect('alternatif');
	}
}