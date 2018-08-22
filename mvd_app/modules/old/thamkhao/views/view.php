
<div class="card"><?php //var_dump($thamkhaos);?>
    <div class="card-header bgm-cyan">
        <h2 class="text-center"><?php echo lang('head_title_thamkhao'); ?></h2>

        <!--action menu -->
        <ul class="actions actions-alt">
            <li data-toggle="tooltip" data-placement="left" title="Thêm mới"><a href="<?php echo site_url('thamkhao/add'); ?>"><i class="md md-my-library-add"></i></a> </li>
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
         <?php if ($thamkhaos) : ?>
        <!--Table-->
        <table class="table display compact" id="tabledata"  >
            <!--Table head-->
            <thead>
                <tr>
                    <th width="5">
                        <input type="checkbox" id="select_all-menu">
                    </th>
                <th ><?php echo lang('tk_code'); ?></th>
                <th ><?php echo lang('tk_name'); ?></th>
                <th ><?php echo lang('tk_sop'); ?></th>
                <th ><?php echo lang('tk_chidinh'); ?></th>
                <th ><?php echo lang('tk_phuongphap'); ?></th>
                <th ><?php echo lang('tk_hoaly'); ?></th>
                <th ><?php echo lang('tk_hoatchat'); ?></th>
                <th ><?php echo lang('tk_link'); ?></th>
                    <th  class="text-center" width="50">Actions</th>
                </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>
              <?php $i=0; foreach ($thamkhaos as $thamkhao) : $i++;?>
                <tr id="data_id_<?php echo $thamkhao['tk_id']; ?>">
                    <th width="5">
                        <input type="checkbox" id="checkbox<?php echo $i;?>">
                        <label for="checkbox<?php echo $i;?>" class="label-table"></label>
                    </th>
                 <td width="125"><?php echo $thamkhao['tk_code']; ?></td> 
                 <td width="250"><?php echo $thamkhao['tk_name']; ?></td> 
                 <td><?php echo $thamkhao['tk_sop']; ?></td> 
                 <td align="center"><?php echo $thamkhao['tk_chidinh']; ?></td> 
                 <td><?php echo $thamkhao['tk_phuongphap']; ?></td> 
                 <td><?php echo $thamkhao['tk_hoaly']; ?></td> 
                 <td width="50"><?php echo $thamkhao['tk_hoatchat']; ?></td> 
                 <td><?php
                            if (strpos($thamkhao['tk_link'], 'pdf') !== false){
                                $link = base64_encode(base_url().'uploads/files/tltk/'.$thamkhao['tk_link']);
                            }
                            if (strpos($thamkhao['tk_link'], 'pdf') === false){
                                $link = base64_encode(base_url().'uploads/files/tltk/'.$thamkhao['tk_link'].'.pdf');
                            }
                           
                           $remove = str_replace('=','', $link);
                           echo anchor(
                              site_url('thamkhao/viewFile/' . $remove),
                                '<i class="md  md-get-app"></i>',
                                'data-tooltip="tooltip" data-placement="top" title="Xem" target="_blank"'
                              ); 
                              ?>
                    </td> 

                    <td class="text-right" width="50">
                        <span class="detail" data-id="<?php echo $thamkhao['tk_id']; ?>" ><a href="" data-toggle="modal" data-target="#<?php echo $thamkhao['tk_id']; ?>" ><i class=" md-report"></i></a></span>
                        <span ><a href="<?php echo site_url('thamkhao/edit/').$thamkhao['tk_id']; ?>" ><i class=" md-create" ></i></a></span>
                        <span class="xoa" data-id="<?php echo $thamkhao['tk_id']; ?>" ><a href="#" ><i class=" md-remove-circle"></i></a></span>
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

 
