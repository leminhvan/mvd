<div class="block-header">
    <h2><?php if(strpos(current_url(), 'add')) {echo lang('box_title_create');} else{echo lang('box_title_edit');} ?></h2>

    <ul class="actions">
        <li>
            <a class="icon-pop" href="#">
                <i class="md md-trending-up"></i>
            </a>
        </li>
        <li>
            <a class="icon-pop" href="#">
                <i class="md md-done-all"></i>
            </a>
        </li>
        <li class="dropdown">
            <a class="icon-pop" href="#" data-toggle="dropdown">
                <i class="md md-more-vert"></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a href="#">Refresh</a>
                </li>
                <li>
                    <a href="#">Manage Widgets</a>
                </li>
                <li>
                    <a href="#">Widgets Settings</a>
                </li>
            </ul>
        </li>
    </ul>

</div>

<div class="card">
    <div class="card-header">
        <h2>Input Text <small>Text Inputs with different sizes by height and column.</small></h2>
    </div>
    
    <div class="card-body card-padding">
        <?php echo form_open_multipart(site_url($action), 'id="form_tintuc" class="form-horizontal" role="form"'); ?>  
            <div class="form-group">
                <label  for="id_dm" class="col-sm-2 control-label"><?php echo lang('id_dm').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line select">
                        <?php                  
                          echo form_dropdown(
                           'id_dm',
                            $tintuc_danhmuc,  
                           set_value('id_dm',$tintuc['id_dm']),
                           'class="form-control required"  id="id_dm"'
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('id_dm');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="tieude" class="col-sm-2 control-label"><?php echo lang('tieude').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'tieude',
                                 'id'           => 'tieude',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('tieude',$tintuc['tieude'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tieude');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="mota" class="col-sm-2 control-label"><?php echo lang('mota').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'mota',
                                 'id'           => 'mota',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('mota',$tintuc['mota'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('mota');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="thumbnail" class="col-sm-2 control-label"><?php echo lang('thumbnail').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'thumbnail',
                                 'id'           => 'thumbnail',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('thumbnail',$tintuc['thumbnail'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('thumbnail');?> </small>
                </div>
            </div>
          
            <div class="form-group ">
                <label  for="noidung" class="col-sm-2 control-label"><?php echo lang('noidung').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_textarea(
                            array(
                                'id'            =>'noidung',
                                'name'          =>'noidung',
                                'rows'          =>'3',
                                'class'         =>'form-control  required',
                                
                                ),
                            set_value('noidung',$tintuc['noidung'])                           
                            );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('noidung');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="id_tacgia" class="col-sm-2 control-label"><?php echo lang('id_tacgia').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'id_tacgia',
                                 'id'           => 'id_tacgia',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('id_tacgia',$tintuc['id_tacgia'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('id_tacgia');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="tukhoa" class="col-sm-2 control-label"><?php echo lang('tukhoa').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'tukhoa',
                                 'id'           => 'tukhoa',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('tukhoa',$tintuc['tukhoa'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tukhoa');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="ngaytao" class="col-sm-2 control-label"><?php echo lang('ngaytao').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'ngaytao',
                                 'id'           => 'ngaytao',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 
                                 ),
                                 set_value('ngaytao',$tintuc['ngaytao'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('ngaytao');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="edit" class="col-sm-2 control-label"><?php echo lang('edit').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'edit',
                                 'id'           => 'edit',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 
                                 ),
                                 set_value('edit',$tintuc['edit'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('edit');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="trangthai" class="col-sm-2 control-label"><?php echo lang('trangthai').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <label class="radio radio-inline m-r-20" style="padding-top: 0px">
                            <input type="radio" name="trangthai" <?php if (isset($tintuc['trangthai']) && $tintuc['trangthai']=="0") echo "checked";?> value="0">
                            <i class="input-helper"></i> Tạm dừng 
                        </label>
                        <label class="radio radio-inline m-r-20" style="padding-top: 0px">
                            <input type="radio" name="trangthai" <?php if (isset($tintuc['trangthai']) && $tintuc['trangthai']=="1") echo "checked";?> value="1">
                            <i class="input-helper"></i>  Xem xét
                        </label>
                        <label class="radio radio-inline m-r-20" style="padding-top: 0px">
                            <input type="radio" name="trangthai" <?php if (isset($tintuc['trangthai']) && $tintuc['trangthai']=="2") echo "checked";?> value="2">
                            <i class="input-helper"></i>  Hoạt động
                        </label>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('trangthai');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="<?php echo site_url('tintuc'); ?>" class="btn btn-primary btn-sm" ><?php echo lang('actions_back');?></a>
                    <button class="btn btn-primary btn-sm" type="submit"><?php echo lang('actions_save');?></button>
                </div>
            </div>
            <?php echo form_close(); ?> 
        </div><!--end card body -->
</div>

