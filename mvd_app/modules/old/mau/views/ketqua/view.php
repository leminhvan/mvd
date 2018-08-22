
<div class="card">
    <div class="card-header bgm-cyan">
        <h2 class="text-center"><?php echo lang('head_title_bvtv_ketqua'); ?></h2>

        <!--action menu -->
        <ul class="actions actions-alt">
            <li data-toggle="tooltip" data-placement="left" title="Thêm mới"><a href="<?php echo site_url('bvtv_ketqua/add'); ?>"><i class="md md-my-library-add"></i></a> </li>
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
         <?php if ($bvtv_ketquas) : ?>
        <!--Table-->
        <table class="table display compact" id="tabledata"  >
            <!--Table head-->
            <thead>
                <tr>
                    <th width="5">
                        <input type="checkbox" id="select_all-menu">
                    </th>
                <th >
                            <?php echo lang('mau_id'); ?>
                        </th><th >
                            <?php echo lang('chuan_id'); ?>
                        </th><th >
                            <?php echo lang('s_chuan1'); ?>
                        </th><th >
                            <?php echo lang('s_chuan2'); ?>
                        </th><th >
                            <?php echo lang('m_mau'); ?>
                        </th><th >
                            <?php echo lang('v_mau'); ?>
                        </th><th >
                            <?php echo lang('s_mau'); ?>
                        </th><th >
                            <?php echo lang('hl_dk'); ?>
                        </th><th >
                            <?php echo lang('ngay_tao'); ?>
                        </th>
                    <th  class="text-center" width="50">Actions</th>
                </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>
              <?php $i=0; foreach ($bvtv_ketquas as $bvtv_ketqua) : $i++;?>
                <tr id="data_id_<?php echo $bvtv_ketqua['ketqua_id']; ?>">
                    <th width="5">
                        <input type="checkbox" id="checkbox<?php echo $i;?>">
                        <label for="checkbox<?php echo $i;?>" class="label-table"></label>
                    </th>
                 <td>
                            <?php echo $bvtv_ketqua['mau_id']; ?>
                        </td> <td>
                            <?php echo $bvtv_ketqua['chuan_id']; ?>
                        </td> <td>
                            <?php echo $bvtv_ketqua['s_chuan1']; ?>
                        </td> <td>
                            <?php echo $bvtv_ketqua['s_chuan2']; ?>
                        </td> <td>
                            <?php echo $bvtv_ketqua['m_mau']; ?>
                        </td> <td>
                            <?php echo $bvtv_ketqua['v_mau']; ?>
                        </td> <td>
                            <?php echo $bvtv_ketqua['s_mau']; ?>
                        </td> <td>
                            <?php echo $bvtv_ketqua['hl_dk']; ?>
                        </td> <td>
                            <?php echo $bvtv_ketqua['ngay_tao']; ?>
                        </td>
                    <td class="text-right" width="50">
                        <span class="detail" data-id="<?php echo $bvtv_ketqua['ketqua_id']; ?>" ><a href="" data-toggle="modal" data-target="#<?php echo $bvtv_ketqua['ketqua_id']; ?>" ><i class=" md-report"></i></a></span>
                        <span ><a href="<?php echo site_url('bvtv_ketqua/edit/').$bvtv_ketqua['ketqua_id']; ?>" ><i class=" md-create" ></i></a></span>
                        <span class="xoa" data-id="<?php echo $bvtv_ketqua['ketqua_id']; ?>" ><a href="#" ><i class=" md-remove-circle"></i></a></span>
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

 
