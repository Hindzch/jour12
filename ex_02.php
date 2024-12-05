<?php
function cesar2(string $chaine): void {
    $result = '';
    foreach (str_split($chaine) as $char) {
        if (ctype_alpha($char)) {
            $offset = ctype_upper($char) ? ord('A') : ord('a');
            $result .= chr(($offset + ((ord(strtolower($char)) - $offset + 2) % 26)));
        } else {
            $result .= $char; 
        }
    }
    echo $result . "\n";
}

// pour tester
cesar2("aBcDeFgHiJ");
cesar2("XyZ123!?");
?>
