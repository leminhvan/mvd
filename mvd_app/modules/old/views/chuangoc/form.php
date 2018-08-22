<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-xs-12 col-sm-6">
<div class="card">
    <?php echo form_open(site_url($action), 'id="form_chuangoc" class="form-horizontal" role="form"'); ?>
        <div class="card-header bgm-cyan">
            <h2 class="text-center"><?php if(strpos(current_url(), 'add')) {echo lang('box_title_create');} else{echo lang('box_title_edit');} ?></h2>
        </div>
        
        <div class="card-body card-padding">
          
            <div class="form-group">
                <label  for="hcgoc_name" class="col-sm-2 control-label"><?php echo lang('hcgoc_name').'<span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                         <?php                  
                       echo form_input(
                                array(
                                 'name'         => 'hcgoc_name',
                                 'id'           => 'hcgoc_name',                       
                                 'class'        => 'form-control autoten typehead required',
                                 'maxlength'=>'255',
                                 'spellcheck' => "false"
                                 ),
                                 set_value('hcgoc_name',$chuangoc['hcgoc_name'])
                           );             
                      ?>
                     
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('hcgoc_name');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="hcgoc_vicb_code" class="col-sm-2 control-label"><?php echo lang('hcgoc_vicb_code').'<span class="c-red">*</span> '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php    
                        $code = '';
                        if($chuangoc['hcgoc_vicb_code'] !='') {$code = $chuangoc['hcgoc_vicb_code'] ;}             
                          echo form_input(
                                array(
                                 'name'         => 'hcgoc_vicb_code',
                                 'id'           => 'hcgoc_vicb_code',                       
                                 'class'        => 'form-control  required',
                                 'maxlength'=>'45',
                                 'autocomplete' => 'off'
                                 ),
                                 set_value('hcgoc_vicb_code',$code)
                           );             
                        ?>
                         
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('hcgoc_vicb_code');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="hcgoc_nhasx" class="col-sm-2 control-label"><?php echo lang('hcgoc_nhasx').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'hcgoc_nhasx',
                                 'id'           => 'hcgoc_nhasx',                       
                                 'class'        => 'form-control  ',
                                 'maxlength'=>'255',
                                 'autocomplete' => 'off'
                                 ),
                                 set_value('hcgoc_nhasx',$chuangoc['hcgoc_nhasx'])
                           );             
                        ?>
                         
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('hcgoc_nhasx');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="hcgoc_code" class="col-sm-2 control-label"><?php echo lang('hcgoc_code').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'hcgoc_code',
                                 'id'           => 'hcgoc_code',                       
                                 'class'        => 'form-control  ',
                                 'maxlength'=>'45',
                                 'autocomplete' => 'off'
                                 ),
                                 set_value('hcgoc_code',$chuangoc['hcgoc_code'])
                           );             
                        ?>
                         
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('hcgoc_code');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="hcgoc_lot" class="col-sm-2 control-label"><?php echo lang('hcgoc_lot').'<span class="c-red">*</span> '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'hcgoc_lot',
                                 'id'           => 'hcgoc_lot',                       
                                 'class'        => 'form-control  required',
                                 'maxlength'=>'45',
                                 'autocomplete' => 'off'
                                 ),
                                 set_value('hcgoc_lot',$chuangoc['hcgoc_lot'])
                           );             
                        ?>
                         
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('hcgoc_lot');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="hcgoc_hamluong" class="col-sm-2 control-label"><?php echo lang('hcgoc_hamluong').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'hcgoc_hamluong',
                                 'id'           => 'hcgoc_hamluong',                       
                                 'class'        => 'form-control  ',
                                 'maxlength'=>'45',
                                 'autocomplete' => 'off'
                                 ),
                                 set_value('hcgoc_hamluong',$chuangoc['hcgoc_hamluong'])
                           );             
                        ?>
                        
                    </div>
                    <small class="help-block c-red">  <?php echo form_error('hcgoc_hamluong');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="hcgoc_luongnhap" class="col-sm-2 control-label"><?php echo lang('hcgoc_luongnhap').'<span class="c-red">*</span> '; ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php      
                            $donvi = explode('_', $chuangoc['hcgoc_luongnhap']);
                            $check = '';
                            if(count($donvi) >1){
                                $check =$donvi[0];
                            }else{
                                $check =    $chuangoc['hcgoc_luongnhap'];
                            }            
                          echo form_input(
                                array(
                                 'name'         => 'hcgoc_luongnhap',
                                 'id'           => 'hcgoc_luongnhap',                       
                                 'class'        => 'form-control  required',
                                 'maxlength'=>'45',
                                 'autocomplete' => 'off'
                                 ),
                                 set_value('hcgoc_luongnhap',$check)
                           );             
                        ?>
                         
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('hcgoc_luongnhap');?> </small>
                </div>
                <div class="col-sm-2">   
                    <div class="select">                                
                          <?php   
                          if(count($donvi) >1){
                            echo form_dropdown('hcgoc_donvi',$chuangoc['hcgoc_donvi'], $donvi[1], 'class = "form-control "');   
                          } else{
                            echo form_dropdown('hcgoc_donvi',$chuangoc['hcgoc_donvi'], 'mg', 'class = "form-control "');   
                          }              
                            unset($donvi);      
                          ?>
                         
                     </div>
                     <small class="help-block c-red"> <?php echo form_error('hcgoc_donvi');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="hcgoc_expday" class="col-sm-2 control-label"><?php echo lang('hcgoc_expday').' <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'hcgoc_expday',
                                 'id'           => 'hcgoc_expday',                       
                                 'class'        => 'form-control  date-picker required',
                                 'data-toggle'  => 'dropdown',
                                 'placeholder'  => "Chọn ngày...",
                                 'autocomplete' => "off",
                                 'maxlength'=>'25',
                                 ),
                                 set_value('hcgoc_expday',$chuangoc['hcgoc_expday'])
                           );             
                        ?>
                         
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('hcgoc_expday');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="hcgoc_ngaynhap" class="col-sm-2 control-label"><?php echo lang('hcgoc_ngaynhap').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'hcgoc_ngaynhap',
                                 'id'           => 'hcgoc_ngaynhap',                       
                                 'class'        => 'form-control  date-picker',
                                 'data-toggle'  => 'dropdown',
                                 'placeholder'  => "Chọn ngày...",
                                 'autocomplete' => "off",
                                 'maxlength'=>'25'
                                 ),
                                 set_value('hcgoc_ngaynhap',$chuangoc['hcgoc_ngaynhap'])
                           );             
                        ?>
                        
                    </div>
                    <small class="help-block c-red">  <?php echo form_error('hcgoc_ngaynhap');?></small>
                </div>
            </div>
