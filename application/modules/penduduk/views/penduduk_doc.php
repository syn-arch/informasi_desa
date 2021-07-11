<!doctype html>
	<html>
	<head>
		<title>Penduduk</title>
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
	<h2>Penduduk</h2>
	<table class="word-table" style="margin-bottom: 10px">
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
			<th>No Kartu Keluarga</th>
			<th>Username</th>
			<th>Password</th>
			<th>Status</th>

			</tr><?php
			foreach ($penduduk_data as $penduduk)
			{
				?>
				<tr>
					<td><?php echo ++$start ?></td>
					<td><?php echo $penduduk->nik ?></td>
					<td><?php echo $penduduk->nama_penduduk ?></td>
					<td><?php echo $penduduk->tempat_lahir ?></td>
					<td><?php echo $penduduk->tanggal_lahir ?></td>
					<td><?php echo $penduduk->jk ?></td>
					<td><?php echo $penduduk->golongan_darah ?></td>
					<td><?php echo $penduduk->pekerjaan ?></td>
					<td><?php echo $penduduk->pendidikan ?></td>
					<td><?php echo $penduduk->status_perkawinan ?></td>
					<td><?php echo $penduduk->kewarganegaraan ?></td>
					<td><?php echo $penduduk->nama_agama ?></td>
					<td><?php echo $penduduk->nama_klasifikasi ?></td>
					<td><?php echo $penduduk->no_kartu_keluarga ?></td>
					<td><?php echo $penduduk->username ?></td>
					<td><?php echo $penduduk->password ?></td>
					<td><?php echo $penduduk->status == '1' ? 'Aktif' : 'Tidak Aktif' ?></td>	
				</tr>
				<?php
			}
			?>
		</table>
	</body>
	</html>