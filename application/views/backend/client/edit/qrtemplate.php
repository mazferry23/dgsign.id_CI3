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
                        <th>ID</th>
                        <th>Label</th>
                        <th>Type</th>
                        <th>Template</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div aria-labelledby="myModalLabel" role="dialog" id="modalAddQRtemplate" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form QR template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="<?=site_url('backend/qrtemplate/save')?>" id="form_add_QRtemplate" method="post" class="form-horizontal tasi-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" value="" id="tplqr_Id" name="tplqr_Id"/>
                            <input type="hidden" value="<?=$id?>" name="tplqr_Client_Id"/>
                            <div class="form-group row ">
                                <label for="tplqr_Label" class="control-label col-lg-3">Label *</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_Label" name="tplqr_Label" type="text" required />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_Judul" class="control-label col-lg-3">Judul </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_Judul" name="tplqr_Judul" type="text"  />
                                </div>                               
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_Cpp" class="control-label col-lg-3">CPP & CPW </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_Cpp" name="tplqr_Cpp" type="text"  />
                                </div>                                
                             </div>
                            <!--<div class="form-group row ">
                                <label for="tplqr_CppOrtu" class="control-label col-lg-3">Orang Tua</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_CppOrtu" name="tplqr_CppOrtu" type="text"  />
                                </div>                                
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_Cpw" class="control-label col-lg-3">CPW </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_Cpw" name="tplqr_Cpw" type="text"  />
                                </div>                                
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_CpwOrtu" class="control-label col-lg-3">Orang Tua</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_CpwOrtu" name="tplqr_CpwOrtu" type="text"  />
                                </div>
                            </div> -->
                            <div class="form-group row ">
                                <label for="tplqr_FieldSatu" class="control-label col-lg-3">Field 1 </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_FieldSatu" name="tplqr_FieldSatu" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_FieldDua" class="control-label col-lg-3">Field 2 </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_FieldDua" name="tplqr_FieldDua" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_FieldTiga" class="control-label col-lg-3">Field 3 </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_FieldTiga" name="tplqr_FieldTiga" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_FieldEmpat" class="control-label col-lg-3">Field 4 </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_FieldEmpat" name="tplqr_FieldEmpat" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_FieldLima" class="control-label col-lg-3">Field 5 </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_FieldLima" name="tplqr_FieldLima" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_FieldEnam" class="control-label col-lg-3">Field 6 </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_FieldEnam" name="tplqr_FieldEnam" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_FieldTujuh" class="control-label col-lg-3">Field 7 </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_FieldTujuh" name="tplqr_FieldTujuh" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_FieldDelapan" class="control-label col-lg-3">Field 8 </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_FieldDelapan" name="tplqr_FieldDelapan" type="text"  />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_VIP" class="control-label col-lg-3">VIP </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_VIP" name="tplqr_VIP" type="text"  value="1"/>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_Link" class="control-label col-lg-3">Link </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_Link" name="tplqr_Link" type="text" value="1" />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_GuestSet" class="control-label col-lg-3">Guest </label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_GuestSet" name="tplqr_GuestSet" type="text" value="1" />
                                </div>
                            </div>
                           
                            <div class="form-group row ">
                                <label for="tplqr_File" class="control-label col-lg-3">Template</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control input-sm" name="asset" id="asset"/>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_Mode" class="control-label col-lg-3">Type</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="tplqr_Mode" name="tplqr_Mode" >
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_TamuSize" class="control-label col-lg-3">Nama Tamu Font Size</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_TamuSize" name="tplqr_TamuSize" type="text"  value="25"/>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_AlamatSize" class="control-label col-lg-3">Alamat Tamu Font Size</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_AlamatSize" name="tplqr_AlamatSize" type="text" value="25" />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_MejaSize" class="control-label col-lg-3">Meja Tamu Font Size</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_MejaSize" name="tplqr_MejaSize" type="text" value="25" />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_GuestSize" class="control-label col-lg-3">Jumlah Tamu Font Size</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_GuestSize" name="tplqr_GuestSize" type="text" value="1" />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_GuestPosX" class="control-label col-lg-3">Jumlah Tamu Posisi</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_GuestPosX" name="tplqr_GuestPosX" type="text" value="790" />
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="tplqr_TamuColor" class="control-label col-lg-3">Font Color</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="tplqr_TamuColor" name="tplqr_TamuColor" type="text" value="35,31,32" />
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