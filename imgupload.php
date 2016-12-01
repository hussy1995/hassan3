<?php

if(isset($_REQUEST['submit'])){
    
    $imgfolder='images';
    if(!is_dir($imgfolder)){
        mkdir($imgfolder);
    }
    $userfolder=$imgfolder."/Hassan";
    
    if(!is_dir($userfolder)){
        mkdir($userfolder);
        
    }
    
    $imagepath1=$imgfolder."/".basename($_FILES["myfile"]["name"]);
    $imagepath2=$userfolder."/".basename($_FILES["myfile"]["name"]);
    $imagetype=  pathinfo($imagepath1, PATHINFO_EXTENSION);
    $imagetype2=  pathinfo($imagepath2, PATHINFO_EXTENSION);
    $filesize=$_FILES["myfile"]["size"];
    $allowedfiles=  array("jpg","JPG");
}
if($filesize>10000000){
?>
<script>
alert("File size exceede from the range");
window.open("index.php", "_self");
</script>
<?php
}
elseif (!in_array($imagetype2,$allowedfiles)) {
    move_uploaded_file($_FILES["myfile"]["tmp_name"], $imagepath2);
    ?>
<script>
alert("File uploaded Sucessfully");
</script>
<?php
}
elseif (file_exists($imagepath1)){
?>
<script>
alert("File already exists");
window.open("index.php", "_self");
</script>
<?php
}
 else {
    move_uploaded_file($_FILES["myfile"]["tmp_name"],$imagepath1);
    ?>
<script>
    alert("File Uploded Sucessfully");
</script>
<?php
}
?>