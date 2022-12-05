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
            <a href="panier.php?from=page">Panier</a>
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
                            echo utf8_encode('<li><a href="equipe.php?equipe='.$dt['equipe'].'">'.$dt['equipe'].'</a></li>');
                        }
                    }
                ?>
                            </ul>
            </div>
            <div class="nav-container">
                <p>Marque</p>
                <?php
                    $sql = "SELECT marque FROM maillot GROUP BY marque;";
                    $result = $db->prepare($sql);
                    $result->execute();
                    
                    if($result->rowCount() > 0){
                        ?>
                            <ul>
                        <?php
                        $data = $result->fetchAll();
                        foreach ($data as $dt) {
                            echo utf8_encode('<li><a href="marque.php?marque='.$dt['marque'].'">'.$dt['marque'].'</a></li>');
                        }
                    }
                ?>
                            </ul>
            </div>
            <div class="nav-container">
                <p>Couleur principale</p>
                <?php
                    $sql = "SELECT couleurPrincipal FROM maillot GROUP BY couleurPrincipal;";
                    $result = $db->prepare($sql);
                    $result->execute();
                    
                    if($result->rowCount() > 0){
                        ?>
                            <ul>
                        <?php
                        $data = $result->fetchAll();
                        foreach ($data as $dt) {
                            echo utf8_encode('<li><a href="couleur.php?couleurPrincipal='.$dt['couleurPrincipal'].'">'.$dt['couleurPrincipal'].'</a></li>');
                        }
                    }
                ?>
                            </ul>
            </div>
        </nav>
        <section>
            <article>
                <?php 
                    $sql = "SELECT idMaillot, nomFichier, equipe, prix, marque FROM maillot;";
                    $result = $db->prepare($sql);
                    $result->execute();
                    
                    if($result->rowCount() > 0){
                        $data = $result->fetchAll();
                        foreach ($data as $dt) {
                            ?>
                                <div class="container">
                                    <div class="card">
                                        <div class="box">
                                            <div class="content">
                                                <?php echo utf8_encode('<h3>'.$dt['equipe'].'</h3>'); ?>
                                                <?php echo '<img src="maillot/'.$dt['nomFichier'].'"/>'; ?>
                                                <?php echo '<p>'.$dt['prix'].' €</p>'; ?>
                                                <?php echo utf8_encode('<p>'.$dt['marque'].'</p>'); ?>
                                                <form action="panier.php?from=post" method="post">
                                                    <input name="maillot" value="<?php echo $dt['idMaillot'];?>" type="hidden">
                                                    <input name="prix" value="<?php echo $dt['prix'];?>" type="hidden">
                                                    <select name="taille" id="taille-select">
                                                        <option value="">--Choisissez une taille--</option>
                                                        <option value="S">S</option>
                                                        <option value="M">M</option>
                                                        <option value="L">L</option>
                                                        <option value="XL">XL</option>
                                                    </select>
                                                    <button class="button3" type="submit">Ajouter au panier</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
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