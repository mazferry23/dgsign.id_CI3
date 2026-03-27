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
            <!-- <a style="margin-right:5px;display:none" xhref="multiple-delete" href="javascript:;" class="button-deletes-ivt btn btn-danger btn-sm pull-right"><i class="fa fa-times"></i> Delete</a> &nbsp;&nbsp; -->
            <!-- <a style="margin-right:5px;" href="<?=site_url('backend/client/blast/'.$id)?>" data-href="javascript:;" data-id="button-blast-ivt" class="btn btn-success btn-sm pull-right"><i class="fa fa-comment"></i> Blast</a> &nbsp;&nbsp; -->
			
            
			<div class="btn-group pull-right">
                <button type="button" class="btn btn-sm btn-info dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                    <div class="dropdown-menu">
                        <a href="javascript:void(0)" onclick="ModalBlastWA(this)" class="dropdown-item button-blast-wa"><i class="fa fa-comment"></i> Kirim Wa Blast</a>
                        <a href="javascript:void(0)" onclick="ModalSetTpl(this)" class="dropdown-item button-set-template"><i class="fa fa-picture-o"></i> Set Template</a>
                        <a href="javascript:;" id="button-import-tamu" class="dropdown-item button-import-tamu"><i class="fa fa-picture-o"></i> Import Data Tamu</a>
                        <a href="<?=site_url('backend/client/createzip_qrcode/'.$id)?>" target="_blank" id="button-download_qr" class="dropdown-item button-download_qr"><i class="fa fa-picture-o"></i> Download QR</a>
                        <a xhref="multiple-delete" href="javascript:;" class="dropdown-item button-deletes-ivt"><i class="fa fa-times"></i> Delete</a>
                    </div>
            </div>
            <a href="javascript:;" id="button-plus-ivt" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <div class="table-responsive ">
            <table id="table-list-invitation" class="display table table-striped table-hover">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="selectAll" name="selectAll" value="all"></th>
                        <th>No</th>
                        <!-- <th>QR</th>
                        <th>Ivts</th> -->
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Whatsapp</th>
                        <th>VIP</th>
                        <th>Meja</th>
                        <th>Resepsi</th>
                        <!-- <th>Link</th> -->
                        <th>Perkiraan Tamu</th>
                        <th>Status RSVP</th>
                        <th>Status WA</th>
                        <th>Template QR</th>
                        <th>Template Invitation</th>
                        <!-- <th>Pesan</th> -->
                        <th>Link</th>
                        <th>Ditambahkan </th>
                        <th>Diperbaharui </th>
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
                                <label for="ivts_NoHp" class="control-label col-lg-4">Whatsapp</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_NoHp" name="ivts_NoHp" type="number"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_Guest" class="control-label col-lg-4">Tamu</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_Guest" name="ivts_Guest" type="number"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_Souvenir" class="control-label col-lg-4">Souvenir</label>
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
                                <label for="ivts_GroupFam" class="control-label col-lg-4">Kategori</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_GroupFam" name="ivts_GroupFam" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_GroupSub" class="control-label col-lg-4">Sub Kategori</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_GroupSub" name="ivts_GroupSub" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_Seat" class="control-label col-lg-4">Tempat Duduk</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_Seat" name="ivts_Seat" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_LinkExternal" class="control-label col-lg-4">Link External</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="ivts_LinkExternal" name="ivts_LinkExternal" type="text"  />
                                </div>
                            </div>
                             <div class="form-group row ">
                                <label for="ivts_tplqr_Id" class="control-label col-lg-4">Template QR</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="ivts_tplqr_Id" name="ivts_tplqr_Id" ></select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="ivts_tplivts_Id" class="control-label col-lg-4">Template Invitation</label>
                                <div class="col-md-8">
                                    <select class="form-control" id="ivts_tplivts_Id" name="ivts_tplivts_Id" ></select>
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
<div aria-labelledby="myModalLabel" role="dialog" id="modalImportTamu" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Tamu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="<?=site_url('backend/client/import-invitation')?>" id="form_modal_import" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group row ">
                            <!-- <input type="hidden" value="" id="ivts_Id" name="ivts_Id"/> -->
                            <input type="hidden" value="<?=$id?>" name="ivts_Client_Id"/>
                                <label for="file_name" class="control-label col-lg-3">Pilih File (.xlxs)</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control input-sm" name="file_name" id="file_name"/>
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
                        <?php 
                        // $g = '<p id="message">';
                        // if( $g = '<p id="message">wa</p>'){
                        //     echo '<p id="message">';
                        // }else {
                        //     //echo '<p id="message">';
                        // } ?>
                        
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
                <button type="button" id="button-kirim-wa" class="button-kirim-wa btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
</div>
<div aria-labelledby="myModalLabel" role="dialog" id="myModalwaBlast" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kirim Blast Whatsapp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form role="form"-->
                    <!-- <input type="hidden" name="ivts_Id" value="" id="ivts_Id"/>
                    <input type="hidden" name="ivts_NoHp" value="" id="ivts_NoHp"/> -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pilih Caption</label>
                        <?php 
                        // $g = '<p id="message">';
                        // if( $g = '<p id="message">wa</p>'){
                        //     echo '<p id="message">';
                        // }else {
                        //     //echo '<p id="message">';
                        // } ?>
                        
                        <select id="select-caption-blast" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12" id="preview-message-blast">
                        </div>
                    </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="button-kirim-wa" class="button-kirim-wa-blast btn btn-primary">Kirim</button>
            </div>
        </div>
    </div>
</div>
<div aria-labelledby="myModalLabel" role="dialog" id="ModalSetTpl" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Setting Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form role="form"-->
             
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pilih Template</label>
                                             
                        <select id="set_ivts_tplqr_Id" class="form-control"></select>
                        <select id="set_ivts_tplivts_Id" class="form-control"></select>

                    </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="button-setTpl-ivt btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div aria-labelledby="myModalLabel" role="dialog" id="ModalImport" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Tamu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!--form role="form"-->
                    <!-- <input type="hidden" name="ivts_Id" value="" id="ivts_Id"/> -->
                    <!-- <input type="hidden" name="ivts_NoHp" value="" id="ivts_NoHp"/> -->
                    <!-- <div class="form-group">
                    <label for="exampleInputFile">Upload Data Tamu (.xlsx) </label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="file_name" name="file_name">
                          <label class="custom-file-label" for="file_name">Choose file</label>
                          
                        </div>
                    </div> -->
                    <div class="form-group row ">
                            <input type="hidden" value="" id="ivts_Id" name="ivts_Id"/>
                            <input type="hidden" value="<?=$id?>" name="ivts_Client_Id"/>
                        <label for="file_name" class="control-label col-lg-3">Pilih File</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control input-sm" name="file_name" id="file_name"/>
                        </div>
                    </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="button-setTpl-ivt btn btn-primary">Simpan</button>
                <!-- <button class="btn btn-success btn-sm" type="submit">Save</button> -->
            </div>
        </div>
    </div>
</div>

