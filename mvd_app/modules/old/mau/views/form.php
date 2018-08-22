<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-xs-12 col-sm-6">
<div class="card">
    <?php echo form_open(site_url($action), 'id="form_bvtvmau" class="form-horizontal" role="form"'); ?>
        <div class="card-header bgm-cyan">
            <h2 class="text-center"><?php if(strpos(current_url(), 'add')) {echo lang('box_title_create');} else{echo lang('box_title_edit');} ?></h2>
        </div>
        
        <div class="card-body card-padding">
          
            <div class="form-group">
                <label  for="mau_chitieu" class="col-sm-2 control-label"><?php echo lang('mau_chitieu').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-5">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'mau_chitieu',
                                 'id'           => 'mau_chitieu',                       
                                 'class'        => 'form-control  autoten typehead required',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('mau_chitieu',$bvtvmau['mau_chitieu'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('mau_chitieu');?> </small>
                </div>

                <label  for="mau_chitieu" class="col-sm-2 control-label"><?php echo lang('mau_luutru').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-3">
                        <div class="select">  
                            <?php                          
                                $arr_luutru = array(null => 'Không', 54 => '54 độ', 0 => '0 độ');    
                                echo form_dropdown('mau_luutru',$arr_luutru, null, 'class = "form-control "');             
                              ?>
                             
                         </div>
                    <small class="help-block c-red"> <?php echo form_error('mau_luutru');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="mau_code" class="col-sm-2 control-label"><?php echo lang('mau_code').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php   
                        $code = 'VICB4'.date('y').'0';
                        if($bvtvmau['mau_code'] !='') {$code = $bvtvmau['mau_code'] ;}                
                          echo form_input(
                                array(
                                 'name'         => 'mau_code',
                                 'id'           => 'mau_code',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 'spellcheck'=>"false",
                                 'maxlength'=>'100',
                                 'pattern' =>".{12}",
                                 'required title' => "Mã mẫu chưa đúng định dạng"
                                 ),
                                 set_value('mau_code',$code)
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('mau_code');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="mau_ngaynhan" class="col-sm-2 control-label"><?php echo lang('mau_ngaynhan').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'mau_ngaynhan',
                                 'id'           => 'mau_ngaynhan',                       
                                 'class'        => 'form-control date-picker ',
                                 'maxlength'=>'50'
                                 ),
                                 set_value('mau_ngaynhan',$bvtvmau['mau_ngaynhan'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('mau_ngaynhan');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="mau_ngaytra" class="col-sm-2 control-label"><?php echo lang('mau_ngaytra').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'mau_ngaytra',
                                 'id'           => 'mau_ngaytra',                       
                                 'class'        => 'form-control date-picker  required',
                                 'maxlength'=>'50'
                                 ),
                                 set_value('mau_ngaytra',$bvtvmau['mau_ngaytra'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('mau_ngaytra');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="mau_donvi" class="col-sm-2 control-label"><?php echo lang('mau_donvi').' '; ?></label>
                <div class="col-sm-10">
                    <div class="select">                                
                          <?php   
                          if($bvtvmau['mau_donvi'] != ''){
                            echo form_dropdown('mau_donvi',$donvi, $bvtvmau['mau_donvi'], 'class = "form-control "');   
                          }
                           else{
                            echo form_dropdown('mau_donvi',$donvi, '%', 'class = "form-control "');   
                          }              
                          ?>
                         
                     </div>
                    <small class="help-block c-red"> <?php echo form_error('mau_donvi');?> </small>
                </div>
            </div>

            <div class="form-group">
                <label  for="mau_dang" class="col-sm-2 control-label"><?php echo lang('mau_dang').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'mau_dang',
                                 'id'           => 'mau_dang',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 ),
                                 set_value('mau_dang',$bvtvmau['mau_dang'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('mau_dang');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="mau_note" class="col-sm-2 control-label"><?php echo lang('mau_note').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'mau_note',
                                 'id'           => 'mau_note',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 ),
                                 set_value('mau_note',$bvtvmau['mau_note'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('mau_note');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="<?php echo site_url('mau/bvtvmau'); ?>" class="btn btn-primary btn-sm" ><?php echo lang('actions_back');?></a>
                    <button class="btn btn-primary btn-sm" type="submit"><?php echo lang('actions_save');?></button>
                </div>
            </div>

        </div>
    <?php echo form_close(); ?>  
</div>
<div class="col-sm-3"></div>
</div>