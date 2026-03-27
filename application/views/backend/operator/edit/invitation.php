<!--form style="display:none" role="form" action="<?=site_url('backend/client/save-invitation')?>" id="form_add_invitation" method="post" class="form-horizontal tasi-form">
    <div class="row">
        <div class="col-md-12">
            <input type="hidden" value="" id="ivts_Id" name="ivts_Id"/>
            <input type="hidden" value="<?=$id?>" name="ivts_Client_Id"/>
            <div class="form-group row ">
                <label for="ivts_Capt_Id" class="control-label col-lg-2">Captions *</label>
                <div class="col-md-6">
                    <select class="form-control" id="ivts_Capt_Idcirit" name="ivts_Capt_Id" required></select>
                </div>
            </div>
            <div class="form-group row ">
                <label for="ivts_Name" class="control-label col-lg-2">Nama *</label>
                <div class="col-md-6">
                    <input class="form-control" id="ivts_Name" name="ivts_Name" type="text" required />
                </div>
            </div>
            <div class="form-group row ">
                <label for="ivts_NoHp" class="control-label col-lg-2">No HP *</label>
                <div class="col-md-6">
                    <input class="form-control" id="ivts_NoHp" name="ivts_NoHp" type="text" required />
                </div>
            </div>
            <div class="form-group row ">
                <label for="ivts_Address" class="control-label col-lg-2">Alamat *</label>
                <div class="col-md-6">
                    <input class="form-control" id="ivts_Address" name="ivts_Address" type="text" required />
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
        <div class="pull-right">
            <a style="margin-right:5px;display:none" xhref="multiple-delete" href="javascript:;" class="button-deletes-ivt btn btn-danger btn-sm pull-right"><i class="fa fa-times"></i> Delete</a> &nbsp;&nbsp;
            <a style="margin-right:5px;" href="<?=site_url('backend/client/blast/'.$id)?>" data-href="javascript:;" data-id="button-blast-ivt" class="btn btn-success btn-sm pull-right"><i class="fa fa-comment"></i> Blast</a> &nbsp;&nbsp;
			<a href="javascript:;" id="button-plus-ivt" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah</a>
			
        </div>
        <div class="table-responsive-sm ">
            <table id="table-list-invitation" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="selectAll" name="selectAll" value="all"></th>
                        <th>No</th>
                        <th>QR</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Grup</th>
                        <th>Kursi</th>
                        <th>Caption</th>
                        <th>Status</th>
                        <th>Pesan</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div aria-labelledby="myModalLabel" role="dialog" id="modalAddInvitation" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Invitation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="<?=site_url('backend/client/save-invitation')?>" id="form_modal_add_invitation" method="post" class="form-horizontal tasi-form">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" value="" id="ivts_Id" name="ivts_Id"/>
                            <input type="hidden" value="<?=$id?>" name="ivts_Client_Id"/>
                           
                            <div class="form-group row ">
                                <label for="ivts_Name" class="control-label col-lg-4">Nama *</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_Name" name="ivts_Name" type="text" />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_Address" class="control-label col-lg-4">Alamat</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_Address" name="ivts_Address" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_NoHp" class="control-label col-lg-4">Nomor Whatsapp</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_NoHp" name="ivts_NoHp" type="number"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_Guest" class="control-label col-lg-4">Jumlah Tamu</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_Guest" name="ivts_Guest" type="number"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_Souvenir" class="control-label col-lg-4">Jumlah Souvenir</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_Souvenir" name="ivts_Souvenir" type="number"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_Category" class="control-label col-lg-4">VIP</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_Category" name="ivts_Category" type="text"  />
                                    <!-- <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="ivts_Category">
                                        <label class="custom-control-label" for="customSwitch1">VIP</label>
                                    </div> -->
                                </div>
                            </div>
                            
                            <div class="form-group row ">
                                <label for="ivts_Group" class="control-label col-lg-4">Group</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_Group" name="ivts_Group" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_Seat" class="control-label col-lg-4">Tempat Duduk</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_Seat" name="ivts_Seat" type="text"  />
                                </div>
                            </div>
                             <div class="form-group row ">
                                <label for="ivts_Capt_Id" class="control-label col-lg-4">Captions</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="ivts_Capt_Id" name="ivts_Capt_Id" ></select>
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
                </form>
            </div>
        </div>
    </div>
</div>
<div aria-labelledby="myModalLabel" role="dialog" id="myModal" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Invitation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form role="form"-->
                    <input type="hidden" name="ivts_Id" value="" id="ivts_Id"/>
                    <input type="hidden" name="ivts_NoHp" value="" id="ivts_NoHp"/>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pilih Caption</label>
                        <select id="select-caption" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12" id="preview-message">
                        </div>
                    </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="button-kirim-wa" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
</div>
