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
                        <table class="table">
                            <tr><td>Nik</td><td><?php echo $nik; ?></td></tr>
                            <tr><td>Nama Penduduk</td><td><?php echo $nama_penduduk; ?></td></tr>
                            <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
                            <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
                            <tr><td>Jk</td><td><?php echo $jk; ?></td></tr>
                            <tr><td>Golongan Darah</td><td><?php echo $golongan_darah; ?></td></tr>
                            <tr><td>Pekerjaan</td><td><?php echo $pekerjaan; ?></td></tr>
                            <tr><td>Pendidikan</td><td><?php echo $pendidikan; ?></td></tr>
                            <tr><td>Status Perkawinan</td><td><?php echo $status_perkawinan; ?></td></tr>
                            <tr><td>Kewarganegaraan</td><td><?php echo $kewarganegaraan; ?></td></tr>
                            <tr><td>Agama</td><td><?php echo $nama_agama; ?></td></tr>
                            <tr><td>Klasifikasi</td><td><?php echo $nama_klasifikasi; ?></td></tr>
                            <tr><td>No Kk</td><td><?php echo $no_kartu_keluarga; ?></td></tr>
                            <tr><td>Foto</td><td><img src="<?php echo base_url('assets/img/penduduk/') . $foto ?>" alt="" class="img-responsive"></td></tr>
                            <tr><td>Username</td><td><?php echo $username; ?></td></tr>
                            <tr><td>Password</td><td><?php echo $password; ?></td></tr>
                            <tr><td>Status</td><td><?php echo $status == '1' ? 'Aktif' : 'Tidak Aktif' ?></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>