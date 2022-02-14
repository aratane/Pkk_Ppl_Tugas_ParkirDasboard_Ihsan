<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_petugas");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["petugas"] = $this-><M_petugas->getAll();
        $this->load->view("admin/product/list", $data);
    }

    public function add()
    {
        $product = $this->M_petugas;
        $validation = $this->form_validation;
        $validation->set_rules($petugas->rules());

        if ($validation->run()) {
            $petugas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/product/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/petugas');
       
        $petugas = $this->M_petugas;
        $validation = $this->form_validation;
        $validation->set_rules($petugas->rules());

        if ($validation->run()) {
            $petugas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["petugas"] = $petugas->getById($id);
        if (!$data["petugas"]) show_404();
        
        $this->load->view("admin/product/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->M_petugas->delete($id)) {
            redirect(site_url('admin/petugas'));
        }
    }
}