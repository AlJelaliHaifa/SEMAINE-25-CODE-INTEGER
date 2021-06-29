<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Suppression d'un produit</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <?php    
        require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions

        $db = connexionBase(); // Appel de la fonction deconnexion
        $pro_id = $_GET["pro_id"];
        $requete = "SELECT * FROM produits  WHERE pro_id=".$pro_id;

        $result = $db->query($requete);

        // Renvoi de l'enregistrement sous forme d'un objet
        $produit = $result->fetch(PDO::FETCH_OBJ);
       ?>
    </head>
    <body> 
        <div class="container"> <!--container global de la page-->
                
            <?php include 'header/headerDetail.php'; ?>

            <br>
       
            <div class="col-12 d-flex justify-content-center">
                <img src="public/images/<?=$pro_id?>" class="w-50" alt="Image responsive" title="<?=$pro_id.".".$produit->pro_photo;?>" >
            </div>


            <h1 class="d-flex justify-content-center"><b><?=$produit->pro_libelle?></b></h1>
            <br>
            <h3>Etes vous sûr de vouloir supprimer <b><?=$produit->pro_libelle?></b> de la base de données ?<h3>

            <br>
            <br>

            <div class="d-flex justify-content-center" name = actionProduit>
                <a  class="btn" href="supprimeScript.php?pro_id=<?=$pro_id;?>"><button class="btn-success">Supprimer</button></a>
              
                <a  class="btn" href="detail.php?pro_id=<?=$pro_id;?>"><button class="btn-primary">Annuler</button></a>
            </div>

            <br>   
       
            <?php include 'footer/footer.php'; ?>
       
       
       </div>



<!--<script src="public/js/evalContact.js"></script>-->
<!--fichiers Javascript nécessaires à Bootstrap-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   </body>
   </html>