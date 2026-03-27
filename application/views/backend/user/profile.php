<div class="row">
	<div class="col-md-12">
		<section class="card">
			<header class="card-header">
                User Profile
            </header>
            <div class="card-body">
            	<form role="form" action="#" id="form_create_topik" class="form-horizontal tasi-form">
            		<div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">User ID</label>
	                    <div class="col-md-6">
	                     	<input class=" form-control" id="admnUsername" minlength="5" type="text" readonly value="<?=$_SESSION['auth_login']['backend']->admnUsername?>"/>
	                      </div>
	                  </div>
	                  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">First Name</label>
	                    <div class="col-md-6">
	                    	<input value="<?=$dataAdmn->admnFirstname?>" class=" form-control date-set" id="admnFirstname" readonly type="text"/>
                          
	                  </div>
	              	</div>
	                  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Last Name</label>
	                    <div class="col-md-6">
	                    	<input value="<?=$dataAdmn->admnLastName?>" class=" form-control date-set" id="admnLastName" readonly type="text"/>
	                    </div>
	                  </div>
	                  <div class="form-group row ">
	                    <label for="cname" class="control-label col-lg-2">Level</label>
	                    <div class="col-md-6">
	                    	<input value="<?=$dataAdmn->admnLevel?>" class=" form-control date-set" id="admnLastName" readonly type="text"/>
	                    </div>
	                  </div>
            	</form>
            </div>
		</section>
	</div>
</div>