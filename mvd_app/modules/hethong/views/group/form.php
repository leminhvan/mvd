<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-xs-12 col-sm-6">
<div class="card">
    <?php echo form_open(site_url($action), 'id="form_groups" class="form-horizontal" role="form"'); ?>
        <div class="card-header">
            <h2><?php if(strpos(current_url(), 'add')) {echo lang('box_title_create');} else{echo lang('box_title_edit');} ?></h2>
        </div>
        
        <div class="card-body card-padding">
          
            <div class="form-group">
                <label  for="name" class="col-sm-2 control-label"><?php echo lang('name').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'name',
                                 'id'           => 'name',                       
                                 'class'        => 'form-control   required',
                                 'maxlength'=>'20'
                                 ),
                                 set_value('name',$groups['name'])
                           );             
                        ?>
                         <?php echo form_error('name');?>
                    </div>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="description" class="col-sm-2 control-label"><?php echo lang('description').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'description',
                                 'id'           => 'description',                       
                                 'class'        => 'form-control  ',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('description',$groups['description'])
                           );             
                        ?>
                         <?php echo form_error('description');?>
                    </div>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="bgcolor" class="col-sm-2 control-label"><?php echo lang('bgcolor').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'bgcolor',
                                 'id'           => 'bgcolor',                       
                                 'class'        => 'form-control  ',
                                 'maxlength'=>'10'
                                 ),
                                 set_value('bgcolor',$groups['bgcolor'])
                           );             
                        ?>
                         <?php echo form_error('bgcolor');?>
                    </div>
                </div>
            </div>
          
 
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="<?php echo site_url('hethong/groups'); ?>" class="btn btn-primary btn-sm" ><?php echo lang('actions_back');?></a>
                    <button class="btn btn-primary btn-sm" type="submit"><?php echo lang('actions_save');?></button>
                </div>
            </div>

        </div>
    <?php echo form_close(); ?>  
</div>
<div class="col-sm-3"></div>
</div>