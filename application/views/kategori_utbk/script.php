<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
	    $('.dt').DataTable();

	    $(document).on('click', '.btn-tambah', function(e){
	    	e.preventDefault();
	    	$('#modal-tambah').modal();
	    });

	    $(document).on('submit', '#form-tambah-kategori', function(e){
	    	e.preventDefault();
	    	var data = $('#form-tambah-kategori').serialize();
	    	$('.notif').html('Loading...');
	    	$.ajax({
	    		url: '<?=base_url()?>kategori_utbk/store',
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

	    $(document).on('submit', '#form-update-kategori', function(e){
	    	e.preventDefault();
	    	var data = $('#form-update-kategori').serialize();
	    	$('.notif').html('Loading...');
	    	$.ajax({
	    		url: '<?=base_url()?>kategori_utbk/update',
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
		    		url: '<?=base_url()?>kategori_utbk/remove',
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
	    		url: '<?=base_url()?>kategori_utbk/get_data',
	    		data: 'id='+id,
	    		type: 'POST',
	    		dataType: 'JSON',
	    		success: function(msg){
	    			$('#id_kategori_utbk_edit').val(msg.id_kategori_utbk);
	    			$('#nama_kategori_utbk_edit').val(msg.nama_kategori_utbk);
	    		}
	    	});
	    });
	} );
</script>