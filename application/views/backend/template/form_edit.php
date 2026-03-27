<div class="row">
	<div class="col-md-12">
		<section class="card">
			<header class="card-header">
                Edit Customer
            </header>
            <div class="card-body">
            	<form role="form" action="<?=site_url('backend/customer/save_edit')?>" id="form_edit_topik" method="post" class="form-horizontal tasi-form">
            		<input type="hidden" name="cstmId" value="<?=$dataCstm->cstmId?>" />
								<div class="form-group row ">
	                    <label for="cstmName" class="control-label col-lg-2">Name *</label>
	                    <div class="col-md-6">
	                     	<input class=" form-control" value="<?=$dataCstm->cstmName?>" id="cstmName" name="cstmName" type="text" required />
	                    </div>
	              </div>
								<div class="form-group row ">
	                    <label for="cstmPhone" class="control-label col-lg-2">Telepon *</label>
	                    <div class="col-md-6">
	                     	<input class=" form-control" value="<?=$dataCstm->cstmPhone?>" id="cstmPhone" name="cstmPhone" type="text" required />
	                    </div>
	              </div>
								<div class="form-group row ">
	                    <label for="cstmEmail" class="control-label col-lg-2">Email *</label>
	                    <div class="col-md-6">
	                     	<input class=" form-control" value="<?=$dataCstm->cstmEmail?>" id="cstmEmail" name="cstmEmail" type="text" required />
	                    </div>
	              </div>
								<div class="form-group row ">
	                    <label for="cstmAddress" class="control-label col-lg-2">Alamat *</label>
	                    <div class="col-md-6">
	                     	<textarea class=" form-control" id="cstmAddress" name="cstmAddress" type="text" required><?=$dataCstm->cstmAddress?></textarea>
	                    </div>
	              </div>
	              <div class="form-group row">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-success" type="submit">Save</button>
                        <a class="btn btn-default" href="<?=site_url('backend/customer')?>">Cancel</a>
                    </div>
                </div>
            	</form>
            </div>
		</section>
	</div>
</div>
