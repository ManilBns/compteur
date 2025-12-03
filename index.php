<?php include("connectes.php"); ?>
<?php include("stats.php"); ?>
<?php include("header.php"); ?>

<div class="hero">
    <h2>Bienvenue sur mon site !</h2>
    <p>Ce site affiche en temps réel le nombre de visiteurs connectés et quelques statistiques globales.</p>
</div>

<div class="card">
    <h2>Statistiques du site</h2>
    <div class="stats">
        <div class="stat-box">
            <h3><?php echo $visiteurs_connectes; ?></h3>
            <p>Visiteurs connectés</p>
        </div>
        <div class="stat-box">
            <h3><?php echo $pages_vues; ?></h3>
            <p>Pages vues</p>
        </div>
        <div class="stat-box">
            <h3><?php echo $visiteurs_total; ?></h3>
            <p>Visiteurs uniques</p>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
