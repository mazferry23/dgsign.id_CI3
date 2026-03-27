<script type="text/javascript">
	
	$(document).ready(function(){
		$('table').DataTable();
		$('#button-plus-ivt').click(function(){
			$('#form_add_invitation').slideDown();
		})
		$('#button-hide-form-ivt').click(function(){
			$('#form_add_invitation').slideUp();
		})
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
		$('#form_update_biodata').validate({
			submitHandler:function(form,e){
				e.preventDefault();
				$.ajax({
					url:$('#form_update_biodata').attr('action'),
					type:'POST',
					data: new FormData(form),
					processData: false,
    				contentType: false,
    				cache: false,
    				dataType: 'JSON',
					statusCode:{
						202:function(data){
							toastr.success(data.message,'Success')
							setTimeout(function(){
								//window.location.href='<?=base_url('backend/customer?reload='.time())?>';
								location.reload();
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
	})
</script>