<?php if(strpos(current_url(), 'edit')) : ?>          
            <div class="form-group">
                <label  for="hcgoc_nguoinhap" class="col-sm-2 control-label"><?php echo lang('hcgoc_nguoinhap').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'hcgoc_nguoinhap',
                                 'id'           => 'hcgoc_nguoinhap',                       
                                 'class'        => 'form-control  ',
                                 'maxlength'=>'45',
                                 'autocomplete' => 'off'
                                 ),
                                 set_value('hcgoc_nguoinhap',$chuangoc['hcgoc_nguoinhap'])
                           );             
                        ?>
                         
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('hcgoc_nguoinhap');?></small>
                </div>
            </div>
<?php else:                             echo form_input(
                                array(
                                 'name'         => 'hcgoc_nguoinhap',
                                 'id'           => 'hcgoc_nguoinhap',                       
                                 'class'        => 'form-control  ',
                                 'type'=>'hidden'
                                 ),
                                 set_value('hcgoc_nguoinhap', $this->ion_auth->user()->row()->username)
                           ); 


 endif;?>
            <div class="form-group">
                <label  for="hcgoc_baoquan" class="col-sm-2 control-label"><?php echo lang('hcgoc_baoquan').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'hcgoc_baoquan',
                                 'id'           => 'hcgoc_baoquan',                       
                                 'class'        => 'form-control  ',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('hcgoc_baoquan',$chuangoc['hcgoc_baoquan'])
                           );             
                        ?>
                         
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('hcgoc_baoquan');?> </small>
                </div>
            </div>
            <div class="form-group">
                <label  for="hcgoc_lab" class="col-sm-2 control-label"><?php echo lang('hcgoc_lab').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'hcgoc_lab',
                                 'id'           => 'hcgoc_lab',                       
                                 'class'        => 'form-control  ',
                                 'maxlength'=>'45'
                                 ),
                                 set_value('hcgoc_lab',$chuangoc['hcgoc_lab'])
                           );             
                        ?>
                         
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('hcgoc_lab');?> </small>
                </div>
            </div>
            <div class="form-group">
                <label  for="hcgoc_dathang" class="col-sm-2 control-label"><?php echo lang('hcgoc_dathang').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">

                         <?php   
                              $checked = FALSE;  
                              if(isset($chuangoc['hcgoc_dathang']) AND $chuangoc['hcgoc_dathang'] ==1 ){
                                $checked = TRUE;
                              }else{
                                $checked =FALSE;
                              }
                               echo form_checkbox(
                                        array(
                                         'name'         => 'hcgoc_dathang',
                                         'id'           => 'hcgoc_dathang',                       
                                         'value'        => '1',
                                         'checked'      => $checked,
                                         'style'        => 'margin:10px'
                                         )                           );             
                          ?>
                         <?php echo form_error('hcgoc_dathang');?>
                    </div>
                </div>
            </div>
 
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10 col-xs-offset-5 col-xs-10">
                    <a href="<?php 
                        if(strpos(current_url(), 'true')){
                            echo site_url('hoachat/chuangoc/hc_saphethan'); 
                        }else{
                            echo site_url('hoachat/chuangoc'); 
                        }
                        ?>" class="btn btn-primary btn-sm" >
                        <?php echo lang('actions_back');?>
                    </a>
                    <button class="btn btn-primary btn-sm" type="submit"><?php echo lang('actions_save');?></button>
                </div>
            </div>

        </div><!--end card -->

    <?php echo form_close(); ?>  
</div>

</div>
<div class="col-sm-3"></div>
</div>

