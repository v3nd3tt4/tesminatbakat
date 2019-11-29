<script type="text/javascript">
	$(document).ready( function () {

	    $(document).on('submit', '#form-update-siswa', function(e){
	    	e.preventDefault();
	    	$('#modal-update-siswa').modal();
	    	var data = $('#form-update-siswa').serialize();
	    	$(document).on('click', '.btn-ya-update', function(e){
	    		e.preventDefault();
	    		$('.notif').html('Loading...');
		    	$.ajax({
		    		url: '<?=base_url()?>profil_siswa/update',
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