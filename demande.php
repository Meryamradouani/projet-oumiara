<?php
session_start();
include('connexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $fonction = $_POST['fonction'];
    $query = "SELECT * FROM demandeur WHERE email = '$email'";

    $resultat = mysqli_query($link, $query);
    if (mysqli_num_rows($resultat) > 0) {
        $user = mysqli_fetch_assoc($resultat);
       if ($nom == $user['Nom']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['nom'] = $user['Nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['fonction']=$user['fonction'];
            $_SESSION['id_demandeur'] = $user['id_demandeur'];
       }}
       $requette="INSERT INTO demandeur(Nom,prenom,email,fonction) VALUES('$nom','$prenom','$email','$fonction')";
       $resultat=mysqli_query($link,$requette);
    mysqli_close($link);
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf_8" />
		<title>creer un compte</title> 
	<style>
/* Styles pour le formulaire */
form {
    width: 500px;
    padding: 20px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    margin-left:420px;
  }
  
  label {
    display: block;
    margin-bottom: 8px;
  }
  
  input[type="text"],
  input[type="email"],
  input[type="password"] {
    width: 100%;
    padding: 12px 20px;
    margin-bottom: 20px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  input[type="submit"] {
    width: 100%;
    background-color: blue;
    color: white;
    padding: 14px 20px;
    margin-bottom: 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  input[type="submit"]:hover {
    background-color: lightblue;
  }
	</style>
	</head>
	<body>
	
		<form action="traitement.php" method="post"  enctype="multipart/form-data">
			<label for="Titre">Titre:</label>
			<input type="text" name="titre" required="required"/>
            <label for="Createur">Createur:</label>
			<input type="text" name="createur" required="required"/>
			<label for="Date_debut">Date_debut:</label>
			<input type="date"  name="dated" required="required"/>
            <label for="Date_fin">Date_fin:</label><br>
			<input type="date"  name="datef" required="required"/>
			<label for="Lieu">Lieu</label><br>
			<input type="text" name="lieu" required="required"/>
            <label for="Description">Description</label><br>
			<input type="text" name="description" required="required"/>
             <label for="fichier">Photo:</label>
			<input type="file" name="fichier"/>
			<input type="submit" name="submit" value="Valider" style="width: 200px;text-align: center;"/>
		</form>
	</body>
</html>
