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
	header("Content-Disposition: attachment; filename=Data Hasil Tes.xls");
	?>

	<center>
		<h1>Data Hasil Tes </h1>
		<button>Export to Excel</button>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Nis</th>
			<th>Nama</th>
			<th>Teratas 1</th>
			<th>Teratas 2</th>
            <th>Terendah 1</th>
			<th>Terendah 2</th>
            <th>Tanggal</th>
            <th>Skor</th>
		</tr>
		<?php 
			$no=1;
			foreach($data_rapor->result() as $row){
		?>
		<tr>
			<td><?=$no++?></td>
			<td><?=$row->nisn?></td>
			<td><?=$row->nama_siswa?></td>
			<td><?=$this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal'=>$row->hasil_1))->row()->nama_kategori?></td>
			<td><?=$this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal'=>$row->hasil_2))->row()->nama_kategori?></td>
            <td><?=$this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal'=>$row->hasil_terbawah_1))->row()->nama_kategori?></td>
			<td><?=$this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal'=>$row->hasil_terbawah_2))->row()->nama_kategori?></td>
            <td><?=$row->tgl_selesai?></td>
			<td><?=$row->total_skor?></td>
		</tr>
		<?php

			}
		?>
	</table>
</body>
</html>