<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div  class="btn btn-sm btn-success">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents())
                {
                    foreach ($keranjang as $item)
                    {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4>Total Belanja Anda: Rp. ".number_format($grand_total,0,',','.');
                ?>
        </div> <br><br>
        <h3>Input Data dan Pembayaran</h3>
        <form method="post" action="<?php echo base_url().'dashboard/proses_pesanan' ?>">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" required>
            </div>
            <div class="form-group">
                <label>No Meja</label>
                <input type="text" name="no_meja" placeholder="No Meja Anda" class="form-control" required>
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" placeholder="No. Telepon Anda" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Alamat Anda" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-sm btn-success mb-3">Pesan</button>
        </form>
        <?php
        } else
        {
            echo "<h4>Keranjang Belanja Anda Masih Kosong</h4>";
        }
        ?>


        </div>

        <div class="col-md-2"></div>
    </div>
</div>