<?php $pengaturan = $this->db->get('pengaturan')->row_array(); ?>

<?php 

$jml_agama = $this->db->get('agama')->num_rows();
$jml_klasifikasi = $this->db->get('klasifikasi')->num_rows();
$jml_kartu_keluarga = $this->db->get('kartu_keluarga')->num_rows();
$jml_penduduk = $this->db->get('penduduk')->num_rows();

?>

<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $jml_agama ?></h3>

        <p>Data Agama</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="<?php echo base_url('agama') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $jml_klasifikasi ?></h3>

        <p>Data Klasifikasi</p>
      </div>
      <div class="icon">
        <i class="fa fa-folder"></i>
      </div>
      <a href="<?php echo base_url('klasifikasi') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $jml_kartu_keluarga ?></h3>

        <p>Data Kartu Keluarga</p>
      </div>
      <div class="icon">
        <i class="fa fa-cube"></i>
      </div>
      <a href="<?php echo base_url('kartu_keluarga') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-blue">
      <div class="inner">
        <h3><?php echo $jml_penduduk ?></h3>

        <p>Data Penduduk</p>
      </div>
      <div class="icon">
        <i class="fa fa-cubes"></i>
      </div>
      <a href="<?php echo base_url('penduduk') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

<?php 

$klasifikasi = $this->db->get('klasifikasi')->result();
$agama = $this->db->get('agama')->result();

?>

<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4 class="box-title">Data Penduduk Berdasarkan Klasifikasi</h4>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <?php foreach ($klasifikasi as $row): ?>
                    <th><?php echo $row->nama_klasifikasi ?></th>
                  <?php endforeach ?>
                </tr>
                <tr>
                  <?php foreach ($klasifikasi as $row): ?>
                    <?php $count = $this->db->get_where('penduduk', ['id_klasifikasi' => $row->id_klasifikasi])->num_rows();  ?>
                    <th><?php echo $count ?></th>
                  <?php endforeach ?>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <div class="box-footer"></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h4 class="box-title">Data Penduduk Berdasarkan Agama</h4>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <?php foreach ($agama as $row): ?>
                    <th><?php echo $row->nama_agama ?></th>
                  <?php endforeach ?>
                </tr>
                <tr>
                  <?php foreach ($agama as $row): ?>
                    <?php $count = $this->db->get_where('penduduk', ['id_agama' => $row->id_agama])->num_rows();  ?>
                    <th><?php echo $count ?></th>
                  <?php endforeach ?>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
      <div class="box-footer"></div>
    </div>
  </div>
</div>