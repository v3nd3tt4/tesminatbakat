<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Pilih Kategori Pertanyaan</h4>
	            <!-- <div class="card-header-action">
	            	<button class="btn btn-primary btn-tambah" ><i class="fas fa-plus"></i> Tambah</button>
	            </div> -->
	          </div>
	          <div class="card-body">
	          	<div class="table-responsive">
		            <table class="table table-striped dt">
		            	<thead>
		            		<tr>
		            			<th>No</th>
		            			<th>Nama Kategori</th>
		            			<th>Keterangan</th>
		            			<th>Aksi</th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		<?php $no=1;foreach($data->result() as $row_data){?>
		            		<tr>
		            			<td><?=$no++?>.</td>
		            			<td><?=$row_data->nama_kategori?></td>
		            			<td><?=$row_data->keterangan?></td>
		            			<td>
		            				<a href="<?=base_url()?>pertanyaan/preview_buat_soal/<?=$row_data->id_kategori_soal?>" class="btn btn-primary" id="<?=$row_data->id_kategori_soal?>"> Pilih</a>
		            				
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