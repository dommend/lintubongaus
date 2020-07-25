<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>
    
    
<?php include("includes/navigation.php");?>
    
<div id="wrapper">

<div class="full-width container_ flex">
  <main id="fullpage">
      <article>
          <h2>Lista havannoista</h2>
          
<script>
$(document).ready(function() {
    $('#havainnot').DataTable( {
        "pageLength": 5,
        "order": [[1, 'desc']],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Finnish.json"
        }
    } );
} );
</script>

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "username", "password", "databasename");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM bongaus";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table id='havainnot'>";
            echo '<thead>';
            echo "<tr>";
                echo "<th>Laji</th>";
                echo "<th>Päivämäärä</th>";
                echo "<th>Kellonaika</th>";
                echo "<th>Kunta</th>";
                echo "<th>Paikka</th>";
                echo "<th>Määrä</th>";
                echo "<th>Lisätietoja</th>";
                echo "<th>Havannoijat</th>";
                echo "<th>Kuvahavainto</th>";
            echo "</tr>";
            echo '</thead>';
            echo '<tbody>';       

        while($row = mysqli_fetch_array($result)){
                
                echo "<tr class='data'>";
                echo "<td><strong>" . $row['laji'] . "</strong></td>";
                echo "<td>" . $row['paivamaara'] . "</td>";
                echo "<td>" . $row['kellonaika'] . "</td>";
                echo "<td>" . $row['kunta'] . "</td>";
                echo "<td>" . $row['paikka'] . "</td>";
                echo "<td>" . $row['maara'] . "</td>";
                echo "<td>" . $row['lisatietoja'] . "</td>";
                echo "<td>" . $row['havannoijat'] . "</td>";
                echo "<td class='photo' colspan='7'><a data-toggle='lightbox' href='" . $row['image'] . "'><img src='" . $row['image'] . "'/></a></td>";
                /*echo "<td>" . $row['image'] . "</td>";*/
                /*echo "<td><img src='" . $row['image'] . "'/></td>";*/
        }
        echo '<tbody>';  
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
          
          
          
          
          
          
          
          
    
   
          
      </article>
  </main>

</div>


<?php include("includes/footer-copy.php");?>
<?php include("includes/footer.php");?>
</div>

</body>
</html>