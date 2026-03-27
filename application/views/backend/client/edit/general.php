<form role="form" action="<?=site_url('backend/client/save-general')?>" id="form_update_biodata" method="post" class="form-horizontal tasi-form">
    <div class="row">
        <div class="col-md-8">
            <input type="hidden" name="client_Id" value="<?=$biodata->client_Id?>"/>
            <div class="form-group row ">
                <label for="client_Name" class="control-label col-lg-4">Nama *</label>
                <div class="col-md-8">
                    <input class="form-control" value="<?=$biodata->client_Name?>" id="client_Name" name="client_Name" type="text" required />
                </div>
            </div>
            <div class="form-group row ">
                <label for="client_Phone" class="control-label col-lg-4">Telepon</label>
                <div class="col-md-8">
                    <input class="form-control" value="<?=$biodata->client_Phone?>" id="client_Phone" name="client_Phone" type="text" />
                </div>
            </div>
            <div class="form-group row ">
                <label for="client_Email" class="control-label col-lg-4">Email</label>
                <div class="col-md-8">
                    <input class="form-control" value="<?=$biodata->client_Email?>" id="client_Email" name="client_Email" type="email" />
                </div>
            </div>
            <div class="form-group row ">
                <label for="client_CustomDomain" class="control-label col-lg-4">URL</label>
                <div class="col-md-8">
                    <input class="form-control" value="<?=$biodata->client_CustomDomain?>" id="client_CustomDomain" name="client_CustomDomain" type="text" placeholder="http://(namadomain).dgsign.id/" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
    
</form>