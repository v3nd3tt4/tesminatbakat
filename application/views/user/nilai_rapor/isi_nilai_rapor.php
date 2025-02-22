<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Isi Nilai Rapor</h4>
	            
	          </div>
	          <div class="card-body">
	          	<?php if($status_fasilitas_rapor->row()->status == 'disable'){?>
	          	<div class="alert alert-warning">Maaf, fasilitas ini ditutup oleh admin</div>
	          	<?php }else{?>
	          		<?php //var_dump($get_rasionalisasi_terakhir->row())?>
	          		<?php if($get_rasionalisasi_terakhir->num_rows() != 0 && (empty($get_rasionalisasi_terakhir->row()->rasionalisasi) || $get_rasionalisasi_terakhir->row()->rasionalisasi == '')){?>
	          			<div class="alert alert-warning">Maaf, anda tidak bisa menggunakan fitur ini, karena admin belum memberikan saran rasionalisasi dari pengisian sebelumnya</div>
	          		<?php }else{?>
			          	<div class="alert alert-info">Isi sampai semester terakhir anda saja</div>
			          	<?php 
			          	if($data_riwayat->num_rows() != 0){
			          		?>
			          	<!-- <div class="alert alert-warning">Silakan lakukan tes minat bakat terlebih dahulu agar akurasi analisis dapat maksimal</div> -->
			          	<?php 
			          	}
			          	?>
			          	<?php if($data_riwayat_tes->num_rows() == 0){?>
			          		<div class="alert alert-warning">Silakan lakukan tes minat bakat terlebih dahulu <a class="btn btn-primary btn-sm" href="<?=base_url()?>minat_bakat/riwayat">di sini</a> agar akurasi analisis dapat maksimal</div> 
			          	<?php }?>
			            <form id="form-rapor-new">
			            	<?php 
			            		$semester = array('1', '2', '3', '4', '5');
			            		foreach($semester as $sem){
								echo '<fieldset class="border p-2">';
								echo '<legend class="w-auto">Semester '.$sem.'</legend>';
			            		
				            		foreach($data->result() as $row_data){
				            			@$nilai = $this->db->get_where('tb_nilai_mapel', array('id_siswa' => $this->session->userdata('id_siswa'), 'id_mapel' => $row_data->id_mapel, 'id_riwayat_isi_rapor' => $data_riwayat->row()->id_riwayat_isi_rapor, 'semester' => $sem));
				            		?>
										<div class="form-group">
											<label for=""><?=$row_data->nama_mapel?></label>
											
											<!-- <input type="number" name="mapel[<?=$row_data->id_mapel?>]" class="form-control" value="<?=@$nilai->row()->nilai?>" required> -->
											<input type="number" name="mapel[<?=$sem?>][<?=$row_data->id_mapel?>]" value="<?=@$nilai->row()->nilai?>" class="form-control">
											<!-- <input type="hidden" name="semester[]" class="form-control" value="<?=$sem?>"> -->
										</div>
										
			            	<?php 
			            			}
			            		
			            		echo '</fieldset><br/>';
			            		}?>
			            
						<br/>
						<h3>Kampus dan jurusan yang akan dipilih</h3>
						<fieldset class="border p-2">
							<legend class="w-auto">Pilihan 1</legend>
							<div class="form-group">
								<label>Kampus</label>
								<input type="text" name="kampus_1"  required class="form-control">
							</div>
							<div class="form-group">
								<label>Jurusan</label>
								<input type="text" name="jur_1"  required class="form-control">
							</div>
						</fieldset>
						<fieldset class="border p-2">
							<legend class="w-auto">Pilihan 2</legend>
							<div class="form-group">
								<label>Kampus</label>
								<input type="text" name="kampus_2" required class="form-control">
							</div>
							<div class="form-group">
								<label>Jurusan</label>
								<input type="text" name="jur_2" required class="form-control">
							</div>
						</fieldset>
						<fieldset class="border p-2">
							<legend class="w-auto">Pilihan 3</legend>
							<div class="form-group">
								<label>Kampus</label>
								<input type="text" name="kampus_3" required class="form-control">
							</div>
							<div class="form-group">
								<label>Jurusan</label>
								<input type="text" name="jur_3" required class="form-control">
							</div>
						</fieldset>
						<br/><br/>
						<fieldset class="border p-2">
							<legend class="w-auto">Mata Pelajaran disukai dan tidak disukai</legend>
							<div class="form-group">
								<label>Mata pelajaran paling disukai</label>
								<input type="text" name="good_mapel" required class="form-control">
							</div>
							<div class="form-group">
								<label>Mata pelajaran paling tidak disukai</label>
								<input type="text" name="bad_mapel" required class="form-control">
							</div>

						</fieldset>
			            <br/><br/>
				            			
			            <button style="float: right;" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			            </form>
			            <br/><br>
			            <!-- <?php if($status->num_rows() != 0){?>
			            <br><br>
			            <?php if(empty($status->row()->rasionalisasi)){?>
			            <div class="alert alert-warning">Menunggu saran rasionalisasi dari admin</div>
			        	<?php }else{?>
			            <h6>Rasionalisasi</h6>
			            <hr>
			            <table class="table-striped table">
			            	<tr>
			            		<td>Saran dari admin</td>
			            		<td>
			            			<?=$status->row()->rasionalisasi?>
			            		</td>
			            	</tr>
			            </table>
			        	<?php }?>
			        	<?php }else{?>
			        		<div class="alert alert-warning">Menunggu saran rasionalisasi dari admin</div> 
			        	<?php }?> -->
			        <?php }?>
	        	<?php }?>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-nilai-rapor-siswa">
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
	        	<p>Apakah anda yakin akan menyimpan data ini?</p>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" class="btn btn-primary btn-ya-simpan">Ya</button>
	      </div>
      </form>
    </div>
  </div>
</div>