<?php
function resum_join_str(string $chaine_1, string $chaine_2): mixed {
    if (empty($chaine_1) || empty($chaine_2)) {
        return false; // Retourner FALSE si une des chaînes est manquante
    }

    // Récupérer les 12 premiers caractères de la première chaîne
    $part1 = substr($chaine_1, 0, 12);
    // Compléter avec des points si nécessaire
    $part1 = str_pad($part1, 12, '.');

    // Récupérer les 8 derniers caractères de la deuxième chaîne
    $part2 = substr($chaine_2, -8);
    // Compléter avec des points si nécessaire
    $part2 = str_pad($part2, 8, '.');

    return $part1 . $part2;
}

//  pour tester
echo resum_join_str("HelloWorld", "PHP Rocks!") . "\n";
echo resum_join_str("Short", "Tiny") . "\n";
echo resum_join_str("", "Missing") === false ? "FALSE\n" : "Erreur\n";
?>
