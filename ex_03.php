<?php
function rev_epur_str(string $chaine): mixed {
    if (empty(trim($chaine))) {
        return false; 
    }
    // Supprimer les espaces multiples, tabulations et retours à la ligne
    $words = preg_split('/\s+/', trim($chaine));
    // Renverser l'ordre des mots
    $reversed = array_reverse($words);
    // Joindre les mots avec un espace
    return implode(' ', $reversed);
}

//  pour tester
echo rev_epur_str("  Bonjour    le monde !  ") . "\n";
echo rev_epur_str("\tHello\nWorld\n") . "\n";
echo rev_epur_str("") === false ? "FALSE\n" : "Erreur\n";
?>
