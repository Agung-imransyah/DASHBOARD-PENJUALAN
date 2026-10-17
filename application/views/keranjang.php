<div class="container-fluid">
    <h2>Keranjang Belanja</h2>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                  <th>NO</th>
                <th>Nama Pesan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach ($this->cart->contents() as $item): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['qty']; ?></td>
                <td>Rp. <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                <td>Rp. <?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
                <td>
                    <a href="<?php echo base_url('dashboard/hapus_item/'.$item['rowid']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus item ini dari keranjang?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="5" ></td>
                <td align="right">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>
    <div align="right">
        <a href="<?php echo base_url('dashboard/hapus_keranjang'); ?>" class="btn btn-sm btn-danger">Hapus Keranjang</a>
        <a href="<?php echo base_url('welcome'); ?>" class="btn btn-sm btn-primary">Lanjutkan Belanja</a>
        <a href="<?php echo base_url('dashboard/checkout'); ?>" class="btn btn-sm btn-success">Checkout</a>
    </div>
</div>