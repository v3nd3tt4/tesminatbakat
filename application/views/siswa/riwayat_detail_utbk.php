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
	            			$nilai = $this->db->get_where('tb_nilai_mapel_utbk', array('id_siswa' => $id_siswa, 'id_mapel_utbk' => $row_data->id_mapel_utbk, 'id_riwayat_isi_utbk' => $row_data->id_riwayat_isi_utbk));
	            		?>
	            		<tr>
	            			<td>
	            				<?=$row_data->nama_mapel_utbk?>
	            			</td>
	            			<td>
	            				<input type="number" readonly name="mapel[<?=$row_data->id_mapel_utbk?>]" class="form-control" value="<?=@$nilai->row()->nilai?>" required>
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
			            			<input type="text" readonly name="kampus_1" value="<?=@$data_pendukung_utbk->row()->kampus_1?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Jurusan</label>
			            			<input type="text" readonly name="jur_1" value="<?=@$data_pendukung_utbk->row()->jur_1?>" required class="form-control">
			            		</div>
		            		</td>
		            	</tr>
		            	<tr>
		            		<td>
		            			<div class="form-group">
		            				<label>Kampus</label>
			            			<input type="text" readonly name="kampus_2" value="<?=@$data_pendukung_utbk->row()->kampus_2?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Jurusan</label>
			            			<input type="text" readonly name="jur_2" value="<?=@$data_pendukung_utbk->row()->jur_2?>" required class="form-control">
			            		</div>
		            		</td>
		            	</tr>
		            	<tr>
		            		<td>
		            			<div class="form-group">
		            				<label>Kampus</label>
			            			<input type="text" readonly name="kampus_3" value="<?=@$data_pendukung_utbk->row()->kampus_3?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Jurusan</label>
			            			<input type="text" readonly name="jur_3" value="<?=@$data_pendukung_utbk->row()->jur_3?>" required class="form-control">
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
			            			<input type="text" readonly name="good_mapel" value="<?=@$data_pendukung_utbk->row()->good_mapel?>" required class="form-control">
			            		</div>
		            		</td>
		            		<td>
		            			<div class="form-group">
		            				<label>Mata pelajaran paling tidak disukai</label>
			            			<input type="text" readonly name="bad_mapel" value="<?=@$data_pendukung_utbk->row()->bad_mapel?>" required class="form-control">
			            		</div>
		            		</td>
		            	</tr>
		            </table>
		        </div>
		            <!-- <button style="float: right;" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button> -->
	            <!-- </form> -->
	            <br/><br/>
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
	            <form id="form-rasionalisasi-utbk">
	            	<div class="form-group">
	            		<label>Rasionalisasi:</label>
	            		<input type="hidden" name="id_riwayat_isi_utbk" value="<?=$id_riwayat_isi_utbk?>">
	            		<input type="hidden" name="id_siswa" value="<?=$id_siswa?>">
	            		<textarea class="form-control" name="rasionalisasi" style="min-height: 200px; resize: none"><?=$status->row()->rasionalisasi?></textarea>
	            	</div>
    			
    			<button type="submi" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    			</form>
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