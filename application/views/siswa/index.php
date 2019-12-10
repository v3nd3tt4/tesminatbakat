<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Siswa</h4>
	            <!-- <div class="card-header-action">
	            	<button class="btn btn-primary btn-tambah" ><i class="fas fa-plus"></i> Tambah</button>
	            </div> -->
	          </div>
	          <div class="card-body">
	            <table class="table table-striped dt">
	            	<thead>
	            		<tr>
	            			<th>No</th>
	            			<!-- <th>NISN</th> -->
	            			<th>Nama Siswa</th>
	            			<th>Asal Sekolah</th>
	            			<!-- <th>Email</th> -->
	            			<th>Password/Token</th>
	            			<th>Aksi</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php $no=1;foreach($data->result() as $row_data){?>
	            		<tr>
	            			<td><?=$no++?>.</td>
	            			<!-- <td><?=$row_data->nisn?></td> -->
	            			<td><?=$row_data->nama_siswa?></td>
	            			<!-- <td><?=$row_data->nama_sekolah?></td> -->
	            			<td><?=$row_data->email?></td>
	            			<td><?=empty($row_data->password)?'<button class="btn btn-sm btn-danger">belum diset</button>':$row_data->password?></td>
	            			<td>
	            				<button class="btn btn-danger btn-sm btn-hapus" id="<?=$row_data->id_siswa?>"><i class="fas fa-trash"></i> Hapus</button>
	            				<button class="btn btn-info btn-sm btn-edit" id="<?=$row_data->id_siswa?>"><i class="fas fa-eye"></i> Detail</button>
	            				<a href="<?=base_url()?>siswa/nilai_rapor_new/<?=$row_data->id_siswa?>" class="btn btn-warning btn-sm" id="<?=$row_data->id_siswa?>"><i class="fas fa-book"></i> Rapor</a>
	            				<a href="<?=base_url()?>siswa/nilai_utbk_new/<?=$row_data->id_siswa?>" class="btn btn-success btn-sm" id="<?=$row_data->id_siswa?>"><i class="fas fa-book-open"></i> UTBK</a>
	            				<a href="<?=base_url()?>siswa/riwayat_tes/<?=$row_data->id_siswa?>" class="btn btn-primary btn-sm" id="<?=$row_data->id_siswa?>"><i class="fas fa-pencil-alt"></i> Tes Minat Bakat</a>
	            				<button class="btn btn-light btn-sm btn-token" id="<?=$row_data->id_siswa?>"><i class="fas fa-key"></i> Generate Password/Token</button>
	            			</td>
	            		</tr>
	            		<?php }?>
	            	</tbody>
	            </table>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-tambah-siswa">
	      <div class="modal-body">
	      	<div class="row">
	      		<div class="col-md-6">
	      			<div class="form-group">
		        		<label>NISN</label>
		        		<input type="text" required class="form-control" name="nisn">
		        	</div>
		        	<div class="form-group">
		        		<label>Nama Siswa</label>
		        		<input type="text" required class="form-control" name="nama_siswa">
		        	</div>
		        	<div class="form-group">
		        		<label>Tempat Lahir</label>
		        		<input type="text" required class="form-control" name="tempat_lahir">
		        	</div>
		        	<div class="form-group">
		        		<label>Tanggal Lahir</label>
		        		<input type="date" required class="form-control" name="tgl_lahir">
		        	</div>
		        	<div class="form-group">
		        		<label>Email</label>
		        		<input type="email" required class="form-control" name="email">
		        	</div>
		        	<div class="form-group">
		        		<label>Jurusan Sekolah</label>
		        		<select class="form-control" required name="id_kategori_sma">
		        			<option value="">--pilih--</option>
		        			<?php foreach($data_sma->result() as $row_sma){?>
		        				<option value="<?=$row_sma->id_kategori_sma?>"><?=$row_sma->nama_kategori?></option>
		        			<?php }?>
		        		</select>
		        	</div>
		        	<div class="form-group">
		        		<label>UTBK</label>
		        		<select class="form-control" required name="id_kategori_utbk">
		        			<option value="">--pilih--</option>
		        			<?php foreach($data_utbk->result() as $row_utbk){?>
		        				<option value="<?=$row_utbk->id_kategori_utbk?>"><?=$row_utbk->nama_kategori_utbk?></option>
		        			<?php }?>
		        		</select>
		        	</div>
	      		</div>
	      		<div class="col-md-6">
	      			<div class="form-group">
		        		<label>No. HP</label>
		        		<input type="number" required class="form-control" name="no_hp">
		        	</div>
		        	<div class="form-group">
		        		<label>Jenis Kelamin</label>
		        		<select class="form-control" required name="id_jk">
		        			<option value="">--pilih--</option>
		        			<?php foreach($data_jk->result() as $row_jk){?>
		        				<option value="<?=$row_jk->id_jk?>"><?=$row_jk->nama_jk?></option>
		        			<?php }?>
		        		</select>
		        	</div>
		        	<div class="form-group">
		        		<label>Agama</label>
		        		<select class="form-control" required name="id_agama">
		        			<option value="">--pilih--</option>
		        			<?php foreach($data_agama->result() as $row_agama){?>
		        				<option value="<?=$row_agama->id_agama?>"><?=$row_agama->nama_agama?></option>
		        			<?php }?>
		        		</select>
		        	</div>
		        	<div class="form-group">
		        		<label>Asal Sekolah</label>
		        		<select class="form-control" required name="id_sekolah">
		        			<option value="">--pilih--</option>
		        			<?php foreach($data_sekolah->result() as $row_sekolah){?>
		        				<option value="<?=$row_sekolah->id_sekolah?>"><?=$row_sekolah->nama_sekolah?></option>
		        			<?php }?>
		        		</select>
		        	</div>
		        	<div class="form-group">
		        		<label>Alamat</label>
		        		<textarea required class="form-control" style="min-height: 150px" name="alamat"></textarea>
		        	</div>
	      		</div>
	      	</div>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
	        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-tambah-kategori">
	      <div class="modal-body">
	        	<p>Apakah anda yakin akan menghapus data ini?</p>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" class="btn btn-primary btn-ya-hapus"><i class="fas fa-trash"></i> Ya</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-generate">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Generate Password/Token</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-tambah-kategori">
	      <div class="modal-body">
	        	<p>Apakah anda yakin?</p>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" class="btn btn-primary btn-ya-generate"><!-- <i class="fas fa-trash"></i> --> Ya</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-update-siswa">
	      <div class="modal-body">
	        	<div class="row">
		      		<div class="col-md-6">
		      			<div class="form-group">
			        		<label>NISN</label>
			        		<input type="hidden" required class="form-control" name="id_siswa" id="id_siswa">
			        		<input type="text" required class="form-control" name="nisn" id="nisn">
			        	</div>
			        	<div class="form-group">
			        		<label>Nama Siswa</label>
			        		<input type="text" required class="form-control" name="nama_siswa" id="nama_siswa">
			        	</div>
			        	<div class="form-group">
			        		<label>Tempat Lahir</label>
			        		<input type="text" required class="form-control" name="tempat_lahir" id="tempat_lahir">
			        	</div>
			        	<div class="form-group">
			        		<label>Tanggal Lahir</label>
			        		<input type="date" required class="form-control" name="tgl_lahir" id="tgl_lahir">
			        	</div>
			        	<div class="form-group">
			        		<label>Email</label>
			        		<input type="email" required class="form-control" name="email" id="email">
			        	</div>
			        	<div class="form-group">
			        		<label>Jurusan Sekolah</label>
			        		<select class="form-control" required name="id_kategori_sma" id="id_kategori_sma">
			        			<option value="">--pilih--</option>
			        			<?php foreach($data_sma->result() as $row_sma){?>
			        				<option value="<?=$row_sma->id_kategori_sma?>"><?=$row_sma->nama_kategori?></option>
			        			<?php }?>
			        		</select>
			        	</div>
			        	<div class="form-group">
			        		<label>UTBK</label>
			        		<select class="form-control" required name="id_kategori_utbk" id="id_kategori_utbk">
			        			<option value="">--pilih--</option>
			        			<?php foreach($data_utbk->result() as $row_utbk){?>
			        				<option value="<?=$row_utbk->id_kategori_utbk?>"><?=$row_utbk->nama_kategori_utbk?></option>
			        			<?php }?>
			        		</select>
			        	</div>
		      		</div>
		      		<div class="col-md-6">
		      			<div class="form-group">
			        		<label>No. HP</label>
			        		<input type="number" required class="form-control" name="no_hp" id="no_hp">
			        	</div>
			        	<div class="form-group">
			        		<label>Jenis Kelamin</label>
			        		<select class="form-control" required name="id_jk" id="id_jk">
			        			<option value="">--pilih--</option>
			        			<?php foreach($data_jk->result() as $row_jk){?>
			        				<option value="<?=$row_jk->id_jk?>"><?=$row_jk->nama_jk?></option>
			        			<?php }?>
			        		</select>
			        	</div>
			        	<div class="form-group">
			        		<label>Agama</label>
			        		<select class="form-control" required name="id_agama" id="id_agama">
			        			<option value="">--pilih--</option>
			        			<?php foreach($data_agama->result() as $row_agama){?>
			        				<option value="<?=$row_agama->id_agama?>"><?=$row_agama->nama_agama?></option>
			        			<?php }?>
			        		</select>
			        	</div>
			        	<div class="form-group">
			        		<label>Asal Sekolah</label>
			        		<select class="form-control" required name="id_sekolah" id="id_sekolah">
			        			<option value="">--pilih--</option>
			        			<?php foreach($data_sekolah->result() as $row_sekolah){?>
			        				<option value="<?=$row_sekolah->id_sekolah?>"><?=$row_sekolah->nama_sekolah?></option>
			        			<?php }?>
			        		</select>
			        	</div>
			        	<div class="form-group">
			        		<label>Alamat</label>
			        		<textarea required class="form-control" style="min-height: 150px" name="alamat" id="alamat"></textarea>
			        	</div>
		      		</div>
		      	</div>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
	        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
	      </div>
      </form>
    </div>
  </div>
</div>