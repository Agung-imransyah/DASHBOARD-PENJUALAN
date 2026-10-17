<?php
class Dashboard extends CI_Controller {
        public function __construct(){
        parent::__construct();
        // Only require a logged-in user; allow both admin and user to view certain pages like keranjang
        if (!$this->session->userdata('username')){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login');
        }
    }
    public function tambah_ke_keranjang($id)
    {
        $barang = $this->model_barang->find($id);

        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg
        );

        $this->cart->insert($data);
        redirect('welcome');
    }
    public function detail_keranjang()
    {
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/sidebar');
        $this->load->view('keranjang');
        $this->load->view('tamplate/footer');
    }
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('welcome');
    }
    public function hapus_item($rowid = null)
    {
        if (!$rowid) {
            redirect('dashboard/detail_keranjang');
            return;
        }
        // To remove an item, set its qty to 0 and update the cart
        $data = array(
            'rowid' => $rowid,
            'qty'   => 0
        );
        $this->cart->update($data);
        redirect('dashboard/detail_keranjang');
    }
    public function checkout()
    {
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/sidebar');
        $this->load->view('checkout');
        $this->load->view('tamplate/footer');
    }
    public function proses_pesanan()
    {
        $is_process = $this->model_invoice->index();
        if ($is_process) {
            $this->cart->destroy();
            $this->load->view('tamplate/header');
            $this->load->view('tamplate/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('tamplate/footer');
        } else {
            echo "Maaf, Pesanan Anda Gagal Diproses";
        }
    }
    public function detail($id_brg)
    {
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('tamplate/footer');
    }
}