<?php session_start();
$_SESSION['email']='email';
$_SESSION['mdp']='mdp';
if(!isset($_SESSION['try']))
{ $_SESSION['try']=0;}

  ?>
<html>
<head><style type="text/css">h1{ background-image: url("imagee.jpg");
  	background-repeat: no-repeat;
background-size: 150%;
color:white;
font-size: 4em;
  	width: 15em;
  	margin-left: 3em;
  border-radius: 1em;
  margin-top: 4em; }

body{background-image: url("imagee.jpg");
  	background-repeat: no-repeat;
background-size: 120%;}
h1:hover{opacity: 50%;}

</style></head>
<?php 
$conn = mysqli_connect("127.0.0.1","root","","diamond");
if(!empty($_POST['email']))
{if(!empty($_POST['mdp'])){
$select1= mysqli_query($conn, "SELECT * FROM admin WHERE email = '".$_POST['email']."'");
$select2 = mysqli_query($conn, "SELECT * FROM admin WHERE motpass = '".$_POST['mdp']."'");
if (mysqli_num_rows($select1)>0 && mysqli_num_rows($select2)>0) {
        header("location:admin3.php");}
       
       else
        ?> <h1><center>l'admin n'existe pas </h1></center><br><center><a href="inscrit.html">tapez ici pour l'inscription</a> </center>
                <?php ;}}
                else
                  echo '<h1 style="background-image: url("imagee.jpg")"><center>les champs doivent etre remplie </h1></center>';
?>

   
</html>