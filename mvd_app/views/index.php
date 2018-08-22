<?php  $this->config->load('site_config'); ?>
<!DOCTYPE html>
<html>    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php  echo $this->config->item( 'title' );?></title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open Sans">
        <!-- Vendor CSS -->
        <link href="<?php echo base_url()?>assets/vendors/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/vendors/animate-css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/vendors/material-icons/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/vendors/socicon/socicon.min.css" rel="stylesheet">

        <link href="<?php echo base_url()?>assets/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="<?php echo base_url()?>assets/css/app.min.1.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/app.min.2.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/custom.css">
        <?php echo $css; ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/responsive.dataTables.css">
<style type="text/css">
    
</style>
    </head>
    <body>
        <header id="header">
<?php  
    $admin_prefs = $this->prefs_model->admin_prefs();
    $user_login  = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
?>
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
            
                <li class="logo hidden-xs">
                    <a href="<?php echo base_url()?>dashboard">BVTV</a>
                </li>
                
                <li class="pull-right">
                <ul class="top-menu">
                    <li id="toggle-width">
                        <div class="toggle-switch">
                            <input id="tw-switch" type="checkbox" hidden="hidden">
                            <label for="tw-switch" class="ts-helper"></label>
                        </div>
                    </li>
                    <li id="top-search">
                        <a class="tm-search" href="#"></a>
                    </li>
                    <li class="dropdown">
        <?php if ($admin_prefs['notifications_menu'] == TRUE): //notifications_menu?>
            <?php $noti = 0; if(isset($notification)) :     $noti = count($notification);    endif; //notify message?>    
                        <a data-toggle="dropdown" class="tm-notification" href="#"><i class="tmn-counts"><?php echo $noti; ?></i></a>
                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                            <div class="listview" id="notifications">
                                <div class="lv-header">
                                    THÔNG BÁO
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="#" data-clear="notification">
                                                <i class="md md-done-all"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="lv-body c-overflow">
                        <?php if($noti >0) :// var_dump($notification); ?>
                        <?php foreach ($notification as $key => $value) { ?>
                                    <a class="lv-item" href="<?php echo $value['link'];?>">
                                        <div class="media">
                                            <div class="pull-left">
                                                <?php echo $value['icon'];?>
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title"><?php echo $value['title'];?></div>
                                                <small class="lv-small"><?php echo $value['message'] ;?></small>
                                            </div>
                                        </div>
                                    </a>
                        <?php  } endif;//end foreach?>
                                </div>
                                <a class="lv-footer" href="#">View Previous</a>
                            </div>
                    
                        </div>
        <?php endif; //end notifications_menu?>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-settings" href="#"></a>
                        <ul class="dropdown-menu dm-icon pull-right">
                            <li> <a data-action="fullscreen" href="#"><i class="md md-fullscreen"></i> Xem toàn màn hình</a> </li>
                            <li> <a href="#"><i class="md md-person"></i> Cài đặt khác</a>  </li>
                        </ul>
                    </li>
                    </ul>
                </li>
            </ul>
            
            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <input type="text">
                <i id="top-search-close">&times;</i>
            </div>
        </header>
        
        <section id="main">
            <!--sidebar thong tin user -->
            <aside id="sidebar">
                <div class="sidebar-inner">
                    <div class="si-inner">
                        <div class="profile-menu">
                            <a href="#">
                                <div class="profile-pic">
                                    <img src="<?php echo $user_login['avatar'];?>" alt="">
                                </div>
                                
                                <div class="profile-info">
                                    <?php echo $user_login['username']; ?>
                                    <i class="md md-arrow-drop-down"></i>
                                </div>
                            </a>
                            
                            <ul class="main-menu">
                                <li> <a href="<?php echo base_url()?>hethong/users/profile/<?php echo $user_login['id']; ?>"><i class="md md-person"></i> Tài khoản</a></li>
                                <li><a href="<?php echo base_url()?>login/logout"><i class="md md-history"></i> Đăng xuất</a> </li>
                            </ul>
                        </div>
                        
                        <ul class="main-menu">
                            <?php
                                /*
                                *TAO MENU DA CAP TU DATABASE
                                    **/
                                    echo $this->menu->build_menu(); //config -> autoload
                                ?>
                        </ul>
                    </div>
                </div>
            </aside>
            <!--end sidebar thong tin user -->

            <section id="content">
                <div class="container">
                    <?php echo $contents;?>
                </div>
            </section>
        </section>
        
        
        
        <!-- Javascript Libraries -->
        <script src="<?php echo base_url()?>assets/js/jquery-2.1.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/js.cookie.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/flot/jquery.flot.min.js"></script>
          <script src="<?php echo base_url()?>assets/vendors/sparklines/jquery.sparkline.min.js"></script>
        
        <script src="<?php echo base_url()?>assets/vendors/auto-size/jquery.autosize.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/waves/waves.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/sweet-alert/sweet-alert.min.js"></script>

        <script src="<?php echo base_url()?>assets/vendors/moment/moment.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
        
        <script src="<?php echo base_url()?>assets/js/flot-charts/line-chart.js"></script>
        <script src="<?php echo base_url()?>assets/js/charts.js"></script>
        <script src="<?php echo base_url()?>assets/js/functions.js"></script>
        <script src="<?php echo base_url()?>assets/js/custom.js"></script>
        

       
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        
        <?php echo $js; ?>
<script type="text/javascript">
     $(document).ready(function () {
        // Tooltips Initialization
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $('#tabledata, #tabledata1, #tabledata2').addClass( 'nowrap' ).DataTable( {
            
            "columnDefs": [ {
                "className": 'control',
                "orderable": false,
                "targets":   1
            } ],
            "pageLength": 10,
            "lengthMenu":[10, 15, 25, 45, 75, 100],
             "language": {
                    "decimal":        "",
                    "emptyTable":     "Không có data",
                    "info":           "Hiển thị _START_ đến _END_ của _TOTAL_ dòng",
                    "infoEmpty":      "Hiển thị 0 đến 0 của 0 dòng",
                    "infoFiltered":   "(lọc ra từ _MAX_ dòng)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Xem _MENU_ dòng",
                    "loadingRecords": "Đang tải...",
                    "processing":     "Đang thực hiện...",
                    "search":         "Tìm kiếm:",
                    "zeroRecords":    "Không tìm thấy dữ liệu",
                    "paginate": {
                        "first":      "Đầu",
                        "last":       "Cuối",
                        "next":       "Tiếp",
                        "previous":   "Lùi"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }   
        });
              
    });
</script>
    </body>
  
</html>