<?php
function my_sort(array &$tableau): int {
    static $calls = 0;  
    $calls++;  

    
    if (count($tableau) > 1) {
        $temp = $tableau[0];
        $tableau[0] = $tableau[count($tableau) - 1];
        $tableau[count($tableau) - 1] = $temp;
    }

    return $calls;  
}

// Exemple d'appels pour tester
$arr = [1, 2, 3, 4];
echo "Nombre d'appels : " . my_sort($arr) . "\n";
print_r($arr);

echo "Nombre d'appels : " . my_sort($arr) . "\n";
print_r($arr);
?>
