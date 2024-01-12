<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <style type="text/css">
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
<form action="demande.php" method="post"  enctype="multipart/form-data">
        <label>Nom:</label> <input type="text" name="nom"><br><br>
        <label>Prenom:</label> <input type="text" name="prenom"><br><br>
        <label>Email:</label> <input type="text" name="email"><br><br>
        <label>Fontion:</label> <input type="text" name="fonction"><br><br>
        <input type="submit" value="valider"> <br>
       
    </form>
   
</body>
</html>