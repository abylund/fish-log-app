<?php

setcookie ("UserFirstName", "", time() - 3600);
setcookie ("UserLastName", "", time() - 3600);
setcookie ("UserEmailAddress", "", time() - 3600);
setcookie ("UserPassword", "", time() - 3600);


?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
email: <input type="text" name="email" value="<?php $email ?>"><br>
password: <input type="text" name="pw" value="<?php $email ?>"><br>

<input type="submit" value="Submit" name="submit"> 
</form>


<?php    
    
$directory = "Users/";
$dir = opendir($directory);
while (($file = readdir($dir)) !== false) {
  $filename = $directory . $file;
  $type = filetype($filename);
  if ($type == 'file') {
      $json = file_get_contents($filename);
      $myArray = json_decode($json, true);
      $myPhpObj = (object)$myArray;
      if (($myPhpObj->email == $_POST['email']) && ($myPhpObj->pw == $_POST['pw']) ) {
        
setcookie("UserFirstName", $myPhpObj->fn);
setcookie("UserLastName", $myPhpObj->ln);
setcookie("UserEmailAddress", $myPhpObj->email);
setcookie("UserPassword", $myPhpObj->pw);  
          
header("Location: /userFishingLogs.php");
      }
    
      
  } 
}



closedir($dir);

?>