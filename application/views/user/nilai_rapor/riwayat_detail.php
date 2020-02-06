<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Riwayat Nilai Rapor</h4>
	            
	          </div>
	          <div class="card-body">
	          	<!-- <div class="alert alert-info">Isi sampai semester terakhir anda saja</div> -->
	          	<div class="table-responsive">
		          	<table class="table table-striped">
		          		<tr>
		          			<td>Tanggal Isi</td>
		          			<td>: <?=$data_riwayat->row()->tgl_isi?></td>
		          		</tr>
		          	</table>
		          </div>
	            <form>
	            	<?php 
	            		$semester = array('1', '2', '3', '4', '5');
	            		foreach($semester as $sem){
							echo '<fieldset class="border p-2">';
							echo '<legend class="w-auto">Semester '.$sem.'</legend>';
		            		foreach($data->result() as $row_data){
		            			$nilai = $this->db->get_where('tb_nilai_mapel', array('id_siswa' => $this->session->userdata('id_siswa'), 'id_mapel' => $row_data->id_mapel, 'id_riwayat_isi_rapor' => $id_riwayat_isi_rapor, 'semester' => $sem));
		            		?>
		            			<div class="form-group">
									<label for=""><?=$row_data->nama_mapel?></label>
									<!-- <input type="number" name="mapel[<?=$row_data->id_mapel?>]" class="form-control" value="<?=@$nilai->row()->nilai?>" required> -->
		            				<input type="number" readonly name="mapel[<?=$sem?>][<?=$row_data->id_mapel?>]" class="form-control" value="<?=@$nilai->row()->nilai?>">
		            				<!-- <input type="hidden" name="semester[]" class="form-control" value="<?=$sem?>"> -->
								</div>
							<?php 
	            			}
	            		
							echo '</fieldset><br/>';
	            		}?>
	            

	            <h6>Kampus dan jurusan yang akan dipilih</h6>
	            <hr>
	            <fieldset class="border p-2">
					<legend class="w-auto">Pilihan 1</legend>
						<div class="form-group">
							<label>Kampus</label>
							<input type="text" name="kampus_1" readonly value="<?=@$data_pendukung_rapor->row()->kampus_1?>" required class="form-control">
						</div>
						<div class="form-group">
							<label>Jurusan</label>
							<input type="text" name="jur_1" readonly value="<?=@$data_pendukung_rapor->row()->jur_1?>" required class="form-control">
						</div>
				</fieldset>
				<fieldset class="border p-2">
					<legend class="w-auto">Pilihan 2</legend>
					<div class="form-group">
						<label>Kampus</label>
						<input type="text" name="kampus_2" readonly value="<?=@$data_pendukung_rapor->row()->kampus_2?>" required class="form-control">
					</div>
					<div class="form-group">
						<label>Jurusan</label>
						<input type="text" name="jur_2" readonly value="<?=@$data_pendukung_rapor->row()->jur_2?>" required class="form-control">
					</div>
				</fieldset>
				<fieldset class="border p-2">
					<legend class="w-auto">Pilihan 3</legend>
					<div class="form-group">
						<label>Kampus</label>
						<input type="text" name="kampus_3" readonly value="<?=@$data_pendukung_rapor->row()->kampus_3?>" required class="form-control">
					</div>
					<div class="form-group">
						<label>Jurusan</label>
						<input type="text" name="jur_3" readonly value="<?=@$data_pendukung_rapor->row()->jur_3?>" required class="form-control">
					</div>
				</fieldset>
				<br><br>
				<fieldset class="border p-2">
					<legend class="w-auto">Mata Pelajaran disukai dan tidak disukai</legend>
					<div class="form-group">
						<label>Mata pelajaran paling disukai</label>
						<input type="text" name="good_mapel" readonly value="<?=@$data_pendukung_rapor->row()->good_mapel?>" required class="form-control">
					</div>
					<div class="form-group">
						<label>Mata pelajaran paling tidak disukai</label>
						<input type="text" name="bad_mapel" readonly value="<?=@$data_pendukung_rapor->row()->bad_mapel?>" required class="form-control">
					</div>
				</fieldset>
	            <h6></h6>
		            			
	            <!-- <button style="float: right;" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button> -->
	            </form>
	            <br/><br>
	            <?php if($status->num_rows() != 0){?>
	            <br><br>
	            <?php if(empty($status->row()->rasionalisasi)){?>
	            <div class="alert alert-warning">Menunggu saran rasionalisasi dari admin</div>
	        	<?php }else{?>
	            <h6>Rasionalisasi</h6>
	            <hr>
	            <div class="table-responsive">
		            <table class="table-striped table">
		            	<tr>
		            		<td>Saran dari admin</td>
		            		<td>
		            			<?=$status->row()->rasionalisasi?>
		            		</td>
		            	</tr>
		            </table>
		        </div>
	        	<?php }?>
	        	<?php }else{?>
	        		<div class="alert alert-warning">Menunggu saran rasionalisasi dari admin</div> 
	        	<?php }?>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>
