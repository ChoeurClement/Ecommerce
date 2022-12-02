<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=TpEcommerce', "root", "");

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$codePostal = $_POST['codePostal'];
$ville = $_POST['ville'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$password = $_POST['password'];

$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO client (nom, prenom, adresse, codePostal, ville, telephone, email, password) VALUES ('$nom', '$prenom', '$adresse', '$codePostal', '$ville', '$telephone', '$email', '$password');";
$req = $db->prepare($sql);
$req->execute([
    'email' => $email,
    'password' => $password,
    'adresse' => $adresse,
    'codePostal' => $codePostal,
    'ville' => $ville,
    'telephone' => $telephone,
    'email' => $email,
    'password' => $password
]);
echo "Compte crée";
?>