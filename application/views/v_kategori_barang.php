<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider1.jpg">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider2.jpg">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider3.jpg">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider4.jpg">
    </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
</div>

 <!-- Default box -->
 <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">

<?php 
foreach ($barang as $key => $value) { ?>
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h2 class="lead"><b><?= $value->nama_barang?></b></h2>
                  <p class="text-muted text-sm"><b>Kategori: </b> <?= $value->nama_kategori?></p>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12 text-center">
                      <img src="<?= base_url('assets/gambar/'.$value->gambar) ?>" alt="" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row"> 
                    <div class="col-sm-6">
                      <div class="text-left">
                        <h4><span class="badge bg-primary">Rp. <?= number_format($value->harga,0)?></span></h4>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm btn-success">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-cart-plus"> Tambah</i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<?php } ?>
         </div>
        </div>
 </div>