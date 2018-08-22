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
                <label  for="chitieu" class="col-sm-2 control-label"><?php echo lang('chitieu').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'chitieu',
                                 'id'           => 'chitieu',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('chitieu',$bvtvmau['chitieu'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('chitieu');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="code" class="col-sm-2 control-label"><?php echo lang('code').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'code',
                                 'id'           => 'code',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('code',$bvtvmau['code'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('code');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="type" class="col-sm-2 control-label"><?php echo lang('type').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'type',
                                 'id'           => 'type',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'2'
                                 ),
                                 set_value('type',$bvtvmau['type'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('type');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="ngaynhan" class="col-sm-2 control-label"><?php echo lang('ngaynhan').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'ngaynhan',
                                 'id'           => 'ngaynhan',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 
                                 ),
                                 set_value('ngaynhan',$bvtvmau['ngaynhan'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('ngaynhan');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="ngaytra" class="col-sm-2 control-label"><?php echo lang('ngaytra').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'ngaytra',
                                 'id'           => 'ngaytra',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 
                                 ),
                                 set_value('ngaytra',$bvtvmau['ngaytra'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('ngaytra');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="trangthai" class="col-sm-2 control-label"><?php echo lang('trangthai').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'trangthai',
                                 'id'           => 'trangthai',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('trangthai',$bvtvmau['trangthai'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('trangthai');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="ketqua" class="col-sm-2 control-label"><?php echo lang('ketqua').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'ketqua',
                                 'id'           => 'ketqua',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('ketqua',$bvtvmau['ketqua'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('ketqua');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="donvi" class="col-sm-2 control-label"><?php echo lang('donvi').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'donvi',
                                 'id'           => 'donvi',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('donvi',$bvtvmau['donvi'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('donvi');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="dang" class="col-sm-2 control-label"><?php echo lang('dang').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'dang',
                                 'id'           => 'dang',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('dang',$bvtvmau['dang'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('dang');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="luutru" class="col-sm-2 control-label"><?php echo lang('luutru').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'luutru',
                                 'id'           => 'luutru',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'1'
                                 ),
                                 set_value('luutru',$bvtvmau['luutru'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('luutru');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="note" class="col-sm-2 control-label"><?php echo lang('note').' '; ?></label>
                <div class="col-sm-10">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'note',
                                 'id'           => 'note',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 
                                 ),
                                 set_value('note',$bvtvmau['note'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('note');?> </small>
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