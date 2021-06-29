<?php include 'compteurjarditou.php'; ?>

<!DOCTYPE html>
<html lang="fr"> 

<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0",shrink-to-fit=no>
    <title>Document Contact</title>
    <!--bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
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
       
       
        <div class="row mr-0">
            <div class="col-12 col-sm-8"> 
                <h2><b>L'entreprise</b></h2>
                <h6 class="display-8">Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme.</h6>
                <br>
                <h6>Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</h6>
                <br>
                <h6>Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie</h6>
                <br>
                <h2><b>Qualité</b></h2>
                <h6>Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet.</h6>
                <h6>Vous serez séduit par notre expertise, nos compétences et notre sérieux.</h4>
                <br>
                <h2><b>Devis gratuit</b></h2>
                <h6>Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement.</h6>
            </div>
            <div class="col-12 col-sm-4 bg-warning">[colonne de droite]</div>
        </div>
        
        </br>
        
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