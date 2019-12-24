<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Riwayat Tes Minat Bakat</h4>
	            <div class="card-header-action">
	            	<!-- <a href="<?=base_url()?>minat_bakat/tes" class="btn btn-primary btn-tambah"><i class="fas fa-pencil-alt"></i> Lakukan Tes</a> 
	            	-->
	            	<?php if($status_fasilitas_mb->row()->status == 'enable'){?>
	            	<button class="btn btn-primary btn-tambah"><i class="fas fa-pencil-alt"></i> Lakukan Tes</button>
	            	<?php }?>
	            </div>
	          </div>
	          <div class="card-body">
	          	<?php if($status_fasilitas_mb->row()->status == 'disable'){?>
	          	<div class="alert alert-warning">Maaf, fasilitas tes minat bakat ditutup oleh admin</div>
	          	<?php }?>
	          	<!-- <div class="table-responsive"> -->
		            <table >
		            	<thead>
		            		<tr>
		            			<th>No</th>
		            			<th>Tanggal</th>
		            			<th>Skor</th>
		            			<th>Hasil </th>
		            			<!-- <th>Hasil 2</th> -->
		            		</tr>
		            	</thead>
		            	<tbody>
		            		<?php $no=1;foreach($data_riwayat->result() as $row_riwayat){?>
		            		<tr>
		            			<td><?=$no++?>.</td>
		            			<td><?=$row_riwayat->tgl_selesai?></td>
		            			<td><?=$row_riwayat->total_skor?></td>
		            			<td>
		            			<?php 
		            			echo $this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal' => $row_riwayat->hasil_1))->row()->keterangan;
		            			?></td>
		            			<!-- <td>
		            			<?php 
		            			echo $this->db->get_where('tb_kategori_pertanyaan', array('id_kategori_soal' => $row_riwayat->hasil_2))->row()->keterangan;
		            			?>
		            			</td> -->
		            		</tr>
		            		<?php }?>
		            	</tbody>
		            </table>
		        <!-- </div> -->
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
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
<style type="text/css">
	table { 
	  width: 100%; 
	  border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
	  background: #eee; 
	}
	th { 
	  background: #333; 
	  color: white; 
	  font-weight: bold; 
	}
	td, th { 
	  padding: 6px; 
	  border: 1px solid #ccc; 
	  text-align: left; 
	}

	@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "No"; }
	td:nth-of-type(2):before { content: "Tanggal"; }
	td:nth-of-type(3):before { content: "Skor"; }
	td:nth-of-type(4):before { content: "Hasil"; }
	td:nth-of-type(5):before { content: "Wars of Trek?"; }
	td:nth-of-type(6):before { content: "Secret Alias"; }
	td:nth-of-type(7):before { content: "Date of Birth"; }
	td:nth-of-type(8):before { content: "Dream Vacation City"; }
	td:nth-of-type(9):before { content: "GPA"; }
	td:nth-of-type(10):before { content: "Arbitrary Data"; }
}
</style>
