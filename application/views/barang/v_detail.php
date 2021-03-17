<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title"><?= $title ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title"><b>Nama Barang</b></h5>
                        <p class="card-text"><?= $barang->nama_barang ?></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b>Kategori Barang</b></h5>
                        <p class="card-text"><?= $barang->nama_kategori ?></p>
                        
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b>Harga Barang</b></h5>
                        <p class="card-text">Rp. <?=number_format($barang->harga,0) ?></p>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
            <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-cube"></i>
                            <b> Gambar Barang </b>
                            </h3>
                        </div>
                            <!-- /.card-header -->
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets/gambar/'.$barang->gambar)?>" id="gambar_load" width="200px">

                        </div>
                        <!-- /.card-body -->
        
                </div>
           </div>
            <div class="col-sm-12">
                <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-text-width"></i>
                            <b> Deskripsi </b>
                            </h3>
                        </div>
                            <!-- /.card-header -->
                        <div class="card-body text-center">
                            <p><?= $barang->deskripsi ?></p>
                        </div>
                        <!-- /.card-body -->
                </div>
            </div>
           </div> 
           <a href="<?= base_url('barang') ?>" class="btn btn-success btn-lg">Kembali</a>
       </div>
     </div>
</div>