<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Creer un compte</title>
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


<?php
      
session_start();  
 
session_destroy();  
  

echo "Vous avez bien deconnecter .<br/>";
echo"<a href=index.php>Acceuil</a>";

exit;
?>