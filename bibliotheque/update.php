<?php

require 'db.php';

$AuteurID = $_GET['id'];


$sql = "SELECT * FROM Auteurs WHERE AuteurID = :AuteurID";
$stmt = $connexion->prepare($sql);
$stmt->bindParam(':AuteurID', $AuteurID);
$stmt->execute();
$auteur = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<form method="post" action="update2.php">

        <input type="hidden" name="AuteurID" value="<?= $auteur['AuteurID']; ?>">
        <table>
            <tr>
                <td><label for="Prenom">Prénom:</label></td>
                <td><input type="text" id="Prenom" name="Prenom" value="<?= $auteur['Prenom']; ?>" required></td>
            </tr>

            <tr>
                <td><label for="Nom">Nom:</label></td>
                <td><input type="text" id="Nom" name="Nom" value="<?= $auteur['Nom']; ?>" required></td>
            </tr>

            <tr>
                <td><label for="CIN">CIN:</label></td>
                <td><input type="text" id="CIN" name="CIN" value="<?= $auteur['CIN']; ?>"></td>
            </tr>

            <tr>
                <td><label for="Email">Email:</label></td>
                <td><input type="Email" id="Email" name="Email" value="<?= $auteur['Email']; ?>" required></td>
            </tr>
           
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" value="Mettre à jour"></td>
            </tr>
        </table>
</form>
