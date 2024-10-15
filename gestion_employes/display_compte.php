<?php

require 'db.php';

try {
    

    
    $stmt = $connexion->prepare("SELECT * FROM Compte");
    $stmt->execute();

    
    $Compte = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Compte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>
<body>
    <h1>Liste des Compte</h1>
    <table class="table table-striped">
        
            <tr>
                <th>Email</th>
                <th>password</th>
                <th>Compte id</th>
                <th>Supprimer</th>
            </tr>
        
        
            <?php if (!empty($Compte)): 
                 foreach ($Compte as $cmp): ?>
                    <tr>
                        <td><?php echo $cmp['email']; ?></td>
                        <td><?php echo $cmp['pass']; ?></td>
                        <td><?php echo $cmp['Emp_id']; ?></td>
                        <td><button type="submit" class="btn btn-danger">Supprimer</button></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Aucun Compte trouvé.</td>
                </tr>
            <?php endif; ?>
        
    </table>
</body>
</html>