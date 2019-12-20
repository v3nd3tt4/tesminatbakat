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
	            		echo '<h3>Semester '.$sem.'</h3>';
	            		echo '<div class="table-responsive">';
	            		echo '<table class="table table-striped">';
		            		foreach($data->result() as $row_data){
		            			$nilai = $this->db->get_where('tb_nilai_mapel', array('id_siswa' => $this->session->userdata('id_siswa'), 'id_mapel' => $row_data->id_mapel, 'id_riwayat_isi_rapor' => $id_riwayat_isi_rapor, 'semester' => $sem));
		            		?>
		            		<tr>
		            			<td>
		            				<?=$row_data->nama_mapel?>
		            			</td>
		            			<td>
		            				<!-- <input type="number" name="mapel[<?=$row_data->id_mapel?>]" class="form-control" value="<?=@$nilai->row()->nilai?>" required> -->
		            				<input type="number" readonly name="mapel[<?=$sem?>][<?=$row_data->id_mapel?>]" class="form-control" value="<?=@$nilai->row()->nilai?>">
		            				<!-- <input type="hidden" name="semester[]" class="form-control" value="<?=$sem?>"> -->
		            			</td>
		            		</tr>
	            		
	            	<?php 
	            			}
	            		echo '</table>';
	            		echo '</div>';
	            		}?>
	            

	            <h6>Kampus dan jurusan yang akan dipilih</h6>
	            <hr>
	            <div class="table-responsive">
		            <table class="table table-striped">
		            	<tr>
		            		<td>
		            			<div class="form-group">
		            				<label>Kampus</label>
			            			<input type="text" name="kampus_1" readonly value="<?=@$data_pendukung_rapor->row()->kampus_1?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Jurusan</label>
			            			<input type="text" name="jur_1" readonly value="<?=@$data_pendukung_rapor->row()->jur_1?>" required class="form-control">
			            		</div>
		            		</td>
		            	</tr>
		            	<tr>
		            		<td>
		            			<div class="form-group">
		            				<label>Kampus</label>
			            			<input type="text" name="kampus_2" readonly value="<?=@$data_pendukung_rapor->row()->kampus_2?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Jurusan</label>
			            			<input type="text" name="jur_2" readonly value="<?=@$data_pendukung_rapor->row()->jur_2?>" required class="form-control">
			            		</div>
		            		</td>
		            	</tr>
		            	<tr>
		            		<td>
		            			<div class="form-group">
		            				<label>Kampus</label>
			            			<input type="text" name="kampus_3" readonly value="<?=@$data_pendukung_rapor->row()->kampus_3?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Jurusan</label>
			            			<input type="text" name="jur_3" readonly value="<?=@$data_pendukung_rapor->row()->jur_3?>" required class="form-control">
			            		</div>
		            		</td>
		            	</tr>
		            </table>
		        </div>
	            <h6>Mata Pelajaran disukai dan tidak disukai</h6>
	            <hr>
	            <div class="table-responsive">
		            <table class="table table-striped">
		            	<tr>
		            		<td>
		            			<div class="form-group">
		            				<label>Mata pelajaran paling disukai</label>
			            			<input type="text" name="good_mapel" readonly value="<?=@$data_pendukung_rapor->row()->good_mapel?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Mata pelajaran paling tidak disukai</label>
			            			<input type="text" name="bad_mapel" readonly value="<?=@$data_pendukung_rapor->row()->bad_mapel?>" required class="form-control">
			            		</div>
		            		</td>
		            	</tr>
		            </table>
		        </div>
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
