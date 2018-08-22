<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-xs-12 col-sm-6">
        <div class="card">

            <?php $hidden = array('mau_id' => $mau_id); 
                    echo form_open(site_url($action), 'id="form_bvtv_ketqua" class="form-horizontal" role="form"', $hidden); ?>
                <div class="card-header bgm-cyan">
                    <h2 class="text-center"><?php if(strpos(current_url(), 'add')) {echo lang('box_title_create');} else{echo lang('box_title_edit');} ?></h2>
                     <!--action menu -->
                    <ul class="actions actions-alt" >
                        <li data-toggle="tooltip" data-placement="left" title="Hóa chất" >
                            <a href="#"><i class="md md-add"></i> </a> 
                        </li>
                    </ul>
                    <!--end action menu -->

                </div>
                
                <div class="card-body card-padding">
                    <div class="form-group">
                        <label  for="chuan_id" class="col-sm-3 control-label"><?php echo lang('chuan_id').'  <span class="c-red">*</span>'; ?></label>
                        <div class="col-sm-8">
                            <div class="fg-line">
                                <?php                  
                                  echo form_input(
                                        array(
                                         'name'         => 'chuan_id',
                                         'id'           => 'chuan_id',                       
                                         'class'        => 'form-control autoten typehead  required tinh_kq',
                                         'autocomplete' => 'off',
                                         'maxlength'=>'11'
                                         ),
                                         set_value('chuan_id',$bvtv_ketqua['chuan_id'])
                                   );             
                                ?>
                            </div>
                            <small class="help-block c-red"> <?php echo form_error('chuan_id');?> </small>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label  for="s_chuan1" class="col-sm-3 control-label"><?php echo lang('s_chuan1').'  <span class="c-red">*</span>'; ?></label>
                        <div class="col-sm-3">
                            <div class="fg-line">
                                <?php                  
                                  echo form_input(
                                        array(
                                         'name'         => 's_chuan1',
                                         'id'           => 's_chuan1',                       
                                         'class'        => 'form-control tinh_kq  required',
                                         'autocomplete' => 'off',
                                         
                                         ),
                                         set_value('s_chuan1',$bvtv_ketqua['s_chuan1'])
                                   );             
                                ?>
                            </div>
                            <small class="help-block c-red"> <?php echo form_error('s_chuan1');?> </small>
                        </div>
                        <label  for="s_chuan2" class="col-sm-2 control-label"><?php echo lang('s_chuan2').'  <span class="c-red">*</span>'; ?></label>
                        <div class="col-sm-3">
                            <div class="fg-line">
                                <?php                  
                                  echo form_input(
                                        array(
                                         'name'         => 's_chuan2',
                                         'id'           => 's_chuan2',                       
                                         'class'        => 'form-control tinh_kq  required',
                                         'autocomplete' => 'off',
                                         
                                         ),
                                         set_value('s_chuan2',$bvtv_ketqua['s_chuan2'])
                                   );             
                                ?>
                            </div>
                            <small class="help-block c-red"> <?php echo form_error('s_chuan2');?> </small>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label  for="m_mau" class="col-sm-3 control-label"><?php echo lang('m_mau').'  <span class="c-red">*</span>'; ?></label>
                        <div class="col-sm-8">
                            <div class="fg-line">
                                <?php                  
                                  echo form_input(
                                        array(
                                         'name'         => 'm_mau',
                                         'id'           => 'm_mau',                       
                                         'class'        => 'form-control tinh_kq  required',
                                         'autocomplete' => 'off',
                                         
                                         ),
                                         set_value('m_mau',$bvtv_ketqua['m_mau'])
                                   );             
                                ?>
                            </div>
                            <small class="help-block c-red"> <?php echo form_error('m_mau');?> </small>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label  for="v_mau" class="col-sm-3 control-label"><?php echo lang('v_mau').'  <span class="c-red">*</span>'; ?></label>
                        <div class="col-sm-8">
                            <div class="fg-line">
                                <?php                  
                                  echo form_input(
                                        array(
                                         'name'         => 'v_mau',
                                         'id'           => 'v_mau',                       
                                         'class'        => 'form-control tinh_kq  required',
                                         'autocomplete' => 'off',
                                         
                                         ),
                                         set_value('v_mau',$bvtv_ketqua['v_mau'])
                                   );             
                                ?>
                            </div>
                            <small class="help-block c-red"> <?php echo form_error('v_mau');?> </small>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label  for="s_mau" class="col-sm-3 control-label"><?php echo lang('s_mau').'  <span class="c-red">*</span>'; ?></label>
                        <div class="col-sm-8">
                            <div class="fg-line">
                                <?php                  
                                  echo form_input(
                                        array(
                                         'name'         => 's_mau',
                                         'id'           => 's_mau',                       
                                         'class'        => 'form-control  tinh_kq required',
                                         'autocomplete' => 'off',
                                         
                                         ),
                                         set_value('s_mau',$bvtv_ketqua['s_mau'])
                                   );             
                                ?>
                            </div>
                            <small class="help-block c-red"> <?php echo form_error('s_mau');?> </small>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label  for="hl_dk" class="col-sm-3 control-label"><?php echo lang('hl_dk').' '; ?></label>
                        <div class="col-sm-5">
                            <div class="fg-line">
                                <?php                  
                                  echo form_input(
                                        array(
                                         'name'         => 'hl_dk',
                                         'id'           => 'hl_dk',                       
                                         'class'        => 'form-control tinh_kq ',
                                         'autocomplete' => 'off',
                                         'maxlength'=>'11'
                                         ),
                                         set_value('hl_dk',$bvtv_ketqua['hl_dk'])
                                   );             
                                ?>
                            </div>
                            <small class="help-block c-red"> <?php echo form_error('hl_dk');?> </small>
                        </div>

                        <div class="col-sm-3">
                            <div class="select">                                
                                  <?php 
                                  if(isset($mau_dv_hl)){$check = $mau_dv_hl;}  else{$check ='%w/w';}
                                    echo form_dropdown('dk_donvi',$donvi, $check, 'class = "form-control tinh_kq"');   
                                  ?>
                             </div>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label  for="ngay_tao" class="col-sm-3 control-label"><?php echo lang('ngay_tao').'  <span class="c-red">*</span>'; ?></label>
                        <div class="col-sm-8">
                            <div class="fg-line">
                                <?php                  
                                  echo form_input(
                                        array(
                                         'name'         => 'ngay_tao',
                                         'id'           => 'ngay_tao',                       
                                         'class'        => 'form-control date-picker  required',
                                         'maxlength'=>'50'
                                         ),
                                         set_value('ngay_tao',$bvtv_ketqua['ngay_tao'])
                                   );             
                                ?>
                            </div>
                            <small class="help-block c-red"> <?php echo form_error('ngay_tao');?> </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 text-center c-green" id="kq">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <a href="<?php echo site_url('mau/bvtvmau'); ?>" class="btn btn-primary btn-sm" ><?php echo lang('actions_back');?></a>
                            <button class="btn btn-primary btn-sm" type="submit"><?php echo lang('actions_save');?></button>
                        </div>
                    </div>

                </div>
            <?php echo form_close(); ?>  
        </div>
    </div>
<div class="col-sm-3"></div>
</div>

