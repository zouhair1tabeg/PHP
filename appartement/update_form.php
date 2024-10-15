<?php

require 'db.php';

$id = $_GET['id'];


$sql = "SELECT * FROM Clients WHERE id = :id";
$stmt = $connexion->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$auteur = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<form method="post" action="update_client.php">

        <input type="hidden" name="id" value="<?= $auteur['id']; ?>">
        <table>
            <tr>
                <td><label for="nom">nom:</label></td>
                <td><input type="text" id="nom" name="nom" value="<?= $auteur['nom']; ?>" required></td>
            </tr>

            <tr>
                <td><label for="prenom">prenom:</label></td>
                <td><input type="text" id="prenom" name="prenom" value="<?= $auteur['prenom']; ?>" required></td>
            </tr>

            <tr>
                <td><label for="email">email:</label></td>
                <td><input type="text" id="email" name="email" value="<?= $auteur['email']; ?>"></td>
            </tr>

            <tr>
                <td><label for="telephone">telephone:</label></td>
                <td><input type="telephone" id="telephone" name="telephone" value="<?= $auteur['telephone']; ?>" required></td>
            </tr>
            
            <tr>
                <td><label for="adresse">adresse:</label></td>
                <td><input type="adresse" id="adresse" name="adresse" value="<?= $auteur['adresse']; ?>" required></td>
            </tr>
           
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" value="Update"></td>
            </tr>
        </table>
</form>


