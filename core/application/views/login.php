<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top sidebar sidebar-full sidebar-dropdown sidebar-width-mini sidebar-hat"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full menuh-top sidebar sidebar-full sidebar-dropdown sidebar-width-mini sidebar-hat"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full menuh-top sidebar sidebar-full sidebar-dropdown sidebar-width-mini sidebar-hat"> <![endif]-->
<!--[if gt IE 8]> <html class="animations ie gt-ie8 fluid top-full menuh-top sidebar sidebar-full sidebar-dropdown sidebar-width-mini sidebar-hat"> <![endif]-->
<!--[if !IE]><!--><html class="animations fluid top-full menuh-top sidebar sidebar-full sidebar-dropdown sidebar-width-mini sidebar-hat"><!-- <![endif]-->
<head>
    <title><?php echo APP_NAME ?></title>
    
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
    
    <!-- Bootstrap -->    
    <link href="<?php echo site_url('common/bootstrap/css/bootstrap.css') ?>" rel="stylesheet" type="text/css" />    
    
    <!-- Glyphicons Font Icons -->
    <link href="<?php echo site_url('common/theme/fonts/glyphicons/css/glyphicons_regular.css')?>"  rel="stylesheet" />
    <link href="<?php echo site_url('common/theme/fonts/glyphicons/css/glyphicons_social.css')?>" rel="stylesheet" />
    <link href="<?php echo site_url('common/theme/fonts/glyphicons/css/glyphicons_filetypes.css')?>" rel="stylesheet" />
    

    <link rel="stylesheet" href="<?php echo site_url('common/theme/fonts/font-awesome/css/font-awesome.min.css')?>">
    <!--[if IE 7]><link rel="stylesheet" href="'common/theme/fonts/font-awesome/css/font-awesome-ie7.min.css"><![endif]-->
    
    <!-- Uniform Pretty Checkboxes -->
    <link href="<?php echo site_url('common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css')?>" rel="stylesheet" />
    
    <!-- PrettyPhoto -->
    <link href="<?php echo site_url('common/theme/scripts/plugins/gallery/prettyphoto/css/prettyPhoto.css')?>" rel="stylesheet" />
    
    <!-- JQuery -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo site_url('common/theme/scripts/plugins/system/html5shiv.js')?>"></script>
    <![endif]-->
    
    <!-- Main Theme Stylesheet :: CSS -->
    <link href="<?php echo site_url('common/theme/css/style-default-menus-light.css?1382019501')?>" rel="stylesheet" type="text/css" />
    
    
    <!-- FireBug Lite -->
    <!-- <script src="https://getfirebug.com/firebug-lite-debug.js"></script> -->

    <!-- LESS.js Library -->
    <script src="<?php echo site_url('common/theme/scripts/plugins/system/less.min.js')?>"></script>
    
    <!-- Global -->
        <script type="text/javascript" src="assets/js/common.js"></script>  
    <script type="text/javascript" src="assets/js/login.js"></script>  
    <script>
    //<![CDATA[
    var Base_URL = "<?php echo base_url() ?>";
    var Front_URL = "<?php echo site_url() ?>";
    var basePath = '',
        commonPath = '<?php echo site_url('common/')?>';

    // colors
    var primaryColor = '#e5412d',
        dangerColor = '#b55151',
        successColor = '#609450',
        warningColor = '#ab7a4b',
        inverseColor = '#45484d';

    var themerPrimaryColor = primaryColor;
    //]]>
    </script>
</head>
<body class="document-body login">
    
    <!-- Wrapper -->
<div id="login">

    <div class="container">
    
        <div class="wrapper">
        
            <h1 class="glyphicons lock">LEARNING  <i></i></h1>
        
            <!-- Box -->
            <div class="widget widget-heading-simple widget-body-gray">
                
                <div class="widget-body">
                
                    <!-- Form -->
                    <form id="frmLogin" action="#" class="row" >
                     <fieldset>
                        <label>Username or Email</label>
                            <input type="text" name="username"  class="input-block-level form-control" id="username" placeholder="Your Username or Email address"/> 
                        <label >Password <a class="password" href="">forgot it?</a></label>
                            <input type="password" name="password" class="input-block-level form-control margin-none"  id="password" placeholder="Your Password" />
                        <div class="separator bottom"></div> 
                            <div class="col-md-8 padding-none ">
                                <div class="uniformjs innerL"><label class="checkbox"><input type="checkbox" value="remember-me">Remember me</label></div>
                            </div>
                            <div class="col-md-4 pull-right padding-none" id="div_submit">                             
                                <a class="btn btn-block btn-inverse"  id="btnLogin">Sign in</a>
                            </div>
                    </fieldset>
                    </form>
         <!-- // Form END -->                            
                </div>
                <div class="widget-footer">
                    <p class="glyphicons restart errors"><i></i><span>Please enter your username and password ...</span></p>
                </div>
            </div>
      
           
            
        </div>
        
    </div>
    
</div>


    
    <!-- jQuery Event Move -->
    <script src="<?php echo site_url('common/theme/scripts/plugins/system/jquery.event.move/js/jquery.event.move.js') ?>"></script>
    
    <!-- jQuery Event Swipe -->
    <script src="<?php echo site_url('common/theme/scripts/plugins/system/jquery.event.swipe/js/jquery.event.swipe.js')?>"></script>
    
    
    <!-- Code Beautify -->
    <script src="<?php echo site_url('common/theme/scripts/plugins/other/js-beautify/beautify.js')?>"></script>
    <script src="<?php echo site_url('common/theme/scripts/plugins/other/js-beautify/beautify-html.js')?>"></script>
    
    <!-- PrettyPhoto -->
    <script src="<?php echo site_url('common/theme/scripts/plugins/gallery/prettyphoto/js/jquery.prettyPhoto.js')?>"></script>
    
    
    <!-- Modernizr -->
    <script src="<?php echo site_url('common/theme/scripts/plugins/system/modernizr.js')?>"></script>
    
    <!-- Bootstrap -->
    <script src="<?php echo site_url('common/bootstrap/js/bootstrap.min.js')?>"></script>
    
    <!-- SlimScroll Plugin -->
    <script src="<?php echo site_url('common/theme/scripts/plugins/other/jquery-slimScroll/old/jquery.slimscroll.js')?>"></script>
    
    <!-- Holder Plugin -->
    <script src="<?php echo site_url('common/theme/scripts/plugins/other/holder/holder.js?1382019501')?>"></script>
    
    <!-- Uniform Forms Plugin -->
    <script src="<?php echo site_url('common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js')?>"></script>
    
    <!-- MegaMenu -->
    <script src="<?php echo site_url('common/theme/scripts/demo/megamenu.js?1382019501')?>"></script>

        
    
</body>
</html>