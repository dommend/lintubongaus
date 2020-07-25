
<script type="text/javascript">
 jQuery("body").append(jQuery("<div><dt/><dd/></div>").attr("id", "progress"));
            jQuery("#progress").width(100+ "%");
            jQuery("#progress").width("101%").delay(800).fadeOut(400, function() {
            jQuery(this).remove();
});    
</script>


<nav id="dekstop">
    <div class="container_ flex-left">
        
        <?php 
        // function to get the current page name
function PageName() {
  return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

$current_page = PageName(); ?>

        <div id="nav-title">
        <a href="index.php">Bongarit Ry</a>
        </div>
        
      <ul>  
        <li><a class="<?php echo $current_page == 'index.php' ? 'active':NULL ?>" href="index.php">Etusivu</a></li>
        <li><a class="<?php echo $current_page == 'havaintolomake.php' ? 'active':NULL ?>" href="havaintolomake.php">Havaintolomake</a></li>
        <li><a class="<?php echo $current_page == 'havainnot.php' ? 'active':NULL ?>" href="havainnot.php">Havainnot</a></li>
        <li><a class="<?php echo $current_page == 'info.php' ? 'active':NULL ?>" href="info.php">Info</a></li>
      </ul>
        
    </div>
</nav>


<!--Navbar-->
<nav id="mobile" class="navbar navbar-dark">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="#">Bongarit Ry</a>

  <!-- Collapse button -->
  <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
    aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
      <i class="material-icons">menu</i>
    </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent1">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li><a class="<?php echo $current_page == 'index.php' ? 'active':NULL ?>" href="index.php">Etusivu</a></li>
        <li><a class="<?php echo $current_page == 'havaintolomake.php' ? 'active':NULL ?>" href="havaintolomake.php">Havaintolomake</a></li>
        <li><a class="<?php echo $current_page == 'havainnot.php' ? 'active':NULL ?>" href="havainnot.php">Havainnot</a></li>
        <li><a class="<?php echo $current_page == 'info.php' ? 'active':NULL ?>" href="info.php">Info</a></li>
    </ul>
    <!-- Links -->

  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
