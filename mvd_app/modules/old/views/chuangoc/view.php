<div class="col-sm-12">
    <div class="login-content">
        <ul class="login-navigation" style="position: inherit;">
            <li data-block="#l-login" class="bgm-green"><a href="<?php echo base_url('hoachat/chuangoc/index/St'); ?> " style="color: #fff;">Chuẩn</a></li>
            <li data-block="#l-register" class="bgm-cyan"><a href="<?php echo base_url('hoachat/chuangoc/index/So'); ?> " style="color: #fff;">Dung môi</a></li>
            <li data-block="#l-register" class="bgm-orange"><a href="<?php echo base_url('hoachat/chuangoc/index/Sa'); ?> " style="color: #fff;">Muối</a></li>
        </ul>
    </div>
    <div class="card">
        <div class="block-header" style="padding-top: 10px;">
            <ul class="tab-nav" role="tablist" data-tab-color="green">
                <li class="active " ><a href="#chuangoc"  role="tab" data-toggle="tab"><?php echo lang('head_title_chuangoc'); ?></a></li>
                <li role="presentation"><a href="#chuangoc1"  role="tab" data-toggle="tab"><?php echo lang('head_title_chuangoc_saphethan'); ?></a></li>
                <li role="presentation" ><a href="#chuangoc2"  role="tab" data-toggle="tab"><?php echo lang('head_title_chuangoc_hethan'); ?></a></li>
            </ul>
                    <!--action menu -->
            <ul class="actions " style="padding-top: 20px;">
                <li ><a href="<?php echo site_url('hoachat/chuangoc/add'); ?>"><i class="md md-my-library-add"></i></a> </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="md md-more-vert"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="<?php echo base_url('hoachat/chuangoc/excel')?>">Lưu file Excel</a></li>
                    </ul>
                </li>
            </ul>
            <!--end action menu -->
        </div>
        <div class="card-body table-responsive" style="padding-left: 20px;padding-right: 20px;padding-bottom: 20px;">
            <div role="tabpanel" class="tab">
                
                
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active in" id="chuangoc">
                        <!--Table-->
                        <?php if ($chuangocs) : ?>
                            <!--Table-->
                            <table class="display compact" id="tabledata"  >
                                <!--Table head-->
                                <thead>
                                    <tr>
                                        <th  width="5">
                                            <input type="checkbox" class="select_all-menu">
                                        </th>
                                        <th><?php echo lang('hcgoc_name');?></th>   
                                        <th><?php echo lang('hcgoc_vicb_code');?></th>   
                                        <th><?php echo lang('hcgoc_nhasx');?></th>   
                                        <th><?php echo lang('hcgoc_code');?></th>   
                                        <th><?php echo lang('hcgoc_lot');?></th>   
                                        <th><?php echo lang('hcgoc_hamluong');?></th>   
                                        <th><?php echo lang('hcgoc_luongnhap');?></th>   
                                        <th><?php echo lang('hcgoc_expday');?></th>   
                                        <th><?php echo lang('hcgoc_ngaynhap');?></th>   
                                        <th><?php echo lang('hcgoc_baoquan');?></th> 
                                        <th><?php echo lang('hcgoc_lab');?></th>
                                        <th class="text-center" width="50">Actions</th>
                                    </tr>
                                </thead>
                                <!--Table head-->

                                <!--Table body-->
                                <tbody>
                                  <?php $i=0; foreach ($chuangocs as $chuangoc) : $i++;?>
                                    <tr id="data_id_<?php echo $chuangoc['hcgoc_id']; ?>">
                                        <th scope="row" width="5">
                                            <input type="checkbox" id="checkbox<?php echo $i;?>">
                                            <label for="checkbox<?php echo $i;?>" class="label-table"></label>
                                        </th>
                                        <td><?php echo $chuangoc['hcgoc_name']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_vicb_code']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_nhasx']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_code']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_lot']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_hamluong']; ?></td>
                                   <?php $donvi = explode('_', $chuangoc['hcgoc_luongnhap']); ?>
                                   <td><?php echo $donvi[0].' '.$donvi[1]; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_expday']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_ngaynhap']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_baoquan']; ?></td>
                                    <td><?php echo $chuangoc['hcgoc_lab']; ?></td>
                                        <td class="text-right" width="50">
                                            <span class="detail" data-id="<?php echo $chuangoc['hcgoc_id']; ?>" ><a href="" data-toggle="modal" data-target="#<?php echo $chuangoc['hcgoc_id']; ?>" ><i class=" md-report "></i></a></span>
                                            <span >
                                                <a href="<?php echo site_url('hoachat/chuangoc/edit/').$chuangoc['hcgoc_id']; ?>" >
                                                    <i class=" md-create" ></i>
                                                </a>
                                            </span>
                                            <span class="xoa" data-id="<?php echo $chuangoc['hcgoc_id']; ?>" ><a href="#" ><i class=" md-remove-circle"></i></a></span>
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
                        <!--Table-->
                    </div><!-- end chuan goc-->

                    <div role="tabpanel" class="tab-pane " id="chuangoc1">
                        <!--Table-->
                        <?php if ($chuangocs_saphethan) : ?>
                            <!--Table-->
                            <table class="display compact" id="tabledata1"  >
                                <!--Table head-->
                                <thead>
                                    <tr>
                                        <th  width="5">
                                            <input type="checkbox" class="select_all-menu">
                                        </th>
                                        <th><?php echo lang('hcgoc_name');?></th>   
                                        <th><?php echo lang('hcgoc_vicb_code');?></th>   
                                        <th><?php echo lang('hcgoc_nhasx');?></th>   
                                        <th><?php echo lang('hcgoc_code');?></th>   
                                        <th><?php echo lang('hcgoc_lot');?></th>   
                                        <th><?php echo lang('hcgoc_hamluong');?></th>   
                                        <th><?php echo lang('hcgoc_luongnhap');?></th>   
                                        <th><?php echo lang('hcgoc_expday');?></th>   
                                        <th><?php echo lang('hcgoc_ngaynhap');?></th>   
                                        <th><?php echo lang('hcgoc_baoquan');?></th> 
                                            <th><?php echo lang('hcgoc_dathang');?></th>
                                        <th><?php echo lang('hcgoc_lab');?></th>
                                        <th class="text-center" width="50">Actions</th>
                                    </tr>
                                </thead>
                                <!--Table head-->

                                <!--Table body-->
                                <tbody>
                                  <?php $i=0; foreach ($chuangocs_saphethan as $chuangoc) : $i++;?>
                                    <tr id="data_id_<?php echo $chuangoc['hcgoc_id']; ?>">
                                        <th scope="row" width="5">
                                            <input type="checkbox" id="checkbox<?php echo $i;?>">
                                            <label for="checkbox<?php echo $i;?>" class="label-table"></label>
                                        </th>
                                        <td><?php echo $chuangoc['hcgoc_name']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_vicb_code']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_nhasx']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_code']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_lot']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_hamluong']; ?></td>
                                   <?php $donvi = explode('_', $chuangoc['hcgoc_luongnhap']); ?>
                                   <td><?php echo $donvi[0].' '.$donvi[1]; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_expday']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_ngaynhap']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_baoquan']; ?></td>
                                    <td>
                                        <div class="toggle-switch " data-ts-color="green">
                                            <input class="dathang" id="dathang<?php echo $chuangoc['hcgoc_id']; ?>" data-id-dathang="<?php echo $chuangoc['hcgoc_id']; ?>" name="hcgoc_dathang" type="checkbox" <?php if($chuangoc['hcgoc_dathang'] ==1 ){ echo "checked";} ?> hidden="hidden">
                                            <label for="dathang<?php echo $chuangoc['hcgoc_id']; ?>" class="ts-helper"></label>
                                        </div>
                                    </td>
                                    <td><?php echo $chuangoc['hcgoc_lab']; ?></td>
                                        <td class="text-right" width="50">
                                            <span class="detail" data-id="<?php echo $chuangoc['hcgoc_id']; ?>" ><a href="" data-toggle="modal" data-target="#<?php echo $chuangoc['hcgoc_id']; ?>" ><i class=" md-report "></i></a></span>
                                            <span >
                                                <a href="<?php echo site_url('hoachat/chuangoc/edit/').$chuangoc['hcgoc_id'];?>" >
                                                    <i class=" md-create" ></i>
                                                </a>
                                            </span>
                                            <span class="xoa" data-id="<?php echo $chuangoc['hcgoc_id']; ?>" ><a href="#" ><i class=" md-remove-circle"></i></a></span>
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
                        <!--Table-->
                    </div><!-- end chuan goc sap het han-->

                    <div role="tabpanel" class="tab-pane" id="chuangoc2">
                        <!--Table-->
                        <?php if ($chuangocs_hethan) : ?>
                            <!--Table-->
                            <table class="display compact" id="tabledata2"  >
                                <!--Table head-->
                                <thead>
                                    <tr>
                                        <th  width="5">
                                            <input type="checkbox" class="select_all-menu">
                                        </th>
                                        <th><?php echo lang('hcgoc_name');?></th>   
                                        <th><?php echo lang('hcgoc_vicb_code');?></th>   
                                        <th><?php echo lang('hcgoc_nhasx');?></th>   
                                        <th><?php echo lang('hcgoc_code');?></th>   
                                        <th><?php echo lang('hcgoc_lot');?></th>   
                                        <th><?php echo lang('hcgoc_hamluong');?></th>   
                                        <th><?php echo lang('hcgoc_luongnhap');?></th>   
                                        <th><?php echo lang('hcgoc_expday');?></th>   
                                        <th><?php echo lang('hcgoc_ngaynhap');?></th>   
                                        <th><?php echo lang('hcgoc_baoquan');?></th> 
                                        <th><?php echo lang('hcgoc_lab');?></th>
                                        <th class="text-center" width="50">Actions</th>
                                    </tr>
                                </thead>
                                <!--Table head-->

                                <!--Table body-->
                                <tbody>
                                  <?php $i=0; foreach ($chuangocs_hethan as $chuangoc) : $i++;?>
                                    <tr id="data_id_<?php echo $chuangoc['hcgoc_id']; ?>">
                                        <th scope="row" width="5">
                                            <input type="checkbox" id="checkbox<?php echo $i;?>">
                                            <label for="checkbox<?php echo $i;?>" class="label-table"></label>
                                        </th>
                                        <td><?php echo $chuangoc['hcgoc_name']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_vicb_code']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_nhasx']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_code']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_lot']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_hamluong']; ?></td>
                                   <?php $donvi = explode('_', $chuangoc['hcgoc_luongnhap']); ?>
                                   <td><?php echo $donvi[0].' '.$donvi[1]; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_expday']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_ngaynhap']; ?></td>
                                   <td><?php echo $chuangoc['hcgoc_baoquan']; ?></td>
                                    <td><?php echo $chuangoc['hcgoc_lab']; ?></td>
                                        <td class="text-right" width="50">
                                            <span class="detail" data-id="<?php echo $chuangoc['hcgoc_id']; ?>" ><a href="" data-toggle="modal" data-target="#<?php echo $chuangoc['hcgoc_id']; ?>" ><i class=" md-report "></i></a></span>
                                            <span >
                                                <a href="<?php echo site_url('hoachat/chuangoc/edit/').$chuangoc['hcgoc_id'];?>" >
                                                    <i class=" md-create" ></i>
                                                </a>
                                            </span>
                                            <span class="xoa" data-id="<?php echo $chuangoc['hcgoc_id']; ?>" ><a href="#" ><i class=" md-remove-circle"></i></a></span>
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
                        <!--Table-->
                    </div><!-- end chuan goc het han-->
                    
                </div>
            </div>
        </div>
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