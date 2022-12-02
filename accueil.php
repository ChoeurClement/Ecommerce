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
                <p>Sélections</p>
                <?php
                    try{
                        $db = new PDO('mysql:host=localhost;dbname=tpecommerce', 'root', '');
                    }
                    catch(Exception $e){
                        die('Erreur : '.$e->getMessage());
                    }

                    $sql = "SELECT equipe FROM maillot GROUP BY equipe;";
                    $result = $db->prepare($sql);
                    $result->execute();
                    
                    if($result->rowCount() > 0){
                        ?>
                            <ul>
                        <?php
                        $data = $result->fetchAll();
                        foreach ($data as $dt) {
                            echo utf8_encode('<li>'.$dt['equipe'].'</li>');
                        }
                    }
                ?>
                            </ul>
            </div>
        </nav>
        <section>
            <article>
                <?php 
                    $sql = "SELECT nomFichier FROM maillot;";
                    $result = $db->prepare($sql);
                    $result->execute();
                    
                    if($result->rowCount() > 0){
                        ?>
                            <ul>
                        <?php
                        $data = $result->fetchAll();
                        foreach ($data as $dt) {
                            echo '<img src="maillot/'.$dt['nomFichier'].'"/>';
                        }
                    }
                ?>
            </article>
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