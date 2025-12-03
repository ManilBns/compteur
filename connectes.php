<?php
// ---------------------------------------------
// Connexion à la base
// ---------------------------------------------
$pdo =  $pdo = new PDO(
        "mysql:host=localhost;dbname=projet_bdd;charset=utf8",
        "root",     // utilisateur par défaut de WAMP
        ""          // mot de passe par défaut de WAMP
    );

// ---------------------------------------------
// Récupérer IP du visiteur
// ---------------------------------------------
$ip = $_SERVER['REMOTE_ADDR'];  
$time = time();                  // timestamp actuel
$expire = $time - (5 * 60);      // 5 minutes d’inactivité

// ---------------------------------------------
// 1. Vérifier si l'IP existe
// ---------------------------------------------
$stmt = $pdo->prepare("SELECT ip FROM connectes WHERE ip = ?");
$stmt->execute([$ip]);

if ($stmt->rowCount() == 0) {
    // L'IP n'existe pas → insertion
    $stmt = $pdo->prepare("INSERT INTO connectes (ip, timestamp) VALUES (?, ?)");
    $stmt->execute([$ip, $time]);
} else {
    // L'IP existe → mise à jour
    $stmt = $pdo->prepare("UPDATE connectes SET timestamp = ? WHERE ip = ?");
    $stmt->execute([$time, $ip]);
}

// ---------------------------------------------
// 2. Supprimer les IP inactives depuis +5 minutes
// ---------------------------------------------
$stmt = $pdo->prepare("DELETE FROM connectes WHERE timestamp < ?");
$stmt->execute([$expire]);

// ---------------------------------------------
// 3. Compter les visiteurs connectés
// ---------------------------------------------
$stmt = $pdo->query("SELECT COUNT(*) AS nb FROM connectes");
$result = $stmt->fetch();
$visiteurs_connectes = $result['nb'];
?>
