<script type="text/javascript">
	//script topic datatable
	var datatableTopik = null;
	function sendWa(elem){
		console.log($(elem));
		$('#ivts_Id').val($(elem).attr('data-guest-id'));
		$('#myModal .modal-title').html('Send Invitation to '+$(elem).attr('data-guest-name'));
		$('#ivts_NoHp').val($(elem).attr('data-guest-phone'));
		//$('#message').html($(elem).attr('data-message'));
		$('#myModal').modal('show');
	}

	// function ModalSetTpl(elem){
	// 	console.log($(elem));
	// 	 //$('#ivts_tplqr_Id').val('');
	// 	// $('#myModal .modal-title').html('Send Invitation to '+$(elem).attr('data-guest-name'));
	// 	// $('#ivts_NoHp').val($(elem).attr('data-guest-phone'));
	// 		$('#set_ivts_tplqr_Id').val('');
	// 		$('#set_ivts_tplqr_Id').trigger('change');
	// 		$('#set_ivts_tplivts_Id').val('');
	// 		$('#set_ivts_tplivts_Id').trigger('change');
	// 		// $('#ivts_tplivts_Id').val('');
	// 		// $('#ivts_tplivts_Id').trigger('change');
	// 	$('#ModalSetTpl').modal('show');
	// }

	function ModalEdtSel(elem){
		console.log($(elem));
		$('#set_ivts_tplqr_Id').val('');
		$('#set_ivts_tplqr_Id').trigger('change');
		$('#set_ivts_tplivts_Id').val('');
		$('#set_ivts_tplivts_Id').trigger('change');
		$('#ModalEdtSel').modal('show');
	}

	function ModalBlastWA(elem){
		console.log($(elem));
		$('#ivts_Id').val($(elem).attr('data-guest-id'));
		$('#myModal .modal-title').html('Send Invitation to '+$(elem).attr('data-guest-name'));
		$('#ivts_NoHp').val($(elem).attr('data-guest-phone'));
		$('#message').html($(elem).attr('data-message'));
		$('#myModalwaBlast').modal('show');
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

	$('#ivts_tplqr_Id').select2({
		placeholder:'Pilih Template QR',
		ajax : {
			method 	: 'post',
			url 	: '<?=base_url('backend/client/select2_template')?>',
			data 	: function(params){
				params.q 			= params.term;
				params.clientId		= <?=$id?>;
				return params;
			}
		}
	});

	$('#ivts_tplivts_Id').select2({
		placeholder:'Pilih Template Invitation',
		ajax : {
			method 	: 'post',
			url 	: '<?=base_url('backend/client/select2_template_ivt')?>',
			data 	: function(params){
				params.q 			= params.term;
				params.clientId		= <?=$id?>;
				return params;
			}
		}
	});

	$('#set_ivts_tplivts_Id').select2({

		placeholder:'Pilih Template Invitation',

		ajax : {

			method 	: 'post',

			url 	: '<?=base_url('backend/client/select2_template_ivt')?>',

			data 	: function(params){

				params.q 			= params.term;

				params.clientId		= <?=$id?>;

				return params;

			}

		},

		templateResult: formatRepo,
		templateSelection: formatRepoSelection

	});

	$('#set_ivts_tplqr_Id').select2({

		placeholder:'Pilih Template',

		ajax : {

			method 	: 'post',

			url 	: '<?=base_url('backend/client/select2_template')?>',

			data 	: function(params){

				params.q 			= params.term;

				params.clientId		= <?=$id?>;

				return params;

			}

		},

		templateResult: formatRepo,
		templateSelection: formatRepoSelection

	});

	function formatRepo (repo) {
		return repo.id + ' - ' + repo.text;
	}

	function formatRepoSelection (repo) {
	  	return repo.id + ' - ' + repo.text;
	}

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

	$('#select-caption-blast').select2({

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



	$('#select-caption-blast').on('change',function(){

		var id = $(this).val();

		$.ajax({

			url:'<?=base_url('backend/client/preview_caption/')?>'+id+"/"+$('#ivts_Id').val(),

			type:'get',

			dataType:'html',

			success:function(data){

				console.log(data)

				$('#preview-message-blast').html(data);

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

			$('#ivts_tplqr_Id').val('');

			$('#ivts_tplqr_Id').trigger('change');

			$('#ivts_tplivts_Id').val('');

			$('#ivts_tplivts_Id').trigger('change');

			$('#ivts_NoHp').val('');

			$('#ivts_Address').val('');

			$('#ivts_Guest').val('');

			$('#ivts_Souvenir').val('');

			$('#ivts_Category').val('');

			$('#ivts_Group').val('');

			$('#ivts_Seat').val('');

			$('#ivts_GroupFam').val('');

			$('#ivts_GroupSub').val('');

			$('#ivts_LinkExternal').val('');

		})

		$('#button-hide-form-ivt').click(function(){

			$('#form_add_invitation').slideUp();

			$('#ivts_Name').val('');

			$('#ivts_tplqr_Id').val('');

			$('#ivts_tplqr_Id').trigger('change');

			$('#ivts_tplivts_Id').val('');

			$('#ivts_tplivts_Id').trigger('change');

			$('#ivts_NoHp').val('');

			$('#ivts_Address').val('');

			$('#ivts_Guest').val('');

			$('#ivts_Souvenir').val('');

			$('#ivts_Category').val('');

			$('#ivts_Group').val('');

			$('#ivts_Seat').val('');

			$('#ivts_GroupFam').val('');

			$('#ivts_GroupSub').val('');

			$('#ivts_LinkExternal').val('');

		})



		$('#button-import-tamu').click(function(){

			//$('#form_add_invitation').slideDown();

			$('#modalImportTamu').modal('show');

			// $('#ivts_Id').val('');

			// $('#ivts_Name').val('');

			// //$('#ivts_tplqr_Id').val('');

			// //$('#ivts_tplqr_Id').trigger('change');

			// $('#ivts_NoHp').val('');

			// $('#ivts_Address').val('');

			// $('#ivts_Guest').val('');

			// $('#ivts_Souvenir').val('');

			// $('#ivts_Category').val('');

			// $('#ivts_Group').val('');

			// $('#ivts_Seat').val('');

		})



		$(".selectAll").on( "click", function(e) {

			if ($(this).is( ":checked" )) {

				datatableTopik.rows({page: 'current'}).select();        

			} else {

				datatableTopik.rows({page: 'current'}).deselect(); 

			}

		});

		var datatableTopik = $('#table-list-invitation').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "ajax": {
                "url": '<?php echo site_url('backend/client/invitation/'.$id); ?>',
                "type": "POST"
            },
            "columnDefs": [ 
				{
            		"searchable": false,
            		"orderable": false,
            		"targets": 0,
        		} ,

				{
            		"searchable": false,
            		"orderable": false,
            		"targets": 1
        		}, 

			],
			select: {
				style:    'multi',
            	selector: 'td:first-child'
        	},
        	"order": [[ 15, 'desc' ]],
            "columns": [
				{
					'data':'',
					//'orderable':false,
					'defaultContent': "",
					'className':'select-checkbox',
					// render:function(){
					// 	return ""
					// }
				},

            	{"data":'',"sortable":false,
            		render: function (data, type, row, meta) {
                 		return meta.row + meta.settings._iDisplayStart + 1;
                	}
            	},

				{"data": "qr","sortable":false},
				// {"data": "ivts","sortable":false},
				{"data": "ivts_Name"},
				{"data": "ivts_Address"},
				{"data": "ivts_NoHp"},
				{"data": "ivts_Category"},
				{"data": "ivts_Seat"},
				{"data": "ivts_Group"},
				{"data": "ivts_Souvenir"},
				//{"data": "status"},
				{"data": "ivts_Guest"},
				{"data": "ivts_GroupFam"},
				{"data": "ivts_GroupSub"},
				{"data": "ivts_RsvpRespond"},
				{"data": "ivts_SentStatus"},
				{"data": "ivts_tplqr_Id"},
				{"data": "ivts_tplivts_Id"},
				// {"data": "ivts_RsvpMessage"},
				{"data": "ivts_LinkExternal"},
				{"data": "ivts_Created"},
				{"data": "ivts_Updated"},
				{"data": "action","searchable": false,"sortable":false }
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
				if(ids.length == 0){
					alert('no data selected');
					return false;
				}
				window.location.reload(); 
				$.ajax({

					url:'<?php echo site_url('backend/client/multiple-delete-invitations'); ?>',

					type:'POST',

					dataType:'json',

					data:{ids:ids},

					success:function(){
						
						// datatableTopik.ajax.reload();

						// location.reload();

					}

				})

			}

		  });

		  $(document).ready(function(){	
				$("#contactForm").submit(function(event){
					submitForm();
					return false;
				});
			});

			function submitForm(){
				var selected_data = datatableTopik.rows( { selected: true } ).data().pluck('ivts_Id');

					//console.log(selected_data.length);

					var ids=[];

					for(var i=0;i<selected_data.length;i++){

						ids.push(selected_data[i]);

					}

					if(ids.length == 0){
						alert('no data selected');
						return false;
					}
					var res = $('form#contactForm').serialize();
					var idsjoin = ids.join();
				 $.ajax({
					type: "GET",
					url: "<?php echo site_url('backend/client/edit_selected?'); ?>"+res+"&array="+idsjoin,
					cache: false,
					success: function(response){
						$("#contact").html(response);
						$("#contact-modal").modal('hide');
						alert(response);
						window.location.reload();
					},
					error: function(){
						alert("Error");
					}
				});
			}

		  $('.button-download_qr').click(function(){

			//var count = datatableTopik.rows( { selected: true } ).count();

			var selected_data = datatableTopik.rows( { selected: true } ).data().pluck('ivts_Id');
			var check = document.getElementById("button-download_qr");
			//console.log(selected_data.length);

			var ids=[];

			for(var i=0;i<selected_data.length;i++){

				ids.push(selected_data[i]);

			}

			if(confirm("Are you sure you want to download?")){
				if(ids.length == 0){
					alert('no data selected');
					return false;
				}
				if(check.href != '<?php echo site_url('backend/client/createzip_qrcode/'.$id.'/all'); ?>'){
					var idsjoin = ids.join();
			      	var link = '<?php echo site_url('backend/client/createzip_qrcode/'.$id); ?>'+'?array='+idsjoin;
				  	var check = document.getElementById("button-download_qr");
			      	if (check.href != link) {
			        	check.href = link;
			      	}
			      	check.target = "_blank";	     
				} 
			}

		  });

		  $('.button-convert_qr').click(function(){

			//var count = datatableTopik.rows( { selected: true } ).count();

			var selected_data = datatableTopik.rows( { selected: true } ).data().pluck('ivts_Id');
			var check = document.getElementById("button-download_qr");
			//console.log(selected_data.length);

			var ids=[];

			for(var i=0;i<selected_data.length;i++){

				ids.push(selected_data[i]);

			}

			if(confirm("Are you sure you want to convert?")){
				if(ids.length == 0){
					alert('no data selected');
					return false;
				}
				var idsjoin = ids.join();
		      	var link = '<?php echo site_url('backend/client/createpdf_qrcode/'.$id); ?>'+'?array='+idsjoin;
			  	var check = document.getElementById("button-convert_qr");
		      	if (check.href != link) {
		        	check.href = link;
		      	}
		      	check.target = "_blank";
			}

		  });

		  $('.button-export_data').click(function(){

			//var count = datatableTopik.rows( { selected: true } ).count();

			var selected_data = datatableTopik.rows( { selected: true } ).data().pluck('ivts_Id');
			var check = document.getElementById("button-export_data");
			//console.log(selected_data.length);

			var ids=[];

			for(var i=0;i<selected_data.length;i++){

				ids.push(selected_data[i]);

			}

			if(confirm("Are you sure you want to export?")){
				if(ids.length == 0){
					alert('no data selected');
					return false;
				}
				var idsjoin = ids.join();
				var link = '<?php echo site_url('backend/client/export_data/'.$id); ?>'+'?array='+idsjoin;
				var check = document.getElementById("button-export_data");
				if (check.href != link) {
					check.href = link;
				}
				check.target = "_blank";
			}

			});



		  $('.button-setTpl-ivt').click(function(){

			//var count = datatableTopik.rows( { selected: true } ).count();

			var selected_data = datatableTopik.rows( { selected: true } ).data().pluck('ivts_Id');

			var tpl = $("#set_ivts_tplqr_Id").val();

			var tplivts = $("#set_ivts_tplivts_Id").val();

			//console.log(selected_data.length);

			var ids=[];

			for(var i=0;i<selected_data.length;i++){

				ids.push(selected_data[i]);

			}

		//	if(confirm("Are you sure to wa?")){

				$.ajax({

					url:'<?=site_url('backend/client/set_template_invitations')?>',

					type:'POST',

					dataType:'json',

					data:{'tpl':tpl,'tplivts':tplivts,ids:ids},

					//data:{'tplivts':tplivts,ids:ids},

					statusCode:{

						200:function(data){

							datatableTopik.ajax.reload();

							$('#ModalSetTpl').modal('hide');

						}

					},

					successs:function(){

						datatableTopik.ajax.reload();

						location.reload();

						

						$('#ModalSetTpl').modal('hide');

					}

				})

		//	}

		  });

		  

		  $('.button-kirim-wa-blast').click(function(){

			//var count = datatableTopik.rows( { selected: true } ).count();

			var selected_data = datatableTopik.rows( { selected: true } ).data().pluck('ivts_Id');

			var capt = $("#select-caption-blast").val();

			//console.log(selected_data.length);

			var ids=[];

			for(var i=0;i<selected_data.length;i++){

				ids.push(selected_data[i]);

			}

		//	if(confirm("Are you sure to wa?")){

				$.ajax({

					url:'<?=site_url('backend/client/blast/'.$id)?>',

					type:'POST',

					dataType:'json',

					data:{'capt':capt,ids:ids},

					statusCode:{

						200:function(data){

							datatableTopik.ajax.reload();

							$('#myModalwaBlast').modal('hide');

						}

					},

					successs:function(){

						datatableTopik.ajax.reload();

						location.reload();

						$('#myModalwaBlast').modal('hide');

					}

				})

		//	}

		  });
		  
		  
		  $('.button-kirim-wa-blast-official').click(function(){

			//var count = datatableTopik.rows( { selected: true } ).count();

			var selected_data = datatableTopik.rows( { selected: true } ).data().pluck('ivts_Id');

			var capt = $("#select-caption-blast").val();

			//console.log(selected_data.length);

			var ids=[];

			for(var i=0;i<selected_data.length;i++){

				ids.push(selected_data[i]);

			}

		//	if(confirm("Are you sure to wa?")){

				$.ajax({

					url:'<?=site_url('backend/client/blast-wa-official/'.$id)?>',

					type:'POST',

					dataType:'json',

					data:{'capt':capt,ids:ids},

					statusCode:{

						200:function(data){

							datatableTopik.ajax.reload();

							$('#myModalwaBlast').modal('hide');

						}

					},

					successs:function(){

						datatableTopik.ajax.reload();

						location.reload();

						$('#myModalwaBlast').modal('hide');

					}

				})

		//	}

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

			var $tplqr = $("<option selected='selected'></option>").val(row_anu.ivts_tplqr_Id).text(row_anu.ivts_tplqr_Id);

			var $tplivts = $("<option selected='selected'></option>").val(row_anu.ivts_tplivts_Id).text(row_anu.ivts_tplivts_Id);

			//$('#ivts_Capt_Id').select2('data',{id:row_anu.capt_Id,text:row_anu.capt_Code});

			$('#ivts_tplqr_Id').append($tplqr).trigger('change');

			$('#ivts_tplivts_Id').append($tplivts).trigger('change');

			$('#ivts_Id').val(row_anu.ivts_Id);

			$('#ivts_Name').val(row_anu.ivts_Name);

			$('#ivts_NoHp').val(row_anu.ivts_NoHp);

			$('#ivts_Address').val(row_anu.ivts_Address);

			$('#ivts_Guest').val(row_anu.ivts_Guest);

			$('#ivts_Souvenir').val(row_anu.ivts_Souvenir);

			$('#ivts_Category').val(row_anu.ivts_Category);

			$('#ivts_Group').val(row_anu.ivts_Group);

			$('#ivts_Seat').val(row_anu.ivts_Seat);

			$('#ivts_GroupFam').val(row_anu.ivts_GroupFam);

			$('#ivts_GroupSub').val(row_anu.ivts_GroupSub);

			$('#ivts_LinkExternal').val(row_anu.ivts_LinkExternal);

			//$('#ivts_tplqr_Id').val(row_anu.ivts_tplqr_Id);

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



		$('#form_modal_import').validate({

			submitHandler:function(form,e){

				e.preventDefault();

				var elSubmit = $('#form_modal_import button[type="submit"]');

				elSubmit.attr('disabled','disabled');

				$.ajax({

					url:$('#form_modal_import').attr('action'),

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



								 $('#file_name').val('');

								 $('#modalImportTamu').modal('hide');



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

