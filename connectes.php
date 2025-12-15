<?php
session_start();

try {
    // Connexion à la base
    $pdo = new PDO(
        "mysql:host=localhost;dbname=projet_bdd;charset=utf8",
        "root",
        ""
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

/*RÉCUPÉRATION DE LA VRAIE IP (ngrok / proxy)
*/
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]);
} elseif (!empty($_SERVER['HTTP_X_REAL_IP'])) {
    $ip = $_SERVER['HTTP_X_REAL_IP'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

/*
SESSION UTILISATEUR UNIQUE
*/
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = bin2hex(random_bytes(16));
}
$session_id = $_SESSION['user_id'];

$time   = time();
$expire = $time - (5 * 60); // 5 minutes

/* TABLE `connectes` → visiteurs connectés (sessions actives)
*/
$stmt = $pdo->prepare("
    INSERT INTO connectes (ip, session_id, timestamp)
    VALUES (?, ?, ?)
    ON DUPLICATE KEY UPDATE timestamp = VALUES(timestamp)
");
$stmt->execute([$ip, $session_id, $time]);

// Supprimer les sessions inactives
$stmt = $pdo->prepare("DELETE FROM connectes WHERE timestamp < ?");
$stmt->execute([$expire]);

// Nombre de visiteurs connectés
$stmt = $pdo->query("SELECT COUNT(*) FROM connectes");
$visiteurs_connectes = (int) $stmt->fetchColumn();

/*
TABLE `visiteurs_uniques` → NE SE RÉINITIALISE JAMAIS
*/
$stmt = $pdo->prepare("
    INSERT IGNORE INTO visiteurs_uniques (ip)
    VALUES (?)
");
$stmt->execute([$ip]);

// Total visiteurs uniques (historique)
$stmt = $pdo->query("SELECT COUNT(*) FROM visiteurs_uniques");
$visiteurs_unique_total = (int) $stmt->fetchColumn();

// (Affichage facultatif)
echo "Visiteurs connectés : $visiteurs_connectes<br>";
echo "Visiteurs uniques total : $visiteurs_unique_total<br>";
?>
