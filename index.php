<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>CONNEXION</title>
	<style>
	body
		{
			background-image:url("15.png");
			margin:auto;
			width:900px;
			font-family:"Arial";
			color:black;
			line-height:1.5em;
			margin-top:50px;
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
		  margin-top: 6px; 
		  margin-bottom: 16px; 
		  resize: vertical ;
		}
	</style>
	</head>
<body>
<form method="POST" action="#">
	<table width=65%>
<tr>
	<td><label for="">Entrer votre CNE:</label></td>
	<td><input type="text" name="CNE"  required="required" placeholder="Votre CNE ...."></td><br/>

</tr>
<tr>
	<td><input type="submit" name="sub" value="Valider" id="sub"/><td>
</tr>
</table>
</form>
</body>
</html>
<?php
include('connexion.php');
if(isset($_POST['sub']))
{
	session_start();
	$CNE=$_POST['CNE'];
			$sql = "select * from etudiants where cne='".$CNE."'";
			$result = mysqli_query($link,$sql);
			$row = mysqli_fetch_assoc($result);
			if($row!=false){
			
				$_SESSION['id_user'] =$row['cne'] ;
				header('location:formulaire_inscription1.php');
				
			}
			else
			{  
				header('location:formulaire_inscription2.php');
			}
}


?>