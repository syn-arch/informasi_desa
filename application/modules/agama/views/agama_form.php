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
                        <a href="<?php echo base_url('agama') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group <?php if(form_error('nama_agama')) echo 'has-error'?> ">
                                    <label for="nama_agama">Nama Agama</label>
                                    <input type="text" class="form-control" name="nama_agama" id="nama_agama" placeholder="Nama Agama" value="<?php echo $nama_agama; ?>" />
                                    <?php echo form_error('nama_agama', '<small style="color:red">','</small>') ?>
                                </div>
	    <input type="hidden" name="id_agama" value="<?php echo $id_agama; ?>" /> 
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