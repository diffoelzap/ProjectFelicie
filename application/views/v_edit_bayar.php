<div class="row">
    <div class="col-sm-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">No Rekening Toko</h3>
        </div>
        <div class="card-body">
            <p>Silahkan Transfer Uang Kepada Ke No Rekening Di bawah Ini Sebesar : <h1 
            class="text-primary">Rp. <?= number_format($pesanan->total_bayar,0)?>.-</h1></p><br>
            <table class="table">
                <tr>
                    <th>Bank</th>
                    <th>No Rekening</th>
                    <th>Atas Nama</th>
                </tr>
                <?php foreach ($rekening as $key => $value) {?>
                <tr>
                    <td><?= $value->nama_bank ?></td>
                    <td><?= $value->no_rek ?></td>
                    <td><?= $value->atas_nama ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </div>
    <div class="col-sm-6">
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Upload Bukti Pembayaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php 
              
              echo form_open_multipart('pesanan_saya/bayar/'.$pesanan->id_transaksi); 

              ?>
                <div class="card-body">
                  <div class="form-group">
                    <label>Atas Nama</label>
                    <input name="atas_nama" class="form-control"  value="<?= $pesanan->atas_nama?>" required>
                  </div>
                  <div class="form-group">
                    <label>Nama Bank</label>
                    <input name="nama_bank" class="form-control"  value="<?= $pesanan->nama_bank?>" required>
                  </div>
                  <div class="form-group">
                    <label>No Rekening</label>
                    <input name="no_rek" class="form-control"  value="<?= $pesanan->no_rek?>" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Bukti Bayar</label>
                    <input type="file" name="bukti_bayar" class="form-control" id="preview_gambar" required>
                  </div>
                  <div class="form-group">
                    <img src="<?= base_url('assets/bukti_bayar/'.$pesanan->bukti_bayar)?>" id="gambar_load" width="400px">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Bayar</button>
                  <a href="<?= base_url('pesanan_saya')?>" class="btn btn-warning">Kembali</a>
                </div>
              <?php 
             
              echo form_close(); 
              ?>
            </div>
            <!-- /.card -->
    </div>
</div>

<script>
    function bacaGambar(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function(){
        bacaGambar(this);
    });
</script>