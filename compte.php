<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site E-commerce | Choeur Clément | compte</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header>
        <p>MyShirt</p>
        <div class="onglets">
            <a href="accueil.php">Accueil</a>
            <a href="conseils.php">Conseils</a>
            <a href="panier.php">Panier</a>
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
                    <a href='inscription.php' class='button'>Inscription</a>
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
        <p>Ceci est un footer</p>
    </footer>
</body>
</html>