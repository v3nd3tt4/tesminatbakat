<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Preview Import</h4>
	            <div class="card-header-action">
	            	<button class="btn btn-primary" onclick="goBack()" ><i class="fas fa-chevron-left"></i> Kembali</button>
	            </div>
	          </div>
	          <div class="card-body">
	          	<!-- <div class="alert alert-warning"><marquee>Fitur ini dalam proses pengembangan</marquee></div> -->
	          	<form id="form_import_siswa">
	          		<input type="hidden" name="data_to_save" value='<?=json_encode($data)?>'>
	          		<?php //var_dump(json_decode(json_encode($data)));?>
	            <div class="table-responsive">
		            <table class="table table-striped">
		            	<thead>
		            		<tr>
		            			<th>No</th>
		            			<!-- <th>NISN</th> -->
		            			<th>Nama</th>
		            			<!-- <th>Tempat Lahir</th>
		            			<th>Tanggal Lahir</th> -->
		            			<th>Email</th>
		            			<!-- <th>No HP</th>
		            			<th>Jenis Kelamin</th>
		            			<th>Agama</th>
		            			<th>Sekolah</th>
		            			<th>Jurusan SMA</th>
		            			<th>Jenis UTBK</th>
		            			<th>Alamat</th> -->
		            		</tr>
		            	</thead>
		            	<tbody>
		            		<?php 
		            			$no=1;
				            	for($i=0;$i<count($data);$i++){
				            		if($data[$i]['email'] != ''){
				            ?>
				            <tr>
		            			<td><?=$no++?></td>	
		            			<td><?=$data[$i]['nama']?></td>
		            			<td><?=$data[$i]['email']?></td>	
		            			<!-- <td><?=$data[$i][2]?></td>	
		            			<td><?=$data[$i][3]?></td>	
		            			<td><?=$data[$i][4]?></td>	
		            			<td><?=$data[$i][5]?></td>	 -->
		            			<!-- <td>
		            				<?php echo @$this->db->get_where('tb_jk', array('id_jk' => $data[$i][6]))->row()->nama_jk?>
		            			</td>	
		            			<td>
		            				<?php echo @$this->db->get_where('tb_agama', array('id_agama' => $data[$i][7]))->row()->nama_agama?>
		            			</td>	
		            			<td>
		            				<?php echo @$this->db->get_where('tb_sekolah', array('id_sekolah' => $data[$i][8]))->row()->nama_sekolah?>
		            			</td>	
		            			<td>
		            				<?php echo @$this->db->get_where('tb_kategori_sma', array('id_kategori_sma' => $data[$i][9]))->row()->nama_kategori?>
		            			</td>	
		            			<td>
		            				<?php echo @$this->db->get_where('tb_kategori_utbk', array('id_kategori_utbk' => $data[$i][10]))->row()->nama_kategori_utbk?>
		            			</td>	
		            			<td><?=$data[$i][11]?></td>	 -->
		            		</tr>	
				            <?php
				        			}
				            	}	
				            ?>
		            		
		            	</tbody>
		            </table>

		            <button type="submit" class="btn btn-danger" style="float: right"><i class="fas fa-save"></i> Simpan</button>
		            </form>
		        </div>
	            
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-import">
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
	        	<p>Apakah anda yakin akan mengimport data ini?</p>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" class="btn btn-primary btn-ya-import">Ya</button>
	      </div>
      </form>
    </div>
  </div>
</div>