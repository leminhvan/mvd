<?php  $this->config->load('site_config'); ?>
<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php  echo $this->config->item( 'title' );?></title>
        
        <!-- Vendor CSS -->
        <link href="<?php echo base_url()?>assets/vendors/animate-css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/vendors/material-icons/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/vendors/socicon/socicon.min.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="<?php echo base_url()?>assets/css/app.min.1.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/app.min.2.css" rel="stylesheet">
    </head>
    
    <body class="login-content">

        <!-- Login -->
        <div class="lc-block toggled" id="l-login">
    <?php echo form_open('login');?>
            <div class="input-group m-b-15">
                <span class="input-group-addon"><i class="md md-person"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" required autocomplete="off" placeholder="Tên đăng nhập" id="username" name="username">
                    
                </div>

            </div>
            <div class="input-group m-b-15">
                <span class="input-group-addon "><i class="md md-accessibility"></i></span>
                <div class="fg-line">
                    <input type="password" class="form-control" required id="passwd" name="passwd" placeholder="Mật khẩu">
                </div>

            </div>
            
            <div class="clearfix"></div>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="remember">
                    <i class="input-helper"></i>
                    Ghi nhớ đăng nhập
                </label>
            </div>
            
            <button type="submit" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></button>
    <?php echo form_close();?>        
            <ul class="login-navigation">
                <li data-block="#l-forget-password" class="bgm-red">QUÊN MẬT KHẨU?</li>
            </ul>
        </div>
        

        <!-- Forgot Password -->
        <div class="lc-block" id="l-forget-password">
            <p class="text-left">Nhập email để reset mật khẩu</p>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="md md-email"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Email Address">
                </div>
            </div>
            
            <a href="#" class="btn btn-login btn-danger btn-float"><i class="md md-arrow-forward"></i></a>
            
            <ul class="login-navigation">
                <li data-block="#l-login" class="bgm-green">ĐĂNG NHẬP</li>
            </ul>
        </div>
        
        
        <!-- Javascript Libraries -->
        <script src="<?php echo base_url()?>assets/js/jquery-2.1.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
        
        <script src="<?php echo base_url()?>assets/vendors/waves/waves.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/functions.js"></script>
        <script type="text/javascript">
        	function notify(message, type){
                                    $.growl({
                                        message: message
                                    },{
                                        type: type,
                                        allow_dismiss: false,
                                        label: 'Cancel',
                                        className: 'btn-xs btn-inverse',
                                        placement: {
                                            from: 'top',
                                            align: 'right'
                                        },
                                        delay: 2500,
                                        animate: {
                                                enter: 'animated bounceIn',
                                                exit: 'animated bounceOut'
                                        },
                                        offset: {
                                            x: 20,
                                            y: 85
                                        }
                                    });
                                };

            <?php
    			if($this->session->flashdata('notify') != NULL){
	            echo "notify('".$this->session->flashdata('notify')['message']."', 'danger');";
	        }
    	?>
        </script>
    </body>

</html>