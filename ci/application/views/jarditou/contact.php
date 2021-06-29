<?php

$lastNameError = $firstNameError = $sexError = $dateError = $postalCodeError = $adressError = $cityError = $eMailError = $questError = $selectError = "";
$lastNameCheck = $firstNameCheck = $sex1Check = $sex2Check = $dateCheck = $postalCodeCheck = $adressCheck = $cityCheck = $eMailCheck = $questCheck = $selectCheck0 = $selectCheck1 = $selectCheck2 = $selectCheck3 = $selectCheck4 = false;

if ((isset($_POST["submit"])) and ( !(preg_match('#[A-Z]{1}[a-z]*#', $_POST["lastName"]) and  preg_match('#[A-Z]{1}[a-z]*#', $_POST["firstName"]) and (isset($_POST['sex'])) and preg_match('#[0-9]{2}\/[0-9]{2}\/[0-9]{4}#', $_POST["date"]) and preg_match('#[0-9]{5}#', $_POST["postalCode"])
         and preg_match('#[1-9]+ .* [0-9]{5} [A-Z]{1}[a-z]#', $_POST["adress"]) and preg_match('#[_a-z0-9-]+(.\[_a-z0-9-]+)*@[a-z]+\.[a-z]{2,3}#', $_POST["eMail"]) and (!($_POST['Sujet']) == 0) and preg_match('#.+#', $_POST["question"])  ) || true == true ) ){

    
    if (empty($_POST['lastName']) || !preg_match('#[A-Z]{1}[a-z]*#', $_POST["lastName"])) {
         $lastNameError = "Entrez un nom valide ";
     }
    else{
        $lastNameCheck = true;
       
    }

    if (empty($_POST['firstName']) || !preg_match('#[A-Z]{1}[a-z]*#', $_POST["firstName"])) {
        $firstNameError = "Entrez un prénom valide ";
    }
    else{
       $firstNameCheck = true;
    }

    if (!(isset($_POST['sex']))){
       $sexError = "Veuillez renseigner un sexe";
    } 
    else if (($_POST['sex'] =='F')){$sex1Check = true;}
    else {$sex2Check = true;}
    
    if (empty($_POST['date']) || !preg_match('#[0-9]{2}\/[0-9]{2}\/[0-9]{4}#', $_POST["date"])) {
        $dateError = "Entrez une date valide format jj/mm/aaaa";
    }
    else{
       $dateCheck = true;
    }

    if (empty($_POST['postalCode']) || !preg_match('#[0-9]{5}#', $_POST["postalCode"])) {
        $postalCodeError = "Entrez un code postal à 5 chiffres";
    }
    else{
        $postalCodeCheck = true;
    }

    if (empty($_POST['adress']) || !preg_match('#[1-9]+ .*#', $_POST["adress"])) {
        $adressError = "Entrez une adresse ";
    }
    else{
       $adressCheck = true;
    }

    if (empty($_POST['city']) || !preg_match('#[A-Z]{1}[a-z]*#', $_POST["city"])) {
        $cityError = "Entrez une ville ";
    }
   else{
       $cityCheck = true;
      
   }

    if (empty($_POST['eMail']) || !preg_match('#[_a-z0-9-]+(.\[_a-z0-9-]+)*@[a-z]+\.[a-z]{2,3}#', $_POST["eMail"])) {
        $eMailError = "Entrez un mail ";
    }
    else{
       $eMailCheck = true;
    }

    
    
    if (($_POST['Sujet']) == 0){$selectk0=true; $selectError = "Choisir une question";}
    else if (($_POST['Sujet']== 1)){$selectCheck1 = true;}
    else if (($_POST['Sujet']== 2)){$selectCheck2 = true;}
    else if (($_POST['Sujet']== 3)){$selectCheck3 = true;}
    else if (($_POST['Sujet']== 4)){$selectCheck4 = true;}



    if (empty($_POST['question']) || !preg_match('#.+#', $_POST["question"])) {
        $questError = "Entrez une question";
    }
    else{
       $questCheck = true;
    }

    if (preg_match('#[A-Z]{1}[a-z]*#', $_POST["lastName"]) and  preg_match('#[A-Z]{1}[a-z]*#', $_POST["firstName"]) and (isset($_POST['sex'])) and preg_match('#[0-9]{2}\/[0-9]{2}\/[0-9]{4}#', $_POST["date"]) and preg_match('#[0-9]{5}#', $_POST["postalCode"])
         and preg_match('#[1-9]+ .*#', $_POST["adress"]) and preg_match('#[_a-z0-9-]+(.\[_a-z0-9-]+)*@[a-z]+\.[a-z]{2,3}#', $_POST["eMail"]) and (!($_POST['Sujet']) == 0) and preg_match('#.+#', $_POST["question"])) 
         {echo '<script> window.alert("Le formulaire est corectement remplie, confirmer l\'envoie pour enregistrement"); </script>';}


?>
<!DOCTYPE html>
<html lang="fr"> 
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0",shrink-to-fit=no>
    <title>Document Contact</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
   
    <div class="container"> <!--container de la page-->
    
    <?php 
 if (file_exists("header.php") ) 
 {
      include("header.php");
 } 
 else 
 {
      // Erroreur (à gérer)
      echo "file does not exist ! ";
 }  ?>

        <p id="contact"></p>
        <h1><b>Vos Coordonées</b></h1>  
        <p>*Ces zones sont obligatoires</p>
        <form name="formulaire" id="formulaire" method="post" action="<?php if (preg_match('#[A-Z]{1}[a-z]*#', $_POST["lastName"]) and  preg_match('#[A-Z]{1}[a-z]*#', $_POST["firstName"]) and (isset($_POST['sex'])) and preg_match('#[0-9]{2}\/[0-9]{2}\/[0-9]{4}#', $_POST["date"]) and preg_match('#[0-9]{5}#', $_POST["postalCode"])
         and preg_match('#[1-9]+ .*#', $_POST["adress"]) and preg_match('#[_a-z0-9-]+(.\[_a-z0-9-]+)*@[a-z]+\.[a-z]{2,3}#', $_POST["eMail"]) and (!($_POST['Sujet']) == 0) and preg_match('#.+#', $_POST["question"])) {echo "affichage.php";}?>">

 <!--action="affichage.php"-->   
            <div class="form-group">
                <label for="lastName"><b>Nom*</b></label><input type="text" class="form-control" name="lastName" id="lastName"  value='<?php if ($lastNameCheck) echo strip_tags($_POST["lastName"]); ?>' placeholder="Veuillez saisir votre nom" > <!--formcontrol pour mettre la zone de saisie en dessous du titre du champs-->
                <span id="alerte-lastName"> <?php echo $lastNameError;?></span>
                <br>
                <label for="firstName"><b>Prénom*</b></label><input type="text" class="form-control" name="firstName" id="firstName" value='<?php if ($firstNameCheck) echo strip_tags($_POST['firstName']); ?>' placeholder="Veuillez saisir votre prénom">
                <span id="alerte-firstName"><?php echo $firstNameError;?></span> 
            </div>
            
            <b>sexe*&nbsp</b>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="sex"><input class="form-check-input" type="radio" name="sex" id="sex1" value='F' <?php if ($sex1Check) echo "checked"; ?>>Féminin</label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="sex"><input class="form-check-input" type="radio" name="sex" id="sex2" value='M' <?php if ($sex2Check) echo "checked"; ?>>Masculin</label>
            </div>
            <br>
            <span id="alerte-sex"><?php echo $sexError;?></span>
            <br>
            
            <div class="form-group">
                <label for="date"><b>Date de naissance*</b></label><input type="text" class="form-control" name="date" id="date" value='<?php if ($dateCheck) echo strip_tags($_POST['date']); ?>'>
                <span id="alerte-date"><?php echo $dateError;?></span> 
                <br>
                <label for="postalCode"><b>Code postal*</b></label><input type="number" class="form-control" name="postalCode" id="postalCode" value='<?php if ($postalCodeCheck) echo strip_tags($_POST['postalCode']); ?>'>
                <span id="alerte-postalCode"><?php echo $postalCodeError;?></span> 
                <br>
                <label for="adress"><b>Adresse*</b></label><input type="text" class="form-control" name="adress" id="adress" value='<?php if ($adressCheck) echo strip_tags($_POST['adress']); ?>'>
                <span id="alerte-adress"><?php echo $adressError;?></span> 
                <br>
                <label for="city"><b>Ville*</b></label><input type="text" class="form-control" name="city" id="city" value='<?php if ($cityCheck) echo strip_tags($_POST['city']); ?>'>
                <span id="alerte-city"><?php echo $cityError;?></span> 
                <br>
                <label for="eMail"><b>Email*</b></label><input type="email" class="form-control" name="eMail" id="eMail" value='<?php if ($eMailCheck) echo strip_tags($_POST['eMail']); ?>' placeholder="date.loper@afpa.fr">
                <span id="alerte-eMail"><?php echo $eMailError;?></span> 
                <br>
            </div>
            <h1><b>Votre demande</b></h1>
                <label for="Sujet">Sujet</label>
                <select class="form-control" name="Sujet" id="Sujet">
                    <option value = 0 <?php if ($selectCheck0) echo "selected" ?>>Veuillez séléctionner un sujet</option>
                    <option value = 1 <?php if ($selectCheck1) echo "selected" ?>>Mes commandes</option>
                    <option value = 2 <?php if ($selectCheck2) echo "selected" ?>>Question sur un produit</option>
                    <option value = 3 <?php if ($selectCheck3) echo "selected" ?>>Réclamations</option>
                    <option value = 4 <?php if ($selectCheck4) echo "selected" ?>>Autres</option>
                </select>
                <span> <?php echo $selectError;?></span>  
                <br>
                <p>Votre question*:</p>
                <textarea name="question" class="ml-1 row col-12 col-sm-12" id="question" rows="3"><?php if ($questCheck) echo strip_tags($_POST['question']); ?></textarea>
                <span id="alerte-question"><?php echo $questError;?></span> 
                <br>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input is-invalid" type="checkbox"  id="accept" required>
                    <label class="form-check-label" for="accept">J'accepte le traitement informatique de ce formulaire</label>
                </div>
            </div>
            <button class="btn btn-dark" type="submit" name="submit" value="1" required>ENVOYER</button>
            <button class="btn btn-dark" type="button" id="cancel">ANNULER</button>
        </form>
        <br>
        
        <?php 
 if (file_exists("footer.php") ) 
 {
    include("footer.php");
 } 
 else 
 {
      // Erreur (à gérer)
      echo "file does not exist ! ";
 } 
    
