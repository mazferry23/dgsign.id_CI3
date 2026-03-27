<div class="row">
	<div class="col-md-12">
		<section class="card">
			<header class="card-header">
                Create Client
            </header>
            <div class="card-body">
            	<form role="form" action="<?=site_url('backend/client/save_new')?>" id="form_create_topik" method="post" class="form-horizontal tasi-form">
            		<div class="row">
						<div class="col-md-8">
							<div class="form-group row ">
								<label for="client_Tpl_Id" class="control-label col-lg-4">Template *</label>
								<div class="col-md-8">
									<select class=" form-control" id="client_Tpl_Id" name="client_Tpl_Id" type="text" required></select>
								</div>
							</div>
							<div class="form-group row ">
								<label for="client_admnUsrId" class="control-label col-lg-4">Parent *</label>
								<div class="col-md-8">
									<select class=" form-control" id="client_admnUsrId" name="client_admnUsrId" type="text" required></select>
								</div>
							</div>
							<div class="form-group row ">
								<label for="client_admnCliId" class="control-label col-lg-4">User *</label>
								<div class="col-md-8">
									<select class=" form-control" id="client_admnCliId" name="client_admnCliId" type="text" required></select>
								</div>
							</div>
							<div class="form-group row ">
								<label for="client_Name" class="control-label col-lg-4">Name *</label>
								<div class="col-md-8">
									<input class=" form-control" id="client_Name" name="client_Name" type="text" required />
								</div>
							</div>
							<div class="form-group row ">
								<label for="client_Phone" class="control-label col-lg-4">Telepon</label>
								<div class="col-md-8">
									<input class=" form-control" id="client_Phone" name="client_Phone" type="text" />
								</div>
							</div>
							<div class="form-group row ">
								<label for="client_Email" class="control-label col-lg-4">Email</label>
								<div class="col-md-8">
									<input class=" form-control" id="client_Email" name="client_Email" type="email" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-offset-2 col-lg-10">
									<button class="btn btn-success" type="submit">Save</button>
									<a class="btn btn-default" href="<?=site_url('backend/client')?>">Cancel</a>
								</div>
							</div>
						</div>
						<div class="col-md-4" id="screenshot">
						</div>
					</div>
					
            	</form>
            </div>
		</section>
	</div>
</div>
