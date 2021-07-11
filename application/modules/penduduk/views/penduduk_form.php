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
                        <a href="<?php echo base_url('penduduk') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                           <div class="form-group <?php if(form_error('nik')) echo 'has-error'?> ">
                            <label for="nik">Nik</label>
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
                            <?php echo form_error('nik', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('nama_penduduk')) echo 'has-error'?> ">
                            <label for="nama_penduduk">Nama Penduduk</label>
                            <input type="text" class="form-control" name="nama_penduduk" id="nama_penduduk" placeholder="Nama Penduduk" value="<?php echo $nama_penduduk; ?>" />
                            <?php echo form_error('nama_penduduk', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('tempat_lahir')) echo 'has-error'?> ">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
                            <?php echo form_error('tempat_lahir', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('tanggal_lahir')) echo 'has-error'?> ">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
                            <?php echo form_error('tanggal_lahir', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('jk')) echo 'has-error'?> ">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control">
                                <option <?php echo $jk == 'L' ? 'selected' : '' ?> value="L">Laki-laki</option>
                                <option <?php echo $jk == 'P' ? 'selected' : '' ?> value="P">Perempuan</option>
                            </select>
                            <?php echo form_error('jk', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('golongan_darah')) echo 'has-error'?> ">
                            <label for="golongan_darah">Golongan Darah</label>
                            <select name="golongan_darah" id="golongan_darah" class="form-control">
                                <option value="">--Pilih Golongan Darah--</option>
                                <option value="A" <?php if($golongan_darah == "A"){echo "selected";} ?>>A</option>
                                <option value="B" <?php if($golongan_darah == "B"){echo "selected";} ?>>B</option>
                                <option value="AB" <?php if($golongan_darah == "AB"){echo "selected";} ?>>AB</option>
                                <option value="O" <?php if($golongan_darah == "O"){echo "selected";} ?>>O</option>
                            </select>
                            <?php echo form_error('golongan_darah', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('pekerjaan')) echo 'has-error'?> ">
                            <label for="pekerjaan">Pekerjaan</label>
                            <select name="pekerjaan" id="pekerjaan" class="form-control">
                                <option value="">--Pilih Pekerjaan--</option>
                                <option value="KARYAWAN SWASTA" <?php if($pekerjaan == "KARYAWAN SWASTA"){echo "selected";} ?>>KARYAWAN SWASTA</option>
                                <option value="PNS" <?php if($pekerjaan == "PNS"){echo "selected";}?>>PNS</option>
                                <option value="PELAJAR/MAHASISWA" <?php if($pekerjaan == "PELAJAR/MAHASISWA"){echo "selected";} ?>>PELAJAR/MAHASISWA</option>
                                <option value="PETANI" <?php if($pekerjaan == "PETANI"){echo "selected";} ?>>PETANi</option>
                                <option value="WIRAUSAHA" <?php if($pekerjaan == "WIRAUSAHA"){echo "selected";} ?>>WIRAUSAHA</option>
                                <option value="TIDAK BEKERJA" <?php if($pekerjaan == "TIDAK BEKERJA"){echo "selected";} ?>>TIDAK BEKERJA</option>
                                <option value="Lainnya" <?php if($pekerjaan == "Lainnya"){echo "selected";} ?>>WIRAUSAHA</option>
                            </select>
                            <?php echo form_error('pekerjaan', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('pendidikan')) echo 'has-error'?> ">
                            <label for="pendidikan">Pendidikan</label>
                            <select name="pendidikan" id="pendidikan" class="form-control">
                                <option value="">--Pilih Pendidikan--</option>
                                <option value="SD" <?php if($pendidikan == "SD"){echo "selected";} ?>>SD Sederajat</option>
                                <option value="SMP" <?php if($pendidikan == "SMP"){echo "selected";} ?>>SMP Sederajat</option>
                                <option value="SMA" <?php if($pendidikan == "SMA"){echo "selected";} ?>>SMP Sederajat</option>
                                <option value="D1" <?php if($pendidikan == "D1"){echo "selected";} ?>>D1</option>
                                <option value="D2" <?php if($pendidikan == "D2"){echo "selected";} ?>>D2</option>
                                <option value="D3" <?php if($pendidikan == "D3"){echo "selected";} ?>>D3</option>
                                <option value="D4/S1" <?php if($pendidikan == "D4/S1"){echo "selected";} ?>>D4 / S1</option>
                                <option value="S2" <?php if($pendidikan == "S2"){echo "selected";} ?>>S2</option>
                                <option value="S3" <?php if($pendidikan == "S3"){echo "selected";} ?>>S3</option>
                                <option value="Lainnya" <?php if($pendidikan == "Lainnya"){echo "selected";} ?>>Lainnya</option>
                            </select>
                            <?php echo form_error('pendidikan', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('status_perkawinan')) echo 'has-error'?> ">
                            <label for="status_perkawinan">Status Perkawinan</label>
                            <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                                <option value="">--Status Perkawinan--</option>
                                <option value="KAWIN" <?php if($status_perkawinan == "KAWIN"){echo "selected";} ?>>Kawin</option>
                                <option value="BELUM KAWIN" <?php if($status_perkawinan == "BELUM KAWIN"){echo "selected";} ?>>Belum Kawin</option>
                            </select>
                            <?php echo form_error('status_perkawinan', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('kewarganegaraan')) echo 'has-error'?> ">
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <input type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" placeholder="Kewarganegaraan" value="<?php echo $kewarganegaraan; ?>" />
                            <?php echo form_error('kewarganegaraan', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('id_agama')) echo 'has-error'?>">
                            <label for="agama">Agama</label>
                            <select name="id_agama" id="agama" class="form-control select2">
                                <?php foreach ($agama as $row): ?>
                                    <option <?php echo $id_agama == $row->id_agama ? 'selected' : '' ?> value="<?php echo $row->id_agama ?>"><?php echo $row->nama_agama ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php echo form_error('id_agama', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('id_klasifikasi')) echo 'has-error'?>">
                            <label for="klasifikasi">Klasifikasi</label>
                            <select name="id_klasifikasi" id="klasifikasi" class="form-control select2">
                                <?php foreach ($klasifikasi as $row): ?>
                                    <option <?php echo $id_klasifikasi == $row->id_klasifikasi ? 'selected' : '' ?> value="<?php echo $row->id_klasifikasi ?>"><?php echo $row->nama_klasifikasi ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php echo form_error('id_klasifikasi', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('kewarganegaraan')) echo 'has-error'?>">
                            <label for="kartu_keluarga">Kartu Keluarga</label>
                            <select name="id_kartu_keluarga" id="kartu_keluarga" class="form-control select2">
                                <?php foreach ($kartu_keluarga as $row): ?>
                                    <option <?php echo $id_kartu_keluarga == $row->id_kartu_keluarga ? 'selected' : '' ?> value="<?php echo $row->id_kartu_keluarga ?>"><?php echo $row->no_kartu_keluarga ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php echo form_error('id_kartu_keluarga', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('foto')) echo 'has-error'?> ">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control">
                            <?php echo form_error('foto', '<small style="color:red">','</small>') ?>
                        </div>
                        <?php if ($judul == 'Ubah Penduduk'): ?>
                            <div class="form-group">
                                <img src="<?php echo base_url('assets/img/penduduk/') . $foto ?>" alt="" class="img-responsive">
                            </div>
                        <?php endif ?>
                        <div class="form-group <?php if(form_error('username')) echo 'has-error'?> ">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                            <?php echo form_error('username', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group <?php if(form_error('password')) echo 'has-error'?> ">
                            <label for="password">Password</label>
                            <textarea class="form-control" rows="3" name="password" id="password" placeholder="Password"><?php echo $password; ?></textarea>
                            <?php echo form_error('password', '<small style="color:red">','</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option <?php echo $status == '1' ? 'selected' : '' ?> value="1">Aktif</option>
                                <option <?php echo $status == '0' ? 'selected' : '' ?> value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <input type="hidden" name="id_penduduk" value="<?php echo $id_penduduk; ?>" /> 
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