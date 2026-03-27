<script type="text/javascript">
	//script topic datatable
	var datatableTopik = null;
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
    	$('#button-plus-tpl').click(function(){
			$('#modalAddCaption').modal('show');
			$('#capt_Id').val('');
			$('#capt_Code').val('');
			$('#capt_Caption').val('');
			$('#capt_type').val('');
			$('#capt_type').trigger('change');
			$('#asset').val('');
		})
		$('#button-hide-form-tpl').click(function(){
			$('#form_add_invitation').slideUp();
			$('#capt_Code').val('');
			$('#capt_Caption').val('');
			$('#capt_type').val('');
			$('#capt_type').trigger('change');
			$('#asset').val('');
		})
		datatableTopik = $('#table-list-invitation').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "ajax": {
                "url": '<?php echo site_url('backend/caption/datatables/'.$id); ?>',
                "type": "POST"
            },
            "columnDefs": [ {
            	"searchable": false,
            	"orderable": false,
            	"targets": 0
        	} ],
        	"order": [[ 1, 'desc' ]],
            "columns": [
            	{"data":'',"sortable":false,
            		render: function (data, type, row, meta) {
                 		return meta.row + meta.settings._iDisplayStart + 1;
                	}
            	},
              
			  //{"data": "capt_Id"},
			  {"data": "capt_Code"},
              {"data": "capt_Caption"},
			  {"data": "captType_Name"},
			  {"data": "tpl","sortable":false},
			  {"data": "action","sortable":false},
            ],

          });
		/*
		datatableTopik.on( 'order.dt search.dt', function () {
        	datatableTopik.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            	cell.innerHTML = i+1;
        	} );
    	} ).draw();
    	*/
	  $('#capt_type').select2({
		placeholder:'Pilih Type',
		ajax : {
			method 	: 'post',
			url 	: '<?=base_url('backend/client/select2_caption_type')?>',
			data 	: function(params){
				params.q 			= params.term;
				params.clientId		= <?=$id?>;
				return params;
			}
		}
	});
      $('#form_add_caption').validate({
			submitHandler:function(form,e){
				e.preventDefault();
				var elSubmit = $('#form_add_caption button[type="submit"]');
				elSubmit.attr('disabled','disabled');
				$.ajax({
					url:$('#form_add_caption').attr('action'),
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
								
								datatableTopik.ajax.reload();
								$('#capt_Id').val('');
                				$('#capt_Code').val('');
                				$('#capt_Caption').val('');
								$('#modalAddCaption').modal('hide');
								elSubmit.removeAttr('disabled');
							},500)
						},
						401:function(data){
							elSubmit.removeAttr('disabled');
							console.log(data)
							toastr.error(data.responseJSON.message,data.error)
						},
						403:function(data){
							elSubmit.removeAttr('disabled');
							console.log(data)
							toastr.error(data.responseJSON.message,data.error)
						}
					}
				})
			}
		});
	})

	$('#table-list-invitation tbody').on('click','td .edit-data',function(){
			var tr = $(this).closest('tr');
		    var row_anu = $("#table-list-invitation").DataTable().row(tr);
            console.log(row_anu.data());
			row_anu = row_anu.data();
			//$('#form_add_invitation').slideDown();
			$('#modalAddCaption').modal('show');
			//$('#ivts_Capt_Id').val('');
			//$('#ivts_Capt_Id').trigger('change');
			//var newOption = new Option(row_anu.capt_Code, row_anu.capt_Id);
			//console.log(newOption);
			//$('#ivts_Capt_Id').append(newOption).trigger('change');
			var $capt = $("<option selected='selected'></option>").val(row_anu.capt_Id).text(row_anu.captType_Name);
			//$('#ivts_Capt_Id').select2('data',{id:row_anu.capt_Id,text:row_anu.capt_Code});
			$('#capt_type').append($capt).trigger('change');
			$('#capt_Id').val(row_anu.capt_Id);
			$('#capt_Code').val(row_anu.capt_Code);
			$('#capt_Caption').val(row_anu.capt_Caption);
			$('#capt_type').val(row_anu.captType_Name);

		})
	function deleteData(id){
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Delete',
          text: "Are you sure to delete data?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            jQuery.ajax({
                url:'<?=site_url('backend/client/delete-caption/')?>'+id,
                type:'DELETE',
                statusCode:{
                    202:function(){
                        datatableTopik.ajax.reload();
                        swalWithBootstrapButtons.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )

                    },
                    401:function(){
                        swalWithBootstrapButtons.fire(
                          'Delete',
                          'Unable to delete data',
                          'error'
                        )
                    }
                }
            })
          }

        })

	}
</script>
