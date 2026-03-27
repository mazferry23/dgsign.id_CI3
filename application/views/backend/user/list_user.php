<div class="row">
	<div class="col-md-12">
		<section class="card">
			<header class="card-header">
				User List
			</header>
			<div class="card-body">
				<div style="margin-top:10px;margin-bottom: 10px;">
					<a href="<?=site_url()?>backend/user/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create</a>
					
					<a href="javascript:;" id='button-refresh' class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> Refresh</a>
				</div>
				
				<div class="adv-table">
					<table class="display table table-bordered table-striped" id="user_table_list">
						<thead>
							<tr>
								<td>No</td>
								<td>Username</td>
								<td>Client ID</td>
								<td>First Name</td>
								<td>Last Name</td>
								<td>Email</td>
								<td>Phone</td>
								<td>Level</td>
								<td>Created</td>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>
