<!DOCTYPE html>
<html lang="fr"> 
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0",shrink-to-fit=no>
    <title>Document Contact</title>
    
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


   
    if(isset($_GET['page']) && !empty($_GET['page'])){
         $currentPage = (int) strip_tags($_GET['page']);
    }else{
        $currentPage = 1;
    }

     
     require "connexion_bdd.php"; 
     
     $db = connexionBase(); 

    //PAGINATION
    
   
    $sql = "SELECT COUNT(*) AS nb_articles FROM produits"; 
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetch();
    $nbArticles = (int) $result['nb_articles'];
    $parPage = 8;
    $pages = ceil($nbArticles / $parPage);
    $premier = ($currentPage * $parPage) - $parPage;

    $requete = 'SELECT * FROM produits  LIMIT :premier ,:parpage';

    $result = $db->prepare($requete);


    $result->bindValue(':premier', $premier, PDO::PARAM_INT);
    $result->bindValue(':parpage', $parPage, PDO::PARAM_INT);

    $result->execute();
   

  
   


    if (!$result) 
    {
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Erreur dans la requête");
    }

    if ($result->rowCount() == 0) 
    {
    // Pas d'enregistrement
    die("La table est vide");
    }
     
     ?>

    <br>
    <a href="add.php"><button>AJOUT</button></a>
     
    <p id="tableau"></p>
    <div class="table-responsive"> <!--tableau responsive-->
      <table class="table table-hover table-bordered w-100 w-sm-50"> 
          <thead>
            <tr class="table-active">
              <th>Photo</th>
              <th>ID</th>
              <th>Référence</th>
              <th>Libellé</th>
              <th>Prix</th>
              <th>stock</th>
              <th>Couleur</th>
              <th>Ajout</th>
              <th>Modif</th>
              <th>bloqué</th>
            </tr>   
          </thead>
          <tbody>

          <?php 

<td class="d-flex justify-content-center table-warning"><img src="jarditou_photos/<?=$row->pro_id.".".$row->pro_photo;?>" alt="<?=$row->pro_id.".".$row->pro_photo;?>" width="100"></td>
            while ($row = $result->fetch(PDO::FETCH_OBJ)){
                    
                echo'<tr>';?>
                    <td class="table-warning"><img src="public/images/<?=$row->pro_id.".".$row->pro_photo;?>" alt="<?=$row->pro_id.".".$row->pro_photo;?>" width="100">.</td>
                    
            <?php
                    echo"<th>".$row->pro_id."</th>";
                    echo"<th class='table-warning'>".$row->pro_ref."</th>";
                    echo '<th><a href="detail.php?pro_id='.$row->pro_id.'" title='.$row->pro_libelle.'>'.$row->pro_libelle.'</a></th>';
                    echo"<th class='table-warning'>".$row->pro_prix."</th>";
                    
                    if ($row->pro_stock == 0)  {echo"<th>"."Rupture de stock"."</th>";} else {echo"<th>".$row->pro_stock."</th>";}
                    
                    echo"<th class='table-warning'>".$row->pro_couleur."</th>";
                    echo"<th>".$row->pro_d_ajout."</th>";
                    echo"<th class='table-warning'>".$row->pro_d_modif."</th>";
                    
                    if ($row->pro_bloque == 1){   ?>
                        <th>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalScrollable">Bloqué</button>
                            <div class="modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenteredLabel">Produit Bloqué</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">Nous vous tiendront informé sur les futurs disponibilités du produit</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
             <?php  }
                echo"</tr>";
            }

          ?>
         
          </tbody>        
      </table>
    </div>


            <!-- nav de pagination -->
    <nav>
        <ul class="pagination d-flex justify-content-center">
         
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>"> 
                <a href="tableau.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for($page = 1; $page <= $pages; $page++): ?>
                
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="tableau.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
           
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>"> 
                <a href="tableau.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>
    
    <?php include 'footer.php'; ?>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>