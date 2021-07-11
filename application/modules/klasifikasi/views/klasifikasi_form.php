<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="pull-left">
                    <div class="box-title">
                        <h4><?php echo $judul ?></h4>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="box-title">
                        <a href="<?php echo base_url('klasifikasi') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group <?php if(form_error('nama_klasifikasi')) echo 'has-error'?> ">
                                    <label for="nama_klasifikasi">Nama Klasifikasi</label>
                                    <input type="text" class="form-control" name="nama_klasifikasi" id="nama_klasifikasi" placeholder="Nama Klasifikasi" value="<?php echo $nama_klasifikasi; ?>" />
                                    <?php echo form_error('nama_klasifikasi', '<small style="color:red">','</small>') ?>
                                </div>
	    <input type="hidden" name="id_klasifikasi" value="<?php echo $id_klasifikasi; ?>" /> 
	    <button type="submit" class="btn btn-primary btn-block">SUBMIT</button> 
	</form>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
</div>