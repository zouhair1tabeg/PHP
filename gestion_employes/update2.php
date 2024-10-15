<?php
require 'db.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    echo "Employee ID is missing.";
    exit();
}

try {
    $sql = "SELECT * FROM employes WHERE id=:id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $employee = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$employee) {
        echo "Employee not found for ID: $id";
        exit();
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
</head>
<body>
<form action="update.php" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom:</label></td>
                <td><input type="text" name="nom" placeholder="Nom" value="<?php echo htmlspecialchars($employee['nom']); ?>"></td>
            </tr>
            <tr>
                <td><label for="prenom">Prénom:</label></td>
                <td><input type="text" name="prenom" placeholder="Prénom" value="<?php echo htmlspecialchars($employee['prenom']); ?>"></td>
            </tr>
            <tr>
                <td><label for="date_naissance">Date de naissance:</label></td>
                <td><input type="date" name="date_naissance" placeholder="Date de naissance" value="<?php echo htmlspecialchars($employee['date_naissance']); ?>"></td>
            </tr>
            <tr>
                <td><label for="adresse">Adresse:</label></td>
                <td><input type="text" name="adresse" placeholder="Adresse" value="<?php echo htmlspecialchars($employee['adresse']); ?>"></td>
            </tr>
            <tr>
                <td><label for="salaire">Salaire:</label></td>
                <td><input type="text" name="salaire" placeholder="Salaire" value="<?php echo htmlspecialchars($employee['salaire']); ?>"></td>
            </tr>
            <tr>
                <td><label for="date_embauche">Date d'embauche:</label></td>
                <td><input type="date" name="date_embauche" placeholder="Date d'embauche" value="<?php echo htmlspecialchars($employee['date_embauche']); ?>"></td>
            </tr>
            <tr>
                <td><label for="departement">Département:</label></td>
                <td><input type="text" name="departement" placeholder="Département" value="<?php echo htmlspecialchars($employee['departement']); ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
            </tr>
        </table>
        <input type="submit" value="Update">
    </form>
</body>
</html>