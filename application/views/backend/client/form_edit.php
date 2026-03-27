<div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="card">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count"></h1>
                              <p>Status Whatsapp</p>
                              <p>Received <?=$wa_received?></p>
                              <p>Sent <?=$wa_sent?></p>
                              <p>Read <?=$wa_read?></p>
                              <p>Cancel <?=$wa_cancel?></p>
                              <p>Belum Dikirim <?=$wa_notsent?></p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="card">
                          <div class="symbol red">
                              <i class="fa fa-comments"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2"><?=$rsvp?></h1>
                              <p>Undangan</p>
                              <p>Undangan <?=$ivts?> </p>
                              <p>Prediksi Tamu <?=$ivts_guest?></p>
                              <p>Prediksi Souvenir <?=$ivts?></p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="card">
                          <div class="symbol yellow">
                              <i class="fa fa-inbox"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3"><?=$invitations?></h1>
                              <p>Status Undangan</p>
                              <p>Belum Respon : <?=$ivts_baru?></p>
                              <p>Dibaca : <?=$ivts_baca?></p>
                              <p>Hadir : <?=$ivts_hadir?>Undng/ <?=$ivts_tamu?>Tamu</p>
                              <p>Tidak Hadir : <?=$ivts_nohadir?></p>
                              <p>RSVP Baru : <?=$ivts_rsvp?></p>
                          </div>
                      </section>
                  </div>
				  <div class="col-lg-3 col-sm-6">
                      <section class="card">
                          <div class="symbol yellow">
                              <i class="fa fa-inbox"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3"><?=$invitations?></h1>
                              <p>Undangan</p>
                          </div>
                      </section>
                  </div>
              </div>
              <script>
                localStorage.removeItem('dataStok')
              </script>
</div>
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
						<a href="<?=site_url('backend/client/edit/'.$this->uri->segment(4).'?pos=caption')?>" class="btn <?=@isset($_GET['pos']) && $_GET['pos']=='caption'  ? 'btn-default' : 'btn-primary'?> btn-sm"><i class="fa fa-location-arrow"></i> Caption</a>
						<a href="<?=site_url('backend/client/edit/'.$this->uri->segment(4).'?pos=qrtemplate')?>" class="btn <?=@isset($_GET['pos']) && $_GET['pos']=='qrtemplate'  ? 'btn-default' : 'btn-primary'?> btn-sm"><i class="fa fa-location-arrow"></i> QR Template</a>
						<a href="<?=site_url('backend/client/edit/'.$this->uri->segment(4).'?pos=histori')?>" class="btn <?=@isset($_GET['pos']) && $_GET['pos']=='histori'  ? 'btn-default' : 'btn-primary'?> btn-sm"><i class="fa fa-location-arrow"></i>Undangan Detil</a>
            <a href="<?=site_url('backend/client/edit/'.$this->uri->segment(4).'?pos=historiwa')?>" class="btn <?=@isset($_GET['pos']) && $_GET['pos']=='historiwa'  ? 'btn-default' : 'btn-primary'?> btn-sm"><i class="fa fa-location-arrow"></i>Histori WA</a>
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
