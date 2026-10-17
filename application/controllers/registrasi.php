<?php
class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index()
    {
        // Admin code requirement
        $admin_code = 'ADMIN123';
        
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'wajib diisi!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]', [
            'required' => 'Username wajib diisi!',
            'is_unique' => 'Username sudah digunakan!'
        ]);
        $this->form_validation->set_rules('role_id', 'Role', 'required', [
            'required' => 'Role wajib dipilih!'
        ]);
        
        // If admin role selected, require admin code
        $role_id = $this->input->post('role_id');
        if ($role_id == '1') {
            $this->form_validation->set_rules('admin_code', 'Kode Admin', 'required', [
                'required' => 'Kode admin wajib diisi!'
            ]);
        }
        
        $this->form_validation->set_rules('password_1', 'Password', 'required|min_length[6]|regex_match[/^(?=.*[A-Za-z])(?=.*\W).+$/]|matches[password_2]', [
            'required' => 'Password wajib diisi!',
            'min_length' => 'Password minimal 6 karakter!',
            'regex_match' => 'Password harus mengandung huruf dan karakter khusus!',
            'matches' => 'Password tidak sesuai!'
        ]);
        $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('tamplate/header');
            $this->load->view('registrasi');
            $this->load->view('tamplate/footer');
        } else {
            // Verify admin code if attempting to register as admin
            $role_id = $this->input->post('role_id');
            if ($role_id == '1') {
                $admin_code = 'ADMIN123';
                $posted_code = $this->input->post('admin_code');
                if ($posted_code !== $admin_code) {
                    $this->session->set_flashdata('error', 'Kode admin salah!');
                    redirect('registrasi');
                    return;
                }
            }
            
            $data = array(
                'id'    => '',
                'nama'  => $this->input->post('nama'),
                'username'  => $this->input->post('username'),
                // WARNING: storing plain passwords is insecure. This is for local testing only.
                'password'  => $this->input->post('password_1'),
                'role_id'   => $role_id,
            );

            $inserted = $this->db->insert('tb_user', $data);
            if ($inserted) {
                $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan data. Silakan coba lagi.');
                redirect('registrasi');
            }
        }
    }
}