<div style='position: fixed; top: 5px; right: 5px;'><?php echo $_COOKIE['UserFirstName'] . " " . substr($_COOKIE['UserLastName'], 0, 1) . "." ?> | <a href="/login.php" name="logout">Logout</a></div>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
Location: <input type="text" name="location"><br>
GPS Location: <input type="text" name="gps"><br>
Number of Fish Caught per Hour: <input type="text" name="fhr"><br>
Date: <input type="date" name="date"><br>
<input type="radio" name="lure" value="fly">Fly Fishing<br>
<input type="radio" name="lure" value="bait">Bait Fishing
    <br>
<input type="submit" value="Submit">     
    
<?php
    
if(empty($_POST['location']) || empty($_POST['gps']) || empty($_POST['fhr']) || empty($_POST['date']) || empty($_POST['lure'])) {
    echo 'All fields are required';
}

elseif((null !== 'location') && (null !== 'gps') && (null !== 'fhr') && (null !== 'date') && (null !== 'lure')) {



 $fishingLog = new StdClass();
    $fishingLog->location = $_POST['location'];
    $fishingLog->gps = $_POST['gps'];
    $fishingLog->fhr = $_POST['fhr'];
    $fishingLog->date = $_POST['date'];
    $fishingLog->lure = $_POST['lure'];
    $fishingLog->email = $_COOKIE['UserEmailAddress'];
    $fishingLog->pw = $_COOKIE['UserPassword'];
     
    
    $fishingLogJsonString = json_encode($fishingLog, JSON_PRETTY_PRINT);
    
    $filename = uniqid(rand(), true) . '.txt';
    
    $file = fopen('MyDataBase/'.$filename, 'w');

    fwrite($file, $fishingLogJsonString);
    fclose($file);
    echo 'Data Submitted Successfully';

}  

?>