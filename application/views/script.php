<style type="text/css">
	.stepwizard-step p {
	    margin-top: 10px;
	}
	.stepwizard-row {
	    display: table-row;
	}
	.stepwizard {
	    display: table;
	    width: 50%;
	    position: relative;
	}
	.stepwizard-step button[disabled] {
	    opacity: 1 !important;
	    filter: alpha(opacity=100) !important;
	}
	.stepwizard-row:before {
	    top: 14px;
	    bottom: 0;
	    position: absolute;
	    content: " ";
	    width: 100%;
	    height: 1px;
	    background-color: #ccc;
	    z-order: 0;
	}
	.stepwizard-step {
	    display: table-cell;
	    text-align: center;
	    position: relative;
	}
	.btn-circle {
	    width: 30px;
	    height: 30px;
	    text-align: center;
	    padding: 6px 0;
	    font-size: 12px;
	    line-height: 1.428571429;
	    border-radius: 15px;
	}

	a.disabled {
	  pointer-events: none;
	  cursor: default;
	}
</style>
<script type="text/javascript">
	$(document).ready(function () {
	  var navListItems = $('div.setup-panel div a'),
	          allWells = $('.setup-content'),
	          allNextBtn = $('.nextBtn');

	  allWells.hide();

	  navListItems.click(function (e) {
	      e.preventDefault();
	      var $target = $($(this).attr('href')),
	              $item = $(this);

	      if (!$item.hasClass('disabled')) {
	          navListItems.removeClass('btn-primary').addClass('btn-default');
	          $item.addClass('btn-primary');
	          allWells.hide();
	          $target.show();
	          $target.find('input:eq(0)').focus();
	      }
	  });

	  allNextBtn.click(function(){
	      var curStep = $(this).closest(".setup-content"),
	          curStepBtn = curStep.attr("id"),
	          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
	          curInputs = curStep.find("input[type='text'],input[type='url']"),
	          isValid = true;

	      $(".form-group").removeClass("has-error");
	      for(var i=0; i<curInputs.length; i++){
	          if (!curInputs[i].validity.valid){
	              isValid = false;
	              $(curInputs[i]).closest(".form-group").addClass("has-error");
	          }
	      }

	      if (isValid)
	          nextStepWizard.removeAttr('disabled').trigger('click');
	  });

	  $('div.setup-panel div a.btn-primary').trigger('click');

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
	  $(document).on('submit', '#form-reset-password', function(e){
	    	e.preventDefault();
	    	$('#modal-ganti-password-siswa').modal();
	    	var data = $('#form-reset-password').serialize();
	    	$(document).on('click', '.btn-ya-ganti-password', function(e){
	    		e.preventDefault();
	    		$('.notif').html('Loading...');
		    	$.ajax({
		    		url: '<?=base_url()?>profil_siswa/update_password',
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

	  	$(document).on('click', '.btn-tes-mb', function(e){
			e.preventDefault();
			$('#modal-tes-mb').modal();
		});

		$(document).on('click', '.btn-ya-tes-mb', function(e){
			e.preventDefault();
			location.href = "<?=base_url()?>minat_bakat/tes";
		});
		
	});
</script>