?>   
    </div>
    



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>



<?php

echo'
<script>
     document.querySelector("#efface").onclick= function(){
           if(confirm("êtes-vous sur(e) de vouloir effacer?")){
                     document.getElementById("formulaire").reset();
              }
     }
</script>';
}



else {  
     
 ?>

<!DOCTYPE html>
<!-- langue de la page web -->
<html lang="fr"> 

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0",shrink-to-fit=no>
    <title>Document Contact</title>
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
   <!--container de la page-->
    <div class="container"> 
    
    <?php 
 if (file_exists("header.php") ) 
 {
    include("header.php");
 } 
 else 
 {
      // Erreur (à gérer)
      echo "file does not exist ! ";
 } 
    
?>

        <p id="contact"></p>
        <h1><b>Vos Coordonées</b></h1>  
        <p>*Ces zones sont obligatoires</p>
        <form name="formulaire" id="formulaire" method="post"> 
            <div class="form-group">
                <label for="lastName"><b>Nom*</b></label><input type="text" class="form-control" name="lastName" id="lastName"  placeholder="Veuillez saisir votre nom"> 
                <span id="alerte-lastName"></span>
                <br>
                <label for="firstName"><b>Prénom*</b></label><input type="text" class="form-control" name="firstName" id="firstName" placeholder="Veuillez saisir votre prénom">
                <span id="alerte-firstName"></span> 
            </div>
            
            <b>sexe*&nbsp</b>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="sex1"><input class="form-check-input" type="radio" name="sex1" id="sex1" value="sex1">Féminin</label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label" for="sex2"><input class="form-check-input" type="radio" name="sex2" id="sex2" value="sex2">Masculin</label>
            </div>
            <br>
            <span id="alerte-sex"></span>
            <br>
            
            <div class="form-group">
                <label for="date"><b>Date de naissance*</b></label><input type="text" class="form-control" name="date" id="date">
                <span id="alerte-date"></span> 
                <br>
                <label for="postalCode"><b>Code postal*</b></label><input type="number" class="form-control" name="postalCode" id="postalCode">
                <span id="alerte-postalCode"></span> 
                <br>
                <label for="adress"><b>Adresse*</b></label><input type="text" class="form-control" name="adress" id="adress">
                <span id="alerte-adress"></span> 
                <br>
                <label for="city"><b>Ville*</b></label><input type="text" class="form-control" name="city" id="city" >
                <span id="alerte-city"><?php echo $cityError;?></span> 
                <br>
                <label for="eMail"><b>Email*</b></label><input type="email" class="form-control" name="eMail" id="eMail" placeholder="date.loper@afpa.fr">
                <span id="alerte-eMail"></span> 
                <br>
            </div>
            <h1><b>Votre demande</b></h1>
                <label for="Sujet">Sujet</label>
                <select class="form-control" name="Sujet" id="Sujet">
                    <option value="">Veuillez séléctionner un sujet</option>
                    <option>Mes commandes</option>
                    <option>Question sur un produit</option>
                    <option>Réclamations</option>
                    <option>Autres</option>
                </select>  
                <br>
                <p>Votre question*:</p>
                <textarea name="question" class="ml-1 row col-12 col-sm-12" id="question" rows="3"></textarea>
                <span id="alerte-question"></span> 
                <br>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input is-invalid" type="checkbox"  id="accept">
                    <label class="form-check-label" for="accept">J'accepte le traitement informatique de ce formulaire</label>
                </div>
            </div>
            <button class="btn btn-dark" type="submit" name="submit" value="1" >ENVOYER</button>
            <button class="btn btn-dark" type="button" id="cancel">ANNULER</button>
        </form>
        <br>
       
        <?php 
 if (file_exists("footer.php") ) 
 {
    include("footer.php");
 } 
 else 
 {
      // Erreur (à gérer)
      echo "file does not exist ! ";
 } 
    
?>
    </div>




<!--fichiers Javascript nécessaires à Bootstrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php


     
if (isset($_POST["lastName"]))  
       {echo ' <script> window.alert("Demande enregistré"); </script>';}


 echo'
       <script>
            document.querySelector("#efface").onclick= function(){
                  if(confirm("êtes-vous sur(e) de vouloir effacer?")){
                            document.getElementById("formulaire").reset();
                     }
            }
       </script>';

} 

?>