<?php

require 'db.php';

try {
    

    
    $stmt = $connexion->prepare("SELECT * FROM Voitures");
    $stmt->execute();

    
    $voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Voitures</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <?php
        if (!empty($voitures)) {
            foreach ($voitures as $voiture) {
                ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo ($voiture["Marque"] . " " . $voiture["Modele"]); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo ($voiture["Annee"]); ?></h6>
                            <p class="card-text">Immatriculation : <?php echo ($voiture["Immatriculation"]); ?></p>
                            <p class="card-text">Disponibilité : <?php echo $voiture["Disponibilite"] ? "Disponible" : "Indisponible"; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>Aucune voiture disponible.</p>";
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>