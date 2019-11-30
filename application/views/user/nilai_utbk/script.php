<script type="text/javascript">
	$(document).ready( function () {

	    $(document).on('submit', '#form-rapor', function(e){
	    	e.preventDefault();
	    	$('#modal-nilai-rapor-siswa').modal();
	    	var data = $('#form-rapor').serialize();
	    	$(document).on('click', '.btn-ya-simpan', function(e){
	    		e.preventDefault();
	    		$('.notif').html('Loading...');
		    	$.ajax({
		    		url: '<?=base_url()?>profil_siswa/simpan_nilai_utbk',
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