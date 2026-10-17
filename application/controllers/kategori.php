<?php
class Kategori extends CI_Controller {
    public function coffee() {
        $data['coffee'] = $this->model_kategori->data_coffee()->result();
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/sidebar');
        $this->load->view('coffee', $data);
        $this->load->view('tamplate/footer');
    }
     public function non_coffee() {
        $data['non_coffee'] = $this->model_kategori->data_non_coffee()->result();
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/sidebar');
        $this->load->view('non_coffee', $data);
        $this->load->view('tamplate/footer');
    }
     public function lunch() {
        $data['lunch'] = $this->model_kategori->data_lunch()->result();
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/sidebar');
        $this->load->view('lunch', $data);
        $this->load->view('tamplate/footer');
    }
     public function dessert() {
        $data['dessert'] = $this->model_kategori->data_dessert()->result();
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/sidebar');
        $this->load->view('dessert', $data);
        $this->load->view('tamplate/footer');
    }
     public function cemilan() {
        $data['cemilan'] = $this->model_kategori->data_cemilan()->result();
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/sidebar');
        $this->load->view('cemilan', $data);
        $this->load->view('tamplate/footer');
    }
}