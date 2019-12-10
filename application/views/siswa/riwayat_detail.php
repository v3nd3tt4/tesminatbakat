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
	          	<table class="table table-striped">
	          		<tr>
	          			<td>Tanggal Isi</td>
	          			<td>: <?=$data_riwayat->row()->tgl_isi?></td>
	          		</tr>
	          		<tr>
	          			<td>NISN</td>
	          			<td>: <?=$data->row()->nisn?></td>
	          		</tr>
	          		<tr>
	          			<td>NISN</td>
	          			<td>: <?=$data->row()->nama_siswa?></td>
	          		</tr>
	          	</table>
	            <form>
	            	<?php 
	            		$semester = array('1', '2', '3', '4', '5');
	            		foreach($semester as $sem){
	            		echo '<h3>Semester '.$sem.'</h3>';
	            		echo '<table class="table table-striped">';
		            		foreach($data->result() as $row_data){
		            			$nilai = $this->db->get_where('tb_nilai_mapel', array('id_siswa' => $id_siswa, 'id_mapel' => $row_data->id_mapel, 'id_riwayat_isi_rapor' => $id_riwayat_isi_rapor, 'semester' => $sem));
		            		?>
		            		<tr>
		            			<td>
		            				<?=$row_data->nama_mapel?>
		            			</td>
		            			<td>
		            				<!-- <input type="number" name="mapel[<?=$row_data->id_mapel?>]" class="form-control" value="<?=@$nilai->row()->nilai?>" required> -->
		            				<input type="number" name="mapel[<?=$sem?>][<?=$row_data->id_mapel?>]" class="form-control" value="<?=@$nilai->row()->nilai?>">
		            				<!-- <input type="hidden" name="semester[]" class="form-control" value="<?=$sem?>"> -->
		            			</td>
		            		</tr>
	            		
	            	<?php 
	            			}
	            		echo '</table>';
	            		}?>
	            

	            <h6>Kampus dan jurusan yang akan dipilih</h6>
	            <hr>
	            <table class="table table-striped">
	            	<tr>
	            		<td>
	            			<div class="form-group">
	            				<label>Kampus</label>
		            			<input type="text" name="kampus_1" value="<?=@$data_pendukung_rapor->row()->kampus_1?>" required class="form-control">
		            		</div>
	            		</td>
	            		<td>
	            			<div class="form-group">
	            				<label>Jurusan</label>
		            			<input type="text" name="jur_1" value="<?=@$data_pendukung_rapor->row()->jur_1?>" required class="form-control">
		            		</div>
	            		</td>
	            	</tr>
	            	<tr>
	            		<td>
	            			<div class="form-group">
	            				<label>Kampus</label>
		            			<input type="text" name="kampus_2" value="<?=@$data_pendukung_rapor->row()->kampus_2?>" required class="form-control">
		            		</div>
	            		</td>
	            		<td>
	            			<div class="form-group">
	            				<label>Jurusan</label>
		            			<input type="text" name="jur_2" value="<?=@$data_pendukung_rapor->row()->jur_2?>" required class="form-control">
		            		</div>
	            		</td>
	            	</tr>
	            	<tr>
	            		<td>
	            			<div class="form-group">
	            				<label>Kampus</label>
		            			<input type="text" name="kampus_3" value="<?=@$data_pendukung_rapor->row()->kampus_3?>" required class="form-control">
		            		</div>
	            		</td>
	            		<td>
	            			<div class="form-group">
	            				<label>Jurusan</label>
		            			<input type="text" name="jur_3" value="<?=@$data_pendukung_rapor->row()->jur_3?>" required class="form-control">
		            		</div>
	            		</td>
	            	</tr>
	            </table>
	            <h6>Mata Pelajaran disukai dan tidak disukai</h6>
	            <hr>
	            <table class="table table-striped">
	            	<tr>
	            		<td>
	            			<div class="form-group">
	            				<label>Mata pelajaran paling disukai</label>
		            			<input type="text" name="good_mapel" value="<?=@$data_pendukung_rapor->row()->good_mapel?>" required class="form-control">
		            		</div>
	            		</td>
	            		<td>
	            			<div class="form-group">
	            				<label>Mata pelajaran paling tidak disukai</label>
		            			<input type="text" name="bad_mapel" value="<?=@$data_pendukung_rapor->row()->bad_mapel?>" required class="form-control">
		            		</div>
	            		</td>
	            	</tr>
	            </table>
	            <!-- <button style="float: right;" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button> -->
	            </form>
	            <br/><br>
	            <form id="form-rasionalisasi-rapor">
	            	<div class="form-group">
	            		<label>Rasionalisasi:</label>
	            		<input type="hidden" name="id_siswa" value="<?=$id_siswa?>">
	            		<input type="hidden" name="id_riwayat_isi_rapor" value="<?=$id_riwayat_isi_rapor?>">
	            		<textarea class="form-control" name="rasionalisasi" style="min-height: 200px; resize: none"><?=$status->num_rows()!=0?$status->row()->rasionalisasi: ''?></textarea>
	            	</div>
    			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    			</form>
	            
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-rasionalisasi-rapor">
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
