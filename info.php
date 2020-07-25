<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>
    
    
<?php include("includes/navigation.php");?>
    
<div id="wrapper">

    

<div class="sidebar-included container_ flex">
    
        
<aside>
    <div class="inside-content">
<h3>Info-sivun artikkelit</h3>  
    
    <ul>
        <li><a href="?page=home">Info</a></li>
        <li><a href="?page=flamingo">Flamingo</a></li>
         <li><a href="?page=ufo">Ufo</a></li>
    </ul>
    </div>
</aside>    
    
    
  <main>
      <article>
          
                    <?php 
          $page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
        
        
   case 'home':
   default:
      echo '<h2>Info-sivu</h2>';
      require_once('content/info.html');
      continue;

   case 'flamingo' :
        echo '<h2>Flamingo</h2>';
        require_once('content/flamingo.html');
        continue;
       
   case 'ufo' :
        echo '<h2>UFO</h2>';
        require_once('content/ufo.html');
        continue;
      
}
?>
          
          
      </article>
  </main>
    


</div>


<?php include("includes/footer-copy.php");?>
<?php include("includes/footer.php");?>
</div>
</body>
</html>