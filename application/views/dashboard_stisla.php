<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Selamat datang, dalam aplikasi tes minat bakat</h4>
	            <!-- <div class="card-header-action">
	            	<button class="btn btn-primary btn-tambah" ><i class="fas fa-plus"></i> Tambah</button>
	            </div> -->
	          </div>
	          <div class="card-body">
	            <!-- <h3>Selamat datang, dalam aplikasi tes minat bakat</h3> -->
	            <!-- <hr/>
	            <?php if($this->session->userdata('level') == 'siswa'){?>
	            <ul>
	            <?php if($status_update_profil->num_rows()==0){?>
	            	<li>Silahkan lengkapi profil <a class="btn btn-sm btn-primary" href="<?=base_url()?>profil_siswa">disini</a></li>
	            <?php }?>
	            <?php if($status_update_password->num_rows()==0){?>
	            	<li>Silahkan ganti password <a class="btn btn-sm btn-primary" href="<?=base_url()?>profil_siswa/ganti_password">disini</a></li>
	            <?php }?>
	            <?php if($status_update_rapor->num_rows()==0){?>
	            	<li>Silahkan isi nilai rapor <a class="btn btn-sm btn-primary" href="<?=base_url()?>profil_siswa/nilai_rapor">disini</a></li>
	            <?php }?>
	            <?php if($status_update_utbk->num_rows()==0){?>
	            	<li>Silahkan isi nilai utbk <a class="btn btn-sm btn-primary" href="<?=base_url()?>profil_siswa/nilai_utbk">disini</a></li>
	            <?php }?>
	            </ul>
	        	<?php }?> -->
	        	<?php if($this->session->userdata('level') == 'siswa'){?>
	        	<center>
		        	<div class="stepwizard col-md-offset-3">
					    <div class="stepwizard-row setup-panel">
					        <div class="stepwizard-step">
					            <a href="#step-1" type="button" class="btn btn-circle <?=$status_update_profil->num_rows()!=0? 'disabled' : 'btn-primary '?>">1</a>
					            <p>Lengkapi Profil</p>
					        </div>
					        <div class="stepwizard-step">
					            <a href="#step-2" type="button" class="btn btn-default btn-circle <?=$status_update_profil->num_rows()==0 ? 'disabled' : 'btn-primary '?> <?=$status_update_password->num_rows()==1 ? 'disabled' : ''?>">2</a>
					            <p>Ganti Password</p>
					        </div>
					        <div class="stepwizard-step">
					            <a href="#step-3" type="button" class="btn btn-default btn-circle <?=$status_update_password->num_rows()==0  ? 'disabled' : 'btn-primary '?>">3</a>
					            <p>Selesai</p>
					        </div>
					    </div>
					</div>
				</center>
				<!-- <center> -->
					<form id="form-update-siswa">
					    <div class="row setup-content" id="step-1">
					        <div class="col-md-6">
				      			<div class="form-group">
					        		<label>NISN</label>
					        		<input type="hidden" required class="form-control" name="id_siswa" id="id_siswa" value="<?=@$data->row()->id_siswa?>">
					        		<input type="text" required class="form-control" name="nisn" id="nisn" value="<?=@$data->row()->nisn?>">
					        	</div>
					        	<div class="form-group">
					        		<label>Nama Siswa</label>
					        		<input type="text" required class="form-control" name="nama_siswa" id="nama_siswa"  value="<?=@$data->row()->nama_siswa?>">
					        	</div>
					        	<div class="form-group">
					        		<label>Tempat Lahir</label>
					        		<input type="text" required class="form-control" name="tempat_lahir" id="tempat_lahir"  value="<?=@$data->row()->tempat_lahir?>">
					        	</div>
					        	<div class="form-group">
					        		<label>Tanggal Lahir</label>
					        		<input type="date" required class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?=@$data->row()->tgl_lahir?>">
					        	</div>
					        	<div class="form-group">
					        		<label>Email</label>
					        		<input type="email" required class="form-control" name="email" id="email" value="<?=@$data->row()->email?>" readonly>
					        	</div>
					        	<div class="form-group">
					        		<label>Jurusan Sekolah</label>
					        		<select class="form-control" required name="id_kategori_sma" id="id_kategori_sma">
					        			<option value="">--pilih--</option>
					        			<?php foreach($data_sma->result() as $row_sma){?>
					        				<option value="<?=$row_sma->id_kategori_sma?>" <?=@$data->row()->id_kategori_sma == $row_sma->id_kategori_sma? 'selected' : ''?>><?=$row_sma->nama_kategori?></option>
					        			<?php }?>
					        		</select>
					        	</div>
					        	<!-- <div class="form-group">
					        		<label>UTBK</label>
					        		<select class="form-control" required name="id_kategori_utbk" id="id_kategori_utbk">
					        			<option value="">--pilih--</option>
					        			<?php foreach($data_utbk->result() as $row_utbk){?>
					        				<option value="<?=$row_utbk->id_kategori_utbk?>" <?=$data->row()->id_kategori_utbk == $row_utbk->id_kategori_utbk? 'selected' : ''?>><?=$row_utbk->nama_kategori_utbk?></option>
					        			<?php }?>
					        		</select>
					        	</div> -->
				      		</div>
				      		<div class="col-md-6">
				      			<div class="form-group">
					        		<label>No. HP</label>
					        		<input type="number" required class="form-control" name="no_hp" id="no_hp" value="<?=@$data->row()->no_hp?>">
					        	</div>
					        	<div class="form-group">
					        		<label>Jenis Kelamin</label>
					        		<select class="form-control" required name="id_jk" id="id_jk">
					        			<option value="">--pilih--</option>
					        			<?php foreach($data_jk->result() as $row_jk){?>
					        				<option value="<?=$row_jk->id_jk?>" <?=@$data->row()->id_jk == $row_jk->id_jk? 'selected' : ''?>><?=$row_jk->nama_jk?></option>
					        			<?php }?>
					        		</select>
					        	</div>
					        	<div class="form-group">
					        		<label>Agama</label>
					        		<select class="form-control" required name="id_agama" id="id_agama">
					        			<option value="">--pilih--</option>
					        			<?php foreach($data_agama->result() as $row_agama){?>
					        				<option value="<?=$row_agama->id_agama?>" <?=@$data->row()->id_agama == $row_agama->id_agama? 'selected' : ''?>><?=$row_agama->nama_agama?></option>
					        			<?php }?>
					        		</select>
					        	</div>
					        	<div class="form-group">
					        		<label>Asal Sekolah</label>
					        		<select class="form-control" required name="id_sekolah" id="id_sekolah">
					        			<option value="">--pilih--</option>
					        			<?php foreach($data_sekolah->result() as $row_sekolah){?>
					        				<option value="<?=$row_sekolah->id_sekolah?>" <?=@$data->row()->id_sekolah == $row_sekolah->id_sekolah? 'selected' : ''?>><?=$row_sekolah->nama_sekolah?></option>
					        			<?php }?>
					        		</select>
					        	</div>
					        	<div class="form-group">
					        		<label>Alamat</label>
					        		<textarea required class="form-control" style="min-height: 150px" name="alamat" id="alamat"><?=$data->row()->alamat?></textarea>
					        	</div>
					        	<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
				      		</div>

					    </div>
					</form>
					    <div class="row setup-content" id="step-2">
					        <!-- <div class="col-xs-12"> -->
					            <div class="col-md-12">
					                <form id="form-reset-password">
						            	<div class="form-group">
						            		<label>Username:</label>
						            		<input type="text" name="username" value="<?=$data->row()->username?>" readonly required class="form-control"/>
						            	</div>
						            	<div class="form-group">
						            		<label>Password:</label>
						            		<input type="password" name="password" required class="form-control"/>
						            	</div>
						            	<div class="form-group">
						            		<label>Konfirmasi Password:</label>
						            		<input type="password" name="confirm_password" required class="form-control"/>
						            	</div>
						            	<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
						            </form>
					            </div>
					        <!-- </div> -->
					    </div>
					    <div class="row setup-content" id="step-3">
					        <!-- <div class="col-xs-12"> -->
					            <div class="col-md-12">
					            	<br/><br/><br/>
					            	<center>
					            		<img src="<?=base_url()?>assets/done.svg" style="width: 150px;" >
						                <h3> Selesai</h3>
						                <?php if($status_update_rapor->num_rows()==0){?>
						                <a class="btn btn-warning " href="<?=base_url()?>profil_siswa/nilai_rapor" >Isi Nilai Rapor</a>
						            	<?php }?>
						            	<?php if($status_update_utbk->num_rows()==0){?>
						                <a class="btn btn-info" href="<?=base_url()?>profil_siswa/nilai_utbk" >Isi Nilai UTBK</a>
						                <?php }?>
						                <button type="button" class="btn btn-success btn-tes-mb" >Tes Minat Bakat</button>
					                </center>

					                <!-- <div class="alert alert-primary">untuk melakukan tes minat bakat silahkan klik <a class="btn btn-sm btn-info" href="<?=base_url()?>profil_siswa/nilai_rapor">disini</a></div> -->
					                <!-- <ol>
					                <?php if($status_update_rapor->num_rows()==0){?>
						            	<li>Silahkan isi nilai rapor <a class="btn btn-sm btn-primary" href="<?=base_url()?>profil_siswa/nilai_rapor">disini</a></li>
						            <?php }?>
						            <?php if($status_update_utbk->num_rows()==0){?>
						            	<li>Silahkan isi nilai utbk <a class="btn btn-sm btn-primary" href="<?=base_url()?>profil_siswa/nilai_utbk">disini</a></li>
						            <?php }?>
						            </ol> -->
					            </div>
					        <!-- </div> -->
					    </div>
				<!-- </center> -->
				<?php }?>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-update-siswa">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-tambah-kategori">
	      <div class="modal-body">
	        	<p>Apakah anda yakin akan mengupdate data ini?</p>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" class="btn btn-primary btn-ya-update">Ya</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-ganti-password-siswa">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-tambah-kategori">
	      <div class="modal-body">
	        	<p>Apakah anda yakin akan mengganti password?</p>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" class="btn btn-primary btn-ya-ganti-password">Ya</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-tes-mb">
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
	        	<p>Apakah anda yakin akan Melakukan Tes?</p>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" class="btn btn-primary btn-ya-tes-mb">Ya</button>
	      </div>
      </form>
    </div>
  </div>
</div>