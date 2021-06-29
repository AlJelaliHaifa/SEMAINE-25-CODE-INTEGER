<?php
$lastNameCheck = $firstNameCheck = $sexCheck = $dateCheck = $postalCodeCheck = $adressCheck = $cityCheck = $eMailCheck = $questCheck = $sujetCheck = false;
echo "<h1>Affichage des informations du formulaire</h1><br>";

// NOM
if (!(empty($_POST["lastName"]))){
    echo "<h4>Nom : ".$_POST['lastName']."</h4>";
    if (preg_match('#[A-Z]{1}[a-z]*#', $_POST["lastName"]))
        {$lastNameCheck = true;}
    }
else{
    echo "<h4>Nom : Non renseigné(e)</h4>";
} 
//Prenom
if (!(empty($_POST["firstName"]))){
    echo "<h4>Prénom : ".$_POST['firstName']."</h4>";
    if (preg_match('#[A-Z]{1}[a-z]*#', $_POST["firstName"]))
        {$firstNameCheck = true;}
    }
else{
    echo "<h4>Prénom : Non renseigné(e)</h4>";
} 

//Sexe
if(isset($_POST['sex']) and ($_POST['sex']) == 'F'){
    echo "<h4>Sexe : Féminin</h4>";
    $sexCheck = true;
    }
else if (isset($_POST['sex']) and ($_POST['sex']) == 'M') {
    echo "<h4>Sexe : Masculin</h4>";
    $sexCheck = true;
    }
else {
    echo "<h4>Sexe : Non renseigné(e)</h4>";
}  

//Date de naisance
if (!(empty($_POST["date"]))){
    echo "<h4>Date de naissance : ".$_POST['date']."</h4>";
    if (preg_match('#[0-9]{2}\/[0-9]{2}\/[0-9]{4}#', $_POST["date"]))
        {$dateCheck = true;}
    }
else{
    echo "<h4>Date de naissance : Non renseigné(e)</h4>";
} 

//Code postal
if (!(empty($_POST["postalCode"]))){
    echo "<h4>Code Postal : ".$_POST['postalCode']."</h4>";
    if (preg_match('#[0-9]{5}#', $_POST["postalCode"]))
        {$postalCodeCheck = true;}
    }
else{
    echo "<h4>Code Postal : Non renseigné(e)";
} 

//Adresse
if (!(empty($_POST["adress"]))){
    echo "<h4>Adresse : ".$_POST['adress']."</h4>";
    if (preg_match('#[1-9]+ .*#', $_POST["adress"]))
        {$adressCheck = true;}
    }
else{
    echo "<h4>Adresse : Non renseigné(e)";
} 

//Ville
if (!(empty($_POST["city"]))){
    echo "<h4>Ville : ".$_POST['city']."</h4>";
    if (preg_match('#[A-Z]{1}[a-z]*#', $_POST["city"]))
        {$cityCheck = true;}
    }
else{
    echo "<h4>Ville : Non renseigné(e)";
} 

//Mail
if (!(empty($_POST["eMail"]))){
    echo "<h4>Email : ".$_POST['eMail']."</h4>";
    if (preg_match('#[_a-z0-9-]+(.\[_a-z0-9-]+)*@[a-z]+\.[a-z]{2,3}#', $_POST["eMail"]))
        {$eMailCheck = true;}
    }
else{
    echo "<h4>Email : Non renseigné(e)";
}

//Sujet
if (!(empty($_POST["Sujet"]))){
    if (($_POST['Sujet']) == "1") {echo "<h4>Sujet : "."Mes Commandes"."</h4>";}
    if (($_POST['Sujet']) == "2") {echo "<h4>Sujet : "."Question sur un produit"."</h4>";}
    if (($_POST['Sujet']) == "3") {echo "<h4>Sujet : "."Réclamations"."</h4>";}
    if (($_POST['Sujet']) == "4") {echo "<h4>Sujet : "."Autres"."</h4>";}
    $sujetCheck = true;
    }
else{
    echo "<h4>Sujet : Non renseigné(e)";
} 

//Commentaire
if (!(empty($_POST["question"]))){
    echo "<h4>Commentaire : ".$_POST['question']."</h4>";
    if (preg_match('#.+#', $_POST["question"]))
    {$questCheck = true;}
    }
else{
    echo "<h4>Commentaire : Non renseigné(e)";
} 

if ($lastNameCheck == true and $firstNameCheck == true and $sexCheck == true and $dateCheck == true and $postalCodeCheck == true and $adressCheck == true and $cityCheck == true and $eMailCheck == true and 
    $questCheck == true and $sujetCheck == true)
 {echo ' <script> window.alert("Demande enregistré"); </script>';
    header("Location: contact.php");}


?>