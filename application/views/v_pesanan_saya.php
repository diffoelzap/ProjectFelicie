<div class="row">
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
</div>