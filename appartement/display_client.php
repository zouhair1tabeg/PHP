<?php

require 'db.php';

try {
    

    
    $stmt = $connexion->prepare("SELECT * FROM Clients");
    $stmt->execute();

    
    $Client = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>
<body>
    <h1>Liste des Client</h1>
    <table class="table table-striped">
        
            <tr>
                <th>ID</th>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>telephone</th>
                <th>adresse</th>
                <th>Action</th>
            </tr>
        
        
            <?php if (!empty($Client)): 
                 foreach ($Client as $clt): ?>
                    <tr>
                        <td><?php echo $clt['id']; ?></td>
                        <td><?php echo $clt['nom']; ?></td>
                        <td><?php echo $clt['prenom']; ?></td>
                        <td><?php echo $clt['email']; ?></td>
                        <td><?php echo $clt['telephone']; ?></td>
                        <td><?php echo $clt['adresse']; ?></td>
                        <td>
                            <a href="delete_client.php?id=<?php echo $clt['id']; ?>">
                                <img src="trash.png" alt="supprimer" width="30px">
                            </a>

                            <a href="update_form.php?id=<?php echo $clt['id']; ?>" title="Update client">
                                <img src="browser.png" alt="update" width="30px">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Aucun Client trouvé.</td>
                </tr>
            <?php endif; ?>
        
    </table>
</body>
</html>