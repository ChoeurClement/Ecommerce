<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Site E-commerce | Choeur Clément | accueil</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <header>
        <p>MyShirt</p>
    </header>
    <div class="contenu">
        <section>
            <article>
                <?php
                    try{
                        $db = new PDO('mysql:host=localhost;dbname=tpecommerce', 'root', '');
                    }
                    catch(Exception $e){
                        die('Erreur : '.$e->getMessage());
                    }

                    $client = $_SESSION["client"];

                    // Requête pour les informations du client
                    $sql = "SELECT * FROM client WHERE idClient = $client;";
                    $result = $db->prepare($sql);
                    $result->execute();

                    if($result->rowCount() > 0){
                        $data = $result->fetchAll();
                        foreach ($data as $dt) {
                             echo "<h1>".$dt['prenom'].", merci d'avoir passé(e) commande chez nous !</h1>";
                             echo "<p> Adresse de livraison : ".$dt['adresse'].", ".$dt['codePostal'].", ".$dt['ville']."</p>";
                        }
                    }

                    // Requête pour le détail de la commande
                    $sql = "SELECT equipe, couleurPrincipal, marque, tailleMaillot, quantiteTotal, montantTotal FROM maillot INNER JOIN panier ON maillot.idMaillot = panier.panierMaillot WHERE panierClient = $client;";
                    $result = $db->prepare($sql);
                    $result->execute();
                    
                    if($result->rowCount() > 0){
                        $data = $result->fetchAll();
                        foreach ($data as $dt) {
                             echo '<p>'.$dt['equipe'].' : '.$dt['couleurPrincipal'].'(x'.$dt['quantiteTotal'].'), '.$dt['marque'].' taille '.$dt['tailleMaillot'].' | '.$dt['montantTotal'].'€</p>';
                        }
                    }

                    // Requête pour le prix total de la commande
                    $sql = "SELECT SUM(montantTotal) AS somme FROM panier WHERE panierClient = $client;";
                    $result = $db->prepare($sql);
                    $result->execute();
                    
                    if($result->rowCount() > 0){
                        $data = $result->fetchAll();
                        foreach ($data as $dt) {
                             echo '<h2>Montant total de la commande : '.$dt['somme'].'€</h2>';
                        }
                    }
                ?>
            </article>
        </section>
    </div>
</body>
</html>