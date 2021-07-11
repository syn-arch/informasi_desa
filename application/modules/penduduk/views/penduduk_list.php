
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
                        <?php echo anchor(site_url('penduduk/create'), '<i class="fas fa-plus"></i> Tambah Data', 'class="btn btn-primary"'); ?>
                        <?php echo anchor(site_url('penduduk/excel'), '<i class="fas fa-sign-out-alt"></i> Excel', 'class="btn btn-success"'); ?>
                        <?php echo anchor(site_url('penduduk/word'), '<i class="fas fa-sign-out-alt"></i> Word', 'class="btn btn-warning"'); ?>

                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dt" width="100%" id="#mytable">
                     <thead>
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama Penduduk</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jk</th>
                            <th>Golongan Darah</th>
                            <th>Pekerjaan</th>
                            <th>Pendidikan</th>
                            <th>Status Perkawinan</th>
                            <th>Kewarganegaraan</th>
                            <th>Agama</th>
                            <th>Klasifikasi</th>
                            <th>No Kk</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $(".dt").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                .off('.DT')
                .on('keyup.DT', function(e) {
                    if (e.keyCode == 13) {
                        api.search(this.value).draw();
                    }
                });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {"url": "penduduk/json", "type": "POST"},
            columns: [
            {
                "data": "id_penduduk",
                "orderable": false
            },
            {"data": "nik"},
            {"data": "nama_penduduk"},
            {"data": "tempat_lahir"},
            {"data": "tanggal_lahir"},
            {"data": "jk"},
            {"data": "golongan_darah"},
            {"data": "pekerjaan"},
            {"data": "pendidikan"},
            {"data": "status_perkawinan"},
            {"data": "kewarganegaraan"},
            {"data": "nama_agama"},
            {"data": "nama_klasifikasi"},
            {"data": "no_kartu_keluarga"},
            {
                "data": "status",
                 "render": function (data, type, row) {
                    return data == '1' ? 'Aktif' : 'Tidak Aktif'
                }
            },
            {
                "data" : "action",
                "orderable": false,
                "className" : "text-center"
            }
            ],
            order: [[0, 'desc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        $(document).on("click", ".hapus-data", function () {
          hapus($(this).data("href"));
      });

    });

</script>