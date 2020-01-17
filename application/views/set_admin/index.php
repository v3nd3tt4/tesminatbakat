<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Setting Admin</h4>
	            <div class="card-header-action">
	            	<button class="btn btn-primary btn-tambah" ><i class="fas fa-plus"></i> Tambah Admin</button>
	            </div>
	          </div>
	          <div class="card-body">
	          	<table class="table table-striped dt">
	          		<thead>
	          			<tr>
		          			<th>No</th>
		          			<th>Email</th>
		          			<th>Level</th>
		          			<th>Aksi</th>
		          		</tr>
	          		</thead>
	          		<tbody>
	          			<?php
	          				$no=1; 
			            	foreach($data->result() as $row){
			           	?>
			           	<tr>
			           		<td><?=$no++?>.</td>
			           		<td><?=$row->username?></td>
			           		<td><?=$row->level?></td>
			           		<td>
			           			<button class="btn btn-danger btn-sm btn-hapus" id="<?=$row->id_user?>">Hapus</button>
			           			
			           			<button class="btn btn-success btn-sm btn-edit-password" id="<?=$row->id_user?>">Edit Password</button>
			           		</td>
			           	</tr>
			           	<?php
			            	}
			            ?>
	          		</tbody>
	          	</table>
	            
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
        <h5 class="modal-title">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="form_tambah_admin">
      		<div class="form-group">
      			<label>Email</label>
      			<input type="email" name="email" class="form-control" required/>
      		</div>
      		<div class="form-group">
      			<label>Password</label>
      			<input type="password" name="password" class="form-control" required/>
      		</div>
      		<button class="btn btn-success" type="submit">Simpan</button>
      	</form>
    	<div class="notif"></div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="form_edit_admin">
      		<div class="form-group">
      			<label>Email</label>
      			<input type="hidden" name="id_user" id="id_user">
      			<input type="email" id="email" name="email" class="form-control" readonly required/>
      		</div>
      		<div class="form-group">
      			<label>Password</label>
      			<input type="password" name="password" class="form-control" required/>
      		</div>
      		<div class="form-group">
      			<label>Confirm Password</label>
      			<input type="password" name="confirm_password" class="form-control" required/>
      		</div>
      		<button class="btn btn-success" type="submit">Simpan</button>
      	</form>
    	<div class="notif"></div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pengingat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<p>Apakah anda yakin akan menghapus data ini?</p>
        	<div class="notif"></div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="button" class="btn btn-primary btn-ya-hapus-admin"><i class="fas fa-save"></i> Ya</button>
      </div>
    </div>
  </div>
</div>