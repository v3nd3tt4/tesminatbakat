<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Jenis Kelamin</h4>
	            <div class="card-header-action">
	            	<button class="btn btn-primary btn-tambah" ><i class="fas fa-plus"></i> Tambah</button>
	            </div>
	          </div>
	          <div class="card-body">
	          	<div class="table-responsive">
		            <table class="table table-striped dt">
		            	<thead>
		            		<tr>
		            			<th>No</th>
		            			<th>Nama Jenis Kelamin</th>
		            			<th>Aksi</th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		<?php $no=1;foreach($data->result() as $row_data){?>
		            		<tr>
		            			<td><?=$no++?>.</td>
		            			<td><?=$row_data->nama_jk?></td>
		            			<td>
		            				<button class="btn btn-danger btn-hapus" id="<?=$row_data->id_jk?>"><i class="fas fa-trash"></i> Hapus</button>
		            				<button class="btn btn-info btn-edit" id="<?=$row_data->id_jk?>"><i class="fas fa-pencil-alt"></i> Edit</button>
		            			</td>
		            		</tr>
		            		<?php }?>
		            	</tbody>
		            </table>
		        </div>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Jenis Kelamin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-tambah-jk">
	      <div class="modal-body">
	        	<div class="form-group">
	        		<label>Nama Jenis Kelamin</label>
	        		<input type="text" required class="form-control" name="nama_jk" placeholder="contoh: Laki-Laki">
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
        <h5 class="modal-title">Hapus Jenis Kelamin</h5>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Jenis Kelamin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-update-kategori">
	      <div class="modal-body">
	        	<div class="form-group">
	        		<label>Nama Jenis Kelamin</label>
	        		<input type="hidden" name="id_jk" id="id_jk_edit">
	        		<input type="text" required class="form-control" id="nama_jk_edit" name="nama_jk" placeholder="contoh: Laki-Laki">
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