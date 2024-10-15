<?php
session_start();
require 'db.php';

$idPC = isset($_GET['idPC']) ? $_GET['idPC'] : null;

if ($idPC === null) {
    echo "PC idPC is missing.";
    exit();
}

try {
    $sql = "SELECT * FROM PC WHERE idPC = :idPC";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idPC', $idPC, PDO::PARAM_INT);
    $stmt->execute();

    $PC = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$PC) {
        echo "PC not found for idPC: $idPC";
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
    <title>Update PC</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Bonjour, <?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom']; ?></h1>
        <a href="logout.php" class="btn btn-danger">Log Out</a>
        <form action="update.php" method="POST">
            <table>
                <tr>
                    <td><label for="marque">Marque:</label></td>
                    <td><input type="text" name="marque" value="<?php echo htmlspecialchars($PC['marque']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="ram">RAM:</label></td>
                    <td><input type="text" name="ram" value="<?php echo htmlspecialchars($PC['ram']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="stockage">Stockage:</label></td>
                    <td><input type="text" name="stockage" value="<?php echo htmlspecialchars($PC['stockage']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="prix">Prix:</label></td>
                    <td><input type="text" name="prix" value="<?php echo htmlspecialchars($PC['prix']); ?>"></td>
                </tr>
                <tr>
                    <td><label for="photo">Photo:</label></td>
                    <td><input type="text" name="photo" value="<?php echo htmlspecialchars($PC['photo']); ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="idPC" value="<?php echo $idPC; ?>"></td>
                </tr>
            </table>
            <input type="submit" value="Update">
        </form>
        <a href="delet_pc.php?idPC=<?php echo $PC['idPC']; ?>">delete</a>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>