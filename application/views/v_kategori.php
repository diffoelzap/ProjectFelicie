<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Data <?= $title ?></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
            <i class="fas fa-plus"></i>Tambah</button>
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
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach ($kategori as $key => $value) { ?>
                    <tr> 
                        <td class="text-center"><?= $no++;?></td>
                        <td class="text-center"><?= $value->nama_kategori ?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#edit<?= $value->id_kategori ?>"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm"   data-toggle="modal" data-target="#delete<?= $value->id_kategori ?>"><i class="fa fa-trash"></i></button>
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