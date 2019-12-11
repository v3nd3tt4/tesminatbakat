<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Riwayat Pengisian Nilai Rapor</h4>
	            
	          </div>
	          <div class="card-body">
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
		            				<a href="<?=base_url()?>profil_siswa/isi_riwayat/<?=$row->id_riwayat_isi_rapor?>" class=" btn btn-primary"><i class="fas fa-eye"></i> Lihat</a>
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