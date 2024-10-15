<?php

require 'db.php';

try {
    

    
    $stmt = $connexion->prepare("SELECT * FROM employes");
    $stmt->execute();

    
    $employes = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des employes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>
<body>
    <h1>Liste des employes</h1>
    <table class="table table-striped">
        
            <tr>
                <th>ID</th>
                <th>nom</th>
                <th>prenom</th>
                <th>date de naissance</th>
                <th>adresse</th>
                <th>salaire</th>
                <th>date d'embauche</th>
                <th>departement</th>
                <th>Action</th>
            </tr>
        
        
            <?php if (!empty($employes)): 
                 foreach ($employes as $emploi): ?>
                    <tr>
                        <td><?php echo $emploi['id']; ?></td>
                        <td><?php echo $emploi['nom']; ?></td>
                        <td><?php echo $emploi['prenom']; ?></td>
                        <td><?php echo $emploi['date_naissance']; ?></td>
                        <td><?php echo $emploi['adresse']; ?></td>
                        <td><?php echo $emploi['salaire']; ?></td>
                        <td><?php echo $emploi['date_embauche']; ?></td>
                        <td><?php echo $emploi['departement']; ?></td>
                        <td>
                            <a href="update2.php?id=<?php echo $emploi['id']; ?>" title="Update Employee">
                                update
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Aucun employes trouvé.</td>
                </tr>
            <?php endif; ?>
        
    </table>
</body>
</html>