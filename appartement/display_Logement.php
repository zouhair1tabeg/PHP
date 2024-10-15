<?php

require 'db.php';

try {
    

    
    $stmt = $connexion->prepare("SELECT * FROM Logements");
    $stmt->execute();

    
    $appartement = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des appartement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>
<body>
    <h1>Liste des appartement</h1>
    <table class="table table-striped">
        
            <tr>
                <th>ID</th>
                <th>adresse</th>
                <th>ville</th>
                <th>type</th>
                <th>prix</th>
                <th>surface</th>
                <th>description</th>
                <th>Action</th>
            </tr>
        
        
            <?php if (!empty($appartement)): 
                 foreach ($appartement as $atr): ?>
                    <tr>
                        <td><?php echo $atr['id']; ?></td>
                        <td><?php echo $atr['adresse']; ?></td>
                        <td><?php echo $atr['ville']; ?></td>
                        <td><?php echo $atr['type']; ?></td>
                        <td><?php echo $atr['prix']; ?></td>
                        <td><?php echo $atr['surface']; ?></td>
                        <td><?php echo $atr['description']; ?></td>
                        <td>
                            <a href="delete_logement.php?id=<?php echo $atr['id']; ?>">
                                <img src="trash.png" alt="supprimer" width="30px">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucun appartement trouvé.</td>
                </tr>
            <?php endif; ?>
        
    </table>
</body>
</html>