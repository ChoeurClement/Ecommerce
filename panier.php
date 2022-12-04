<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site E-commerce | Choeur Clément</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header>
        <p>MyShirt</p>
        <div class="onglets">
            <a href="accueil.php">Accueil</a>
            <a href="conseils.php">Conseils</a>
            <p>Panier</p>
            <a href="compte.php">Compte</a>
        </div>
    </header>
    <div class="contenu">
        <nav>
            
        </nav>
        <section>
            <article>
                <h1>Voici le(s) article(s) présent dans votre panier.</h1>
                <?php 
                    $maillot = $_POST['maillot'];
                    $client = $_SESSION['client'];
                    $taille = $_POST['taille'];
                    $prix = $_POST['prix'];

                    try{
                        $db = new PDO('mysql:host=localhost;dbname=tpecommerce', 'root', '');
                    }
                    catch(Exception $e){
                        die('Erreur : '.$e->getMessage());
                    }

                    $sql = "INSERT INTO panier (panierClient, panierMaillot, quantiteTotal, montantTotal) VALUES ('$client', '$maillot', 1, '$prix');";
                    $req = $db->prepare($sql);
                    $req->execute([
                        'panierClient' => $client,
                        'panierMaillot' => $maillot,
                        'quantiteTotal' => 1,
                        'montantTotal' => $prix,
                    ]);

                    $sql = "SELECT nomFichier, equipe, prix, marque, taille, quantiteTotal FROM maillot INNER JOIN panier ON maillot.idMaillot = panier.panierMaillot WHERE panierClient = $client;";
                    $req = $db->prepare($sql);
                    $req->execute();
                    
                    if($req->rowCount() > 0){
                        $data = $req->fetchAll();
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