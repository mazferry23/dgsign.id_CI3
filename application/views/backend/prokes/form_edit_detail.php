<div class="row">
	<div class="col-md-12">
		<section class="card">
			<header class="card-header">
                Edit Detail Protokol Kesehatan
            </header>
            <div class="card-body">
            	<form role="form" enctype="multipart/form-data" action="<?=site_url('backend/prokes/save_new_detail')?>" id="form_create_topik" method="post" class="form-horizontal tasi-form">
					<input type="hidden" name="prodet_Id" value="<?=$data->prodet_Id?>"/>
					<input type="hidden" name="prodet_Prokes_Id" value="<?=$id_prokes?>"/>
                    <div class="form-group row ">
	                    <label for="prodet_Image" class="control-label col-lg-2">Icon *</label>
	                    <div class="col-md-6">
	                     	<input accept=".jpg,.jpeg,.png" class=" form-control" id="prodet_Image" name="prodet_Image" type="file" />
	                    </div>
						<div class="col-12">
							Pilih file jika mau mengganti gambarnya
						</div>
	              </div>
				  <div class="form-group row ">
	                    <label for="prodet_Description" class="control-label col-lg-2">Deskripsi *</label>
	                    <div class="col-md-6">
	                     	<textarea class="form-control" id="prodet_Description" name="prodet_Description" required><?=$data->prodet_Description?></textarea>
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
