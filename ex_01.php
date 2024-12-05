<?php
function printArray(array $tableau): void {
    foreach ($tableau as $key => $value) {
        echo "[$key] => [$value]\n";
    }
}


$test = ['name' => 'John', 'age' => 25, 'city' => 'Paris'];
printArray($test);
?>
