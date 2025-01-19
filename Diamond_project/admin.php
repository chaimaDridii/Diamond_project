
<html>
<head>
	<title></title>
	<style type="text/css">
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
 
</style>
</head>
<title>formulaire</title>
<body>
  <center>
  
  <form method="post" action="admin2.php">
<fieldset id="coordonnees">
    <label>Email :<br> </label>
    <input type="text" name="email" size="30" /><br />
      <label>Mot de passe :<br> </label>
    <input type="text" name="mdp" size="30" /><br />

</fieldset>

  <input type="submit" value="se connecter" class="button"/>
  <input type="reset" value="Recommencer" class="button"/>

</form>

</div>
   </body>
</html>
