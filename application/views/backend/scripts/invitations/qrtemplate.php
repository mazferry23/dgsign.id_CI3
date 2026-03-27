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
			$('#modalAddQRtemplate').modal('show');
			$('#tplqr_Id').val('');
			$('#tplqr_Label').val('');
			$('#tplqr_Judul').val('');
			$('#tplqr_Cpp').val('');
			// $('#tplqr_CppOrtu').val('');
			// $('#tplqr_Cpw').val('');
			// $('#tplqr_CpwOrtu').val('');
			$('#tplqr_FieldSatu').val('');
			$('#tplqr_FieldDua').val('');
			$('#tplqr_FieldTiga').val('');
			$('#tplqr_FieldEmpat').val('');
			$('#tplqr_FieldLima').val('');
			$('#tplqr_FieldEnam').val('');
			$('#tplqr_FieldTujuh').val('');
			$('#tplqr_FieldDelapan').val('');
			//$('#tplqr_VIP').val('');
			//$('#tplqr_Link').val('');
			//$('#tplqr_GuestSet').val('');
			$('#tplqr_Mode').val('');
			$('#tplqr_Mode').trigger('change');
			$('#asset').val('');
			//$('#tplqr_TamuSize').val('');
			//$('#tplqr_AlamatSize').val('');
			//$('#tplqr_MejaSize').val('');
			//$('#tplqr_TamuColor').val('');
		})
		$('#button-hide-form-tpl').click(function(){
			$('#form_add_invitation').slideUp();
			$('#tplqr_Id').val('');
			$('#tplqr_Label').val('');
			$('#tplqr_Judul').val('');
			$('#tplqr_Cpp').val('');
			// $('#tplqr_CppOrtu').val('');
			// $('#tplqr_Cpw').val('');
			// $('#tplqr_CpwOrtu').val('');
			$('#tplqr_FieldSatu').val('');
			$('#tplqr_FieldDua').val('');
			$('#tplqr_FieldTiga').val('');
			$('#tplqr_FieldEmpat').val('');
			$('#tplqr_FieldLima').val('');
			$('#tplqr_FieldEnam').val('');
			$('#tplqr_FieldTujuh').val('');
			$('#tplqr_FieldDelapan').val('');
			// $('#tplqr_VIP').val('');
			// $('#tplqr_Link').val('');
			// $('#tplqr_GuestSet').val('');
			$('#tplqr_Mode').val('');
			$('#tplqr_Mode').trigger('change');
			$('#asset').val('');
			// $('#tplqr_TamuSize').val('');
			// $('#tplqr_AlamatSize').val('');
			// $('#tplqr_MejaSize').val('');
			// $('#tplqr_TamuColor').val('');
		})
		datatableTopik = $('#table-list-invitation').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "ajax": {
                "url": '<?php echo site_url('backend/qrtemplate/datatables/'.$id); ?>',
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
              
			//   {"data": "capt_Id"},
			  {"data": "tplqr_Id"},
              {"data": "tplqr_Label"},
			  {"data": "tplqrType_Name"},
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
	  $('#tplqr_Mode').select2({
		placeholder:'Pilih Type',
		ajax : {
			method 	: 'post',
			url 	: '<?=base_url('backend/qrtemplate/select2_qrtemplate_type')?>',
			data 	: function(params){
				params.q 			= params.term;
				params.clientId		= <?=$id?>;
				return params;
			}
		}
	});
      $('#form_add_QRtemplate').validate({
			submitHandler:function(form,e){
				e.preventDefault();
				var elSubmit = $('#form_add_QRtemplate button[type="submit"]');
				elSubmit.attr('disabled','disabled');
				$.ajax({
					url:$('#form_add_QRtemplate').attr('action'),
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
                				// $('#tplqr_Label').val('');
								// $('#tplqr_Judul').val('');
								// $('#tplqr_Cpp').val('');
								// $('#tplqr_CppOrtu').val('');
								// $('#tplqr_Cpw').val('');
								// $('#tplqr_CpwOrtu').val('');
								// $('#tplqr_FieldSatu').val('');
								// $('#tplqr_FieldDua').val('');
								// $('#tplqr_FieldTiga').val('');
								// $('#tplqr_FieldEmpat').val('');
								// $('#tplqr_FieldLima').val('');
								// $('#tplqr_TamuSize').val('');
								// $('#tplqr_AlamatSize').val('');
								// $('#tplqr_MejaSize').val('');
								// $('#tplqr_TamuColor').val('');
								$('#modalAddQRtemplate').modal('hide');
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
			$('#modalAddQRtemplate').modal('show');
			//$('#ivts_Capt_Id').val('');
			//$('#ivts_Capt_Id').trigger('change');
			//var newOption = new Option(row_anu.capt_Code, row_anu.capt_Id);
			//console.log(newOption);
			//$('#ivts_Capt_Id').append(newOption).trigger('change');
			var $tplqr = $("<option selected='selected'></option>").val(row_anu.tplqr_Mode).text(row_anu.tplqrType_Name);
			//$('#ivts_Capt_Id').select2('data',{id:row_anu.capt_Id,text:row_anu.capt_Code});
			$('#tplqr_Mode').append($tplqr).trigger('change');
			//$('#tplqr_Id').val(row_anu.tplqr_Id);
			$('#capt_Code').val(row_anu.capt_Code);
			$('#capt_Caption').val(row_anu.capt_Caption);
			$('#capt_type').val(row_anu.captType_Name);

			$('#tplqr_Id').val(row_anu.tplqr_Id);
			$('#tplqr_Label').val(row_anu.tplqr_Label);
			$('#tplqr_Judul').val(row_anu.tplqr_Judul);
			$('#tplqr_Cpp').val(row_anu.tplqr_Cpp);
			// $('#tplqr_CppOrtu').val('');
			// $('#tplqr_Cpw').val('');
			// $('#tplqr_CpwOrtu').val('');
			$('#tplqr_FieldSatu').val(row_anu.tplqr_FieldSatu);
			$('#tplqr_FieldDua').val(row_anu.tplqr_FieldDua);
			$('#tplqr_FieldTiga').val(row_anu.tplqr_FieldTiga);
			$('#tplqr_FieldEmpat').val(row_anu.tplqr_FieldEmpat);
			$('#tplqr_FieldLima').val(row_anu.tplqr_FieldLima);
			$('#tplqr_FieldEnam').val(row_anu.tplqr_FieldEnam);
			$('#tplqr_FieldTujuh').val(row_anu.tplqr_FieldTujuh);
			$('#tplqr_FieldDelapan').val(row_anu.tplqr_FieldDelapan);
			$('#tplqr_VIP').val(row_anu.tplqr_VIP);
			$('#tplqr_Link').val(row_anu.tplqr_Link);
			$('#tplqr_GuestSet').val(row_anu.tplqr_GuestSet);
			$('#tplqr_TamuSize').val(row_anu.tplqr_TamuSize);
			$('#tplqr_AlamatSize').val(row_anu.tplqr_AlamatSize);
			$('#tplqr_MejaSize').val(row_anu.tplqr_MejaSize);
			$('#tplqr_GuestSize').val(row_anu.tplqr_GuestSize);
			$('#tplqr_GuestPosX').val(row_anu.tplqr_GuestPosX);
			$('#tplqr_TamuColor').val(row_anu.tplqr_TamuColor);
			$('#tplqr_AlamatColor').val(row_anu.tplqr_AlamatColor);
			$('#tplqr_MejaColor').val(row_anu.tplqr_MejaColor);
			$('#tplqr_GuestColor').val(row_anu.tplqr_GuestColor);
			//$('#tplqr_Mode').val(row_anu.tplqr_Id);
			//$('#tplqr_Mode').trigger('change');
			$('#asset').val(row_anu.tplqr_File);

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
                url:'<?=site_url('backend/qrtemplate/delete-qrtemplate/')?>'+id,
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
