<div class="row">
	<div class="col-md-12">
		<section class="card">
			<header class="card-header">
                Edit Customer
            </header>
            <div class="card-body">
            	<form role="form" action="<?=site_url('backend/prokes/save_edit')?>" id="form_edit_topik" method="post" class="form-horizontal tasi-form">
            		<input type="hidden" name="prokes_Id" value="<?=$prokes->prokes_Id?>" />
					<div class="form-group row ">
	                    <label for="prokes_Title" class="control-label col-lg-2">Title *</label>
	                    <div class="col-md-6">
	                     	<input class=" form-control" value="<?=$prokes->prokes_Title?>" id="prokes_Title" name="prokes_Title" type="text" required />
	                    </div>
	              </div>
				  <div class="form-group row ">
	                    <label for="prokes_Subtitle" class="control-label col-lg-2">Sub Title *</label>
	                    <div class="col-md-6">
	                     	<input class=" form-control" value="<?=$prokes->prokes_Subtitle?>" id="prokes_Subtitle" name="prokes_Subtitle" type="text" required />
	                    </div>
	              </div>
	              <div class="form-group row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-success" type="submit">Save</button>
                        <a class="btn btn-default" href="<?=site_url('backend/prokes')?>">Cancel</a>
                    </div>
                </div>
            	</form>
            </div>
		</section>
	</div>
</div>
