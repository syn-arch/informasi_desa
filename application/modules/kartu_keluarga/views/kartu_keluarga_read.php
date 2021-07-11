
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
                 <table class="table">
                     <tr><td>No Kartu Keluarga</td><td><?php echo $no_kartu_keluarga; ?></td></tr>
                     <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
                     <tr><td>Desa</td><td><?php echo $desa; ?></td></tr>
                     <tr><td>Kecamatan</td><td><?php echo $kecamatan; ?></td></tr>
                     <tr><td>Kabupaten</td><td><?php echo $kabupaten; ?></td></tr>
                     <tr><td>Kode Pos</td><td><?php echo $kode_pos; ?></td></tr>
                     <tr><td>Provinsi</td><td><?php echo $provinsi; ?></td></tr>
                     <tr><td>Rt</td><td><?php echo $rt; ?></td></tr>
                     <tr><td>Rw</td><td><?php echo $rw; ?></td></tr>
                     <tr><td>Kepala Keluarga</td><td><?php echo $kepala_keluarga; ?></td></tr>
                     <tr><td>Status</td><td><?php echo $status == '1' ? 'Aktif' : 'Tidak Aktif' ; ?></td></tr>
                 </table>
             </div>
         </div>
     </div>
 </div>
</div>
</div>