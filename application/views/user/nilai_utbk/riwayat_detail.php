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
		            <table class="table table-striped">
		            	<tr>
		            		<td>Tanggal Pengisian</td>
		            		<td>: <?=$data_riwayat->row()->tgl_isi?></td>
		            	</tr>
		          		<tr>
		          			<td>Jurusan</td>
		          			<td>: <?=$utbk->row()->nama_kategori_utbk?></td>
		          		</tr>
		          	</table>
		        </div>
	            <!-- <form id="form-rapor"> -->
	            <div class="table-responsive">
	            	<table class="table table-striped">
	            		<?php foreach($data->result() as $row_data){
	            			$nilai = $this->db->get_where('tb_nilai_mapel_utbk', array('id_siswa' => $this->session->userdata('id_siswa'), 'id_mapel_utbk' => $row_data->id_mapel_utbk, 'id_riwayat_isi_utbk' => $row_data->id_riwayat_isi_utbk));
	            		?>
	            		<tr>
	            			<td>
	            				<?=$row_data->nama_mapel_utbk?>
	            			</td>
	            			<td>
	            				<input type="number" name="mapel[<?=$row_data->id_mapel_utbk?>]" class="form-control" value="<?=@$nilai->row()->nilai?>" required>
	            			</td>
	            		</tr>
	            		<?php }?>
	            	</table>
	            </div>
	            	<h6>Kampus dan jurusan yang akan dipilih</h6>
		            <hr>
		        <div class="table-responsive">
		            <table class="table table-striped">
		            	<tr>
		            		<td>
		            			<div class="form-group">
		            				<label>Kampus</label>
			            			<input type="text" name="kampus_1" value="<?=@$data_pendukung_utbk->row()->kampus_1?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Jurusan</label>
			            			<input type="text" name="jur_1" value="<?=@$data_pendukung_utbk->row()->jur_1?>" required class="form-control">
			            		</div>
		            		</td>
		            	</tr>
		            	<tr>
		            		<td>
		            			<div class="form-group">
		            				<label>Kampus</label>
			            			<input type="text" name="kampus_2" value="<?=@$data_pendukung_utbk->row()->kampus_2?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Jurusan</label>
			            			<input type="text" name="jur_2" value="<?=@$data_pendukung_utbk->row()->jur_2?>" required class="form-control">
			            		</div>
		            		</td>
		            	</tr>
		            	<tr>
		            		<td>
		            			<div class="form-group">
		            				<label>Kampus</label>
			            			<input type="text" name="kampus_3" value="<?=@$data_pendukung_utbk->row()->kampus_3?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Jurusan</label>
			            			<input type="text" name="jur_3" value="<?=@$data_pendukung_utbk->row()->jur_3?>" required class="form-control">
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
			            			<input type="text" name="good_mapel" value="<?=@$data_pendukung_utbk->row()->good_mapel?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Mata pelajaran paling tidak disukai</label>
			            			<input type="text" name="bad_mapel" value="<?=@$data_pendukung_utbk->row()->bad_mapel?>" required class="form-control">
			            		</div>
		            		</td>
		            	</tr>
		            </table>
		        </div>
		            <!-- <button style="float: right;" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button> -->
	            <!-- </form> -->
	            <br/><br/>
	            <?php if($status->num_rows() != 0){?>
	            <br><br>
	            <?php if(empty($status->row()->rasionalisasi)){?>
	            <div class="alert alert-warning">Menunggu saran rasionalisasi dari admin</div>
	        	<?php }else{?>
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
	        	<?php }?>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>