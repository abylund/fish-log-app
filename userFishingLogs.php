<style>
.items {position: relative; top: 40px; padding-left: 30px;}
.items li {display: inline-block; padding: 10px; font-size: 12px; width: 95px; font-family: arial;} 
.header li {font-size: 14px; background: #eee;}
</style>

<div style='position: fixed; top: 5px; right: 5px;'><?php echo $_COOKIE['UserFirstName'] . " " . substr($_COOKIE['UserLastName'], 0, 1) . "." ?> | <a href="/login.php" name="logout">Logout</a></div>

<ul class="items header"><li>Date</li><li>Location</li><li>GPS Location</li><li>Fish Caught/Hr</li><li>Lure Type</li></ul>

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
      if (($myPhpObj->email == $_COOKIE['UserEmailAddress']) && ($myPhpObj->pw == $_COOKIE['UserPassword']) ) {
          
          
      
          // print out each fishing log with a hr dividing them.
    echo('<ul class="items">');
    echo('<li>' . $myPhpObj->date . '</li>');
	echo('<li>' . $myPhpObj->location . '</li>');
	echo('<li>' . $myPhpObj->gps . '</li>');
	echo('<li>' . $myPhpObj->fhr . '</li>');
    echo('<li>' . $myPhpObj->lure . '</li>');
    echo('</ul>');
	//echo(myPhpObj->otherProperty...);


          
          
          
          
          
          
          /*
          
          $items = get_object_vars($myPhpObj);

          
            if (!function_exists('make_ulli')) {
                
            function make_ulli($array){
                array_splice($array, 5);

                $output = '<table class="items"><tr class="header"><td>Location</td><td>GPS Location</td><td>Number of Fish Caught</td><td>Date</td><td>Fly or Bait</td></tr>
                
                <tr  class="items">';
                foreach($array as $item){  
                    
                    $output .= '<td>' . $item;
                    $output .= '</td>';

                }   
                $output .= '</tr>';

                return $output;
            }
          
         
          
          echo make_ulli($items); 
          
        
          
      }
      
      */    
          
      }
      
  } 
}



closedir($dir);



?>
<br>
<br>
<a href="http://localhost/AddFishingLog.php"><button type="button" style="cursor: pointer; margin-left: 30px;">Add Log</button></a>