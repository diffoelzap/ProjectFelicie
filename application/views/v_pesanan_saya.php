<div class="row">
<div class="col-sm-12">
    <?php
                        if ($this->session->flashdata('pesan')) 
                        {
                            echo ' <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i>';
                            echo $this->session->flashdata('pesan');
                            echo '</h5></div>';
                        }
        ?>
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" 
                    href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" 
                    href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Diproses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" 
                    href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Dikirim</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Selesai</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <table class="table">
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal</th>
                                <th>Ekspedisi</th>
                                <th>Total Bayar</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($belum_bayar as $key => $value) {?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <b><?= $value->ekspedisi ?></b><br>
                                    Paket : <?= $value->paket ?><br>
                                    Ongkir : <?= number_format($value->ongkir,0) ?><br>

                                </td>
                                <td>
                                    <b>Rp. <?= number_format($value->total_bayar,0) ?></b><br>
                                    <?php if($value->status_bayar == 0){ ?>
                                            <span class="badge badge-warning">Belum Bayar</span>
                                    <?php } else { ?>
                                            <span class="badge badge-success">Sudah Bayar</span><br>
                                            <span class="badge badge-primary">Menunggu Verifikasi</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($value->status_bayar == 0){ ?>
                                        <a href="<?= base_url('pesanan_saya/bayar/'.$value->id_transaksi)?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
                                    <?php } ?>
                                    
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                  <table class="table">
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal</th>
                                <th>Ekspedisi</th>
                                <th>Total Bayar</th>
                            </tr>
                            <?php foreach ($diproses as $key => $value) {?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <b><?= $value->ekspedisi ?></b><br>
                                    Paket : <?= $value->paket ?><br>
                                    Ongkir : <?= number_format($value->ongkir,0) ?><br>

                                </td>
                                <td>
                                    <b>Rp. <?= number_format($value->total_bayar,0) ?></b><br>

                                            <span class="badge badge-success">Terverifikasi</span><br>
                                            <span class="badge badge-primary">Diproses / Dikemas</span>
                                   
                                </td>
                                
                            </tr>
                            <?php } ?>
                        </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                  <table class="table">
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal</th>
                                <th>Ekspedisi</th>
                                <th>Total Bayar</th>
                                <th>No Resi</th>
                            </tr>
                            <?php foreach ($dikirim as $key => $value) {?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <b><?= $value->ekspedisi ?></b><br>
                                    Paket : <?= $value->paket ?><br>
                                    Ongkir : <?= number_format($value->ongkir,0) ?><br>

                                </td>
                                <td>
                                    <b>Rp. <?= number_format($value->total_bayar,0) ?></b><br>

                                            <span class="badge badge-success">Dikirim</span><br>
                                </td>
                                <td>
                                <h5><?= $value->no_resi?><br>
                                <a href="" class="btn btn-primary btn-xs">Diterima</a>
                                </h5>
                                </td>
                                
                            </tr>
                            <?php } ?>
                        </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                     Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>    
</div>