<?php

require 'db.php';

try {
    

    
    $stmt = $connexion->prepare("SELECT * FROM Auteurs");
    $stmt->execute();

    
    $Auteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Auteurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>
<body>
    <h1>Liste des Auteurs</h1>
    <table class="table table-striped">
        
            <tr>
                <th>ID</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>CIN</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        
        
            <?php if (!empty($Auteurs)): 
                 foreach ($Auteurs as $atr): ?>
                    <tr>
                        <td><?php echo $atr['AuteurID']; ?></td>
                        <td><?php echo $atr['Prenom']; ?></td>
                        <td><?php echo $atr['Nom']; ?></td>
                        <td><?php echo $atr['CIN']; ?></td>
                        <td><?php echo $atr['Email']; ?></td>
                        <td>
                            <a href="delet_auteur.php?id=<?php echo $atr['AuteurID']; ?>">
                                <img src="trash.png" alt="supprimer" width="45px">
                            </a>

                            <a href="update.php?id=<?php echo $atr['AuteurID']; ?>" title="Update Auteur">
                                <img src="browser.png" alt="update" width="30px">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucun Auteurs trouvé.</td>
                </tr>
            <?php endif; ?>
        
    </table>
</body>
</html>