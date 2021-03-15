<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>FORMULAIRE</title>
	<style>
	body
		{
			background-image:url("15.png");
			margin:auto;
			width:900px;
			font-family:"Arial";
			color:black;
			line-height:1.5em;
			margin-top:-300px;
			margin-left:400px;
			font-weight:bold;
		}
	#sub
		{
			  background-color:#48cae4;
			  color: white;
			  padding: 12px 20px;
			  border: none;
			  border-radius: 20px;
			  cursor: pointer;
		}
	input[type=text],input[type=email],input[type=password]
		
		{
		  width: 100%; 
		  padding: 12px;  
		  border: 1px solid #ccc; 
		  border-radius: 15px; 
		  box-sizing: border-box;
		  
		  margin-bottom: 16px; 
		  resize: vertical ;
		}
		th{
			border-radius: 15px;
			 background-color:#48cae4;	
		}
	</style>
	</head>
<body>
	<?php
	$link = mysqli_connect("localhost","root","","inscript") or die("Echec de connexion à la base");
session_start();
if (empty($_SESSION['id_user'])){
print "<p align='center'>Veuillez, vous connecter SVP</p>";
}
else
{
$sql="select * from etudiants where 
etudiants.cne='".$_SESSION['id_user']."'";
$result=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc ( $result );
}
?>
	<form method="POST" action="update.php" enctype="multipart/form-data">
	
	<table width=65%>
	<th >Etudiant</th>
	<tr>

	<td><label for="">CNE</label></td>
	<td><input type="text" name="Cne" required="required" placeholder="votre Nom ...." value='<?php echo
$data["cne"];?>'></td><br/>
</tr>

<tr>
	<td><label for="">Nom et Prenom</label></td>
	<td><input type="text" name="NomP" id="Nom" required="required" placeholder="votre Nom ...." value='<?php echo
$data["nom"].$data["prenom"];?>'></td><br/>
</tr>
<th>Etat civil</th>
<tr>
	
	<td><label for="">Nom</label></td>
	<td><input type="text" name="Nom" id="Nom" required="required" placeholder="votre Nom ...." value='<?php echo
$data["nom"];?>'></td><br/>
</tr>
<tr>
	
	<td><label for="">Prnom</label></td>
	<td><input type="text" name="Prenom" id="Nom" required="required" placeholder="votre Nom ...." value='<?php echo
$data["prenom"];?>'></td><br/>
</tr>
<tr>
	
	<td><label for="">CNE</label></td>
	<td><input type="text" name="CNe" id="Nom" required="required" placeholder="votre Nom ...." value='<?php echo
$data["cne"];?>'></td><br/>
</tr>
<tr>
	
	<td><label for="">Sexe</label></td>
	<td><select name="sexe">
		<option value="MM">M</option>
		<option value="FF">F</option>
	</select>
</td><br/>
</tr>
<tr>
	
	<td><label for="">Situation Familiale</label></td>
	<td><select name="SF" >
		<option value="M">Marier</option>
		<option value="C">celebataire</option>
	</select>
</td><br/>
</tr>
<th>Naissance</th>

<tr>
	<td><label for="">Date naissance</label></td>
	<td><input type="date" name="dn"  required="required" ></td><br/>
</tr>
<tr>
	<td><label for="">Ville de naissance</label></td>
	<td><input type="text" name="vn"  required="required" ></td><br/>
</tr>
<th>Adresse</th>
<tr>
	<td><label for="">Adresse</label></td>
	<td><input type="text" name="adresse"  required="required" ></td><br/>
</tr>
<tr>
	
	<td><label for="">Province/pays</label></td>
	<td><select name="province">
	<?php
include ("connexion.php");
	$sql="select * from province";
$result=mysqli_query($link,$sql);
while ($liste_province=mysqli_fetch_assoc($result))
{
echo '<option value='.$liste_province["code_pro"].'>';
echo $liste_province["lib_pro"];
echo'</option>';
}
?>
</select>
</td>
<tr>
	<td><label for="">Tel</label></td>
	<td><input type="text" name="Tel"  required="required" ></td><br/>
</tr>
<th>Bac</th>
<tr>
	<td><label for="">Serie bac</label></td>
	<td><select name="Sb">
	<?php
include ("connexion.php");
	$sql="select * from bac";
$result=mysqli_query($link,$sql);
while ($liste_bac=mysqli_fetch_assoc($result))
{
echo '<option value='.$liste_bac["code_bac"].'>';
echo $liste_bac["lib_bac"];
echo'</option>';
}
?>
</select></td><br/>
</tr>
<tr>
	<td><label for="">Mention</label></td>
	<td><select name="cM">
	<?php
include ("connexion.php");
	$sql="select * from mention";
$result=mysqli_query($link,$sql);
while ($liste_mention=mysqli_fetch_assoc($result))
{
echo '<option value='.$liste_mention["code_men"].'>';
echo $liste_mention["lib_men"];
echo'</option>';
}
?>
</select></td><br/>
</tr>
<tr>
	<td><label for="">Annee</label></td>
	<td><select name="AB">
		<option>2018</option>
		<option>2019</option>
		<option>2020</option>
	</select>
<tr>
	<td><label for="">Etablissement</label></td>
	<td><select name="CE">
	<?php
include ("connexion.php");
	$sql="select * from etablissement";
$result=mysqli_query($link,$sql);
while ($liste_etablissement=mysqli_fetch_assoc($result))
{
echo '<option value='.$liste_etablissement["code_etb"].'>';
echo $liste_etablissement["lib_etb"];
echo'</option>';
}
?>
</select></td><br/>
</tr>

<th>Photo</th>
<tr>
	<td><label for="">Deposez votre photo</label></td>
	<td><input type="file" name="fichier"  required="required" ></td><br/>
</tr>
<p> Verifier bien votre formulaire avant de cliquer sur s'inscrire</p>

<tr>
	<td><input type="submit" name="sub" value="s'inscrire" id="sub"/><td>
</tr>
	</table>
</body>
</html>



	


