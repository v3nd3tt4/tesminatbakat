<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
	    $('.dt').DataTable();

	    $(document).on('click', '.btn-tambah', function(e){
	    	e.preventDefault();
	    	$('#modal-tambah').modal();
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

	    $(document).on('submit', '#form_import_siswa', function(e){
	    	e.preventDefault();
	    	$('#modal-import').modal();
	    	var data = $('#form_import_siswa').serialize();
	    	$(document).on('click', '.btn-ya-import', function(e){
	    		e.preventDefault();
	    		$('.notif').html('Loading...');
	    		$.ajax({
		    		url: '<?=base_url()?>siswa_import/store_import',
		    		data: data,
		    		type: 'POST',
		    		dataType: 'JSON',
		    		success: function(msg){
		    			if(msg.status == 'success'){
		    				$('.notif').html(msg.text);
		    				// location.reload();
		    				window.location.href = "<?=base_url()?>siswa";
		    			}else{
		    				$('.notif').html(msg.text);
		    			}
		    		}
		    	});
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
	    			$('#id_sekolah').val(msg.id_sekolah);
	    		}
	    	});
	    });
	} );
</script>