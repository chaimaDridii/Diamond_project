<!DOCTYPE html>
<html>
<head>
		<style type="text/css">h1{color:red;}
	table{background-color: pink;
	width: 40em;
height: 5em;}</style>
	<title></title>
</head>
<body>
	<form method="post">
	<?php
$mysqli = new mysqli("127.0.0.1","root","","diamond");
/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();}
   
    $query = "SELECT categorie,prix FROM panier ";
if ($result = $mysqli->query($query)) {
	echo'<table ><tr><td> produit </td><td>Le prix </td></tr><br>';
       while ($row = $result->fetch_assoc()) {
   echo   '<td>'.$row["categorie"].'</td><td>de prix'.$row["prix"].'</td><td><input type="submit" name="b2" value="supprimer un produit" /></tr>';
if(isset($_POST['b2']))
	{  $query2 = "DELETE FROM panier where categorie='".$row["categorie"]."'";}
  if (!mysqli_query($mysqli,$query2))
                        {
                          echo('impossible de supprimer cet enregistrement : ' );
                               }}}

    
   echo'</table> ';
   $query = "SELECT sum(prix) as totale FROM panier  ";
if ($result = $mysqli->query($query)) {
	  while ($row = $result->fetch_assoc()) {
	echo '<br> le prix totale est egale a  :'.$row["totale"] ;}}
?>
</form>
</body>
</html>