<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Setting Fasilitas</h4>
	            <!-- <div class="card-header-action">
	            	<button class="btn btn-primary btn-tambah" ><i class="fas fa-plus"></i> Template</button>
	            </div> -->
	          </div>
	          <div class="card-body">
	          	<table class="table table-striped dt">
	          		<thead>
	          			<tr>
		          			<th>No</th>
		          			<th>Jenis</th>
		          			<th>Status</th>
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
			           		<td><?=$row->nama_fasilitas?></td>
			           		<td><?=$row->status?></td>
			           		<td>
			           			<?php if($row->status == 'enable'){?>
			           			<button class="btn btn-danger btn-sm btn-disable" id="<?=$row->id_setting_fasilitas?>|<?=$row->status?>">Disable</button>
			           			<?php }else if($row->status == 'disable'){ ?>
			           			<button class="btn btn-success btn-sm btn-disable" id="<?=$row->id_setting_fasilitas?>|<?=$row->status?>">Enable</button>
			           			<?php }?>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-pemberitahuan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pengingat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-pengingat-fasilitas">
	      <div class="modal-body">
	        	<input type="hidden" name="id_setting_fasilitas" id="id_setting_fasilitas" >
	        	<!-- <input type="text" name="status" id="status"> -->
	        	<p>Apakah anda yakin?</p>
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