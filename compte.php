<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site E-commerce | Choeur Clément | compte</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header>
        <p>P.M.U</p>
        <div class="onglets">
            <a href="accueil.html">Accueil</a>
            <a href="conseils.html">Conseils</a>
            <a href="panier.html">Panier</a>
            <p>Compte</p>
        </div>
    </header>
    <div class="contenu">
        <nav>
            <form action="verification.php" method="POST">
                <form action="connexion.php" method="post">
                    Pseudo: <input type="text" name="pseudo" />
                    <br />
                    Mot de passe: <input type="password" name="mdp" />
                    <br />
                    <input type="submit" name="connexion" value="Connexion" />
                </form>
            </form>
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