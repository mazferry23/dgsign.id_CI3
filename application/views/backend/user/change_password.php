<div class="row">
	<div class="col-md-12">
		<section class="card">
			<header class="card-header">
                Edit User
            </header>
            <div class="card-body">
            	<form role="form" action="<?=site_url('backend/user/save_change_password')?>" id="form_create_topik" method="post" class="form-horizontal tasi-form">
            		<div class="form-group row ">
	                    <label for="admnPassword" class="control-label col-lg-2">Old Password *</label>
	                    <div class="col-md-6">
	                     	<input class=" form-control" id="admnOldPassword" name="admnOldPassword"  type="password" required/>
	                      </div>
	                  </div>
	                  <div class="form-group row ">
	                    <label for="admnNewPassword" class="control-label col-lg-2">New Password *</label>
	                    <div class="col-md-6">
	                    	<input class=" form-control date-set" id="admnNewPassword" name="admnNewPassword" minlength="5" type="password" required />
                          
	                  </div>
	              	</div>
	                  <div class="form-group row ">
	                    <label for="admnConfirmPassword" class="control-label col-lg-2">Confirm Password *</label>
	                    <div class="col-md-6">
	                    	<input class=" form-control date-set" id="admnConfirmPassword" name="admnConfirmPassword" minlength="5" type="password" required />
	                    </div>
	                  </div>
	                  <div class="form-group row">
                          <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-success" type="submit">Save</button>
                              <button class="btn btn-default" type="button">Cancel</button>
                          </div>
                      </div>
            	</form>
            </div>
		</section>
	</div>
</div>