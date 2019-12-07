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
	            <h3>Selamat datang, dalam aplikasi tes minat bakat</h3>
	            <hr/>
	            <?php if($this->session->userdata('levek') == 'siswa'){?>
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
	        	<?php }?>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>