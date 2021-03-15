<?php
include ("connexion.php");
session_start();
$sexe=$_POST["sexe"];
$daten=$_POST["dn"];
$villen=$_POST["vn"];
$sf=$_POST["SF"];
$adresse=$_POST["adresse"];
$pro=$_POST["province"];
$tel=$_POST["Tel"];
	if(isset($_FILES['fichier']) and $_FILES['fichier']['error']==0)
	{
		$dossier= 'photo/';
		$temp_name=$_FILES['fichier']['tmp_name'];
		if(!is_uploaded_file($temp_name))
		{
		exit("le fichier est untrouvable");
		}
		if ($_FILES['fichier']['size'] >= 1000000){
			exit("Erreur, le fichier est volumineux");
		}
		$infosfichier = pathinfo($_FILES['fichier']['name']);
		$extension_upload = $infosfichier['extension'];
		
		$extension_upload = strtolower($extension_upload);
		$extensions_autorisees = array('png','jpeg','jpg');
		if (!in_array($extension_upload, $extensions_autorisees))
		{
		exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png)");
		}
		$nom_photo=$numapp.".".$extension_upload;
		if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
		exit("Probleme dans le telechargement de l'image, Ressayez");
		}
		$ph_name=$nom_photo;
	}
	else{
		$ph_name="inconnu.jpg";
	}
$sql="update etudiants set
sexe='$sexe',date_naissance='$daten',ville_naissance='$villen',situation_familliale='$sf',adresse='$adresse',code_pro='$pro',tel='$tel',photo='$ph_name'where
CNE='".$_SESSION['id_user']."'";
$resultat=mysqli_query($link,$sql);
if ($resultat==true) {
header('location:Confirmation.php');
}else{echo "Erreur lors de la modification de votre compte";}
?>
<?php
include ("connexion.php");

  		 if(isset($_POST['sub']))
  		{
  			$codeE=$_POST['CNe'];
			$CodeB=$_POST['Sb'];
			$CodeM=$_POST['cM'];
			$AnObBac=$_POST['AB'];
			$codeEt=$_POST['CE'];
			
				$requette="INSERT INTO bac_etudiant VALUES('$codeE','$CodeB','$CodeM','$AnObBac','$codeEt')";
				$resultat=mysqli_query($link,$requette);
				
				
			
		}?>




