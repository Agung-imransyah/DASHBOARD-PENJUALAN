<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h4>Invoice Pemesanan Menu</h4>
        <form method="get" class="form-inline" action="<?php echo base_url('admin/invoice'); ?>">
            <input type="text" name="q" class="form-control form-control-sm mr-2" placeholder="Cari id / nama / alamat" value="<?php echo htmlspecialchars($this->input->get('q')); ?>">
            <button class="btn btn-sm btn-secondary" type="submit">Cari</button>
            <a href="<?php echo base_url('admin/invoice'); ?>" class="btn btn-sm btn-light ml-2">Reset</a>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Id Invoice</th>
                <th>Nama Pemesan</th>
                <th>Alamat</th>
                <th>Tanggal Pesan</th>
                <th>Batas Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            if ($invoice && is_array($invoice) || is_object($invoice)) : 
                foreach ($invoice as $inv) { 
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $inv->nama ?></td>
                    <td><?php echo $inv->alamat ?></td>
                    <td><?php echo $inv->tgl_pesan ?></td>
                    <td><?php echo $inv->batas_bayar ?></td>
                    
                    <td><?php echo anchor('admin/invoice/detail/'.$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
                </tr>
            <?php 
                } 
            else : ?>
                <tr>
                    <td colspan="5" align="center">Belum ada data invoice masuk</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>