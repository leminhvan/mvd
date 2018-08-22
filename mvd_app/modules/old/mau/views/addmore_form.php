<style type="text/css">
    .input-sm{
        font-size: 11px!important;
    }
</style>
<?php //var_dump($nenmau);?>
<div class="card" >
    <div class="card-header bgm-cyan">
            <h2 class="text-center"><?php if(strpos(current_url(), 'add')) {echo lang('box_title_create');} else{echo lang('box_title_edit');} ?></h2>
        </div>
    
    <div class="card-body card-padding">
        <?php echo form_open(site_url($action), 'id="form_bvtvmau"'); ?>
        <div class="row">
            <div class="col-xs-2 text-center">
                <h5>
                    <?php echo lang('mau_chitieu').' '; ?><span class="badge badge-pill" id="chitieu-fill" style="height: 12px"> <i class="md md-keyboard-arrow-down"></i> </span>
                </h5>
            </div>
            <div class="col-xs-1 text-center"><h5><?php echo lang('mau_luutru'); ?></h5></div>
            <div class="col-xs-1 text-center">
                <h5>
                    <?php echo lang('mau_code').' '; ?><span class="badge badge-pill" id="code-fill" style="height: 12px"> <i class="md md-keyboard-arrow-down"></i> </span>
                </h5>
            </div>
            <div class="col-xs-2 text-center"><h5><?php echo lang('mau_ngaynhan'); ?></h5></div>
            <div class="col-xs-2 text-center">
                <h5>
                    <?php echo lang('mau_ngaytra').' '; ?><span class="badge badge-pill" id="date-fill" style="height: 12px"><i class="md md-keyboard-arrow-down"></i></span>
                </h5>
            </div>
            <div class="col-xs-1 text-center">
                <h5>
                    <?php echo lang('mau_donvi').' '; ?><span class="badge badge-pill" id="donvi-fill" style="height: 12px"> <i class="md md-keyboard-arrow-down"></i> </span>
                </h5>
            </div>
            <div class="col-xs-2 text-center">
                <h5>
                    <?php echo lang('mau_dang').' '; ?><span class="badge badge-pill" id="donvi-fill" style="height: 12px"> <i class="md md-keyboard-arrow-down"></i> </span>
                </h5>
            </div>
            <div class="col-xs-1 text-left"><h5><?php echo lang('mau_note'); ?></h5></div>
        </div>

        <?php for($i=1;$i<=$soluong;$i++):?>
        <div class="row">
            <div class="col-xs-2">
                <div class="fg-line form-group">
                    <input type="text" class="form-control input-sm  autoten typehead " required name="mau_chitieu[]" autocomplete="off" placeholder="<?php echo lang('mau_chitieu').' '.$i; ?>">
                </div>
            </div>
            <div class="col-xs-1">
                <div class="select">                                
                      <?php   
                        $arr_luutru = array(null => 'Không', 54 => '54 độ', 0 => '0 độ');    
                        echo form_dropdown('mau_luutru[]',$arr_luutru, null, 'class = "form-control "');  
                      ?>
                 </div>
            </div>
            <div class="col-xs-1">
                <div class="fg-line form-group">
                    <input type="text" class="form-control input-sm " required name="mau_code[]" pattern=".{12}" required title="Mã mẫu chưa đúng định dạng" spellcheck="false" value="VICB4<?php echo date('y');?>0" placeholder="<?php echo lang('mau_code').' '.$i; ?>">
                </div>
            </div>
            <div class="col-xs-2">
                <div class="fg-line form-group">
                    <input type="text" class="form-control input-sm date-picker" name="mau_ngaynhan[]" autocomplete="off" value="<?php echo date('d-m-Y');?>" placeholder="<?php echo lang('mau_ngaynhan').' '.$i; ?>">
                </div>
            </div>
            <div class="col-xs-2">
                <div class="fg-line form-group">
                    <input type="text" class="form-control input-sm date-picker" required autocomplete="off" name="mau_ngaytra[]" placeholder="<?php echo lang('mau_ngaytra').' '.$i; ?>">
                </div>
            </div>
            <div class="col-xs-1">
                <div class="select">                                
                      <?php   
                      $a = array('%', 'g/l');
                        echo form_dropdown('mau_donvi[]',$donvi, '%', 'class = "form-control "');   
                      ?>
                 </div>
            </div>
            <div class="col-xs-2">
                <div class="fg-line form-group">
                    <div class="select">                                
                          <?php   
                            echo form_dropdown('mau_dang[]',$nenmau, $nenmau[1], 'class = "form-control "');  
                          ?>
                     </div>
                </div>
            </div>
            <div class="col-xs-1">
                <div class="fg-line form-group">
                    <input type="text" class="form-control input-sm" name="mau_note[]" placeholder="<?php echo lang('mau_note').' '.$i; ?>">
                </div>
            </div>
            <input type="hidden" name="mau_trangthai[]">
            <input type="hidden" name="mau_ketqua[]">
        </div>
    <?php endfor; ?>
    <div class="row">
        <div class="col-sm-offset-5 col-sm-12" style="padding-top: 10px;">
            <a href="<?php echo site_url('mau/bvtvmau'); ?>" class="btn btn-primary btn-sm" ><?php echo lang('actions_back');?></a>
            <button class="btn btn-primary btn-sm" type="submit"><?php echo lang('actions_save');?></button>
        </div>
    </div>
    <?php echo form_close(); ?>  
    </div>
</div>