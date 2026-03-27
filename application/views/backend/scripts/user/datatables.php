<script type="text/javascript">
	var datatableTopik = null;
	$(document).ready(function(){
		$('#button-filter').click(function(){
			var filterElem = $('#filterUser');
			if(filterElem.css('display')=='none'){
				filterElem.slideDown();
			}else{
				filterElem.slideUp();
			}
		})
		$('#siteId').select2({
			placeholder: ' Select Site ',
			allowClear:true,
			ajax: {
							url: '<?=site_url('backend/site/select2_sites')?>',
							dataType: 'json',
							type:'POST',
							delay: 250,
							processResults: function (data) {
								return {
										results: data
								};
							},
							cache: true
					}
		})
		datatableTopik = $('#user_table_list').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "ajax": {
                "url": '<?php echo site_url('backend/user/datatables'); ?>',
                "type": "POST"
            },
            "columnDefs": [ {
            	"searchable": false,
            	"orderable": false,
            	"targets": 0
        	} ],
        	"order": [[ 1, 'asc' ]],
            "columns": [
            	{"data":'',"sortable":false,
            		render: function (data, type, row, meta) {
                 		return meta.row + meta.settings._iDisplayStart + 1;
                	}
            	},
                {"data": "admnUsername"},
				{"data": "admnCliId"},
                {"data": "admnFirstname"},
                {"data": "admnLastName"},
				{"data": "admnEmail"},
				{"data": "admnPhone"},
                {"data": "admnLevel"},
                {"data": "action","sortable":false}
            ],

          });
		$('#button-apply').click(function(){
			var id = $('#siteId').val();
			datatableTopik.ajax.url('<?php echo site_url('backend/user/datatables'); ?>?siteId'+id).load();
		});
		$('#button-refresh').click(function(){
			datatableTopik.ajax.reload();
		})
	});
	function deleteAdmin(idAdmin){
		console.log(idAdmin);
		jQuery.ajax({
			url:'<?=site_url('backend/user/delete/')?>'+idAdmin,
			type:'DELETE',
			statusCode:{
				202:function(){
					datatableTopik.ajax.reload();
				},
				401:function(){
					alert('Unable to delete topic.')
				}
			}
		})
	}
	function resetPassword(idAdmin){
		var randomPassword = Math.random().toString(36).slice(-6);

	}
	function doReset(idAdmin,password){

	}
</script>
