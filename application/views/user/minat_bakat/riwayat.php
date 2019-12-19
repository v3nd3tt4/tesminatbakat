<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Riwayat Tes Minat Bakat</h4>
	            <div class="card-header-action">
	            	<!-- <a href="<?=base_url()?>minat_bakat/tes" class="btn btn-primary btn-tambah"><i class="fas fa-pencil-alt"></i> Lakukan Tes</a> 
	            	-->
	            	<?php if($status_fasilitas_mb->row()->status == 'enable'){?>
	            	<button class="btn btn-primary btn-tambah"><i class="fas fa-pencil-alt"></i> Lakukan Tes</button>
	            	<?php }?>
	            </div>
	          </div>
	          <div class="card-body">
	          	<?php if($status_fasilitas_mb->row()->status == 'disable'){?>
	          	<div class="alert alert-warning">Maaf, fasilitas tes minat bakat ditutup oleh admin</div>
	          	<?php }?>
	          	<div class="table-responsive">
		            <table class="table table-striped" >
		            	<thead>
		            		<tr>
		            			<th>No</th>
		            			<th>Tanggal</th>
		            			<th>Skor</th>
		            			<th>Hasil </th>
		            			<!-- <th>Hasil 2</th> -->
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
		            			<!-- <td>
		            			<?php 
		            			echo $this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal' => $row_riwayat->hasil_2))->row()->keterangan;
		            			?>
		            			</td> -->
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal-tes-mb">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pengingat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-tambah-kategori">
	      <div class="modal-body">
	        	<p>Apakah anda yakin akan Melakukan Tes?</p>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" class="btn btn-primary btn-ya-tes-mb">Ya</button>
	      </div>
      </form>
    </div>
  </div>
</div>
