<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nom = $_POST['Nom'];
    $Description = $_POST['Description'];
    $Prix = $_POST['Prix'];
    $Stock = $_POST['Stock'];
    $Categorie = $_POST['Categorie'];
    $Photo = $_POST['Photo'];

    try {
        $sql = "INSERT INTO Produits (Nom, Description, Prix, Stock, Categorie, Photo, AdminID) VALUES (:Nom, :Description, :Prix, :Stock, :Categorie, :Photo, :AdminID)";
        $stmt = $connexion->prepare($sql);

        $stmt->bindParam(':Nom', $Nom);
        $stmt->bindParam(':Description', $Description);
        $stmt->bindParam(':Prix', $Prix);
        $stmt->bindParam(':Stock', $Stock);
        $stmt->bindParam(':Categorie', $Categorie);
        $stmt->bindParam(':Photo', $Photo);
        $stmt->bindParam(':AdminID', $_SESSION['AdminID']); // assuming AdminID is stored in the session

        $stmt->execute();

        echo 'Le Produit a été ajouté avec succès!';
        header("Refresh:2; url=display_Admin.php");
        exit();
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('bzz.jpg')no-repeat;
            background-size: cover;
            background-position: center;
        }
        h1,label{
        color:white;
        }
        input{
            background:transparent;
            color:white;
        }
        .container{
            backdrop-filter: blur(5px); 
            position: relative;
            text-align: center;
            border: 2px double brown;
            padding: 30px;
            width: 600px;
        }
        table{
            display:flex;
            justify-content: center;
        }
    </style>
<div class="container mt-5">
    <h1>Ajouter un Produit</h1>
    <form method="post" action="add_product.php">
        <table>
            <tr>
                <td><label for="Nom">Nom</label></td>
                <td><input type="text" id="Nom" name="Nom" required></td>
            </tr>
            <tr>
                <td><label for="Description">Description</label></td>
                <td><input id="Description" name="Description" rows="3" required></input></td>
            </tr>
            <tr>
                <td><label for="Prix">Prix</label></td>
                <td><input type="number" step="0.01" id="Prix" name="Prix" required></td>
            </tr>
            <tr>
                <td><label for="Stock">Stock</label></td>
                <td><input type="number" id="Stock" name="Stock" required></td>
            </tr>
            <tr>
                <td><label for="Categorie">Catégorie</label></td>
                <td><input type="text" id="Categorie" name="Categorie" required></td>
            </tr>
            <tr>
                <td><label for="Photo">Photo (URL)</label></td>
                <td><input type="text" id="Photo" name="Photo" required></td>
            </tr>
        </table>

        <button type="submit" class="btn btn-outline-info">Ajouter</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
