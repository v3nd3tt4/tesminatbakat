<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Riwayat Tes Minat Bakat</h4>
	          </div>
	          <div class="card-body">
	          	<table class="table table-striped">
	          		<tr>
	          			<td>NISN</td>
	          			<td>: <?=$data_siswa->row()->nisn?></td>
	          		</tr>
	          		<tr>
	          			<td>Nama</td>
	          			<td>: <?=$data_siswa->row()->nama_siswa?></td>
	          		</tr>
	          	</table>
	            <table class="table table-striped" >
	            	<thead>
	            		<tr>
	            			<th>No</th>
	            			<th>Tanggal</th>
	            			<th>Skor</th>
	            			<th>Hasil 1</th>
	            			<th>Hasil 2</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php $no=1;foreach($data_riwayat->result() as $row_riwayat){?>
	            		<tr>
	            			<td><?=$no++?>.</td>
	            			<td><?=$row_riwayat->tgl_selesai?></td>
	            			<td><?=$row_riwayat->total_skor?></td>
	            			<td>
	            			<?php 
	            			echo $this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal' => $row_riwayat->hasil_1))->row()->keterangan;
	            			?></td>
	            			<td>
	            			<?php 
	            			echo $this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal' => $row_riwayat->hasil_2))->row()->keterangan;
	            			?>
	            			</td>
	            		</tr>
	            		<?php }?>
	            	</tbody>
	            </table>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>