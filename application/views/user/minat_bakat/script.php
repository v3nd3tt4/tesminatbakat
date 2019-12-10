<script type="text/javascript">
	$(document).ready( function () {
		$(document).on('click', '.btn-tambah', function(e){
			e.preventDefault();
			$('#modal-tes-mb').modal();
		});

		$(document).on('click', '.btn-ya-tes-mb', function(e){
			e.preventDefault();
			location.href = "<?=base_url()?>minat_bakat/tes";
		});

		$(document).on('click', '.btn-selesai-tes', function(e){
			e.preventDefault();
			var data = $('#form-tes-minat-bakat').serialize();
			$('#modal-selesai-tes').modal();
			$(document).on('click', '.btn-ya-selesai-tes', function(e){
				e.preventDefault();
	    		$('.notif').html('Loading...');
	    		$.ajax({
		    		url: '<?=base_url()?>minat_bakat/selesai_tes',
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