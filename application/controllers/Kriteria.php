<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kriteria_model");
        $this->load->library('form_validation');
    }

    // public function index()
    // {
    //     $data["kriteria"] = $this->kriteria_model->getAll();
    //     $this->load->view("admin/kriteria/list", $data);
    // }

    public function add()
    {
        $kriteria = $this->kriteria_model;
        $validation = $this->form_validation;
        $validation->set_rules($kriteria->rules());

        if ($validation->run()) {
            $kriteria->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        

        $this->load->view("admin/kriteria/new_form");
    }

    public function addParam()
    {
        $kriteria = $this->kriteria_model;
        $validation = $this->form_validation;
        $validation->set_rules($kriteria->rules());

        if ($validation->run()) {
            $kriteria->savePara();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        // $data['jumlahpara'] = $jumlahpara;

        $this->load->view("admin/kriteria/new_form_with_para");

    }

    // public function addPara($id)
    // {
    //     $validation->set_rules($kriteria->rules());

    //     if ($this->input->post('addkriteriapara')) {
    //         if ($validation->run()) {
    //             $kriteria->savePara();
    //             $this->session->set_flashdata('success', 'Berhasil disimpan');
    //         }
    //     } 
    //     // $data['view_name'] = "kriteria/new_form_with_para";
    //     // $data['gen'] = $this->kriteria_model->getKodeOto('kode_kriteria', 'tbl_kriteria', 'C', 2);
    //     $data['jumlahpara'] = $id;
    //     $this->load->view("admin/kriteria/new_form_with_para", $data);
        
    // }

    public function addpara()
    {
        if ($this->input->post('addkriteriapara')) {
            $jumlahpara = $this->input->post('jumlah-para');
            // var_dump($jumlahpara('jumlah-para')); die;
            // var_dump(is_numeric($jumlahpara));die;
            if (!is_numeric($jumlahpara)) {
              notify('Masukan Angka Valid', 'Warning', 'kriteria/listKriteria');
            } elseif ($this->input->post('jumlahpara') > 5) {
              notify('Maksimal 5 Parameter untuk Sistem ini', 'Warning', 'kriteria/listKriteria');
            }
            elseif ($this->input->post('jumlahpara') == 0||$this->input->post('jumlahpara') == 1) {
              notify('Masukan Jumlah Parameter Lebih dari 1', 'Warning', 'kriteria/listKriteria');
            }else {
              redirect(base_url('createKriteria/' . $this->input->post('jumlahpara')));
            }
          } else {
            //$data['kriteria'] = $this->kriteria_model->kriteria();
            $data['view_name'] = "kriteria/kriteria";
            $data['message'] = $this->session->flashdata('msg');
            $this->load->view("admin/kriteria/new_form_with_para", $data);
          }
        }
    

        ///////////////////////

    // public function add()
    // {
    //     $kriteria = $this->kriteria_model;
    //     $parameter = $this->parameter_model;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($kriteria->rules());

    //     if ($validation->run()) {
    //         $kriteria->save();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $this->load->view("admin/parameter/new_form");
    // }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/kriteria');
       
        $kriteria = $this->kriteria_model;
        $validation = $this->form_validation;
        $validation->set_rules($kriteria->rules());

        if ($validation->run()) {
            $kriteria->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kriteria"] = $kriteria->getById($id);
        if (!$data["kriteria"]) show_404();
        
        $this->load->view("admin/kriteria/edit_form", $data);
    }

    // public function delete($id=null)
    // {
    //     if (!isset($id)) show_404();
        
    //     if ($this->kriteria_model->delete($id)) {
    //         redirect(site_url('admin/kriteria'));
    //     }
    // }

    // READ
	function index(){
		$data['alternatif'] = $this->kriteria_model->get_alternatifs();
		$data['kriteria'] = $this->kriteria_model->get_kriterias();
		$this->load->view('kriteria',$data);
	}

	//CREATE
	function create(){
		$kriteria = $this->input->post('kriteria',TRUE);
		$alternatif = $this->input->post('alternatif',TRUE);
		$bobot = $this->input->post('bobot',TRUE);
		$tren = $this->input->post('tren',TRUE);
		$this->kriteria_model->create_kriteria($kriteria,$bobot,$tren,$alternatif);
		redirect('kriteria');
	}

	// GET DATA alternatif BERDASARKAN kriteria ID
	function get_alternatif_by_kriteria(){
		$kriteria_id=$this->input->post('kriteria_id');
    	$data=$this->kriteria_model->get_alternatif_by_kriteria($kriteria_id)->result();
    	foreach ($data as $result) {
    		$value[] = (float) $result->alternatif_id;
    	}
    	echo json_encode($value);
	}

	//UPDATE
	function update(){
        $id = $this->input->post('edit_id',TRUE);
		$kriteria = $this->input->post('kriteria_edit',TRUE);
        $alternatif = $this->input->post('alternatif_edit',TRUE);
        $bobot = $this->input->post('bobot_edit',TRUE);
        $tren = $this->input->post('tren_edit',TRUE);        
		$this->kriteria_model->update_kriteria($id,$kriteria,$alternatif,$bobot,$tren);
		redirect('kriteria');
	}

	// DELETE
	function delete(){
		$id = $this->input->post('delete_id',TRUE);
		$this->kriteria_model->delete_kriteria($id);
		redirect('kriteria');
	}
}