<?php
// Charger les stats
$lines = file("save.txt", FILE_IGNORE_NEW_LINES);

$pages_vues = (int)$lines[0];
$visiteurs_total = (int)$lines[1];

// +1 page vue
$pages_vues++;

// Vérifier si le visiteur est nouveau
$ip = $_SERVER['REMOTE_ADDR'];
$day = date("Y-m-d");

// On stocke les IP du jour dans un fichier
if (!file_exists("ip_journalier.txt")) {
    file_put_contents("ip_journalier.txt", "");
}

$ips = file("ip_journalier.txt", FILE_IGNORE_NEW_LINES);

if (!in_array($ip, $ips)) {
    // Nouveau visiteur → +1
    $visiteurs_total++;

    // Ajouter l'IP
    file_put_contents("ip_journalier.txt", $ip.PHP_EOL, FILE_APPEND);
}

// Sauvegarde
file_put_contents("Save.txt", $pages_vues . PHP_EOL . $visiteurs_total);

?>
