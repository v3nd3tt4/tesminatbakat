<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Siswa</h4>
	            <div class="card-header-action">
	            	<button class="btn btn-primary" onclick="goBack()" ><i class="fas fa-chevron-left"></i> Kembali</button>
	            </div>
	          </div>
	          <div class="card-body">
	            <h3>Dalam Proses pengembangan</h3>
	            <div class="table-responsive">
		            <table class="table table-striped">
		            	<thead>
		            		<tr>
		            			<th>No</th>
		            			<th>NISN</th>
		            			<th>Nama</th>
		            			<th>Tempat Lahir</th>
		            			<th>Tanggal Lahir</th>
		            			<th>Email</th>
		            			<th>No HP</th>
		            			<th>Jenis Kelamin</th>
		            			<th>Agama</th>
		            			<th>Sekolah</th>
		            			<th>Jurusan SMA</th>
		            			<th>Jenis UTBK</th>
		            			<th>Alamat</th>
		            		</tr>
		            	</thead>
		            	<tbody>
		            		<?php 
		            			$no=1;
				            	for($i=0;$i<count($data);$i++){?>
				            <tr>
		            			<td><?=$no++?></td>	
		            			<td><?=$data[$i][0]?></td>
		            			<td><?=$data[$i][1]?></td>	
		            			<td><?=$data[$i][2]?></td>	
		            			<td><?=$data[$i][3]?></td>	
		            			<td><?=$data[$i][4]?></td>	
		            			<td><?=$data[$i][5]?></td>	
		            			<td></td>	
		            			<td></td>	
		            			<td></td>	
		            			<td></td>	
		            			<td></td>	
		            			<td><?=$data[$i][11]?></td>	
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
	  </div>
	</section>
</div>