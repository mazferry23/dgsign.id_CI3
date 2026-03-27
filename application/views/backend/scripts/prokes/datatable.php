<script type="text/javascript">
	//script topic datatable
	var datatableTopik = null;
	$(document).ready(function(){
		datatableTopik = $('#topic_table_list').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "ajax": {
                "url": '<?php echo site_url('backend/prokes/datatables'); ?>',
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
                {"data": "prokes_Title"},
								{"data": "prokes_Subtitle"},
                {"data": "prokes_Id"},
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
      $('#topic_table_list tbody').on('click','td .detail-button',function(){
        var tr = $(this).closest('tr');
		    var row = datatableTopik.row(tr);
            var tableId = 'detailData-' + row.data().prokes_Id;
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(formatDetail(row.data())).show();
                initTable(tableId, row.data());
            }
      });
      function formatDetail(row){
        return '<div class="row" id="area-detail-'+row.prokes_Id+'">'+
                      '<div class="col-md-12">'+
                          '<div style="margin-top:5px;margin-bottom: 5px;">'+
                              '<a data-label="'+row.prokes_Title+'" data-id="'+row.prokes_Id+'" href="<?=site_url('backend/prokes/add-detail/')?>'+row.prokes_Id+'" class="add-subunsur btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah </a>'+
                          '</div>'+
                      '</div>'+
                      '<div class="col-md-12">'+
                      '    <table class="table table-bordered table-striped details-table table-dark" id="detailData-'+row.prokes_Id+'">'+
        '<thead class="thead-dark">'+
                '<tr>'+
                    '<th>No</th>'+
                    '<th>Icon</th>'+
                    '<th>Deskripsi</th>'+
                    '<th>Action</th>'+
                  '</tr>'+
                '</thead>'+
            '</table></div></div>';
      }
      function initTable(tableId,row){
            $('#'+tableId).DataTable({
                "processing": true,
                "serverSide": true,
                "paging":true,
                "info":false,
                "ajax": {
                    "url": '<?=base_url('backend/prokes/datatables-detail/')?>/'+row.prokes_Id+'?time='+ new Date().getTime(),
                    "type": "POST",
                },
                "columns": [
                    {"data":'',"sortable":false,
                      render: function (data, type, row, meta) {
                          return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {"data": "prodet_Icon","searchable":false},
                    {"data": "prodet_Description"},
                    {"data": null,"sortable":false,"searchable":false,
                        render:function(data, type, row, meta){
                            var elements = "";
                            elements+="<a href='<?=site_url('backend/prokes/edit-detail/')?>"+data.prodet_Prokes_Id+'/'+data.prodet_Id+"' class='btn btn-info btn-sm' title='Edit sub unsur'> <i class='fa fa-pencil'></i> </a> ";
                            elements+="<a onClick='deleteDetail(this)' data-href='<?=site_url('backend/prokes/delete-detail/')?>"+data.prodet_Id+"' class='btn btn-danger btn-sm'  title='Hapus sub unsur dan komponen'> <i class='fa fa-times'></i> </a>";
                            return elements;
                        }
                    }
                ]
            })
        }
	})
  function deleteDetail(el){
    if(window.confirm("Are you sure to delete?")){
      location.href=$(el).attr('data-href');
    }
  }
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
                url:'<?=site_url('backend/prokes/delete/')?>'+id,
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
