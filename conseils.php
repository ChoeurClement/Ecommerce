<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site E-commerce | Choeur Clément | conseils</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <header>
        <p>MyShirt</p>
        <div class="onglets">
            <a href="accueil.php">Accueil</a>
            <p>Conseils</p>
            <a href="panier.php?from=page">Panier</a>
            <a href="compte.php">Compte</a>
        </div>
    </header>
    <div class="contenu">
        <nav>
            
        </nav>
        <section>
            <article>
                
            </article>
            <aside>
                <div class="nav-container">

                </div>
            </aside>
        </section>
    </div>
    <footer>
        <?php 
            if(isset($_SESSION["email"])){
                echo "<p>Connecté en tant que : " . $_SESSION["email"] . "</p>";
            }else{
                ?>
                    <p>Non Connecté</p>
                <?php
            }
        ?>
    </footer>
</body>
</html>