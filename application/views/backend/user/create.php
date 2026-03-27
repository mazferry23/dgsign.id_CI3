<div class="row">
	<div class="col-md-12">
		<section class="card">
			<header class="card-header">
                Create User
            </header>
            <div class="card-body">
            	<form role="form" action="<?=site_url('backend/user/save_new')?>" id="form_create_topik" method="post" class="form-horizontal tasi-form">
            		<div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Username *</label>
	                    <div class="col-md-6">
	                     	<input class=" form-control" id="admnUsername" name="admnUsername" minlength="5" type="text" required />
	                      </div>
	                  </div>
					  
	                  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">First Name *</label>
	                    <div class="col-md-6">
	                    	<input class=" form-control date-set" id="admnFirstname" name="admnFirstname" type="text"/>

	                  </div>
	              	</div>
	                  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Last Name</label>
	                    <div class="col-md-6">
	                    	<input class=" form-control date-set" id="admnLastName" name="admnLastName" type="text"/>
	                    </div>
	                  </div>
					  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Email</label>
	                    <div class="col-md-6">
	                    	<input class=" form-control date-set" id="admnEmail" name="admnEmail" type="text"/>
	                    </div>
	                  </div>
					  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Phone</label>
	                    <div class="col-md-6">
	                    	<input class=" form-control date-set" id="admnPhone" name="admnPhone" type="text"/>
	                    </div>
	                  </div>
	                  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Password *</label>
	                    <div class="col-md-6">
	                    	<input class=" form-control date-set" id="admnPassword" name="admnPassword" minlength="6" type="password" required/>
	                    </div>
	                  </div>
	                  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Confirm Password *</label>
	                    <div class="col-md-6">
	                    	<input class=" form-control date-set" id="admnConfirmPassword" name="admnConfirmPassword" minlength="6" type="password" required/>
	                    </div>
	                  </div>
					  <div class="form-group row ">
						<label for="cname" class="control-label col-lg-2">Parent ID</label>
						<div class="col-md-6">
							<select class=" form-control" id="admnUsrId" name="admnUsrId" type="text" required></select>
						</div>
					  </div>
					  <div class="form-group row ">
					  <label for="cname" class="control-label col-lg-2">User ID </label>
	                    <div class="col-md-6">
							<select class=" form-control" id="admnCliId" name="admnCliId" type="text" ></select>
	                      </div>
	                  </div>
					  <div class="form-group row ">
						<label for="cname" class="control-label col-lg-2">Level</label>
						<div class="col-md-6">
							<select class=" form-control" id="admnLevel" name="admnLevel" type="text" required></select>
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
