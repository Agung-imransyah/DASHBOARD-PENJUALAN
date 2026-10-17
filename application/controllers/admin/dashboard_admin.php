<?php

class dashboard_admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // If not logged in at all -> go to login
        if (!$this->session->userdata('username')){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login');
        }
        // If logged in but not admin, redirect to user welcome instead of forcing login
        if ($this->session->userdata('role_id') != '1'){
            redirect('welcome');
        }
    }
    public function index() 
    {
        $this->load->view('tamplate_admin/header');
        $this->load->view('tamplate_admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('tamplate_admin/footer');
    }
 }
