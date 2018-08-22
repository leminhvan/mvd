<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-xs-12 col-sm-6">
<div class="card">
    <?php echo form_open(site_url( $action), 'id="form_donvi" class="form-horizontal" role="form"'); ?>
        <div class="card-header">
            <h2><?php if(strpos(current_url(), 'add')) {echo lang('box_title_create');} else{echo lang('box_title_edit');} ?></h2>
        </div>
        
        <div class="card-body card-padding">
          
            <div class="form-group">
                <label  for="donvi_kyhieu" class="col-sm-2 control-label"><?php echo lang('donvi_kyhieu').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'donvi_kyhieu',
                                 'id'           => 'donvi_kyhieu',                       
                                 'class'        => 'form-control   required',
                                 'maxlength'=>'15',
                                 'autocomplete' => 'off',
                                 ),
                                 set_value('donvi_kyhieu',$donvi['donvi_kyhieu'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('donvi_kyhieu');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="donvi_mota" class="col-sm-2 control-label"><?php echo lang('donvi_mota').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'donvi_mota',
                                 'id'           => 'donvi_mota',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'15'
                                 ),
                                 set_value('donvi_mota',$donvi['donvi_mota'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('donvi_mota');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="<?php echo site_url('hethong/donvi'); ?>" class="btn btn-primary btn-sm" ><?php echo lang('actions_back');?></a>
                    <button class="btn btn-primary btn-sm" type="submit"><?php echo lang('actions_save');?></button>
                </div>
            </div>

        </div>
    <?php echo form_close(); ?>  
</div>
<div class="col-sm-3"></div>
</div>