<?php
/*
if(empty($_GET['location']) || empty($_GET['gps']) || empty($_GET['fhr']) || empty($_GET['date']) || empty($_GET['lure'])) {
    echo 'All fields are required';
}

elseif((null !== 'location') && (null !== 'gps') && (null !== 'fhr') && (null !== 'date') && (null !== 'lure')) {
*/
    
    
    $fishingLog = new StdClass();
    $fishingLog->location = $_GET['location'];
    $fishingLog->gps = $_GET['gps'];
    $fishingLog->fhr = $_GET['fhr'];
    $fishingLog->date = $_GET['date'];
    $fishingLog->lure = $_GET['lure'];
     
    
    $fishingLogJsonString = json_encode($fishingLog, JSON_PRETTY_PRINT);
    
    $filename = uniqid(rand(), true) . '.txt';
    
    $file = fopen('MyDataBase/'.$filename, 'w');

    fwrite($file, $fishingLogJsonString);
    fclose($file);
    echo 'Data Submitted Successfully';

//}
            
?>