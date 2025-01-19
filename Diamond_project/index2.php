<html>
<head><style> 

  .img{width:35em;
height:35em;border:1em; border: red;}
.img:hover{opacity: 80em;}
h4{display: inline-block; border-spacing:3em; }
p{color :red; font-style: margin-top:-3em;
}</style></head><body>
  <?php

	$mysqli = new mysqli("127.0.0.1","root","","diamond");
/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();}
if(!empty($_POST)){
    if($_POST['s1']=="Collier")
	{
		$query = "SELECT nom_prod,categorie,prix FROM produit where categorie='collier'";

if ($result = $mysqli->query($query)) {

       while ($row = $result->fetch_assoc()) {
		  $i=$row["nom_prod"];
        echo '<h6><center><img src="'.$i.'.jpg " class="img"/>';
           echo '<br><p>'.$row["prix"].'DT</p></center></h6>';}}}
    if($_POST['s1']=="Bagues")
  {
    $query = "SELECT nom_prod,categorie,prix FROM produit where categorie='bague'";

if ($result = $mysqli->query($query)) {

       while ($row = $result->fetch_assoc()) {
      $i=$row["nom_prod"];
           echo '<h6><center><img src="'.$i.'.jpg " class="img"/>';
           echo '<br><p>'.$row["prix"].'DT</p></center></h6>';}}}
    if($_POST['s1']=="Boucles")
  {
    $query = "SELECT nom_prod,categorie,prix FROM produit where categorie='boucles'";

if ($result = $mysqli->query($query)) {

       while ($row = $result->fetch_assoc()) {
      $i=$row["nom_prod"];
           echo '<h6><center><img src="'.$i.'.jpg " class="img"/>';
           echo '<br><p>'.$row["prix"].'DT</p></center></h6>';}}}
if($_POST['s1'] == "Bracelets")
{
$query = "SELECT nom_prod,categorie,prix FROM produit where categorie='bracelet'";

if ($result = $mysqli->query($query)) {

       while ($row = $result->fetch_assoc()) {
		  $i=$row["nom_prod"];
           echo '<h6><center><img src="'.$i.'.jpg " class="img"/>';
           echo '<br><p>'.$row["prix"].'DT</p></center></h6>';}}}}
 
?>
</body>
</html>