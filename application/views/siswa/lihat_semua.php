<!DOCTYPE html>
<html>
<head>
	<title>Sanedu</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Siswa.xls");
	?>

	<center>
		<h1>Data Siswa </h1>
		<button>Export to Excel</button>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Nis</th>
			<th>Nama</th>
			<th>Sekolah</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Email</th>
			<th>No HP</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>Kategori SMA</th>
		</tr>
		<?php 
			$no=1;
			foreach($data_siswa->result() as $row){
		?>
		<tr>
			<td><?=$no++?></td>
			<td><?=$row->nisn?></td>
			<td><?=$row->nama_siswa?></td>
			<td><?=$row->sekolah?></td>
			<td><?=$row->tempat_lahir?></td>
			<td><?=$row->tgl_lahir?></td>
			<td><?=$row->email?></td>
			<td><?=$row->no_hp?></td>
			<td><?=$row->nama_agama?></td>
			<td><?=$row->nama_jk?></td>
			<td><?=$row->nama_kategori?></td>

		</tr>
		<?php

			}
		?>
	</table>
</body>
</html>