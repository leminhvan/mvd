
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-xs-12 col-sm-6">
<div class="card">
    <?php echo form_open(site_url( $action),'id="form_menu" class="form-horizontal" role="form"'); ?> 
        <div class="card-header  bgm-cyan">
            <h2 class="text-center"><?php if(strpos(current_url(), 'add')) {echo lang('box_title_create');} else{echo lang('box_title_edit');} ?></h2>
        </div>
        
        <div class="card-body card-padding">
            <div class="form-group">
                <label  for="menu_title" class="col-sm-3 control-label"><?php echo lang('menu_title'); ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php                  
                             echo form_input(
                                      array(
                                       'name'         => 'menu_title',
                                       'id'           => 'menu_title',                       
                                       'class'        => 'form-control input-sm required',
                                       'maxlength'=>'255',
                                       'autocomplete' => 'off'
                                       ),
                                       set_value('menu_title',$menu['menu_title'])
                                 );             
                            ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('menu_title');?> </small>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-3 control-label" for="menu_parent_id"><?php echo lang('menu_parent'); ?></label>
                <div class="col-sm-8">
                      <div class="select">
                          <?php          
                               $options = $parent_menu;
                               $js = 'class="form-control"  id="menu_parent_id" ';
                               if ($menu['menu_parent_id']) {
                                   $selected = $menu['menu_parent_id'];
                                } else{
                                  $selected = $options[0];
                                }
                               echo form_dropdown('menu_parent_id', $options, $selected, $js);     
                              ?>
                       </div>
                       <small class="help-block c-red"> <?php echo form_error('menu_parent_id');?> </small>
                </div>
            </div>
            
            <div class="form-group">
                <label  class="col-sm-3 control-label" for="menu_url"><?php echo lang('menu_url'); ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php                  
                           echo form_input(
                                    array(
                                     'name'         => 'menu_url',
                                     'id'           => 'menu_url',                       
                                     'class'        => 'form-control input-sm ',
                                     'maxlength'=>'255',
                                       'autocomplete' => 'off'
                                     ),
                                     set_value('menu_url',$menu['menu_url'])
                               );             
                          ?>
                         
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('menu_url');?> </small>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-3 control-label" for="menu_index"><?php echo lang('menu_index'); ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php                  
                         echo form_input(
                                  array(
                                   'name'         => 'menu_index',
                                   'id'           => 'menu_index',                       
                                   'class'        => 'form-control required',
                                   'maxlength'=>'255',
                                       'autocomplete' => 'off'
                                   ),
                                   set_value('menu_index',$menu['menu_index'])
                             );             
                        ?>
                       
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('menu_index');?> </small>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-3 control-label" for="menu_icon"><?php echo lang('menu_icon'); ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php   
                          $a = $menu['menu_icon'];
                          $a1 = str_replace('&lt', '<', $a)  ;
                          $a2 = str_replace('&gt', '>', $a1) ;            
                           echo form_textarea(
                                    array(
                                     'name'         => 'menu_icon',
                                     'id'           => 'menu_icon',                       
                                     'class'        => 'form-control auto-size',
                                     'style'        =>'overflow: hidden; word-wrap: break-word; height: 32px;',
                                     ),
                                     set_value('menu_icon',$menu['menu_icon'], FALSE)
                               );   
                          ?>
                         
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('menu_icon');?> </small>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-3 control-label" for="module_name"><?php echo lang('module_name'); ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php                  
                         echo form_input(
                                  array(
                                   'name'         => 'module_name',
                                   'id'           => 'module_name',                       
                                   'class'        => 'form-control required',
                                   'maxlength'=>'255',
                                       'autocomplete' => 'off'
                                   ),
                                   set_value('module_name',$menu['module_name'])
                             );             
                        ?>
                       
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('module_name');?> </small>
                </div>
            </div>

          

            <div class="form-group">
                <div class="col-sm-offset-4 col-xs-offset-4  col-xs-8 col-sm-8">
                    <a href="<?php echo site_url('hethong/sys_menu'); ?>" class="btn btn-primary btn-sm" ><?php echo lang('actions_back');?></a>
                    <button class="btn btn-primary btn-sm" type="submit"><?php echo lang('actions_save');?></button>
                </div>
            </div>

        </div>
    <?php echo form_close(); ?>  
</div>
<div class="col-sm-3"></div>
</div>
