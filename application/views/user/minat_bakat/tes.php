<!-- Main Content -->
<div class="main-content">
	<form id="form-tes-minat-bakat">
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
	            	<!-- <input type="text" name="id_pertanyaan" value="<?=$row_soal->id_pertanyaan?>"> -->
	            <?php
	            }
	            ?>
	            <table>
	            	<tr>
	            		<td><label class="radio-inline"><input type="radio" name="optradio"> Sangat Tidak Setuju</label></td>
	            	</tr>
	            	<tr>
	            		<td><label class="radio-inline"><input type="radio" name="optradio"> Tidak Setuju</label></td>
	            	</tr>
	            	<tr>
	            		<td><label class="radio-inline"><input type="radio" name="optradio"> Agak Setuju</label></td>
	            	</tr>
	            	<tr>
	            		<td><label class="radio-inline"><input type="radio" name="optradio"> Setuju</label></td>
	            	</tr>
	            	<tr>
	            		<td><label class="radio-inline"><input type="radio" name="optradio"> Sangat Setuju</label></td>
	            	</tr>
	            </table>
	          </div>
	          <div class="card-footer">
	          	<?php if($hal > 1 ){?>
	          		<a href="<?php if($hal <= 1){ echo '#'; } else { echo "?halaman=".($hal - 1); } ?>" class="btn btn-info"><i class="fas fa-angle-left"></i> Sebelumnya</a>
	          	<?php }?>
	          	<?php if($hal < $tot_hal){?>
	            <a href="<?php if($hal >= $tot_hal){ echo '#'; } else { echo "?halaman=".($hal + 1); } ?>" class="btn btn-success text-right">Simpan & Lanjutkan</a>
	        	<?php }else{?>
	        	<a href="#" class="btn btn-danger">Selesai</a>
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
	            
	            <?php for ($i=1; $i<=$pages ; $i++){ ?>
	            	<?php if($this->input->get('halaman', true) == $i){
	            ?>
	            	<a href="?halaman=<?php echo $i; ?>"><span class="badge badge-warning"><?php echo $i; ?></span></a>
	            	<?php }else{?>
				  	<a href="?halaman=<?php echo $i; ?>"><span class="badge badge-secondary"><?php echo $i; ?></span></a>
				 <?php 
					}
				} ?>
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
	            		<td><span class="badge badge-info">1</span> Soal Yang sudah diisi</td>
	            	</tr>
	            </table>
	            
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>