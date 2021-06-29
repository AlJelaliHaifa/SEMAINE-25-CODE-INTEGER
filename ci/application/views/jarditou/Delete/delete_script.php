<?php

//récupération de l'identifiant passé en GET

$pro_id = $_GET["pro_id"];

require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction deconnexion

$pro_id = $_GET["pro_id"];

//construction de la requête DELETE sans injection SQL

$requete = $db->prepare("DELETE from produits WHERE pro_id=:pro_id");

$requete->bindValue(':pro_id', $pro_id);
$requete->execute();

//libère la connection au serveur de BDD
$requete->closeCursor();

//redirection vers index.php
header("Location: tableau.php");
exit;

?>