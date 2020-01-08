<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
	    $('.dt').DataTable();

	    $(document).on('click', '.btn-tambah', function(e){
	    	e.preventDefault();
	    	$('#modal-tambah').modal();
	    });

		$(document).on('click', '.btn-hapus-semua-data', function(e){
			e.preventDefault();
			$('#modal-hapus-semua-data').modal();
			
	    	$(document).on('submit', '#form-hapus-semua-data', function(e){
	    		e.preventDefault();
	    		$('.notif').html('Loading...');
				var data = $('#form-hapus-semua-data').serialize();
		    	$.ajax({
		    		url: '<?=base_url()?>siswa/hapus_semua_data',
		    		data: data,
		    		type: 'POST',
		    		dataType: 'JSON',
		    		success: function(msg){
		    			if(msg.status == 'success'){
		    				$('.notif').html(msg.text);
		    				location.reload();
		    			}else{
		    				$('.notif').html(msg.text);
		    			}
		    		}
		    	});
	    	});
		});

	    var table;
		$(document).ready(function() {

		    //datatables
		    table = $('#tb_siswa').DataTable({ 

		        "processing": true, 
		        "serverSide": true, 
		        "order": [], 
		         
		        "ajax": {
		            "url": "<?php echo site_url('siswa/get_data_siswa')?>",
		            "type": "POST"
		        },

		         
		        "columnDefs": [
		        { 
		            "targets": [ 0 ], 
		            "orderable": false, 
		        },
		        ],

		    });

		});

	    $(document).on('submit', '#form-tambah-siswa', function(e){
	    	e.preventDefault();
	    	var data = $('#form-tambah-siswa').serialize();
	    	$('.notif').html('Loading...');
	    	$.ajax({
	    		url: '<?=base_url()?>siswa/store',
	    		data: data,
	    		type: 'POST',
	    		dataType: 'JSON',
	    		success: function(msg){
	    			if(msg.status == 'success'){
	    				$('.notif').html(msg.text);
	    				location.reload();
	    			}else{
	    				$('.notif').html(msg.text);
	    			}
	    		}
	    	});
	    });

	    $(document).on('submit', '#form-update-siswa', function(e){
	    	e.preventDefault();
	    	var data = $('#form-update-siswa').serialize();
	    	$('.notif').html('Loading...');
	    	$.ajax({
	    		url: '<?=base_url()?>siswa/update',
	    		data: data,
	    		type: 'POST',
	    		dataType: 'JSON',
	    		success: function(msg){
	    			if(msg.status == 'success'){
	    				$('.notif').html(msg.text);
	    				location.reload();
	    			}else{
	    				$('.notif').html(msg.text);
	    			}
	    		}
	    	});
	    });

	    $(document).on('click', '.btn-hapus', function(e){
	    	e.preventDefault();
	    	$('#modal-hapus').modal();
	    	var id = $(this).attr('id');
	    	$(document).on('click', '.btn-ya-hapus', function(e){
	    		e.preventDefault();
	    		$('.notif').html('Loading...');
	    		$.ajax({
		    		url: '<?=base_url()?>siswa/remove',
		    		data: 'id='+id,
		    		type: 'POST',
		    		dataType: 'JSON',
		    		success: function(msg){
		    			if(msg.status == 'success'){
		    				$('.notif').html(msg.text);
		    				location.reload();
		    			}else{
		    				$('.notif').html(msg.text);
		    			}
		    		}
		    	});
	    	});
	    });

	    $(document).on('click', '.btn-token', function(e){
	    	e.preventDefault();
	    	$('#modal-generate').modal();
	    	var id = $(this).attr('id');
	    	$(document).on('click', '.btn-ya-generate', function(e){
	    		e.preventDefault();
	    		$('.notif').html('Loading...');
	    		$.ajax({
		    		url: '<?=base_url()?>siswa/generate_token',
		    		data: 'id='+id,
		    		type: 'POST',
		    		dataType: 'JSON',
		    		success: function(msg){
		    			if(msg.status == 'success'){
		    				$('.notif').html(msg.text);
		    				location.reload();
		    			}else{
		    				$('.notif').html(msg.text);
		    			}
		    		}
		    	});
	    	});
	    });

	    $(document).on('click', '.btn-edit', function(e){
	    	e.preventDefault();
	    	var id = $(this).attr('id');
	    	$('#modal-edit').modal();
	    	$.ajax({
	    		url: '<?=base_url()?>siswa/get_data',
	    		data: 'id='+id,
	    		type: 'POST',
	    		dataType: 'JSON',
	    		success: function(msg){
	    			$('#id_siswa').val(msg.id_siswa);
	    			$('#nisn').val(msg.nisn);
	    			$('#tempat_lahir').val(msg.tempat_lahir);
	    			$('#tgl_lahir').val(msg.tgl_lahir);
	    			$('#no_hp').val(msg.no_hp);
	    			$('#email').val(msg.email);
	    			$('#alamat').val(msg.alamat);
	    			$('#nama_siswa').val(msg.nama_siswa);
	    			$('#alamat').val(msg.alamat);
	    			$('#id_kategori_sma').val(msg.id_kategori_sma);
	    			$('#id_kategori_utbk').val(msg.id_kategori_utbk);
	    			$('#id_jk').val(msg.id_jk);
	    			$('#id_agama').val(msg.id_agama);
	    			// $('#id_sekolah').val(msg.id_sekolah);
	    			$('#sekolahnya').val(msg.sekolah);
	    		}
	    	});
	    });
	} );
</script>

<script type="text/javascript">
	$(document).ready( function () {

	    $(document).on('submit', '#form-rasionalisasi-rapor', function(e){
	    	e.preventDefault();
	    	$('#modal-rasionalisasi-rapor').modal();
	    	var data = $('#form-rasionalisasi-rapor').serialize();
	    	$(document).on('click', '.btn-ya-simpan', function(e){
	    		e.preventDefault();
	    		$('.notif').html('Loading...');
		    	$.ajax({
		    		url: '<?=base_url()?>siswa/simpan_rasionalisasi_rapor',
		    		data: data,
		    		type: 'POST',
		    		dataType: 'JSON',
		    		success: function(msg){
		    			if(msg.status == 'success'){
		    				$('.notif').html(msg.text);
		    				location.reload();
		    			}else{
		    				$('.notif').html(msg.text);
		    			}
		    		}
		    	});
	    	});
	    	
	    });

	    $(document).on('submit', '#form-rasionalisasi-utbk', function(e){
	    	e.preventDefault();
	    	$('#modal-rasionalisasi-utbk').modal();
	    	var data = $('#form-rasionalisasi-utbk').serialize();
	    	$(document).on('click', '.btn-ya-simpan', function(e){
	    		e.preventDefault();
	    		$('.notif').html('Loading...');
		    	$.ajax({
		    		url: '<?=base_url()?>siswa/simpan_rasionalisasi_utbk',
		    		data: data,
		    		type: 'POST',
		    		dataType: 'JSON',
		    		success: function(msg){
		    			if(msg.status == 'success'){
		    				$('.notif').html(msg.text);
		    				location.reload();
		    			}else{
		    				$('.notif').html(msg.text);
		    			}
		    		}
		    	});
	    	});
	    	
	    });
	});
</script>