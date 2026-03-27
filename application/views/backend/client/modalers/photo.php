<form role="form" action="<?=site_url('backend/client/upload-photo')?>" id="form_add_invitation" method="post" class="form-horizontal tasi-form">
    <input type="hidden" name="client_Id" value="<?=$client_Id?>"/>
    <input type="hidden" name="client_Key" value="<?=$client_Key?>"/>
    <div class="form-group row ">
        <label for="photo" class="control-label col-lg-4">Upload Photo *</label>
        <div class="col-md-8">
            <input class="form-control" id="photo" name="photo" type="file" required />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-offset-2 col-lg-10 pull-right">
            <button class="btn btn-success btn-sm" type="submit">Save</button>
            <a class="btn btn-default btn-sm" id="button-hide-form-ivt" href="javascript:void(0);">Cancel</a>
        </div>
    </div>
</form>