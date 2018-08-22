
<div class="card">
    <div class="card-header bgm-cyan">
        <h2 class="text-center"><?php echo lang('head_title_bvtvmau'); ?></h2>

        <!--action menu -->
        <ul class="actions actions-alt">
            <li data-toggle="tooltip" data-placement="left" title="Thêm mới"><a href="<?php echo site_url('mau/bvtvmau/add'); ?>"><i class="md md-add"></i></a> </li>
            <li data-toggle="tooltip" data-placement="left" title="Thêm nhiều" id="add-more">
                <a href="#<?php //echo site_url('mau/bvtvmau/add_more'); ?>"><i class="md md-playlist-add"></i></a> 
            </li>
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
         <?php if ($bvtvmaus) : ?>
        <!--Table-->
        <table class="table display compact" id="tabledata"  >
            <!--Table head-->
            <thead>
                <tr>
                    <th width="5"> <input type="checkbox" class="select_all-menu"> </th>
                    <th class="text-center"><?php echo lang('mau_chitieu'); ?> </th>
                    <th class="text-center">  <?php echo lang('mau_code'); ?>  </th>
                    <th class="text-center"> <?php echo lang('mau_ngaynhan'); ?> </th>
                    <th class="text-center"> <?php echo lang('mau_ngaytra'); ?> </th>
                    <th class="text-center"><?php echo lang('mau_trangthai'); ?> </th>
                    <th class="text-center"> <?php echo lang('mau_ketqua'); ?></th>
                    <th class="text-center"> <?php echo lang('mau_donvi'); ?> </th>
                    <th class="text-center"> <?php echo lang('mau_dang'); ?> </th>
                    <th class="text-center"> <?php echo lang('mau_luutru'); ?> </th>
                    <th class="text-center"><?php echo lang('mau_note'); ?> </th>
                    <th class="text-center" width="50">Actions</th>
                </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>
              <?php $i=0; foreach ($bvtvmaus as $bvtvmau) : $i++;?>
                <tr id="data_id_<?php echo $bvtvmau['mau_id']; ?>">
                    <th width="5">
                        <input type="checkbox" id="checkbox<?php echo $i;?>">
                        <label for="checkbox<?php echo $i;?>" class="label-table"></label>
                    </th>
                    <td><?php echo $bvtvmau['mau_chitieu']; ?> </td>
                    <td><?php echo $bvtvmau['mau_code']; ?></td>
                    <td class="text-center"> <?php echo $bvtvmau['mau_ngaynhan']; ?> </td> 
                    <td class="text-center"><?php echo $bvtvmau['mau_ngaytra']; ?> </td> 
                    <td class="text-center"><?php echo $bvtvmau['mau_trangthai']; ?> </td> 
                    <td class="text-center"> <?php echo $bvtvmau['mau_ketqua']; ?></td> 
                    <td class="text-center"><?php echo $bvtvmau['mau_donvi']; ?></td> 
                    <td class="text-center"><?php echo $bvtvmau['mau_dang']; ?></td> 
                    <td class="text-center"><?php echo $bvtvmau['mau_luutru']; ?></td> 
                    <td class="text-center"> <?php echo $bvtvmau['mau_note']; ?>  </td>
                    <td class="text-center" width="50">
                        <span class="detail" data-id="<?php echo $bvtvmau['mau_id']; ?>" ><a href="" data-toggle="modal" data-target="#<?php echo $bvtvmau['mau_id']; ?>" ><i class=" md-report"></i></a></span>
                        <span ><a href="<?php echo site_url('mau/bvtvmau/edit/').$bvtvmau['mau_id']; ?>" ><i class=" md-create" ></i></a></span>
                        <span class="xoa" data-id="<?php echo $bvtvmau['mau_id']; ?>" ><a href="#" ><i class=" md-remove-circle"></i></a></span>
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

 
