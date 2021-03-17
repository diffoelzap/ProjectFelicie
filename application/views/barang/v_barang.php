<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Data <?= $title ?></h3>

        <div class="card-tools">
            <a href="" type="button" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i>Tambah</a>
        </div>
        <!-- /.card-tools -->
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
            ?>
            <table class="table table-bordered" id=example1>
                <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach ($barang as $key => $value) { ?>
                    <tr> 
                        <td class="text-center"><?= $no++;?></td>
                        <td class="text-center"><?= $value->nama_barang ?></td>
                        <td class="text-center"><?= $value->nama_kategori ?></td>
                        <td class="text-center">Rp. <?= number_format($value->harga,0) ?></td>
                        <td class="text-center"><img src="<?= base_url('assets/gambar/'.$value->gambar) ?>" width="150px"></td>
                        <td class="text-center">
                            <a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
