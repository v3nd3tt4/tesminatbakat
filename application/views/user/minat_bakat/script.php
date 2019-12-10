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
	});
</script>