<div class="row">
	<div class="col-md-12">
		<section class="card">
			<header class="card-header">
				List Setting
			</header>
			<div class="card-body">
				<table class="table table-bordered table-striped">
          <?php
          foreach($setting_list as $row){
            ?>
            <tr>
              <td style="width:300px"><?=$row->stngHint?></td>
              <td style="width:20px">:</td>
              <td>
                <?php
                if($row->stngType=='file'){
                  ?>
                  <form style="display:none" id='form-upload-<?=$row->stngId?>' action="<?=site_url('setting/update_file')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="stngId" value="<?=$row->stngId?>"/>
                    <input type="file" name="stngValue"/>
                    <button type="submit">OK</button>
                    <a href="#" class="hide-form-" data-id="<?=$row->stngId?>">Cancel</a>
                  </form>
                  <a href="#" data-id='<?=$row->stngId?>' id="change-value-id-<?=$row->stngId?>" class="change-value-"><?=empty($row->stngValue) ? 'Empty' : '<a href="'.base_url('public/uploads/setting/'.$row->stngValue).'">'.$row->stngValue.'</a>'?></a>
                  <?php
                }else{
                ?>
                <a href="#" class='x-editable' data-type="<?=$row->stngType?>" data-pk="<?=$row->stngId?>" data-url="<?=site_url('backend/setting/update')?>" data-title="Enter <?=$row->stngHint?>"><?=empty($row->stngValue) ? 'Empty' : $row->stngValue?></a>
              <?php }?>
              </td>
            </tr>
            <?php
          }
          ?>
        </table>
			</div>
		</section>
	</div>
</div>
