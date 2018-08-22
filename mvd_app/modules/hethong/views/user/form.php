<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-xs-12 col-sm-6">
<div class="card">
    <?php echo form_open_multipart(site_url($action), 'id="form_users" class="form-horizontal" role="form"'); ?>
        <div class="card-header bgm-cyan">
            <h2 class="text-center"><?php if(strpos(current_url(), 'add')) {echo lang('box_title_create');} else{echo lang('box_title_edit');} ?></h2>
        </div>
        
        <div class="card-body card-padding">
          
            <div class="form-group">
                <label  for="username" class="col-sm-3 control-label"><?php echo lang('username').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'username',
                                 'id'           => 'username',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('username',$users['username'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('username');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="password" class="col-sm-3 control-label"><?php echo lang('password').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'password',
                                 'id'           => 'password',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'3',
                                 'type'     => 'password'
                                 ),
                                 set_value('password',$users['password'])
                           );             
                        ?>
                        <div class="progress" style="margin:0">
                            <div class="pwstrength_viewport_progress"></div>
                        </div>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('password');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="email" class="col-sm-3 control-label"><?php echo lang('email').'  <span class="c-red">*</span>'; ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'email',
                                 'id'           => 'email',                       
                                 'class'        => 'form-control   required',
                                 'autocomplete' => 'off',
                                 'type'  => 'email',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('email',$users['email'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('email');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="first_name" class="col-sm-3 control-label"><?php echo lang('first_name').' '; ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'first_name',
                                 'id'           => 'first_name',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'maxlength'=>'50'
                                 ),
                                 set_value('first_name',$users['first_name'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('first_name');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="sinhnhat" class="col-sm-3 control-label"><?php echo lang('sinhnhat').' '; ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'sinhnhat',
                                 'id'           => 'sinhnhat',                       
                                 'class'        => 'form-control date-picker ',
                                 'maxlength'=>'50'
                                 ),
                                 set_value('sinhnhat',$users['sinhnhat'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('sinhnhat');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="phone" class="col-sm-3 control-label"><?php echo lang('phone').' '; ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <?php                  
                          echo form_input(
                                array(
                                 'name'         => 'phone',
                                 'id'           => 'phone',                       
                                 'class'        => 'form-control  ',
                                 'autocomplete' => 'off',
                                 'type'  => 'tel',
                                'pattern' => '^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$',
                                 'maxlength'=>'20'
                                 ),
                                 set_value('phone',$users['phone'])
                           );             
                        ?>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('phone');?> </small>
                </div>
            </div>
          
            <div class="form-group">
                <label  for="gioitinh" class="col-sm-3 control-label"><?php echo lang('gioitinh').' '; ?></label>
                <div class="col-sm-8">
                    <div class="fg-line">
                        <label class="radio radio-inline m-r-20" style="padding-top: 0px">
                            <input type="radio" name="gioitinh" <?php if (isset($users['gioitinh']) && $users['gioitinh']=="Nam") echo "checked";?> value="Nam">
                            <i class="input-helper"></i> Nam 
                        </label>
                        <label class="radio radio-inline m-r-20" style="padding-top: 0px">
                            <input type="radio" name="gioitinh" <?php if (isset($users['gioitinh']) && $users['gioitinh']=="Nữ") echo "checked";?> value="Nữ">
                            <i class="input-helper"></i>  Nữ
                        </label>
                        <label class="radio radio-inline m-r-20" style="padding-top: 0px">
                            <input type="radio" name="gioitinh" <?php if (isset($users['gioitinh']) && $users['gioitinh']=="Khác") echo "checked";?> value="Khác">
                            <i class="input-helper"></i>  Khác
                        </label>
                    </div>
                    <small class="help-block c-red"> <?php echo form_error('gioitinh');?> </small>
                </div>
            </div>






          
            <div class="form-group">
                <label  for="phanquyen" class="col-sm-3 control-label"><?php echo lang('phanquyen').' '; ?></label>
                <div class="col-sm-offset-3 col-sm-8" id="phanquyen" ">
               <table>
                    <thead>
                        <th>Tên menu</th>
                        <th width="40">Menu</th>
                        <th width="40">Xem</th>
                        <th width="40">Thêm</th>
                        <th width="40">Sửa</th>
                        <th width="40">Xóa</th>
                    </thead>
                    <tbody>
        <?php   $phanquyen = explode(',', $users['phanquyen']); //var_dump($phanquyen);
            foreach ($get_module  as $key => $val): 
            if(isset($val['sub']) AND $val['sub']) : ?>
                    <tr>
                        <td>
                            <span><?php echo $val['menu_title'];?></span>
                            <input value="<?php if(in_array($val['menu_id'].'_0', $phanquyen)){echo $val['menu_id'].'_0';}?>" name="phanquyen[]" type="hidden" id="parent_<?php echo $val['menu_id']; ?>">
                        </td>
                        <td></td> 
                    </tr>                      
                        <?php foreach ($sub as $k => $v) :
                            if($k == $val['menu_id']) :
                                foreach ($v as $k1 => $v1) :
                                ?>
                    <tr>
                                <td>
                                    <em><?php echo $v1['menu_title'];?></em>
                                </td>

                                <td>
                                    <label class="checkbox checkbox-inline " >
                                        <input type="checkbox" value="<?php echo $v1['menu_id'];?>_0" name="phanquyen[]" <?php if(in_array($v1['menu_id'].'_0', $phanquyen)){echo 'checked';}?>>
                                        <i class="input-helper"></i>    
                                    </label>
                                </td>
                                <td>
                                    <label class="checkbox checkbox-inline " >
                                        <input type="checkbox" value="<?php echo $v1['menu_id'];?>_1" name="phanquyen[]" <?php if(in_array($v1['menu_id'].'_1', $phanquyen)){echo 'checked';}?>>
                                        <i class="input-helper"></i>    
                                    </label>
                                </td>
                                <td>
                                    <label class="checkbox checkbox-inline " >
                                        <input type="checkbox" value="<?php echo $v1['menu_id'];?>_2" name="phanquyen[]" <?php if(in_array($v1['menu_id'].'_2', $phanquyen)){echo 'checked';}?>>
                                        <i class="input-helper"></i>    
                                    </label>
                                </td>
                                <td>
                                    <label class="checkbox checkbox-inline " >
                                        <input type="checkbox" value="<?php echo $v1['menu_id'];?>_3" name="phanquyen[]" <?php if(in_array($v1['menu_id'].'_3', $phanquyen)){echo 'checked';}?>>
                                        <i class="input-helper"></i>    
                                    </label>
                                </td>
                                <td>
                                    <label class="checkbox checkbox-inline " >
                                        <input type="checkbox" value="<?php echo $v1['menu_id'];?>_4" name="phanquyen[]" <?php if(in_array($v1['menu_id'].'_4', $phanquyen)){echo 'checked';}?>>
                                        <i class="input-helper"></i>    
                                    </label>
                                </td>
                            </tr>
                        <?php 
                        endforeach;
                        endif; 
                    endforeach; ?>
                </tr>
        <?php else :?>
            <tr>
                        <td>
                            <span><?php echo $val['menu_title'];?></span>
                        </td>
                        <td>
                            <label class="checkbox checkbox-inline " >
                                <input type="checkbox" value="<?php echo $val['menu_id'];?>_0" name="phanquyen[]" <?php if(in_array($val['menu_id'].'_0', $phanquyen)){echo 'checked';}?>>
                                <i class="input-helper"></i>    
                            </label>
                        </td>
                        <td>
                            <label class="checkbox checkbox-inline" >
                                <input type="checkbox" value="<?php echo $val['menu_id'];?>_1" name="phanquyen[]" <?php if(in_array($val['menu_id'].'_1', $phanquyen)){echo 'checked';}?>>
                                <i class="input-helper"></i>    
                            </label>
                        </td>
                        <td>
                            <label class="checkbox checkbox-inline " >
                                <input type="checkbox" value="<?php echo $val['menu_id'];?>_2" name="phanquyen[]" <?php if(in_array($val['menu_id'].'_2', $phanquyen)){echo 'checked';}?>>
                                <i class="input-helper"></i>    
                            </label>
                        </td>
                        <td>
                            <label class="checkbox checkbox-inline " >
                                <input type="checkbox" value="<?php echo $val['menu_id'];?>_3" name="phanquyen[]" <?php if(in_array($val['menu_id'].'_3', $phanquyen)){echo 'checked';}?>>
                                <i class="input-helper"></i>    
                            </label>
                        </td>
                        <td>
                            <label class="checkbox checkbox-inline " >
                                <input type="checkbox" value="<?php echo $val['menu_id'];?>_4" name="phanquyen[]" <?php if(in_array($val['menu_id'].'_4', $phanquyen)){echo 'checked';}?>>
                                <i class="input-helper"></i>    
                            </label>
                        </td>
                    </tr>
            <?php endif;?>
            <?php endforeach; ?>
                </tbody>
            </table>


                    </div>
                    <small class="help-block c-red"> <?php echo form_error('phanquyen');?> </small>
                </div>

                <?php 
                    if($users['avatar'] != '') {
                        $avatar = 'style="height: 200px; width: 200px" src="'.base_url().'uploads/'.$users['username'].'/avatar/'.$users['avatar'].'"';
                    } else{
                        $avatar ='';        
                    } 
                ?>
               
                <label  for="avatar" class="col-sm-3 control-label"><?php echo lang('avatar').' '; ?></label>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                        <img scr="<?php echo $avatar;?>" />
                    </div>
                    
                    <div>
                        <span class="btn btn-info btn-file waves-effect waves-button waves-float">
                            <span class="fileinput-new">Chọn ảnh</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" id="avatar" name="avatar">
                        </span>
                    </div>

                </div>


            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                    <a href="<?php echo site_url('users'); ?>" class="btn btn-primary btn-sm" ><?php echo lang('actions_back');?></a>
                    <button class="btn btn-primary btn-sm" type="submit"><?php echo lang('actions_save');?></button>
                </div>
            </div>

        </div>
    <?php echo form_close(); ?>  
</div>
<div class="col-sm-3"></div>
</div>