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
                        <a href="<?php echo base_url('kartu_keluarga') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="<?php echo $action; ?>" method="post">
                         <div class="form-group <?php if(form_error('no_kartu_keluarga')) echo 'has-error'?> ">
                            <label for="no_kartu_keluarga">No Kartu Keluarga</label>
                            <input type="text" class="form-control" name="no_kartu_keluarga" id="no_kartu_keluarga" placeholder="No Kartu Keluarga" value="<?php echo $no_kartu_keluarga; ?>" />
                            <?php echo form_error('no_kartu_keluarga', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('alamat')) echo 'has-error'?> ">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                            <?php echo form_error('alamat', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('desa')) echo 'has-error'?> ">
                            <label for="desa">Desa</label>
                            <input type="text" class="form-control" name="desa" id="desa" placeholder="Desa" value="<?php echo $desa; ?>" />
                            <?php echo form_error('desa', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('kecamatan')) echo 'has-error'?> ">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
                            <?php echo form_error('kecamatan', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('kabupaten')) echo 'has-error'?> ">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" />
                            <?php echo form_error('kabupaten', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('kode_pos')) echo 'has-error'?> ">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>" />
                            <?php echo form_error('kode_pos', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('provinsi')) echo 'has-error'?> ">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" />
                            <?php echo form_error('provinsi', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('rt')) echo 'has-error'?> ">
                            <label for="rt">Rt</label>
                            <input type="text" class="form-control" name="rt" id="rt" placeholder="Rt" value="<?php echo $rt; ?>" />
                            <?php echo form_error('rt', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('rw')) echo 'has-error'?> ">
                            <label for="rw">Rw</label>
                            <input type="text" class="form-control" name="rw" id="rw" placeholder="Rw" value="<?php echo $rw; ?>" />
                            <?php echo form_error('rw', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="kepala_keluarga">Kepala Keluarga</label>
                            <select name="kepala_keluarga" id="kepala_keluarga" class="form-control select2">
                                <?php foreach ($penduduk as $row): ?>
                                    <option <?php echo $kepala_keluarga == $row->id_penduduk ? 'selected' : '' ?> value="<?php echo $row->id_penduduk ?>"><?php echo $row->nama_penduduk ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option <?php echo $status == '1' ? 'selected' : '' ?> value="1">Aktif</option>
                                <option <?php echo $status == '0' ? 'selected' : '' ?> value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <input type="hidden" name="id_kartu_keluarga" value="<?php echo $id_kartu_keluarga; ?>" /> 
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