<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Riwayat Pengisian Nilai UTBK</h4>
	            
	          </div>
	          <div class="card-body">
	          	<div class="table-responsive">
		          	<table class="table-striped table">
		          		<tr>
		          			<td>NISN</td>
		          			<td><?=$data_siswa->row()->nisn?></td>
		          		</tr>
		          		<tr>
		          			<td>Nama</td>
		          			<td><?=$data_siswa->row()->nama_siswa?></td>
		          		</tr>
		          	</table>
		         </div>
		        <div class="table-responsive">
		            <table class="table table-striped">
		            	<thead>
		            		<tr>
		            			<th>No</th>
		            			<th>Tanggal Pengisian</th>
		            			<th>Aksi</th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		<?php $no=1;foreach($data_riwayat->result() as $row){?>
		            		<tr>
		            			<td><?=$no++?>.</td>
		            			<td><?=$row->tgl_isi?></td>
		            			<td>
		            				<a href="<?=base_url()?>siswa/isi_riwayat_utbk/<?=$row->id_riwayat_isi_utbk?>/<?=$data_siswa->row()->id_siswa?>" class=" btn btn-primary"><i class="fas fa-eye"></i> Lihat</a>
		            			</td>
		            		</tr>
		            		<?php }?>
		            	</tbody>
		            </table>
		        </div>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>