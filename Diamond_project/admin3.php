<?php session_start();
$_SESSION['email']='email';
$_SESSION['mdp']='mdp';
if(!isset($_SESSION['try']))
{ $_SESSION['try']=0;}

  ?>
<!DOCTYPE html>
<html>
<head><style type="text/css">
    p{color :red ;
      position: center;
      font-size: bold;}
    input.button
{
  
  
  background-color: black;
  color: white;

font-family: "Times New Roman",serif;
   text-align:center;
  font-size:1em;
     border-radius: 2em;
  width: 16em;
  height: 2em;

}
input.button:hover{opacity: 85%;}
 fieldset#coordonnees {
  padding-top: 1em;
    width:8.9em;
    height: 9em;
    margin-top:1em;
    margin-bottom:-0.1em;
  background-image:url("img777.jpg");
  border-radius: 1em;
    text-align:center;
    font-size: 1.2em;
     border:1px outset  gray;
}
#coordonnees label {
 color:white;
font-size:0.9em;
font-family: "Times New Roman",serif;
right:middle;
text-shadow: 2px 2px 5px grey;
} 
</style></head>
<body>
  <center>
  <form method="post" >
<fieldset id="coordonnees">
  <label class="l1">Nom : </label>
    <input type="text" name="nom" size="30" /><br />
  <label class="l1">Prix : </label>
    <input type="text" name="prix" size="30" /><br />
    <label class="l1">Categories :</label>
    <input type="text" name="categories" size="30"  /><br />
    <label class="l1">id : </label>
    <input type="text" name="id" size="30" /><br />
 </fieldset>

<br><br> <input type="submit" name="bouton1" value="ajouter un produit" class="button"/> 
<input type="submit" name="bouton2" value="supprimer un produit" class="button"/>
</body>
</form>
</center>
</html>
<?php

$conn = mysqli_connect("127.0.0.1","root","","diamond");


if (!$conn){ // Contrôler la connexion
  echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
    echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
    echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
    exit;
       }
	else {

  
	 if(isset($_POST['bouton1']))
 {            $nom=$_POST['nom'];
                 $prix=$_POST['prix'];
                 $categories=$_POST['categories'];
                 $id=$_POST['id'];  
              $select1= mysqli_query($conn, "SELECT * FROM produit WHERE id_prod= '".$id."'");
             if(mysqli_num_rows($select1)>0 )
	             {
	             	echo"<h1><center> Cet produit est deja existe</center></h1>";
	             }
                   else{
                     $Ajouter="INSERT INTO produit (nom_prod,prix,categorie,id_prod)
                              VALUES ('$nom','$prix', '$categories', '$id')";
                        }

                    if (!mysqli_query($conn,$Ajouter))
                      	{
	                      echo"<p>impossible d’ajouter produit ";
	                           }
	                           else
	                        {echo "<p>l'ajout se fait avec succes</p>";}
	
} else if (isset($_POST['bouton2']))

{ $id=$_POST['id'];  
   $select2= mysqli_query($conn,"SELECT * FROM produit WHERE id_prod= '".$id."'");
          if(mysqli_num_rows($select2)==0 )
	             {
	             	echo"<h1><center>cet produit n'existe pas</center></h1>";
	             }
                   else{
                   	$delete="DELETE FROM produit WHERE id_prod ='".$id."' ";
                   
                   	if (!mysqli_query($conn,$delete))
                      	{
	                      echo"<p>impossible de supprimer cet produit ";
	                           }
	                           else
	                        {echo"<br><p>la suppression se fait avec succes</p>";}}}}
                   	?>
