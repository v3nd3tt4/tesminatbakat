<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Siswa</h4>
	            <!-- <div class="card-header-action">
	            	<button class="btn btn-primary btn-tambah" ><i class="fas fa-plus"></i> Template</button>
	            </div> -->
	          </div>
	          <div class="card-body">
	            <p>silahkan download template <a href="<?=base_url()?>assets/template_siswa_new.csv" class="btn btn-primary btn-sm"><i class="fas fa-download"></i> di sini</a>, untuk mengimport siswa</p>
	            <form method="POST" action="<?=base_url()?>siswa_import/preview" enctype="multipart/form-data">
	            	<div class="form-group">
	            		<label>File</label>
	            		<input type="file" name="filenya" required class="form-control">
	            	</div>
	            	<button type="submit" class="btn btn-info"><i class="fas fa-sync"></i> Proses</button>
	            </form>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>