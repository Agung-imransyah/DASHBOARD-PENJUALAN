<?php
class Auth extends CI_Controller {

public function login()
{
    $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi!']);
    $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi!']);
    if ($this->form_validation->run() == FALSE)
    {
        $this->load->view('tamplate/header');
        $this->load->view('form_login');
        $this->load->view('tamplate/footer');
    } else {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->where('username', $username)->limit(1)->get('tb_user')->row();

        if (!$user) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Username tidak ditemukan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login');
        }

        // Accept either hashed password or plain text (plain is insecure; for testing only)
        $password_ok = false;
        if (!empty($user->password) && password_verify($password, $user->password)) {
            $password_ok = true;
        }
        if (!$password_ok && isset($user->password) && $password === $user->password) {
            $password_ok = true;
        }

        if (!$password_ok) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Password salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login');
        }

        // success
        $this->session->set_userdata('username', $user->username);
        $this->session->set_userdata('role_id', $user->role_id);
        switch($user->role_id){
            case 1 : redirect('admin/dashboard_admin');
                     break;
            case 2 : redirect('welcome');
                     break;
            default: break;
        }
    }
}
public function logout()
{
    $this->session->sess_destroy();
    redirect('auth/login');
}
}