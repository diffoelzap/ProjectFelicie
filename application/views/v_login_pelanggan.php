<div class="row">

<div class="col-sm-4"></div>
<div class="col-sm-4">
    <div class="register-box">
        <div class="card">
            <div class="card-body register-card-body">
            <p class="login-box-msg">Login Pelanggan</p>

            <?php 
            echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>','</div>');

            if ($this->session->flashdata('pesan')) 
            {
            echo ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Sukses </h5>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
            }
            
            if ($this->session->flashdata('error')) 
            {
            echo ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-times"></i> Error </h5>';
            echo $this->session->flashdata('error');
            echo '</div>';
            }

            echo form_open('pelanggan/login'); 
            ?>

                
                <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" value="<?= set_value('email')?>" placeholder="Email Pelanggan">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>  
                </div>
                <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" value="<?= set_value('password')?>" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
               
                <div class="row">
               
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <!-- /.col -->
                </div>
            <?php echo form_close(); ?>

            <a href="<?= base_url('pelanggan/register') ?>" class="text-center">Belum Punya Akun...!</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
  </div>
<div class="col-sm-4"></div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>