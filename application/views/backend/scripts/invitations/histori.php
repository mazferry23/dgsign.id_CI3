<script type="text/javascript">
	//script topic datatable
	var datatableTopik = null;
	function sendWa(elem){
		console.log($(elem));
		$('#ivts_Id').val($(elem).attr('data-guest-id'));
		$('#myModal .modal-title').html('Send Invitation to '+$(elem).attr('data-guest-name'));
		$('#ivts_NoHp').val($(elem).attr('data-guest-phone'));
		$('#myModal').modal('show');
	}
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
	$('#ivts_Capt_Id').select2({
		placeholder:'Pilih Caption',
		ajax : {
			method 	: 'post',
			url 	: '<?=base_url('backend/client/select2_caption')?>',
			data 	: function(params){
				params.q 			= params.term;
				params.clientId		= <?=$id?>;
				return params;
			}
		}
	});
	$('#select-caption').select2({
		placeholder:'Pilih Caption',
		ajax : {
			method 	: 'post',
			url 	: '<?=base_url('backend/client/select2_caption')?>',
			data 	: function(params){
				params.q 			= params.term;
				params.clientId		= <?=$id?>;
				return params;
			}
		}
	});
	$('#select-caption').on('change',function(){
		var id = $(this).val();
		$.ajax({
			url:'<?=base_url('backend/client/preview_caption/')?>'+id+"/"+$('#ivts_Id').val(),
			type:'get',
			dataType:'html',
			success:function(data){
				console.log(data)
				$('#preview-message').html(data);
			}
		})
	})
	$('#button-kirim-wa').click(function(){
		var nomor = $('#ivts_NoHp').val();
		console.log(nomor.substring(0,2));
		if(nomor.substring(0,2) == "62" || nomor.substring(0,2) == "+62"){
            nomor = nomor.replace("+", "");
        }else
        if(nomor.substring(0,1) == "0"){
			//console.log('depannua 0')
            //nomor[0] = "X";
			nomor = 'X'+nomor.substring(1,nomor.length);
			console.log(nomor);
            nomor = nomor.replace("X", "62");
        }
		//console.log(nomor);
		var message = $('#preview-message').html();
		//console.log(message);
		/*message = message.replace("<br>",'\n');
		message = message.replace("<br />",'\n');
		message = message.replace("<br/>",'\n');
		message = message.replace("<br />",'\n')
		message = message.replace(/\s/, '').replace(/<br>/, '\n');
		*/

		//message = message.replace(/\s/, '').replace(/<br>/, '\n');
		//console.log(message.replace('<br>',''));
		message = encodeURI(message.replace(/<br>/g,'\n'));
		console.log(message);
		window.open('https://wa.me/'+nomor+"?text="+message,'_blank');
	})


    	$('#button-plus-ivt').click(function(){
			//$('#form_add_invitation').slideDown();
			$('#modalAddInvitation').modal('show');
			$('#ivts_Id').val('');
			$('#ivts_Name').val('');
			$('#ivts_Capt_Id').val('');
			$('#ivts_Capt_Id').trigger('change');
			$('#ivts_NoHp').val('');
			$('#ivts_Address').val('');
			$('#ivts_Guest').val('');
			$('#ivts_Souvenir').val('');
			$('#ivts_Category').val('');
			$('#ivts_Group').val('');
			$('#ivts_Seat').val('');
		})
		$('#button-hide-form-ivt').click(function(){
			$('#form_add_invitation').slideUp();
			$('#ivts_Name').val('');
			$('#ivts_Capt_Id').val('');
			$('#select-caption').trigger('change');
			$('#ivts_NoHp').val('');
			$('#ivts_Address').val('');
			$('#ivts_Guest').val('');
			$('#ivts_Souvenir').val('');
			$('#ivts_Category').val('');
			$('#ivts_Group').val('');
			$('#ivts_Seat').val('');
		})
		$(".selectAll").on( "click", function(e) {
			if ($(this).is( ":checked" )) {
				datatableTopik.rows(  ).select();        
			} else {
				datatableTopik.rows(  ).deselect(); 
			}
		});
		datatableTopik = $('#table-list-invitation').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "ajax": {
                "url": '<?php echo site_url('backend/client/histori/'.$id); ?>',
                "type": "POST"
            },
            "columnDefs": [ 
				{
            		"searchable": false,
            		"orderable": false,
            		"targets": 0
        		} ,
				{
            		"searchable": false,
            		"orderable": false,
            		"targets": 1
        		} 
			],
			select: {
				style:    'multi',
            	selector: 'td:first-child'
        	},
        	"order": [[ 3, 'desc' ]],
            "columns": [
				{
					'data':'',
					'orderable':false,
					className:'select-checkbox',
					render:function(){
						return ""
					}
					
				},
            	{"data":'',"sortable":false,
            		render: function (data, type, row, meta) {
                 		return meta.row + meta.settings._iDisplayStart + 1;
                	}
            	},
				
				{"data": "ivts_RsvpStatus"},
				{"data": "ivts_GroupFam"},
				{"data": "ivts_GroupSub"},
				{"data": "ivts_Group"},
				{"data": "ivts_Category"},
				{"data": "ivts_Seat"},
				{"data": "ivts_Name"},
				{"data": "ivts_Address"},
				
				{"data": "ivts_NoHp"},
				{"data": "ivts_RsvpGuest"},
				{"data": "ivts_GuestAtt"},
				{"data": "ivts_GuestAttTime"},
				{"data": "ivts_GuestAttCounter"},
				{"data": "ivts_Souvenir"},
				{"data": "ivts_SouvenirAtt"},
				{"data": "ivts_SouvenirAttTime"},
				{"data": "ivts_SouvenirAttCounter"},
				{"data": "qr"}
            ],

          });
		  datatableTopik.on('selectItems',function(e,dt,items){
			  console.log(items);
			  console.log('selected')
		  })  
		  datatableTopik.on('select',function(e,dt,type,indexes){
			if ( type === 'row' ) {
				var data = datatableTopik.rows( indexes ).data().pluck('ivts_Id');
				//console.log(data)
				// do something with the ID of the selected items
				var count = datatableTopik.rows( { selected: true } ).count();
				console.log(count);
				if(count>0){
					$('.button-deletes-ivt').show();
				}else{
					$('.button-deletes-ivt').hide();
				}
			}
		  })
		  datatableTopik.on('deselect',function(e,dt,type,indexes){
			var count = datatableTopik.rows( { selected: true } ).count();
			console.log(count);
			if(count>0){
				$('.button-deletes-ivt').show();
			}else{
				$('.button-deletes-ivt').hide();
			}
		  });
		  $('.button-deletes-ivt').click(function(){
			//var count = datatableTopik.rows( { selected: true } ).count();
			var selected_data = datatableTopik.rows( { selected: true } ).data().pluck('ivts_Id');
			//console.log(selected_data.length);
			var ids=[];
			for(var i=0;i<selected_data.length;i++){
				ids.push(selected_data[i]);
			}
			if(confirm("Are you sure to delete?")){
				$.ajax({
					url:'<?=site_url('backend/client/multiple-delete-invitations')?>',
					type:'POST',
					dataType:'json',
					data:{ids:ids},
					statusCode:{
						200:function(data){
							datatableTopik.ajax.reload();
						}
					},
					successs:function(){
						datatableTopik.ajax.reload();
						location.reload();
					}
				})
			}
		  });
		/*
		datatableTopik.on( 'order.dt search.dt', function () {
        	datatableTopik.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            	cell.innerHTML = i+1;
        	} );
    	} ).draw();
    	*/
		$('#button-blast-ivt').click(function(){
			
		})
		$('#table-list-invitation tbody').on('click','td .edit-data',function(){
			var tr = $(this).closest('tr');
		    var row_anu = $("#table-list-invitation").DataTable().row(tr);
            console.log(row_anu.data());
			row_anu = row_anu.data();
			//$('#form_add_invitation').slideDown();
			$('#modalAddInvitation').modal('show');
			//$('#ivts_Capt_Id').val('');
			//$('#ivts_Capt_Id').trigger('change');
			//var newOption = new Option(row_anu.capt_Code, row_anu.capt_Id);
			//console.log(newOption);
			//$('#ivts_Capt_Id').append(newOption).trigger('change');
			var $newOption = $("<option selected='selected'></option>").val(row_anu.capt_Id).text(row_anu.capt_Code);
			//$('#ivts_Capt_Id').select2('data',{id:row_anu.capt_Id,text:row_anu.capt_Code});
			$('#ivts_Capt_Id').append($newOption).trigger('change');
			$('#ivts_Id').val(row_anu.ivts_Id);
			$('#ivts_Name').val(row_anu.ivts_Name);
			$('#ivts_NoHp').val(row_anu.ivts_NoHp);
			$('#ivts_Address').val(row_anu.ivts_Address);
			$('#ivts_Guest').val(row_anu.ivts_Guest);
			$('#ivts_Souvenir').val(row_anu.ivts_Souvenir);
			$('#ivts_Category').val(row_anu.ivts_Category);
			$('#ivts_Group').val(row_anu.ivts_Group);
			$('#ivts_Seat').val(row_anu.ivts_Seat);
		})
      $('#form_modal_add_invitation').validate({
			submitHandler:function(form,e){
				e.preventDefault();
				var elSubmit = $('#form_modal_add_invitation button[type="submit"]');
				elSubmit.attr('disabled','disabled');
				$.ajax({
					url:$('#form_modal_add_invitation').attr('action'),
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

								$('#ivts_Id').val('');
								$('#ivts_Name').val('');
								$('#ivts_Capt_Id').val('');
								$('#ivts_Capt_Id').trigger('change');
								$('#ivts_NoHp').val('');
								$('#ivts_Address').val('');
								$('#ivts_Guest').val('');
								$('#ivts_Souvenir').val('');
								$('#ivts_Category').val('');
								$('#ivts_Group').val('');
								$('#ivts_Seat').val('');
								$('#modalAddInvitation').modal('hide');
								elSubmit.removeAttr('disabled');
								//location.reload();
								//$('#form_add_invitation').slideUp();
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
                url:'<?=site_url('backend/client/delete_invitation/')?>'+id,
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
