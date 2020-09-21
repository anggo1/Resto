<!DOCTYPE html>
<html>
  <head>
    <title>RESTAURANT</title>
    <!-- meta -->
    <?php echo @$_meta; ?>

    <!-- css --> 
    <?php echo @$_css; ?>

  </head>
	<?php 
	if ($userdata->pengguna_level=='4'){
		echo'<body class="hold-transition layout-top-nav">';
	}
	else { echo '<body class="hold-transition sidebar-mini layout-fixed  layout-footer-fixed sidebar-collapse">';}

?>
<div class="wrapper">
	
      <!-- header -->
      <?php echo @$_header; ?> <!-- nav -->
      
      <?php 
		if ($userdata->pengguna_level=='4')
		{ echo @$_sidebar_2; }
		else {echo @$_sidebar; }?>
      
      <!-- content -->
      <?php echo @$_content; ?> <!-- headerContent --><!-- mainContent -->
    
      <!-- footer -->
      <?php echo @$_footer; ?>
    
</div>
    <!-- js -->
    <?php echo @$_js; ?>
	
  </body>
</html>
