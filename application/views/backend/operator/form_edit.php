<div class="row">
	<div class="col-md-12">
		<section class="card">
			<header class="card-header">
                Edit Client
				<div class="pull-right">
					<a href="<?=!empty($client->client_CustomDomain) ? $client->client_CustomDomain : site_url('invitations/'.$client->client_Id.'/'.strtolower(url_title($client->client_Name)))?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Preview</a>
				</div>
            </header>
            <div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<a href="<?=site_url('backend/client/edit/'.$this->uri->segment(4).'?pos=general')?>" class="btn <?=@empty($_GET['pos']) || $_GET['pos']=='general'  ? 'btn-default' : 'btn-primary'?> btn-sm"><i class="fa fa-pencil"></i> Biodata</a>
						<a href="<?=site_url('backend/client/edit/'.$this->uri->segment(4).'?pos=design')?>" class="btn <?=@isset($_GET['pos']) && $_GET['pos']=='design'  ? 'btn-default' : 'btn-primary'?> btn-sm"><i class="fa fa-gears"></i> Design</a>
						<a href="<?=site_url('backend/client/edit/'.$this->uri->segment(4).'?pos=invitation')?>" class="btn <?=@isset($_GET['pos']) && $_GET['pos']=='invitation'  ? 'btn-default' : 'btn-primary'?> btn-sm"><i class="fa fa-envelope"></i> Undangan</a>
						<a href="<?=site_url('backend/client/edit/'.$this->uri->segment(4).'?pos=rsvp')?>" class="btn <?=@isset($_GET['pos']) && $_GET['pos']=='rsvp'  ? 'btn-default' : 'btn-primary'?> btn-sm"><i class="fa fa-inbox"></i> RSVP</a>
						<a href="<?=site_url('backend/client/edit/'.$this->uri->segment(4).'?pos=caption')?>" class="btn <?=@isset($_GET['pos']) && $_GET['pos']=='caption'  ? 'btn-default' : 'btn-primary'?> btn-sm"><i class="fa fa-location-arrow"></i> Caption Template</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<br><hr>
						<?php
						if(!empty($form_edit_path)){
							$this->load->view('backend/'.$form_edit_path);
						}
						?>
					</div>
				</div>
            </div>
		</section>
	</div>
</div>
<div class="modal fade" id="modalFormDinamis" tabindex="-1" role="dialog" aria-labelledby="modalFormDinamisLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormDinamisLabel">Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Harap tunggu...
      </div>
      <!--div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div-->
    </div>
  </div>
</div>
