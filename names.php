<?php
$names = explode('---', file_get_contents('names.txt'));
$nameslength = count($names);

for($name = 0; $name < $nameslength; $name++) {
    echo "<div style='font-weight: bold;'>$names[$name]</div>";
    echo "<br>";
    
}

?>