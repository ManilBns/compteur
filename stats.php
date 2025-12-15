<?php
// Charger le nombre de pages vues
if (file_exists("save.txt")) {
    $lines = file("save.txt", FILE_IGNORE_NEW_LINES);
    $pages_vues = (int)$lines[0];
} else {
    $pages_vues = 0;
}

// +1 page vue
$pages_vues++;

// Sauvegarde
file_put_contents("save.txt", $pages_vues);

// Affichage
echo "Pages vues : $pages_vues";
?>
