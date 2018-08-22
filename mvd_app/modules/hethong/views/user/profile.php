<?php foreach ($user_info as $user):?>
<div class="card" id="profile-main">
    <div class="pm-overview c-overflow">
        <div class="pmo-pic">
            <div class="p-relative">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('uploads/'.$user->username.'/avatar/'.$user->avatar);?>"" alt="Ảnh đại diện" width="300" sheight="300"> 
                </a>
                
                <a href="<?php echo base_url("hethong/users/edit/$user->id"); ?>" class="pmop-edit">
                    <i class="md md-camera-alt"></i> <span class="hidden-xs">Thay đổi avatar</span>
                </a>
            </div>
            
            
            <div class="pmo-stat">
                <?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        </div>
        
        <div class="pmo-block pmo-contact hidden-xs">
            <h2>LIÊN HỆ</h2>
            
            <ul>
                <li><i class="md md-phone"></i><span id="phone_id_"><?php echo $user->phone; ?></span></li>
                <li><i class="md md-email"></i><span id="email_id_"><?php echo $user->email; ?></span></li>
            </ul>
        </div>

    </div>
    
    <div class="pm-body clearfix">
        
        <div class="pmb-block">
            <div class="pmbb-header">
                <h2><i class="md md-person m-r-5"></i> Thông tin chung</h2>
                
                <ul class="actions">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" >
                            <i class="md md-more-vert"></i>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-menu-right" >
                            <li>
                                <a data-pmb-action="edit" href="#" >Edit</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="pmbb-body p-l-30">
                <div class="pmbb-view">
                    <dl class="dl-horizontal">
                        <dt><?php echo lang('first_name'); ?></dt>
                        <dd id="first_name_id"><?php echo htmlspecialchars($user->first_name.$user->last_name, ENT_QUOTES, 'UTF-8'); ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?php echo lang('created_on'); ?></dt>
                        <dd><?php echo date('d-m-Y', $user->created_on); ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?php echo lang('sinhnhat'); ?></dt>
                        <dd id="sinhnhat_id"><?php echo $user->sinhnhat; ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?php echo lang('gioitinh'); ?></dt>
                        <dd id="gioitinh_id"><?php echo htmlspecialchars($user->gioitinh, ENT_QUOTES, 'UTF-8'); ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?php echo lang('active'); ?></dt>
                        <dd><?php echo ($user->active) ? '<span class="label label-success">'.lang('users_active').'</span>' : '<span class="label label-default">'.lang('users_inactive').'</span>'; ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?php echo lang('phone'); ?></dt>
                        <dd id="phone_id"><?php echo $user->phone; ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?php echo lang('email'); ?></dt>
                        <dd id="email_id"><?php echo $user->email; ?></dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><?php echo lang('in_group'); ?></dt>
                        <dd>
                            <?php foreach ($user->groups as $group):?>
                                <?php echo '<span class="label" style="background:'.$group->bgcolor.'">'.htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8').'</span>'; ?>
                            <?php endforeach?>
                        </dd>
                    </dl>
                </div>
                
                <div class="pmbb-edit">
                    <h5 class="text-center">Sửa thông tin</h5>
                    <dl class="dl-horizontal">
                        <dt class="p-t-10"><?php echo lang('first_name'); ?></dt>
                        <dd>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type="text" id="first_name"  class="form-control" autocomplete="off" value="<?php echo htmlspecialchars($user->first_name.$user->last_name, ENT_QUOTES, 'UTF-8'); ?>">
                                </div>
                                <small class="help-block" style="display: none;">Không được để trống</small>
                            </div>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt class="p-t-10"><?php echo lang('gioitinh'); ?></dt>
                        <dd>
                            <div class="fg-line">
                                <label class="radio radio-inline m-r-20" style="padding-top: 0px">
                                    <input type="radio"  name="gioitinh" <?php if ($user->gioitinh=="Nam") echo "checked";?> value="Nam">
                                    <i class="input-helper"></i> Nam 
                                </label>
                                <label class="radio radio-inline m-r-20" style="padding-top: 0px">
                                    <input type="radio" name="gioitinh" <?php if ($user->gioitinh=="Nữ") echo "checked";?> value="Nữ">
                                    <i class="input-helper"></i>  Nữ
                                </label>
                                <label class="radio radio-inline m-r-20" style="padding-top: 0px">
                                    <input type="radio" name="gioitinh" <?php if ($user->gioitinh=="Khác") echo "checked";?> value="Khác">
                                    <i class="input-helper"></i>  Khác
                                </label>
                            </div>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt class="p-t-10"><?php echo lang('sinhnhat'); ?></dt>
                        <dd>
                            <div class="dtp-container dropdown fg-line">
                                <input type='text' class="form-control date-picker" id="sinhnhat" data-toggle="dropdown" value="<?php echo $user->sinhnhat; ?>" autocomplete="off">
                            </div>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt class="p-t-10"><?php echo lang('phone'); ?></dt>
                        <dd>
                            <div class="fg-line">
                                <input type='text' class="form-control" id="phone" value="<?php echo $user->phone; ?>">
                            </div>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt class="p-t-10"><?php echo lang('email'); ?></dt>
                        <dd>
                            <div class="form-group">
                                <div class="fg-line">
                                    <input type='text' class="form-control" id="email" autocomplete="off" value="<?php echo $user->email; ?>">
                                </div>
                                <small class="help-block" style="display: none;">Không được để trống</small>
                            </div>
                        </dd>
                    </dl>
                    
                    <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" id="profile_edit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
</div>
<?php endforeach;?>

