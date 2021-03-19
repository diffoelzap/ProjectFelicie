<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Form <?= $title ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <?php 
         if ($this->session->flashdata('pesan')) 
         {
             echo ' <div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <h5><i class="icon fas fa-check"></i>';
             echo $this->session->flashdata('pesan');
             echo '</h5></div>';
         }
        
        echo form_open('admin/setting'); ?>
            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi" class="form-control"></select>
                                
                        </div>
                </div>
                <div class="col-sm-6">
                        <div class="form-group">
                           <label>Kota</label>
                           <select name="kota" class="form-control">
                           <option value="<?= $setting->lokasi_toko ?>"><?= $setting->lokasi_toko ?></option>
                           </select>
                            
                        </div>
                </div>
           </div>
            <div class="row">
                <div class="col-sm-6">
                        <div class="form-group">
                           <label>Nama Toko</label>
                           <input type="text" name="nama_toko" class="form-control"  value="<?= $setting->nama_toko ?>" required>
                        </div>
                </div>
                    <div class="col-sm-6">
                            <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" name="no_telpon" class="form-control" value="<?= $setting->no_telpon ?>" required >
                            </div>
                    </div>
             </div>
             
                 <div class="form-group">
                     <label>Alamat Toko</label>
                      <input type="text" name="alamat_toko" class="form-control"  value="<?= $setting->alamat_toko ?>" required>
                 </div>
                 <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                    <a href="<?= base_url('admin') ?>" class="btn btn-success btn-lg">Kembali</a>
                </div>
            
        <?php echo form_close() ?>
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

    })
</script>