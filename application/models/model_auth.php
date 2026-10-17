<?php

class model_auth extends CI_Model {

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->db->where('username', $username)
                           ->limit(1)
                           ->get('tb_user');

        if ($result->num_rows() !== 1) {
            log_message('debug', "auth: user not found for username={$username}");
            return FALSE;
        }

        $user = $result->row();

        if (password_verify($password, $user->password)) {
            return $user;
        }

        log_message('debug', "auth: password mismatch for username={$username} db_hash={$user->password}");
        return FALSE;
    }
}