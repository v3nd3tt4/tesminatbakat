<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Pertanyaan</h4>
	            <div class="card-header-action">
	            	<button class="btn btn-primary btn-tambah" ><i class="fas fa-plus"></i> Tambah</button>
	            </div>
	          </div>
	          <div class="card-body">
	            <table class="table table-striped">
	            	<tr>
	            		<td>Kategori</td>
	            		<td>
	            			<?=$data_kategori->row()->nama_kategori?>
	            		</td>
	            	</tr>
	            	<tr>
	            		<td>Keterangan</td>
	            		<td>
	            			<?=$data_kategori->row()->keterangan?>
	            		</td>
	            	</tr>
	            </table>
	            <table class="table table-striped">
	            	<thead>
	            		<tr>
	            			<th>No</th>
	            			<th>Pertanyaan</th>
	            			<th>Aksi</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<?php $no=1;foreach($data_soal->result() as $row_soal){?>
	            		<tr>
	            			<td><?=$no++?>.</td>
	            			<td><?=nl2br($row_soal->pertanyaan)?></td>
	            			<td>
	            				<button class="btn btn-danger btn-hapus" id="<?=$row_soal->id_pertanyaan?>"><i class="fas fa-trash"></i> Hapus</button>
	            				<button class="btn btn-info btn-edit" id="<?=$row_soal->id_pertanyaan?>"><i class="fas fa-pencil-alt"></i> Edit</button>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pertanyaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-tambah-kategori">
	      <div class="modal-body">
	        	<div class="form-group">
	        		<label>Pertanyaan</label>
	        		<input type="hidden" name="id_kategori_soal" value="<?=$id_kategori_soal?>" />
	        		<textarea required class="form-control" name="pertanyaan" style="resize: none;min-height: 150px"></textarea>
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
        <h5 class="modal-title">Hapus Kategori</h5>
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
        <h5 class="modal-title">Update Pertanyaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-update-kategori">
	      <div class="modal-body">
	        	<div class="form-group">
	        		<label>Pertanyaan</label>
	        		<input type="hidden" name="id_pertanyaan" id="id_pertanyaan"/>
	        		<input type="hidden" name="id_kategori_soal" id="id_kategori_soal" value="<?=$id_kategori_soal?>" />
	        		<textarea required class="form-control" name="pertanyaan" id="pertanyaan" style="resize: none;min-height: 150px"></textarea>
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