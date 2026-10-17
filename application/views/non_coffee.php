<div class="container-fluid">
    <style>
    .carousel-control-prev, .carousel-control-next {
        width: 5%;          
        background: none;   /* Pastikan tidak ada warna latar belakang */
        opacity: 1;         /* Agar tombol selalu terlihat jelas */
    }

    /* 2. (Opsional) Membuat ikon panah punya kotak kecil sendiri biar lebih rapi */
    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: rgba(118, 15, 15, 0.5); /* Kotak hitam transparan kecil */
        padding: 15px;      /* Jarak di dalam tombol */
        border-radius: 5px; /* Membuat sudut tombol tumpul (sedikit bulat) */
    }

    /* Efek saat mouse diarahkan ke tombol */
    .carousel-control-prev:hover, .carousel-control-next:hover {
        background: none; /* Tetap hilangkan background besar saat di-hover */
    }
</style>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/new1.png') ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/img/new2.png') ?>" class="d-block w-100" alt="...">
    </div>
  </div>
 <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>
    <div class="row text-center mt-4">
        <?php foreach($non_coffee as $brg) : ?>
        <div class="card ml-3 mb-3" style="width: 16rem;">
            <img src="<?php echo base_url().'/upload/'.$brg->gambar ?>" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title mb-1"><?php echo $brg->nama_brg ?></h5>
                <small><?php echo $brg->keterangan ?></small><br>
                <span class="badge badge-success mb-3">Rp.<?php echo number_format($brg->harga, 0, ',', '.'); ?></span>
                <?php echo anchor('dashboard/tambah_ke_keranjang/'.$brg->id_brg, '<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>
                 <?php echo anchor('dashboard/detail/'.$brg->id_brg, '<div class="btn btn-sm btn-success">Detail</div>') ?>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>