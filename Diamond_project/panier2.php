<?php
function f1($i)
{
$query = "SELECT categorie,prix,id_prod FROM produit where id_prod='".$i."'";
if ($result = $mysqli->query($query)) {
       while ($row = $result->fetch_assoc()) {
   echo '<ul><li class="li">categorie:  ' . $row["categorie"] .'</li><li class="li">Le prix :  '.$row["prix"]."  "."DT</li></ul>";

              if(isset($_POST['b']))
   { 
    $categorie=$row["categorie"];
    $prix=$row["prix"];
    $Ajouter="INSERT INTO panier (categorie,prix)
                              VALUES ('$categorie','$prix')";
                               if (!mysqli_query($mysqli,$Ajouter))
                        {
                          echo('impossible d’ajouter cet enregistrement : ' );
                               }
    
            }
            else echo "string"; 
           }}}
      
            ?>