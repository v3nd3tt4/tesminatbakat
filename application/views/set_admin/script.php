<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
	    $('.dt').DataTable();

	    $(document).on('click', '.btn-hapus', function(e){
	    	e.preventDefault();
	    	var id = $(this).attr('id');
	    	$('#modal-hapus').modal();
	    	$(document).on('click', '.btn-ya-hapus-admin', function(e){
		    	e.preventDefault();
		    	$('.notif').html('Loading...');
		    	$.ajax({
		    		url: '<?=base_url()?>setting_admin/hapus',
		    		data: 'id_user='+id,
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

	    $(document).on('click', '.btn-tambah', function(e){
	    	e.preventDefault();
	    	$('#modal-tambah').modal();
	    });

	    $(document).on('submit', '#form_tambah_admin', function(e){
	    	e.preventDefault();
	    	$('.notif').html('Loading...');
	    	var data = $('#form_tambah_admin').serialize();
	    	$.ajax({
	    		url: '<?=base_url()?>setting_admin/store',
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

	    $(document).on('click', '.btn-edit-password', function(e){
	    	e.preventDefault();
	    	var id = $(this).attr('id');
	    	$('#modal-edit').modal();
	    	$.ajax({
	    		url: '<?=base_url()?>setting_admin/get_data',
	    		data: 'id_user='+id,
	    		type: 'POST',
	    		dataType: 'JSON',
	    		success: function(msg){
	    			$('#id_user').val(msg.id_user);
	    			$('#email').val(msg.username);
	    		}
	    	});
	    });

	    $(document).on('submit', '#form_edit_admin', function(e){
	    	e.preventDefault();
	    	$('.notif').html('Loading...');
	    	var data = $('#form_edit_admin').serialize();
	    	$.ajax({
	    		url: '<?=base_url()?>setting_admin/edit_password',
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
</script>