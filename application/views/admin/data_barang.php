<div class="container-fluid">
  <div class="d-flex justify-content-between mb-3">
    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>
    <form method="get" class="form-inline" action="<?php echo base_url('admin/data_barang'); ?>">
      <input type="text" name="q" class="form-control form-control-sm mr-2" placeholder="Cari nama atau kategori" value="<?php echo htmlspecialchars($this->input->get('q')); ?>">
      <button class="btn btn-sm btn-secondary" type="submit">Cari</button>
      <a href="<?php echo base_url('admin/data_barang'); ?>" class="btn btn-sm btn-light ml-2">Reset</a>
    </form>
  </div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th colspan="3">Aksi</th>
        </tr>
        <?php
        $no=1;
        if ($barang && is_array($barang) || is_object($barang)) :
        foreach($barang as $brg) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $brg->nama_brg ?></td>
            <td><?php echo $brg->keterangan ?></td>
            <td><?php echo $brg->kategori ?></td>
            <td><?php echo $brg->harga ?></td>
            <td><?php echo $brg->stock ?></td>
            <td><?php echo anchor('admin/data_barang/edit/'.$brg->id_brg, '<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>') ?></td>
            <td><?php echo anchor('admin/data_barang/hapus/'.$brg->id_brg, '<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?></td>
            <td><div class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></div></td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="9" align="center">Belum ada data barang</td>
          </tr>
        <?php endif; ?>
      </table>

</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FROM INPUT PRODUK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_brg" class="form-control">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                    <option>Coffee</option>
                    <option>Non Coffee</option>
                    <option>Lunch</option>
                    <option>Dessert</option>
                    <option>Cemilan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stock" class="form-control">
            </div>
            <div class="form-group">
                <label>Gambar Produk</label><BR>
                <input type="file" name="gambar" class="form-control">


       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

       </form>
    </div>
  </div>
</div>