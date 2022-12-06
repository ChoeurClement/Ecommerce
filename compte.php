<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site E-commerce | Choeur Clément | compte</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <header>
        <p>MyShirt</p>
        <div class="onglets">
            <a href="accueil.php">Accueil</a>
            <a href="conseils.php">Conseils</a>
            <a href="panier.php?from=page">Panier</a>
            <p>Compte</p>
        </div>
    </header>
    <div class="contenu">
        <nav>
        <?php 
            if(isset($_SESSION["email"])){
                echo "<p>Connecté en tant que : " . $_SESSION["email"] . "</p>";
                echo "<a href='deconnexion.php' class='button'>Déconnexion</a>";
            }else{
                ?>
                    <form action="connexion.php" method="post">
                        <p>Mail: <input type="text" name="email" /></p>
                        <p>Mot de passe: <input type="password" name="password" /></p>
                        <input type="submit" name="connexion" value="Connexion" />
                    </form>
                    <a href='inscription.html' class='button'>Inscription</a>
                <?php
            }
        ?>
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
        
    </footer>
</body>
</html>