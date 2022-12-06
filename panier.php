<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site E-commerce | Choeur Clément</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                    $client = $_SESSION['client'];
                    
                    $from = $_GET['from'];
                    try{
                        $db = new PDO('mysql:host=localhost;dbname=tpecommerce', 'root', '');
                    }
                    catch(Exception $e){
                        die('Erreur : '.$e->getMessage());
                    }
                    
                    if($from == "page"){
                        
                        $sql = "SELECT nomFichier, equipe, prix, marque, tailleMaillot, quantiteTotal, montantTotal FROM maillot INNER JOIN panier ON maillot.idMaillot = panier.panierMaillot WHERE panierClient = $client;";
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
                                                    <?php echo '<p>x'.$dt['quantiteTotal'].' : '.$dt['montantTotal'].' €</p>'; ?>
                                                    <?php echo utf8_encode('<p>'.$dt['marque'].'</p>'); ?>
                                                    <?php echo utf8_encode('<p>Taille : '.$dt['tailleMaillot'].'</p>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    } else{

                        $taille = $_POST['taille'];
                        $quantite = $_POST['quantite'];
                        $maillot = $_POST['maillot'];

                        if($taille == ""){
                            echo "Aucune taille selectionné pour l'article !";
                        }elseif($quantite == ""){
                            echo "Aucune quantité selectionné pour l'article !";
                        }else{
                            $prix = $quantite * $_POST['prix'];
                            //Ajout dans le panier du maillot
                            $sql = "INSERT INTO panier (panierClient, panierMaillot, quantiteTotal, tailleMaillot, montantTotal) VALUES ('$client', '$maillot', '$quantite', '$taille', '$prix');";
                            $req = $db->prepare($sql);
                            $req->execute([
                                'panierClient' => $client,
                                'panierMaillot' => $maillot,
                                'quantiteTotal' => $quantite,
                                'montantTotal' => $prix,
                            ]);

                            $sql = "SELECT nomFichier, equipe, prix, marque, tailleMaillot, quantiteTotal, montantTotal FROM maillot INNER JOIN panier ON maillot.idMaillot = panier.panierMaillot WHERE panierClient = $client;";
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
                                                        <?php echo '<p>x'.$dt['quantiteTotal'].' : '.$dt['montantTotal'].' €</p>'; ?>
                                                        <?php echo utf8_encode('<p>'.$dt['marque'].'</p>'); ?>
                                                        <?php echo utf8_encode('<p>Taille : '.$dt['tailleMaillot'].'</p>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
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