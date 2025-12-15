<?php include("connectes.php"); ?>
<?php include("stats.php"); ?>
<?php include("header.php"); ?>

<!-- Lien vers le mini-chat en haut à droite -->
<!-- Bouton flottant moderne sans CSS externe -->
<div style="position: fixed; top: 120px; right: 20px; z-index: 1000;">
    <a href="https://unegoistically-apprehensive-edna.ngrok-free.dev/manil_chat" 
       style="
           display: inline-flex;
           align-items: center;
           gap: 6px;
           padding: 10px 18px;
           background-color: #1e5aa0;
           color: white;
           font-weight: bold;
           font-size: 15px;
           text-decoration: none;
           border-radius: 25px;
           box-shadow: 0 4px 6px rgba(0,0,0,0.2);
           transition: all 0.2s ease;
       "
       onmouseover="this.style.backgroundColor='#154080'; this.style.transform='translateY(-2px)';"
       onmouseout="this.style.backgroundColor='#1e5aa0'; this.style.transform='translateY(0)';"
    >
        💬 Mini-Chat
    </a>
</div>

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
            <h3><?php echo $visiteurs_unique_total; ?></h3>
            <p>Visiteurs uniques</p>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
