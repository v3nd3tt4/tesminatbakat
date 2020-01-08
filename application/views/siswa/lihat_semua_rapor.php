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
	header("Content-Disposition: attachment; filename=Data Nilai Rapor.xls");
	?>

	<center>
		<h1>Data Nilai Rapor </h1>
		<button>Export to Excel</button>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Nis</th>
			<th>Nama</th>
			<th>Mata Pelajaran</th>
			<th>Semester</th>
			<th>Nilai</th>
		</tr>
		<?php 
			$no=1;
			foreach($data_rapor->result() as $row){
		?>
		<tr>
			<td><?=$no++?></td>
			<td><?=$row->nisn?></td>
			<td><?=$row->nama_siswa?></td>
			<td><?=$row->nama_mapel?></td>
			<td><?=$row->semester?></td>
			<td><?=$row->nilai?></td>
		</tr>
		<?php

			}
		?>
	</table>
</body>
</html>