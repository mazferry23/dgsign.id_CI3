<div class="row">
	<div class="col-md-12">
		<section class="card">
			<header class="card-header">
                Edit User
            </header>
            <div class="card-body">
            	<form role="form" action="<?=site_url('backend/user/save_edit')?>" id="form_create_topik" method="post" class="form-horizontal tasi-form">
            		<input type="hidden" name="admnId" value="<?=$dataAdmn->admnId?>"/>
            		<div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Username *</label>
	                    <div class="col-md-6">
	                     	<p> <?=$dataAdmn->admnUsername?> </p>
	                      </div>
	                  </div>
					  <div class="form-group row ">
					  <label for="cname" class="control-label col-lg-2">User ID </label>
	                    <div class="col-md-6">
	                     	<input value="<?=$dataAdmn->admnCliId?>" class=" form-control" id="admnCliId" name="admnCliId" type="text" />
	                      </div>
	                  </div>
	                  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">First Name *</label>
	                    <div class="col-md-6">
	                    	<input value="<?=$dataAdmn->admnFirstname?>" class=" form-control date-set" id="admnFirstname" name="admnFirstname" type="text"/>

	                  </div>
	              	</div>
	                  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Last Name</label>
	                    <div class="col-md-6">
	                    	<input value="<?=$dataAdmn->admnLastName?>" class=" form-control date-set" id="admnLastName" name="admnLastName" type="text"/>
	                    </div>
	                  </div>
					  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Email</label>
	                    <div class="col-md-6">
	                    	<input value="<?=$dataAdmn->admnEmail?>" class=" form-control date-set" id="admnEmail" name="admnEmail" type="text"/>
	                    </div>
	                  </div>
					  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Phone</label>
	                    <div class="col-md-6">
	                    	<input value="<?=$dataAdmn->admnPhone?>" class=" form-control date-set" id="admnPhone" name="admnPhone" type="text"/>
	                    </div>
	                  </div>
	                  <div class="form-group row">
                          <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-success" type="submit">Save</button>
                              <a href="<?=site_url('backend/user')?>" class="btn btn-default">Cancel</a>
                          </div>
                      </div>
            	</form>
            </div>
		</section>
	</div>
</div>
