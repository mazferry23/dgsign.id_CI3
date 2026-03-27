<!--form style="display:none" role="form" action="<?=site_url('backend/caption/save')?>" id="form_add_invitation" method="post" class="form-horizontal tasi-form">
    <div class="row">
        <div class="col-md-12">
            <input type="hidden" value="" name="capt_Id"/>
            <input type="hidden" value="<?=$id?>" name="capt_Client_Id"/>
            <div class="form-group row ">
                <label for="capt_Code" class="control-label col-lg-2">Label *</label>
                <div class="col-md-6">
                    <input class="form-control" id="capt_Code" name="capt_Code" type="text" required />
                </div>
            </div>
            <div class="form-group row ">
                <label for="capt_Caption" class="control-label col-lg-2">Caption *</label>
                <div class="col-md-6">
                    <textarea class="form-control" id="capt_Caption" name="capt_Caption" type="text" required></textarea>
                    <span class="text-helper">Variabel {{NAME}} untuk nama undangan, {{ADDR}} untuk alamat, {{LINK}} untuk link undangan.</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-success btn-sm" type="submit">Save</button>
                    <a class="btn btn-default btn-sm" id="button-hide-form-ivt" href="javascript:void(0);">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form-->
<div class="row">
    <div class="col-md-12">
        <div class="">
            <a href="javascript:;" id="button-plus-tpl" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <div class="table-responsive-sm">
            <table id="table-list-invitation" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <!-- <th>No</th> -->
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor WA</th>
                        <th>Caption</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div aria-labelledby="myModalLabel" role="dialog" id="modalAddCaption" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Caption</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="<?=site_url('backend/caption/save')?>" id="form_add_caption" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" value="" id="capt_Id" name="capt_Id"/>
                            <input type="hidden" value="<?=$id?>" name="capt_Client_Id"/>
                            <div class="form-group row ">
                                <label for="capt_Code" class="control-label col-lg-4">Label *</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="capt_Code" name="capt_Code" type="text" required />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="capt_Caption" class="control-label col-lg-4">Caption *</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="capt_Caption" name="capt_Caption" type="text" rows="15" required></textarea>
                                    <span class="text-helper">Variabel {{NAME}} untuk nama undangan, {{ADDR}} untuk alamat, {{LINK}} untuk link undangan, {{TAMU}} untuk jumlah tamu prediksi, {{EXTLINK}} untuk link undangan External</span>
                                </div>
                            </div>
                            
                            <div class="form-group row ">
                                <label for="capt_type" class="control-label col-lg-4">Type</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="capt_type" name="capt_type" required></select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="capt_Caption" class="control-label col-lg-4">Template</label>
                                <div class="col-md-8">
                                <input type="file" class="form-control input-sm" name="asset" id="asset"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success btn-sm" type="submit">Save</button>
                                    <a class="btn btn-default btn-sm" id="button-hide-form-tpl" href="javascript:void(0);">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>