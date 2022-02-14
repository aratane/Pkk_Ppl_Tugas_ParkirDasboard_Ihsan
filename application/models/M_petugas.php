<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "petugas";

    public $kd_petugas;
    public $nama_petugas;
    public $no_telp;
    public $alamat;

    public function rules()
    {
        return [
            ['field' => 'nama_petugas',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'no_telp',
            'label' => 'Nomor',
            'rules' => 'numeric'],
            
            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_petugas" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kd_petugas = uniqid();
        $this->nama_petugas = $post["nama"];
        $this->no_telp = $post["nomor"];
        $this->alamat = $post["alamat"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kd_petugas = $post["id"];
        $this->nama_petugas = $post["nama"];
        $this->no_telp = $post["nomor"];
        $this->alamat = $post["alamat"];
        return $this->db->update($this->_table, $this, array('kd_petugas' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kd_petugas" => $id));
    }
}