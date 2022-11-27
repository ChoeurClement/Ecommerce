<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site E-commerce | Choeur Clément | accueil</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header>
        <p>MyShirt</p>
        <div class="onglets">
            <p>Accueil</p>
            <a href="conseils.php">Conseils</a>
            <a href="panier.php">Panier</a>
            <a href="compte.php">Compte</a>
        </div>
    </header>
    <div class="contenu">
        <nav>
            <div class="nav-container">
                <p>Rechercher</p>
                <input type="text" id="recherche" name="recherche" size="11">
                <input type="button" value="Ok">
            </div>
            <div class="nav-container">
                <p>Catégories</p>
                <ul>
                    <li>1</li>
                </ul>
            </div>
            <div class="nav-container">
                <p>Conseils</p>
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                </ul>
            </div>
        </nav>
        <section>
            <article>
                <p>Promotion</p>
            </article>
            <aside>
                <div class="nav-container">
                    <p>Conseils</p>
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                    </ul>
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