<?php
session_start();

use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();
$client = $_SESSION["client"];

try{
    $db = new PDO('mysql:host=localhost;dbname=tpecommerce', 'root', '');
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$sql = "SELECT equipe, domExt, marque, tailleMaillot, quantiteTotal, montantTotal FROM maillot INNER JOIN panier ON maillot.idMaillot = panier.panierMaillot WHERE panierClient = $client;";
$result = $db->prepare($sql);
$result->execute();
$data = $result->fetchAll();

ob_start();
require_once 'pdf-commande.php';
$html = ob_get_contents();
ob_end_clean();

$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->stream();