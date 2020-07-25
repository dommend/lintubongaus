<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link  = mysqli_connect("localhost", "jani", "G3FrcqB6kK8", "janin_koulujutut");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    
}


$name = $_FILES['file']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

     
// Select file type
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



$image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
// Upload file
move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);



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
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
    



// Close connection
mysqli_close($link);
?>

