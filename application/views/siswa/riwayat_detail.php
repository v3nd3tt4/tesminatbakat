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
		          		<tr>
		          			<td>NISN</td>
		          			<td>: <?=$data->row()->nisn?></td>
		          		</tr>
		          		<tr>
		          			<td>NISN</td>
		          			<td>: <?=$data->row()->nama_siswa?></td>
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
		            			$nilai = $this->db->get_where('tb_nilai_mapel', array('id_siswa' => $id_siswa, 'id_mapel' => $row_data->id_mapel, 'id_riwayat_isi_rapor' => $id_riwayat_isi_rapor, 'semester' => $sem));
		            		?>
		            		<tr>
		            			<td>
									<div class="form-group">
		            				<label><?=$row_data->nama_mapel?></label>
		            			
		            				<!-- <input type="number" name="mapel[<?=$row_data->id_mapel?>]" class="form-control" value="<?=@$nilai->row()->nilai?>" required> -->
		            				<input type="number" readonly name="mapel[<?=$sem?>][<?=$row_data->id_mapel?>]" class="form-control" value="<?=@$nilai->row()->nilai?>">
		            				<!-- <input type="hidden" name="semester[]" class="form-control" value="<?=$sem?>"> -->
									</div>
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
					<fieldset class="border p-2">
						<legend class="w-auto">Pilihan 1</legend>
		            
		            			<div class="form-group">
		            				<label>Kampus</label>
			            			<input type="text" readonly name="kampus_1" value="<?=@$data_pendukung_rapor->row()->kampus_1?>" required class="form-control">
			            		</div>
		            		
		            			<div class="form-group">
		            				<label>Jurusan</label>
			            			<input type="text" readonly name="jur_1" value="<?=@$data_pendukung_rapor->row()->jur_1?>" required class="form-control">
			            		</div>
						</legend>
					</fieldset>
					<fieldset class="border p-2">
						<legend class="w-auto">Pilihan 2</legend>
							
						<div class="form-group">
							<label>Kampus</label>
							<input type="text" readonly name="kampus_2" value="<?=@$data_pendukung_rapor->row()->kampus_2?>" required class="form-control">
						</div>
					
						<div class="form-group">
							<label>Jurusan</label>
							<input type="text" readonly name="jur_2" value="<?=@$data_pendukung_rapor->row()->jur_2?>" required class="form-control">
						</div>
					</fieldset>
					<fieldset class="border p-2">
						<legend class="w-auto">Pilihan 3</legend>
						<div class="form-group">
							<label>Kampus</label>
							<input type="text" readonly name="kampus_3" value="<?=@$data_pendukung_rapor->row()->kampus_3?>" required class="form-control">
						</div>
					
						<div class="form-group">
							<label>Jurusan</label>
							<input type="text" readonly name="jur_3" value="<?=@$data_pendukung_rapor->row()->jur_3?>" required class="form-control">
						</div>
					</fieldset>
		        </div>
				<br/><br/>
				<fieldset class="border p-2">
					<legend class="w-auto">Mata Pelajaran disukai dan tidak disukai</legend>
				
	            
					<div class="form-group">
						<label>Mata pelajaran paling disukai</label>
						<input type="text" readonly name="good_mapel" value="<?=@$data_pendukung_rapor->row()->good_mapel?>" required class="form-control">
					</div>
				
					<div class="form-group">
						<label>Mata pelajaran paling tidak disukai</label>
						<input type="text" readonly name="bad_mapel" value="<?=@$data_pendukung_rapor->row()->bad_mapel?>" required class="form-control">
					</div>
				</fieldset>
	            <!-- <button style="float: right;" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button> -->
	            </form>
	            <br/><br>
	            <?php if($get_test_terakhir->num_rows() == 0){?>
	            	<div class="alert alert-warning">Siswa belum melakukan test</div>
	            <?php }else{?>
	            <h6>Hasil Test Minat Bakat Terakhir</h6>
	            <table class="table-striped table">
	            	<tr>
	            		<td>Hasil Teratas 1</td>
	            		<td>: <?=$this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal' =>$get_test_terakhir->row()->hasil_1))->row()->nama_kategori?></td>
	            	</tr>
	            	<tr>
	            		<td>Hasil Teratas 2</td>
	            		<td>: <?=$this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal' =>$get_test_terakhir->row()->hasil_2))->row()->nama_kategori?></td>
	            	</tr>
	            	<tr>
	            		<td>Hasil Terbawah 1</td>
	            		<td>: <?=@$this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal' =>$get_test_terakhir->row()->hasil_terbawah_1))->row()->nama_kategori?></td>
	            	</tr>
	            	<tr>
	            		<td>Hasil Terbawah 2</td>
	            		<td>:  <?=@$this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal' =>$get_test_terakhir->row()->hasil_terbawah_2))->row()->nama_kategori?></td>
	            	</tr>
	            </table>
	            <?php }?>
	            <br/><br/>
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
<style>
legend.scheduler-border {
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
}</style>
