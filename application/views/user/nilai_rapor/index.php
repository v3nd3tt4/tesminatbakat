<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Nilai Rapor</h4>
	            
	          </div>
	          <div class="card-body">
	            <form id="form-rapor">
	            	<table class="table table-striped">
	            		<?php foreach($data->result() as $row_data){
	            			$nilai = $this->db->get_where('tb_nilai_mapel', array('id_siswa' => $this->session->userdata('id_siswa'), 'id_mapel' => $row_data->id_mapel));
	            		?>
	            		<tr>
	            			<td>
	            				<?=$row_data->nama_mapel?>
	            			</td>
	            			<td>
	            				<input type="number" name="mapel[<?=$row_data->id_mapel?>]" class="form-control" value="<?=@$nilai->row()->nilai?>" required>
	            			</td>
	            		</tr>
	            		<?php }?>
	            		<tr>
	            			<td></td>
	            			<td>
	            				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	            			</td>
	            		</tr>
	            	</table>
	            </form>

	            <?php if($status->num_rows() != 0){?>
	            <table class="table-striped table">
	            	<tr>
	            		<td>Saran dari admin</td>
	            		<td>
	            			<?=$status->row()->rasionalisasi?>
	            		</td>
	            	</tr>
	            </table>
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