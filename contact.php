<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>base de donner</title>
</head>

<body>
  <?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupération des valeur du formulaire
    $nom= htmlspecialchars($_POST["nom"]);
    $email= htmlspecialchars($_POST["email"]);
    $message= htmlspecialchars($_POST["message"]);
    $object= htmlspecialchars($_POST["object"]);

  $_server = "localhost";
  $nomUtilisateur = "root";
  $motDePasse = "";
  $basededonnees = "contact";


  try {
    $connexion = new PDO("mysql:host=$_server;dbname=$basededonnees", $nomUtilisateur, $motDePasse);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $requete = $connexion->prepare("INSERT INTO contact (message,nom,email,object) VALUES (:message, :nom, :email,:object)");

    $requete->bindParam(":message", $message);
    $requete->bindParam(":nom", $nom);
    $requete->bindParam(":email", $email);
    $requete->bindParam(":object", $object);
    $requete->execute();

    echo "Enregistrement manuel reussi !";
  } catch (PDOException $e) {
    echo 'echec de linssertion' . $e->getMessage();
  }
  }
   ?>



</body>

</html>