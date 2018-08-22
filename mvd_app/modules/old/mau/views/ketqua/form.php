<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-xs-12 col-sm-6">
        <div class="card">
            <div class="card-header bgm-cyan" style="padding: 10px;">
                <h2 class="text-center">TÍNH TOÁN KẾT QUẢ</h2>
            </div>
          
            <div class="card-body card-padding">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Phương pháp</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" id="step-hoachat" type="button" class="btn btn-default btn-circle " >2</a>
                            <p>Hóa chất</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-3" id="step-ketqua" type="button" class="btn btn-default btn-circle " >3</a>
                            <p>Tính kết quả</p>
                        </div>
                    </div>
                </div><!-- end stepwizard -->
        <?php $hidden = array('mau_id' => $mau_id); 
                    echo form_open(site_url($action), 'id="form_bvtv_ketqua" class="form-horizontal" role="form"', $hidden); ?>
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  for="mau_pp" class="col-sm-4 control-label">Phương pháp thử</label>
                                    <div class="col-sm-5">
                                        <div class="fg-line">
                                            <?php                  
                                              echo form_input(
                                                    array(
                                                     'name'         => 'mau_pp',
                                                     'id'           => 'mau_pp',                       
                                                     'class'        => 'form-control autoten typehead',
                                                     'autocomplete' => 'off',
                                                     'spellcheck'   => 'false'
                                                     ),
                                                     set_value('s_chuan1',$mau_pp)
                                               );             
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center" style="padding: 10px;">
                            <a href="<?php echo site_url('mau/bvtvmau'); ?>" class="btn btn-primary btn-sm" >Quay về trang mẫu</a>
                            <button class="btn btn-primary btn-sm nextBtn" type="button" >Bước tiếp theo</button>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-2">
                        <div class="col-md-12">
                            
                        </div>
                        <div class="col-sm-12 text-center" style="padding: 10px;">
                            <a href="<?php echo site_url('mau/bvtvmau'); ?>" class="btn btn-primary btn-sm" >Quay về trang mẫu</a>
                            <button class="btn btn-primary btn-sm nextBtn" type="button" >Bước tiếp theo</button>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-3">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label  for="s_chuan1" class="col-sm-2 control-label"><?php echo lang('s_chuan1').'  <span class="c-red">*</span>'; ?></label>
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

                                <label  id="s_chuantb" class="col-sm-2 control-label c-blue" style="text-align: left;"></label>
                                
                            </div>
                        <hr>    
                            <div class="form-group">
                                <label  for="m_mau" class="col-sm-2 control-label"><?php echo lang('m_mau').'  <span class="c-red">*</span>'; ?></label>
                                <div class="col-sm-2">
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

                                <label  for="v_mau" class="col-sm-2 control-label"><?php echo lang('v_mau').'  <span class="c-red">*</span>'; ?></label>
                                <div class="col-sm-2">
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
                            
                                <label  for="s_mau" class="col-sm-2 control-label"><?php echo lang('s_mau').'  <span class="c-red">*</span>'; ?></label>
                                <div class="col-sm-2">
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
                          <hr>
                            <div class="form-group">
                                <label  for="hl_dk" class="col-sm-2 control-label"><?php echo lang('hl_dk').' '; ?></label>
                                <div class="col-sm-2">
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

                                <label  for="dk_donvi" class="col-sm-2 control-label"><?php echo lang('dk_donvi').' '; ?></label>
                                <div class="col-sm-2">
                                    <div class="select">                                
                                          <?php 
                                          if(isset($mau_dv_hl)){$check = $mau_dv_hl;}  else{$check ='%w/w';}
                                            echo form_dropdown('dk_donvi',$donvi, $check, 'class = "form-control tinh_kq" id="dk_donvi"');   
                                          ?>
                                     </div>
                                </div>

                                <label  for="ngay_tao" class="col-sm-2 control-label"><?php echo lang('ngay_tao').'  <span class="c-red">*</span>'; ?></label>
                                <div class="col-sm-2">
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
                          <hr>
                            <div class="col-sm-12 text-center" id="kq">

                            </div>
                            
                         <hr>
                        </div>


                        <div class="col-sm-12 text-center" style="padding: 10px;">
                            <a href="<?php echo site_url('mau/bvtvmau'); ?>" class="btn btn-primary btn-sm" >Quay về trang mẫu</a>
                            <button class="btn btn-primary btn-sm" type="submit">Lưu lại thao tác</button>
                        </div>
                    </div>
        <?php echo form_close(); ?>  
                
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>

