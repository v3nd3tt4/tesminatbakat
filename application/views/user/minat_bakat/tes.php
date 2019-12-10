<!-- Main Content -->
<div class="main-content">
	<form id="form-tes-minat-bakat" method="POST" action="#">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Tes Minat Bakat</h4>

	            <!-- <div class="card-header-action">
	            	<a href="<?=base_url()?>minat_bakat/tes" class="btn btn-primary btn-tambah"><i class="fas fa-pencil-alt"></i> Lakukan Tes</a>
	            </div> -->
	          </div>
	          <div class="card-body">
	            <?php 
	            foreach($data_soal->result() as $row_soal){
	            	echo '<p>'.(empty($this->input->get('halaman', true)) ? '1': $this->input->get('halaman', true)).'. '.$row_soal->pertanyaan.'</p>';
	            ?>
	            	<input type="hidden" name="id_temporary_soal" value="<?=$row_soal->id_temporary_soal?>">
	            <?php
	            }
	            ?>
	            <table>
	            	<tr>
	            		<td><label class="radio-inline"><input type="radio" name="jawaban" value="1" <?=@$row_soal->jawaban==1? 'checked':''?>> Sangat Tidak Setuju</label></td>
	            	</tr>
	            	<tr>
	            		<td><label class="radio-inline"><input type="radio" name="jawaban" value="2" <?=@$row_soal->jawaban==2? 'checked':''?>> Tidak Setuju</label></td>
	            	</tr>
	            	<tr>
	            		<td><label class="radio-inline"><input type="radio" name="jawaban" value="3" <?=@$row_soal->jawaban==3? 'checked':''?>> Agak Setuju</label></td>
	            	</tr>
	            	<tr>
	            		<td><label class="radio-inline"><input type="radio" name="jawaban" value="4" <?=@$row_soal->jawaban==4? 'checked':''?>> Setuju</label></td>
	            	</tr>
	            	<tr>
	            		<td><label class="radio-inline"><input type="radio" name="jawaban" value="5" <?=@$row_soal->jawaban==5? 'checked':''?>> Sangat Setuju</label></td>
	            	</tr>
	            </table>
	          </div>
	          <div class="card-footer">
	          	<?php if($hal > 1 ){?>
	          		<a href="<?php if($hal <= 1){ echo '#'; } else { echo "?halaman=".($hal - 1); } ?>" class="btn btn-info"><i class="fas fa-angle-left"></i> Sebelumnya</a>
	          	<?php }?>
	          	<?php if($hal < $tot_hal){?>
	            <a type="submit" onclick='document.forms["form-tes-minat-bakat"].submit(); return false;' name="submit" value="lanjutkan" href="<?php if($hal >= $tot_hal){ echo '#'; } else { echo "?halaman=".($hal + 1); } ?>" class="btn btn-success text-right">Simpan & Lanjutkan</a>
	        	<?php }else{?>
	        	<button type="button" class="btn btn-danger btn-selesai-tes">Selesai</but>
	        	<?php }?>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
	</form>

	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          
	          <div class="card-body">
	            
	            <?php for ($i=1; $i<=$pages ; $i++){ 
	            	$get = $this->db->get_where('tb_temporary_soal', array('id_temporary_soal' => $pages, 'id_siswa' => $this->session->userdata('id_siswa')));
	            	// var_dump($this->db->last_query());
	            ?>
	            	<?php if($this->input->get('halaman', true) == $i){
	            		// if(empty($get->row()->jawaban)){
	            			echo '<a href="?halaman='.$i.'"><span class="badge badge-warning">'.$i.'</span></a>';
	            		// }else{
	            		// 	echo '<a href="?halaman='.$i.'"><span class="badge badge-info">'.$i.'</span></a>';
	            		// }
	            	?>
	            	<?php }else{
	            		if(empty($get->row()->jawaban)){
	            			echo '<a href="?halaman='.$i.'"><span class="badge badge-secondary">'.$i.'</span></a>';
	            		}else{
	            			echo '<a href="?halaman='.$i.'"><span class="badge badge-info">'.$i.'</span></a>';
	            		}
	            		?>
				 	<?php }?>
				<?php }?>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Petunjuk</h4>
	            <!-- <div class="card-header-action">
	            	<a href="<?=base_url()?>minat_bakat/tes" class="btn btn-primary btn-tambah"><i class="fas fa-pencil-alt"></i> Lakukan Tes</a>
	            </div> -->
	          </div>
	          <div class="card-body">
	            <table>
	            	<tr>
	            		<td><span class="badge badge-warning">1</span> Soal Yang sedang aktif</td>
	            	</tr>
	            	<tr>
	            		<td><span class="badge badge-secondary">1</span> Soal Yang sedang tidak aktif</td>
	            	</tr>
	            	<tr>
	            		<td><span class="badge badge-info">1</span> Soal Yang sudah dijawab</td>
	            	</tr>
	            </table>
	            
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-selesai-tes">
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
	      		<div class="alert alert-warning">Pastikan data yang anda isi sudah benar</div>
	        	<p>Apakah anda yakin akan menyelesaikan Tes Minat Bakat?</p>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" class="btn btn-primary btn-ya-selesai-tes">Ya</button>
	      </div>
      </form>
    </div>
  </div>
</div>