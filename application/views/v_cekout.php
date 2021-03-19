  <!-- Main content -->
  <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-shopping-cart"></i> Cek Out
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> 4F3S8J<br>
                  <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th width="150px">Harga</th>
                      <th>Barang</th>
                      <th>Total Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items) { ?>
                    <tr>
                      <td><?php echo $items['qty'];?></td>
                      <td style="text-center">Rp. <?php echo number_format($items['price'],0); ?></td>
                      <td><?php echo $items['name']; ?></td>
                      <td style="text-center">Rp. <?php echo number_format($items['subtotal'],0); ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-sm-8 invoice-col">
                  Tujuan :
                  <div class="row">
                        <div class="col-sm-6">
                                <div class="form-group">
                                        <label>Provinsi</label>
                                        <select name="provinsi" class="form-control"></select>
                                        
                                </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                 <label>Kota/Kabupaten</label>
                                 <select name="kota" class="form-control">
                                 </select>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                <label>Exspedisi</label>
                                <select name="ekspedisi" class="form-control">
                                </select>
                                    
                                </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="form-group">
                                <label>Paket</label>
                                <select name="paket" class="form-control">
                                </select>
                                    
                                </div>
                        </div>
                </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp. <?php echo number_format($this->cart->total(),0); ?></td>
                      </tr>
                      <tr>
                        <th>Ongkir</th>
                        <td><label>0</label></td>
                      </tr>
                      <tr>
                        <th>Total Bayar</th>
                        <td><label>0</label></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?= base_url('belanja') ?>" class="btn btn-warning"><i class="fas fa-backward"></i> Kembali ke Keranjang</a>
                 
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-shopping-cart"></i> Proses Check Out
                  </button>
                </div>
              </div>
            </div>
            <script>

    $(document).ready(function(){
        //masukkan data ke select provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('apikey/provinsi') ?>",
            success: function(hasil_provinsi){
                //console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        })
        //masukan data ke select kota
        $("select[name=provinsi]").on("change",function(){
            var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('apikey/kota') ?>",
                data: 'id_provinsi='+id_provinsi_terpilih,
                success: function(hasil_kota){
                    //console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            })
        })

        $("select[name=kota").on("change",function(){
            $.ajax({
                type: "POST",
                url: "<?= base_url('apikey/ekspedisi') ?>",
                success: function(hasil_ekspedisi){
                    //console.log(hasil_kota);
                    $("select[name=ekspedisi]").html(hasil_ekspedisi);
                }
            })
        });
        

    })
</script>