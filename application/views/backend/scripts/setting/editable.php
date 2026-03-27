<script type="text/javascript">
  $(document).ready(function(){
    $('.change-value-').click(function(){
      $(this).slideUp();
      var id = $(this).attr('data-id');
      $('#form-upload-'+id).slideDown();
    })
    $('.hide-form-').click(function(){
      var id = $(this).attr('data-id');
      $('#form-upload-'+id).slideUp();
      $('#change-value-id-'+id).slideDown();
    })
    $('.x-editable').editable({
      mode:'inline',
      success:function(data){
					$(this).parent().append(data);
			}
    });
  });
</script>
