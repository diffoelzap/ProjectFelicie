<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Form <?= $title ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <?php echo form_open_multipart('barang/add') ?>
          <div class="form-group">
            <label>Nama Barang</label>
            <input name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= set_value('nama_barang') ?>">
          </div>
          <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                    <!-- text input -->
                <div class="col-sm-6">    
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input name="harga" class="form-control" placeholder="Harga Barang" value="<?= set_value('harga') ?>">
                    </div>
                </div>            
            </div>
            <div class="form-group">
                    <label>Deskripsi Barang</label>
                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Barang" rows="5" id="editor" value="<?= set_value('deskripsi') ?>">
                    </textarea>
            </div>
            <div class="form-group">
                    <label>Gambar Barang</label>
                    <input type="file" name="gambar" class="form-control">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="<?= base_url('barang') ?>" class="btn btn-success btn-sm">Kembali</a>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>