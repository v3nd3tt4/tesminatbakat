<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Pilih Jurusan UTBK</h4>
	            
	          </div>
	          <div class="card-body">
	          	<?php if($status_fasilitas_utbk->row()->status == 'disable'){?>
	          	<div class="alert alert-warning">Maaf, fasilitas ini ditutup oleh admin</div>
	          	<?php }else{?>
	          		<?php if($get_rasionalisasi_terakhir->num_rows() != 0 && (empty($get_rasionalisasi_terakhir->row()->rasionalisasi) || $get_rasionalisasi_terakhir->row()->rasionalisasi == '')){?>
	          			<div class="alert alert-warning">Maaf, anda tidak bisa menggunakan fitur ini, karena admin belum memberikan saran rasionalisasi dari pengisian sebelumnya</div>
	          		<?php }else{?>
		            <form action="<?=base_url()?>profil_siswa/isi_nilai_utbk" method="POST">
		            	<div class="form-group">
		            		<label>Jurusan UTBK</label>
		            		<select class="form-control" name="id_kategori_utbk">
		            			<option>--pilih--</option>
		            			<?php foreach($utbk->result() as $row_utbk){?>
		            			<option value="<?=$row_utbk->id_kategori_utbk?>"><?=$row_utbk->nama_kategori_utbk?></option>
		            			<?php }?>
		            		</select>
		            	</div>
		            	<button type="submit" class="btn btn-primary"> Selanjutnya <i class="fas fa-arrow-right"></i></button>
		            </form>
		        	<?php }?>
	            <?php }?>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>