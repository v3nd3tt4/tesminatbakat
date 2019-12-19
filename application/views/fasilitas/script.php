<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
	    $('.dt').DataTable();

	    $(document).on('click', '.btn-disable', function(e){
	    	e.preventDefault();
	    	var id = $(this).attr('id');
	    	$('#modal-pemberitahuan').modal();
	    	$('#id_setting_fasilitas').val(id);
	    });

	    $(document).on('submit', '#form-pengingat-fasilitas', function(e){
	    	e.preventDefault();
	    	var data = $('#form-pengingat-fasilitas').serialize();
	    	$('.notif').html('Loading...');
	    	$.ajax({
	    		url: '<?=base_url()?>setting_fasilitas/store',
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