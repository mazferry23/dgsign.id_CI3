<script type="text/javascript">
	//script topic datatable
	var datatableTopik = null;
	$(document).ready(function(){
		datatableTopik = $('#topic_table_list').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "ajax": {
                "url": '<?php echo site_url('backend/customer/datatables'); ?>',
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
                {"data": "cstmName"},
								{"data": "cstmPhone"},
								{"data": "cstmEmail"},
								{"data": "cstmAddress"},
                {"data": "action","sortable":false}
            ],

          });
		/*
		datatableTopik.on( 'order.dt search.dt', function () {
        	datatableTopik.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            	cell.innerHTML = i+1;
        	} );
    	} ).draw();
    	*/
	})
	function deleteCustomer(id){
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Delete Customer',
          text: "Are you sure to delete data?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            jQuery.ajax({
                url:'<?=site_url('backend/customer/delete/')?>'+id,
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
