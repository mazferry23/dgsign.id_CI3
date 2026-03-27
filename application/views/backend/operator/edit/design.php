<div class="row">
    <div class="col-md-12">
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover">
        <?php
        
        foreach($columns as $col){
            $val = "";
            if(isset($properties[$col['tplprop_Key']])){
                $val = $properties[$col['tplprop_Key']];
            }
            echo "<tr><td style='width:300px'>$col[tplprop_Label]</td><td>:</td><td>"; 
            if($col['tplprop_Type']=='photo'){
                $url = !empty($val) ? base_url('public/uploads/'.$val.'') : '';
                ?>
                <?php
                if(!empty($val)){
                ?>
                    <?php
                    if(!empty($url)){?>
                    <img src="<?=$url?>" width="200"/><br>
                    <?php }?>
                <a href="javascript:void(0)" data-show="photo-id-<?=$col['tplprop_Id']?>" class="hiders btn btn-info btn-sm">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <a href="<?=site_url('backend/design/delete-key/'.$client->client_Id.'/'.$col['tplprop_Key'])?>" onclick="return confirm('Yakin mengosongkan data ini?')" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                <?php
                }
                ?>
                <div id="photo-id-<?=$col['tplprop_Id']?>" <?=!empty($val) ? 'style="display:none"' : ''?>>
                    <form  id="form-id-<?=$col['tplprop_Id']?>" action="<?=base_url('backend/design/single-upload')?>" method="post" enctype="multipart/form-data" class="form-horizontal tasi-form">
                        <input form="form-id-<?=$col['tplprop_Id']?>" type="hidden" name="clientId" value="<?=$client->client_Id?>"/>
                        <input form="form-id-<?=$col['tplprop_Id']?>" type="hidden" name="field" value="<?=$col['tplprop_Key']?>"/>
                        <div class="form-group row ">
                            <label for="client_Name" class="control-label col-lg-4">Upload File *</label>
                            <div class="col-md-8">
                                <input form="form-id-<?=$col['tplprop_Id']?>" type="file" class="form-control input-sm" name="asset"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-12">
                                <button form="form-id-<?=$col['tplprop_Id']?>" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</buttton>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
            }else if($col['tplprop_Type']=='video'){
                $url = "";
                $embed = true;
                if(!empty($val)){
                    if(substr($val,0,4)=="http"){
                        $url = $val;
                    }else{
                        $url = base_url('public/uploads/'.$val);
                        $embed = false;
                    }
                }
                
                ?>
                <?php
                if(!empty($val)){
                    if($embed){
                        $url_exploded = explode('?',$url);
                        $url_video = "";
                        $query_str = isset($url_exploded[1]) ? explode('&',$url_exploded[1]) : null;
                        if($query_str!=null){
                            foreach($query_str as $qs){
                                if($qs[0]=='v'){
                                    $data_v = explode('=',$qs);
                                    $url_video = 'https://www.youtube.com/embed/'.$data_v[1];
                                }
                            }
                        }
                        if(!empty($url_video)){
                        ?>
                <iframe width="400" height="200" src="<?=$url_video?>">

                </iframe><br>
                        <?php
                        }
                    }else{
                ?>
                <video controls>
                    <source src="<?=$url?>"/>
                </video><br>
                    <?php }?>
                <a href="javascript:void(0)" data-show="video-id-<?=$col['tplprop_Id']?>" class="hiders btn btn-info btn-sm">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <a onclick="return confirm('Yakin mengosongkan data ini?')" href="<?=site_url('backend/design/delete-key/'.$client->client_Id.'/'.$col['tplprop_Key'])?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                <?php
                }
                ?>
                <div id="video-id-<?=$col['tplprop_Id']?>" <?=!empty($val) ? 'style="display:none"' : ''?>>
                    <form id="form-id-<?=$col['tplprop_Id']?>" class="form-horizontal tasi-form" action="<?=base_url('backend/design/single-upload')?>" method="post" enctype="multipart/form-data">
                        <input form="form-id-<?=$col['tplprop_Id']?>" type="hidden" name="clientId" value="<?=$client->client_Id?>"/>
                        <input form="form-id-<?=$col['tplprop_Id']?>" type="hidden" name="field" value="<?=$col['tplprop_Key']?>"/>
                        <div class="form-group row ">
                            <label for="client_Name" class="control-label col-lg-4">Youtube URL</label>
                            <div class="col-md-8">
                                <input form="form-id-<?=$col['tplprop_Id']?>" type="text" class="form-control input-sm" name="text"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="client_Name" class="control-label col-lg-4">Atau Pilih File</label>
                            <div class="col-md-8">
                                <input form="form-id-<?=$col['tplprop_Id']?>" type="file" class="form-control input-sm" name="asset"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-8">
                                <button form="form-id-<?=$col['tplprop_Id']?>" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</buttton>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <?php
            }else if($col['tplprop_Type']=='music'){
                ?>
                <?php
                if(!empty($val)){
                ?>
                <audio controls>
                    <source src="<?=base_url('public/uploads/'.$val)?>"/>
                </audio><br>
                <a href="javascript:void(0)" data-show="music-id-<?=$col['tplprop_Id']?>" class="hiders btn btn-info btn-sm">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <a onclick="return confirm('Yakin mengosongkan data ini?')" href="<?=site_url('backend/design/delete-key/'.$client->client_Id.'/'.$col['tplprop_Key'])?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                <?php
                }
                ?>
                <div id="music-id-<?=$col['tplprop_Id']?>" <?=!empty($val) ? 'style="display:none"' : ''?>>
                    <form class="form-horizontal tasi-form" id="form-id-<?=$col['tplprop_Id']?>" action="<?=base_url('backend/design/single-upload')?>" method="post" enctype="multipart/form-data">
                        <input form="form-id-<?=$col['tplprop_Id']?>" type="hidden" name="clientId" value="<?=$client->client_Id?>"/>
                        <input form="form-id-<?=$col['tplprop_Id']?>" type="hidden" name="field" value="<?=$col['tplprop_Key']?>"/>
                        <div class="form-group row ">
                            <label for="client_Name" class="control-label col-lg-4">Pilih File MP3</label>
                            <div class="col-md-8">
                                <input form="form-id-<?=$col['tplprop_Id']?>" type="file" class="form-control input-sm" name="asset"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-8">
                                <button form="form-id-<?=$col['tplprop_Id']?>" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</buttton>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
            }
            else if($col['tplprop_Type']=='acara'){
                $acara = [];
                if(!empty($val)){
                    $acara = json_decode($val,true);
                    ?>
                    <table>
                        <tr>
                            <td>Acara</td>
                            <td>:</td>
                            <td><?=$acara['judul']?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?=$acara['tanggal']?></td>
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>:</td>
                            <td><?=$acara['tempat']?></td>
                        </tr>
                        <tr>
                            <td>Periode</td>
                            <td>:</td>
                            <td><?=$acara['periode']?></td>
                        </tr>
                        <tr>
                            <td>Link</td>
                            <td>:</td>
                            <td><?=$acara['link']?></td>
                        </tr>
                    </table><br>
                    <a href="javascript:void(0)" data-show="video-id-<?=$col['tplprop_Id']?>" class="hiders btn btn-info btn-sm">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <a onclick="return confirm('Yakin mengosongkan data ini?')" href="<?=site_url('backend/design/delete-key/'.$client->client_Id.'/'.$col['tplprop_Key'])?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    <?php
                }
                
                ?>
                <div id="video-id-<?=$col['tplprop_Id']?>" <?=!empty($val) ? 'style="display:none"' : ''?>>
                    <form id="form-id-<?=$col['tplprop_Id']?>" class="form-horizontal tasi-form" action="<?=base_url('backend/design/save-acara')?>" method="post" enctype="multipart/form-data">
                        <input form="form-id-<?=$col['tplprop_Id']?>" type="hidden" name="clientId" value="<?=$client->client_Id?>"/>
                        <input form="form-id-<?=$col['tplprop_Id']?>" type="hidden" name="field" value="<?=$col['tplprop_Key']?>"/>
                        <div class="form-group row ">
                            <label for="client_Name" class="control-label col-lg-4">Judul Acara</label>
                            <div class="col-md-8">
                                <input value="<?=isset($acara['judul']) ? $acara['judul'] : ''?>" form="form-id-<?=$col['tplprop_Id']?>" type="text" class="form-control input-sm" name="judul"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="client_Name" class="control-label col-lg-4">Tanggal Acara</label>
                            <div class="col-md-8">
                                <input value="<?=isset($acara['tanggal']) ? $acara['tanggal'] : ''?>" form="form-id-<?=$col['tplprop_Id']?>" type="text" class="form-control input-sm datetime-input" name="tanggal"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="client_Name" class="control-label col-lg-4">Periode</label>
                            <div class="col-md-8">
                                <input value="<?=isset($acara['periode']) ? $acara['periode'] : ''?>" form="form-id-<?=$col['tplprop_Id']?>" type="text" class="form-control input-sm" name="periode"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="client_Name" class="control-label col-lg-4">Tempat</label>
                            <div class="col-md-8">
                                <input value="<?=isset($acara['tempat']) ? $acara['tempat'] : ''?>" form="form-id-<?=$col['tplprop_Id']?>" type="text" class="form-control input-sm" name="tempat"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="client_Name" class="control-label col-lg-4">Link Map</label>
                            <div class="col-md-8">
                                <textarea  form="form-id-<?=$col['tplprop_Id']?>" class="form-control input-sm" name="link"><?=isset($acara['link']) ? $acara['link'] : ''?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row ">
                            <div class="col-md-8">
                                <button form="form-id-<?=$col['tplprop_Id']?>" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</buttton>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <?php
            }
            else if($col['tplprop_Type']=='multiplephoto'){
                $photos = [];
                if(!empty($val)){
                    $photos = json_decode($val,true);
                }
                ?>
                <?php
                if(!empty($val)){
                    foreach($photos as $pt){
                        $url = base_url('public/uploads/'.$pt.'');
                        ?>
                        <img src="<?=$url?>" style="margin-right:5px" width="100"/>
                    </a>
                    <?php
                    }
                    ?>
                    <a href="javascript:void(0)" data-show="multiphoto-id-<?=$col['tplprop_Id']?>"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Yakin mengosongkan data ini?')" href="<?=site_url('backend/design/delete-key/'.$client->client_Id.'/'.$col['tplprop_Key'])?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    <?php
                
                }
                ?>
                <div id="multiphoto-id-<?=$col['tplprop_Id']?>" <?=!empty($val) ? 'style="display:none"' : ''?>>
                    <form id="form-id-<?=$col['tplprop_Id']?>" action="<?=base_url('backend/design/multi-upload')?>" method="post" enctype="multipart/form-data">
                    <input form="form-id-<?=$col['tplprop_Id']?>" type="hidden" name="clientId" value="<?=$client->client_Id?>"/>
                        <input form="form-id-<?=$col['tplprop_Id']?>" type="hidden" name="field" value="<?=$col['tplprop_Key']?>"/>
                        <input form="form-id-<?=$col['tplprop_Id']?>" multiple type="file" class="form-control input-sm" name="asset[]"/>
                        <button form="form-id-<?=$col['tplprop_Id']?>" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</buttton>
                    </form>
                </div>
                <?php
            }
            else if($col['tplprop_Type']=='combodate'){
                ?>
                <a  href="#"
                id="<?=$col['tplprop_Type']?> <?=$col['tplprop_Key'].'-'.$client->client_Id?>"
                data-type="<?=$col['tplprop_Type']?>" 
                data-pk="<?=$col['tplprop_Key'].'-'.$client->client_Id?>"
                data-url="<?=site_url('backend/design/update')?>"
                data-title="<?=$col['tplprop_Label']?>" 
                class="editable-combodate editable-click" 
                data-original-title="" 
                title="" 
                <?=$col['tplprop_Attributes']?>
                style="display:inline"><?=$val?></a>
                <?php
                if(!empty($val)){
                    echo '<br><a onclick="return confirm(\'Yakin mengosongkan data ini?\')" href="'.site_url('backend/design/delete-key/'.$client->client_Id.'/'.$col['tplprop_Key']).'" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>';
                }
            }
            else{
            ?>
            <a  href="#"
                id="<?=$col['tplprop_Type']?> <?=$col['tplprop_Key'].'-'.$client->client_Id?>"
                data-type="<?=$col['tplprop_Type']?>" 
                data-pk="<?=$col['tplprop_Key'].'-'.$client->client_Id?>"
                data-url="<?=site_url('backend/design/update')?>"
                data-title="<?=$col['tplprop_Label']?>" 
                class="editable editable-click" 
                data-original-title="" 
                title="" 
                <?=$col['tplprop_Attributes']?>
                style="display:inline"><?=$val?></a>
            <?php
            if(!empty($val)){
                echo '<br><a onclick="return confirm(\'Yakin mengosongkan data ini?\')" href="'.site_url('backend/design/delete-key/'.$client->client_Id.'/'.$col['tplprop_Key']).'" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>';
            }
            }
            echo  "</td></tr>";
        }
        ?>
        </table>
    </div>
    </div>
</div>