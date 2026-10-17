<?php
class model_kategori extends CI_Model {
    public function data_coffee() {
        return $this->db->get_where('tb_barang', array('kategori' => 'coffee'));
    }
     public function data_non_coffee() {
        return $this->db->get_where('tb_barang', array('kategori' => 'non coffee'));
    }
     public function data_lunch() {
        return $this->db->get_where('tb_barang', array('kategori' => 'lunch'));
    }
     public function data_dessert() {
        return $this->db->get_where('tb_barang', array('kategori' => 'dessert'));
    }
     public function data_cemilan() {
        return $this->db->get_where('tb_barang', array('kategori' => 'cemilan'));
    }
}