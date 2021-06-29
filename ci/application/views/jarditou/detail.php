<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détail d'un produit</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <?php    
        require "connexion_bdd.php"; 

        $db = connexionBase(); 
        $pro_id = $_GET["pro_id"];
        $requete = "SELECT * FROM produits join categories on cat_id = pro_cat_id WHERE pro_id=".$pro_id; 

        $result = $db->query($requete);

        
        $produit = $result->fetch(PDO::FETCH_OBJ);
       ?>
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
      // Erreur (à gérer)
      echo "file does not exist ! ";
 } ?>
       
       <!--bannière-->
            
            <div class="col-12 d-flex justify-content-center">
                <img src="images/<?=$pro_id?>" class="w-50" alt="Image responsive" title="<?=$pro_id.".".$produit->pro_photo;?>" >
            </div>

            

            <form name="product details" id="product details">
                <div class="form-group">
                    <label for="pro_ref"><b>Référence :</b></label><input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo $produit->pro_ref?>" Readonly>
                    <label for="pro_cat"><b>Catégorie :</b></label><input type="text" class="form-control" name="pro_cat" id="pro_cat" value="<?php echo $produit->cat_nom?>" Readonly>
                    <label for="pro_libelle"><b>Libéllé produit :</b></label><input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo $produit->pro_libelle ?>" Readonly>
                    <label for="pro_description"><b>Description produit :</b></label><input type="text" class="form-control" name="pro_description" id="pro_description" value="<?php echo $produit->pro_description?>" Readonly>
                    <label for="pro_prix"><b>Prix :</b></label><input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo $produit->pro_prix ?>" Readonly>
                    <label for="pro_stock"><b>Quantité en stock :</b></label><input type="number" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo $produit->pro_stock ?>" Readonly>
                    <label for="pro_couleur"><b>Couleur Produit :</b></label><input type="text" class="form-control" name="pro_couleur" id="pro_couleur" value="<?php echo $produit->pro_couleur ?>" Readonly>
                    <br>
                    <label for="pro_bloque"><b>Produit bloqué :</b></label>
                         <div class="form-check form-check-inline">
                            <label class="form-check-label" for="pro_bloque">Oui&nbsp</label><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque1"  <?php if ($produit->pro_bloque == 1) echo"checked"; ?> disabled>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="pro_bloque">Non&nbsp</label><input class="form-check-input" type="radio" name="pro_bloque" id="pro_bloque2"   <?php if ($produit->pro_bloque == 0) echo"checked"; ?> disabled>
                        </div>
                    <br>
                    <label for="pro_d_ajout"><b>Date d'ajout :</b></label><input type="text" class="form-control" name="pro_d_ajout" id="pro_d_ajout" value="<?php echo $produit->pro_d_ajout?>" Readonly>
                    <label for="pro_d_modif"><b>Date de modification :</b></label><input type="text" class="form-control" name="pro_d_modif" id="pro_d_modif" value="<?php echo $produit->pro_d_modif?>" Readonly>
                    
                   
                </div>  

            </form>

            <div class="d-flex justify-content-center" name = actionProducts>
                <a  class="btn" href="Update/update.php?pro_id=<?=$pro_id;?>"><button class="btn-success">Modifier</button></a>
              
                <a  class="btn" href="Delete/delete.php?pro_id=<?=$pro_id;?>"><button class="btn-primary">Supprimer</button></a>
                
                <a  class="btn" href="tableau.php"><button class="btn-secondary">Retour</button></a>
            </div>


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