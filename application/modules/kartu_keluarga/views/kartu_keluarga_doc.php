<!doctype html>
	<html>
	<head>
		<title>Kartu_keluarga</title>
		<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
		<style>
		.word-table {
			border:1px solid black !important; 
			border-collapse: collapse !important;
			width: 100%;
		}
		.word-table tr th, .word-table tr td{
			border:1px solid black !important; 
			padding: 5px 10px;
		}
	</style>
</head>
<body>
	<h2>Kartu_keluarga</h2>
	<table class="word-table" style="margin-bottom: 10px">
		<tr>
			<th>No</th>
			<th>No Kartu Keluarga</th>
			<th>Alamat</th>
			<th>Desa</th>
			<th>Kecamatan</th>
			<th>Kabupaten</th>
			<th>Kode Pos</th>
			<th>Provinsi</th>
			<th>Rt</th>
			<th>Rw</th>
			<th>Kepala Keluarga</th>
			<th>Status</th>

			</tr><?php
			foreach ($kartu_keluarga_data as $kartu_keluarga)
			{
				?>
				<tr>
					<td><?php echo ++$start ?></td>
					<td><?php echo $kartu_keluarga->no_kartu_keluarga ?></td>
					<td><?php echo $kartu_keluarga->alamat ?></td>
					<td><?php echo $kartu_keluarga->desa ?></td>
					<td><?php echo $kartu_keluarga->kecamatan ?></td>
					<td><?php echo $kartu_keluarga->kabupaten ?></td>
					<td><?php echo $kartu_keluarga->kode_pos ?></td>
					<td><?php echo $kartu_keluarga->provinsi ?></td>
					<td><?php echo $kartu_keluarga->rt ?></td>
					<td><?php echo $kartu_keluarga->rw ?></td>
					<td><?php echo $kartu_keluarga->nama_penduduk ?></td>
					<td><?php echo $kartu_keluarga->status == '1' ? 'Aktif' : 'Tidak Aktif' ?></td>	
				</tr>
				<?php
			}
			?>
		</table>
	</body>
	</html>