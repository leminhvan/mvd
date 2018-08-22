
<div class="card">
    <div class="card-header bgm-cyan">
        <h2 class="text-center"><?php echo lang('head_title_sys_menu'); ?></h2>

        <!--action menu -->
        <ul class="actions actions-alt">
            <li data-toggle="tooltip" data-placement="left" title="Thêm mới"><a href="<?php echo site_url('hethong/sys_menu/add'); ?>"><i class="md md-my-library-add"></i></a> </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="md md-more-vert"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#">Refresh</a></li>
                </ul>
            </li>
        </ul>
        <!--end action menu -->
    </div><!--end card heder -->
    
    <div class="card-body card-padding table-responsive" style="padding-left: 20px;padding-right: 20px;padding-bottom: 20px;">
         <?php if ($menus) : ?>
        <!--Table-->
<table id="tabledata" class="display nowrap" style="width:100%">
                        <!--Table head-->
                        <thead>
                            <tr>
                                <th width="5">
                                    <input type="checkbox" id="select_all-menu">
                                </th>
                                <th ><?php echo lang('menu_title'); ?></th>
                                <th ><?php echo lang('menu_parent'); ?></th>
                                <th ><?php echo lang('menu_url'); ?></th>
                                <th ><?php echo lang('menu_index'); ?></th>
                                <th ><?php echo lang('menu_icon'); ?></th>
                                <th ><?php echo lang('module_name'); ?></th>
                                <th  class="text-center" width="50">Actions</th>

                            </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                          <?php $i=0; foreach ($menus as $sys_menu) : $i++;?>
                          
                            <tr role="row" id="data_id_<?php echo $sys_menu['menu_id']; ?>">
                                <td width="5">
                                    <input type="checkbox" id="checkbox<?php echo $i;?>">
                                </td>
                                <td><?php echo $sys_menu['menu_title']; ?></td>
                                <td><?php echo $sys_menu['menu_parent_id']; ?></td>
                                <td><?php echo $sys_menu['menu_url']; ?></td>
                                <td><?php echo $sys_menu['menu_index']; ?></td>
                                <td><?php echo $sys_menu['menu_icon']; ?></td>
                                <td><?php echo $sys_menu['module_name']; ?></td>
                                <td class="text-right" width="50">
                                    <span class="detail" data-id="<?php echo $sys_menu['menu_id']; ?>"><a href="" data-toggle="modal" data-target="#<?php echo $sys_menu['menu_id']; ?>" ><i class=" md-report"></i></a></span>
                                    <span ><a href="<?php echo site_url('hethong/sys_menu/edit/').$sys_menu['menu_id']; ?>" ><i class=" md-create" ></i></a></span>
                                    <span class="xoa" data-id="<?php echo $sys_menu['menu_id']; ?>" ><a href="#" ><i class=" md-remove-circle"></i></a></span>
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
 

       