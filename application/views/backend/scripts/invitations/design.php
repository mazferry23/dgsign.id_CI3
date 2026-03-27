<script type="text/javascript">
	$(document).ready(function(){
		$.fn.editable.defaults.mode = 'inline';
		$('.editable').editable();
		$('.editable-combodate').editable({
			format: 'YYYY-MM-DD HH:mm:ss',    
			viewformat: 'YYYY-MM-DD HH:mm:ss',    
			template: 'D / MMMM / YYYY / HH / mm / ss',    
			combodate: {
					minYear: <?=date('Y')?>,
					maxYear: <?=date('Y') + 3?>,
					minuteStep: 1
			}
		});
		$('.datetime-input').datetimepicker({
			format:'yyyy-mm-dd hh:ii:ss'
		});
		toastr.options = {
			  "closeButton": true,
			  "debug": true,
			  "progressBar": true,
			  "positionClass": "toast-top-right",
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "1000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			}
		$('.modalers').click(function(){
			var url = $(this).attr('data-url');
			$.ajax({
				url:url,
				dataType:'html',
				type:'GET',
				success:function(resp){
					$('#modalFormDinamis .modal-body').html(resp);
				}
			});
			$('#modalFormDinamis').modal('show');
		});
		/*
		$('form').each(function(){
			//console.log($(this));
			$(this).validate({
				submitHandler:function(form,e){
					//console.log($('button[type="submit"]',form))
					//console.log(form)
					e.preventDefault();
					console.log(form)
					var button = $('button[type="submit"]',form);
					console.log(button)
					button.html('<i class="fa fa-spinner fa-spin"></i> Menyimpan');
					button.attr('disabled','disabled');
					$.ajax({
						url:$(form).attr('action'),
						type:'POST',
						data: new FormData(form),
						processData: false,
						dataType: 'json',
						statusCode:{
							200:function(data){
								toastr.success(data.message,'Success')
								setTimeout(function(){
									button.html('<i class="fa fa-save"></i> Simpan');
									button.removeAttr('disabled');
									location.reload();
									
								},5000);
								
							},
							401:function(data){
								console.log(data)
								toastr.error(data.responseJSON.message,data.error)
								button.html('<i class="fa fa-save"></i> Simpan');
								button.removeAttr('disabled');
							},
							403:function(data){
								console.log(data)
								toastr.error(data.responseJSON.message,data.error)
								button.html('<i class="fa fa-save"></i> Simpan');
								button.removeAttr('disabled');
							}
						}
					});
				}
						
			})
		})
		*/
		
		/*
		$('#form_create_topik').validate({
			submitHandler:function(form,e){
				e.preventDefault();
				$.ajax({
					url:$('#form_create_topik').attr('action'),
					type:'POST',
					data: new FormData(form),
					processData: false,
    				contentType: false,
    				cache: false,
    				dataType: 'JSON',
					statusCode:{
						201:function(data){
							toastr.success(data.message,'Success')
							setTimeout(function(){
								window.location.href='<?=base_url('backend/client/edit/')?>'+data.ID
							},500)
						},
						401:function(data){
							console.log(data)
							toastr.error(data.responseJSON.message,data.error)
						},
						403:function(data){
							console.log(data)
							toastr.error(data.responseJSON.message,data.error)
						}
					}
				})
			}
		});
		*/
		$('.hiders').click(function(){
			var target = $(this).attr('data-show');
			$('#'+target).toggle();
		})
	})
</script>
