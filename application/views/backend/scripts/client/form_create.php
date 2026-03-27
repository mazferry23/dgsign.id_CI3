<script type="text/javascript">
	$(document).ready(function(){
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
		$('#client_admnUsrId').select2({
			ajax:{
				url:'<?=site_url('backend/client/select2_admnUsrId')?>',
				dataType:'json'
			}
		});
		$('#client_admnCliId').select2({
			ajax:{
				url:'<?=site_url('backend/client/select2_admnCliId')?>',
				dataType:'json'
			}
		});
		$('#client_Tpl_Id').select2({
			ajax:{
				url:'<?=site_url('backend/template/select2_template')?>',
				dataType:'json'
			}
		});
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
	})
</script>
