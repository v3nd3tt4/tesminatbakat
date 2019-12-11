<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Nilai UTBK</h4>
	            
	          </div>
	          <div class="card-body">
	          	<p>Data Siswa</p>
	          	<div class="table-responsive">
		          	<table class="table table-striped">
		          		<tr>
		          			<td>NISN</td>
		          			<td><?=$data->row()->nisn?></td>
		          		</tr>
		          		<tr>
		          			<td>Nama Siswa</td>
		          			<td><?=$data->row()->nama_siswa?></td>
		          		</tr>
		          	</table>
		          </div>
	          	<hr>
	          	<?php if($status->num_rows() != 0){?>
	          	<p>Nilai Rapor</p>
	            <form id="form-rapor">
	            	<div class="table-responsive">
		            	<table class="table table-striped">
		            		<?php foreach($data->result() as $row_data){
		            			$nilai = $this->db->get_where('tb_nilai_mapel_utbk', array('id_siswa' => $id_siswa, 'id_mapel_utbk' => $row_data->id_mapel_utbk));
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
	            	<hr>
	            	<p>Kampus dan jurusan yang akan dipilih</p>
		            <div class="table-responsive">
			            <table class="table table-striped">
			            	<tr>
			            		<td>
			            			<div class="form-group">
			            				<label>Kampus</label>
				            			<input type="text" name="kampus_1" value="<?=@$data_pendukung_utbk->row()->kampus_1?>" class="form-control">
				            		</div>
			            		</td>
			            		<td>
			            			<div class="form-group">
			            				<label>Jurusan</label>
				            			<input type="text" name="jur_1" value="<?=@$data_pendukung_utbk->row()->jur_1?>" class="form-control">
				            		</div>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			<div class="form-group">
			            				<label>Kampus</label>
				            			<input type="text" name="kampus_2" value="<?=@$data_pendukung_utbk->row()->kampus_2?>" class="form-control">
				            		</div>
			            		</td>
			            		<td>
			            			<div class="form-group">
			            				<label>Jurusan</label>
				            			<input type="text" name="jur_2" value="<?=@$data_pendukung_utbk->row()->jur_2?>" class="form-control">
				            		</div>
			            		</td>
			            	</tr>
			            	<tr>
			            		<td>
			            			<div class="form-group">
			            				<label>Kampus</label>
				            			<input type="text" name="kampus_3" value="<?=@$data_pendukung_utbk->row()->kampus_3?>" class="form-control">
				            		</div>
			            		</td>
			            		<td>
			            			<div class="form-group">
			            				<label>Jurusan</label>
				            			<input type="text" name="jur_3" value="<?=@$data_pendukung_utbk->row()->jur_3?>" class="form-control">
				            		</div>
			            		</td>
			            	</tr>
			            </table>
			        </div>

		            <hr>
		            <p>Mata Pelajaran disukai dan tidak disukai</p>
		            <div class="table-responsive">
			            <table class="table table-striped">
			            	<tr>
			            		<td>
			            			<div class="form-group">
			            				<label>Mata pelajaran paling disukai</label>
				            			<input type="text" name="good_mapel" value="<?=@$data_pendukung_utbk->row()->good_mapel?>" class="form-control">
				            		</div>
			            		</td>
			            		<td>
			            			<div class="form-group">
			            				<label>Mata pelajaran paling tidak disukai</label>
				            			<input type="text" name="bad_mapel" value="<?=@$data_pendukung_utbk->row()->bad_mapel?>" class="form-control">
				            		</div>
			            		</td>
			            	</tr>
			            </table>
			        </div>
	            </form>
	            <hr>
	            <form id="form-rasionalisasi-utbk">
	            	<div class="form-group">
	            		<label>Rasionalisasi:</label>
	            		<input type="hidden" name="id_siswa" value="<?=$id_siswa?>">
	            		<textarea class="form-control" name="rasionalisasi" style="min-height: 200px; resize: none"><?=$status->row()->rasionalisasi?></textarea>
	            	</div>
	            
    			
    			<button type="submi" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    			</form>
	        	<?php }else{?>
	        		<div class="alert alert-warning">Siswa belum mengisi nilai UTBK</div>
	        	<?php }?>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-rasionalisasi-utbk">
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