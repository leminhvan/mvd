<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-xs-12 col-sm-10">
<div class="card">
    <?php echo form_open_multipart(site_url($action), 'id="form_thamkhao" class="form-horizontal" role="form"'); ?>
        <div class="card-header  bgm-cyan">
            <h2 class="text-center"><?php if(strpos(current_url(), 'add')) {echo lang('box_title_create');} else{echo lang('box_title_edit');} ?></h2>
        </div>
        
        <div class="card-body card-padding">
          
            <div class="form-group">
                <label  for="tk_code" class="col-sm-2 control-label"><?php echo lang('tk_code').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'tk_code',
                                 'id'           => 'tk_code',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('tk_code',$thamkhao['tk_code'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tk_code');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="tk_name" class="col-sm-2 control-label"><?php echo lang('tk_name').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_textarea(
                                array(
                                 'name'         => 'tk_name',
                                 'id'           => 'tk_name',                       
                                 'class'        => 'form-control auto-size  required',
                                 'autocomplete' => 'off',
                                 'style'        =>'overflow: hidden; word-wrap: break-word; height: 32px;',
                                 'maxlength'=>'255',
                                 'spellcheck' =>"false"
                                 ),
                                 set_value('tk_name',$thamkhao['tk_name'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tk_name');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="tk_sop" class="col-sm-2 control-label"><?php echo lang('tk_sop').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'tk_sop',
                                 'id'           => 'tk_sop',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('tk_sop',$thamkhao['tk_sop'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tk_sop');?> </small>
                </div>
            </div>

            <div class="form-group">
                <label  for="tk_chidinh" class="col-sm-2 control-label"><?php echo lang('tk_chidinh'); ?></label>
                <div class="col-sm-10" style="margin-top: 7px">
                    <div class="col-sm-8">
                        <label class="checkbox checkbox-inline " style="padding-top: 0px">
                            <input type="checkbox"  name="tk_chidinh" <?php if ($thamkhao['tk_chidinh']) echo "checked";?> >
                            <i class="input-helper"></i>    
                             Đã chỉ định
                        </label>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tk_chidinh');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="tk_phuongphap" class="col-sm-2 control-label"><?php echo lang('tk_phuongphap').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'tk_phuongphap',
                                 'id'           => 'tk_phuongphap',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('tk_phuongphap',$thamkhao['tk_phuongphap'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tk_phuongphap');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="tk_hoaly" class="col-sm-2 control-label"><?php echo lang('tk_hoaly').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'tk_hoaly',
                                 'id'           => 'tk_hoaly',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('tk_hoaly',$thamkhao['tk_hoaly'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tk_hoaly');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="tk_hoatchat" class="col-sm-2 control-label"><?php echo lang('tk_hoatchat').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'tk_hoatchat',
                                 'id'           => 'tk_hoatchat',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('tk_hoatchat',$thamkhao['tk_hoatchat'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tk_hoatchat');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="tk_link" class="col-sm-2 control-label"><?php echo lang('tk_link').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <span class="btn btn-primary btn-file m-r-10 waves-effect waves-button waves-float">
                            <span class="fileinput-new">Chọn file</span>
                            <span class="fileinput-exists">Đổi</span>
                            <input type="file" name="tk_link" id="tk_link">
                        </span>
                        <span class="fileinput-filename"></span>
                        <a href="#" class="close fileinput-exists" data-dismiss="fileinput">×</a>
                        <?php if($thamkhao['tk_link'] != "") :?>
                        <span class="c-green"><i class="md md-cloud-done md-2x"></i> <?php  echo $thamkhao['tk_link']; ?></span>
                    <?php endif; ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tk_link');?> </small>
                </div>
            </div>

            
          
            <div class="form-group">
                <label  for="tk_create" class="col-sm-2 control-label"><?php echo lang('tk_create').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'tk_create',
                                 'id'           => 'tk_create',                       
                                 'class'        => 'form-control date-picker ',
                                 
                                 ),
                                 set_value('tk_create',$thamkhao['tk_create'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tk_create');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="tk_user" class="col-sm-2 control-label"><?php echo lang('tk_user').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'tk_user',
                                 'id'           => 'tk_user',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('tk_user',$thamkhao['tk_user'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tk_user');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="tk_note" class="col-sm-2 control-label"><?php echo lang('tk_note').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'tk_note',
                                 'id'           => 'tk_note',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('tk_note',$thamkhao['tk_note'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('tk_note');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10">
                    <a href="<?php echo site_url('thamkhao'); ?>" class="btn btn-primary btn-sm" ><?php echo lang('actions_back');?></a>
                    <button class="btn btn-primary btn-sm" type="submit"><?php echo lang('actions_save');?></button>
                </div>
            </div>

        </div>
    <?php echo form_close(); ?>  
</div>
<div class="col-sm-1"></div>
</div>