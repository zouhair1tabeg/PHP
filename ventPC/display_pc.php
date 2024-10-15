<?php
session_start();
require 'db.php';

if (!isset($_SESSION['vendeur_id'])) {
    header('Location: login.php');
    exit();
}

try {
    $stmt = $connexion->prepare("SELECT * FROM PC WHERE idVendeur = :idVendeur");
    $stmt->bindParam(':idVendeur', $_SESSION['vendeur_id']);
    $stmt->execute();
    $PC = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des PC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Bonjour, <?php echo $_SESSION['vendeur_nom'] . ' ' . $_SESSION['vendeur_prenom']; ?></h1>
        <a href="logout.php" class="btn btn-danger">Log Out</a>
        <h2>Liste des PC</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marque</th>
                    <th>Ram</th>
                    <th>Stockage</th>
                    <th>Prix</th>
                    <th>Photo</th>
                    <th>ID vendeur</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($PC)): ?>
                    <?php foreach ($PC as $laptop): ?>
                        <tr>
                            <td><?php echo $laptop['idPC']; ?></td>
                            <td><?php echo $laptop['marque']; ?></td>
                            <td><?php echo $laptop['ram']; ?></td>
                            <td><?php echo $laptop['stockage']; ?></td>
                            <td><?php echo $laptop['prix']; ?></td>
                            <td><img src="<?php echo $laptop['photo']; ?>" style="max-width: 100px;"></td>
                            <td><?php echo $laptop['idVendeur']; ?></td>
                            <td>
                                <a href="delete_pc.php?id=<?php echo $laptop['idPC']; ?>">
                                    <img src="trash.png" alt="supprimer" width="30px">
                                </a>
                                <a href="update.php?id=<?php echo $laptop['idPC']; ?>">
                                    <button>Update</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">Aucun PC trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>