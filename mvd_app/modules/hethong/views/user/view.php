
<div class="card">
    <div class="card-header bgm-cyan">
        <h2 class="text-center"><?php echo lang('head_title_users'); ?></h2>

        <!--action menu -->
        <ul class="actions actions-alt">
            <li data-toggle="tooltip" data-placement="left" title="Thêm mới"><a href="<?php echo site_url('users/add'); ?>"><i class="md md-my-library-add"></i></a> </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="md md-more-vert"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#">Refresh</a></li>
                </ul>
            </li>
        </ul>
        <!--end action menu -->
    </div><!--end card heder -->
    
    <div class="card-body card-padding table-responsive" style="overflow: hidden, outline: none;">
         <?php if ($userss) : ?>
        <!--Table-->
        <table class="table display compact" id="tabledata"  >
            <!--Table head-->
            <thead>
                <tr>
                        <th >
                            <?php echo lang('username'); ?>
                        </th>
                 
                        <th >
                            <?php echo lang('email'); ?>
                        </th>
                        <th >
                            <?php echo lang('created_on'); ?>
                        </th>
                        <th >
                            <?php echo lang('active'); ?>
                        </th>
                        <th >
                            <?php echo lang('first_name'); ?>
                        </th>
                        <th >
                            <?php echo lang('sinhnhat'); ?>
                        </th>
                        <th >
                            <?php echo lang('phone'); ?>
                        </th>
                       
                        <th >
                            <?php echo lang('gioitinh'); ?>
                        </th>
                        
                    <th  class="text-center" width="50">Actions</th>
                </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>
              <?php $i=0; foreach ($userss as $users) : $i++;?>
                <tr id="data_id_<?php echo $users['id']; ?>">
                    
                         <td>
                            <?php echo $users['username']; ?>
                        </td> 
                         <td>
                            <?php echo $users['email']; ?>
                        </td>
                         <td>
                            <?php echo mdate('%d-%m-%Y', $users['created_on']); ?>
                        </td>
                         <td>
                            <?php echo ($users['active']) ? '<span class="label label-success status" data-id="'.$users['id'].'_'.$users['active'].'">'.lang('users_active').'</span>' : '<span class="label label-default status" data-id="'.$users['id'].'_'.$users['active'].'">'.lang('users_inactive').'</span>'; ?>
                        </td> 
                        <td>
                            <?php echo $users['first_name']; ?>
                        </td> 
                        <td>
                            <?php echo $users['sinhnhat']; ?>
                        </td> 
                        <td>
                            <?php echo $users['phone']; ?>
                        </td> 
                       
                        <td>
                            <?php echo $users['gioitinh']; ?>
                        </td> 
                    <td class="text-right" width="50">
                        <span class="detail" data-id="<?php echo $users['id']; ?>" ><a href="" data-toggle="modal" data-target="#<?php echo $users['id']; ?>" ><i class=" md-report"></i></a></span>
                        <span ><a href="<?php echo site_url('hethong/users/edit/').$users['id']; ?>" ><i class=" md-create" ></i></a></span>
                        <span class="xoa" data-id="<?php echo $users['id']; ?>" ><a href="#" ><i class=" md-remove-circle"></i></a></span>
                    </td>
                </tr>
               <?php endforeach; ?>
            </tbody>
            <!--Table body-->
        </table>
        <!--Table-->
        <?php else: ?>
            <?php  echo notify('Không có data','info');?>
        <?php endif; ?>
    </div>
</div>

<!--Modal: form-->
    <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
                <div class="list-group z-depth-1">
                    <h3 class="list-group-item active text-center"> Thông tin</h3>
                    <table class="table result" >
                       
                    </table>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
<!--Modal: form-->

 
