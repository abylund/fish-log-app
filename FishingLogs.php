<?php
$directory = "MyDataBase/";
$dir = opendir($directory);
while (($file = readdir($dir)) !== false) {
  $filename = $directory . $file;
  $type = filetype($filename);
  if ($type == 'file') {
      $json = file_get_contents($filename);
      
      $myArray = json_decode($json, true);
      $myPhpObj = (object)$myArray;
     echo $myPhpObj->location . "</br>";
      

  }

}


closedir($dir);




?>
<br>
<br>
<a href="http://localhost/AddFishingLog.php"><button type="button" style="cursor: pointer;">Add Log</button></a>