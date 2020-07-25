<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>
    
    
<?php include("includes/navigation.php");?>
    
<div id="wrapper">

<div class="full-width container_ flex">

  <main>
      <article>
          <h2>Havaintolomake</h2>

          <p>Näitkö linnun tai ufon? Kerro siitä meille ja koko maailmalle! Mutta muista olla
          ilmoittamatta parhaita marjapaikkoja, sillä kaikki ilmoitukset pamahtavat suoraan
          eetteriin ilman minkäänlaista moderointia!</p>

        <p><small><span class="required">*</span> -merkillä merkityt kohdat ovat pakollisia täyttää. Lähetettyäsi tiedot sinut ohjataan Havainnot-sivulle.</small></p>
          
          
<form class="form-horizontal" name="havaintolomake" method="post" enctype='multipart/form-data'>
    <fieldset>

        <div class="form-group">
            <label class="col-md-4 control-label" for="laji">Laji<span class="required">*</span></label>
            <div class="col-md-4">
                <input id="laji" name="laji" type="text" placeholder="Laji" class="form-control input-md" required="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="paivamaara">Päivämäärä<span class="required">*</span></label>
            <div class="col-md-4">
                <input id="datetimepicker" name="paivamaara" type="text" value="Päivämäärä" onkeydown="return false" class="form-control input-md no-select" required="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="paivamaara">Kellonaika<span class="required">*</span></label>
            <div class="col-md-4">
                <input id="datetimepicker2" name="kellonaika" type="text" value="Kellonaika" onkeydown="return false" class="form-control input-md" required="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="paivamaara">Kunta<span class="required">*</span></label>
            <div class="col-md-4">
                <input id="kunta" name="kunta" type="text" placeholder="Kunta" class="form-control input-md" required="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="paivamaara">Paikka<span class="required">*</span></label>
            <div class="col-md-4">
                <input id="paikka" name="paikka" type="text" placeholder="Paikka" class="form-control input-md" required="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="paivamaara">Määrä<span class="required">*</span></label>
            <div class="col-md-4">
                <input id="maara" name="maara" type="number" placeholder="Määrä" class="form-control input-md" required="">
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="textarea">Lisätietoja</label>
            <div class="col-md-4">
                <textarea id="lisatietoja" name="lisatietoja" class="form-control" id="textarea"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="paivamaara">Havannoijat<span class="required">*</span></label>
            <div class="col-md-4">
                <input id="havannoijat" name="havannoijat" type="text" placeholder="havannoijat" class="form-control input-md" required="">
            </div>
        </div>
       
        <div class="form-group">
            <label class="col-md-4 control-label" for="Kuva">Kuva</label>
            <div class="col-md-4">
                <input id="file" name="file" class="input-file" type="file">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="submit">Lähetä</label>
            <div class="col-md-4">
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Lähetä</button>
            </div>
        </div>

    </fieldset>
</form>

      
            
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link  = mysqli_connect("localhost", "username", "password", "database");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    
}

if(isset($_POST['submit'])){

  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){



$image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

// Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
  }


$laji = mysqli_real_escape_string($link, $_REQUEST['laji']);
$paivamaara = mysqli_real_escape_string($link, $_REQUEST['paivamaara']);
$kellonaika = mysqli_real_escape_string($link, $_REQUEST['kellonaika']);
$kunta = mysqli_real_escape_string($link, $_REQUEST['kunta']);
$paikka = mysqli_real_escape_string($link, $_REQUEST['paikka']);
$maara = mysqli_real_escape_string($link, $_REQUEST['maara']);
$lisatietoja = mysqli_real_escape_string($link, $_REQUEST['lisatietoja']);
$havannoijat = mysqli_real_escape_string($link, $_REQUEST['havannoijat']);
 
// Attempt insert query execution
$sql = "INSERT INTO bongaus (laji, paivamaara, kellonaika, kunta, paikka, maara, lisatietoja, havannoijat, image) VALUES ('$laji', '$paivamaara', '$kellonaika', '$kunta', '$paikka', '$maara', '$lisatietoja', '$havannoijat', '".$image."')";
if(mysqli_query($link, $sql)){
    echo "<div class='info success'>Tieto lisättiin kantaan onnistuneesti.</div>";
    echo "<script>location.href='havainnot.php';</script>";


} else{
    echo "<div class='info fail'>Virhe: Tietoa ei lisätty kantaan. $sql. </div>" . mysqli_error($link);
}
    

// Close connection
mysqli_close($link); 
    
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