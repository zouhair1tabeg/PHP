<?php

require 'db.php';

try {
    

    
    $stmt = $connexion->prepare("SELECT * FROM PC");
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        .card a {
            text-decoration: none;
            color: inherit;
        }

        .card a:hover {
            text-decoration: none;
            color: inherit;
        }

    </style>
<div class="container">
    <a href="login_Form.php">Connexion Vendeur</a>
    <div class="row">
        <?php
        if (!empty($PC)) {
            foreach ($PC as $laptop) {
                ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img class="card-img-top" src="<?php echo $laptop['photo']; ?>" alt="Card image cap">
                            <h5 class="card-title">Marque: <?php echo $laptop["marque"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Ram: <?php echo $laptop["ram"]; ?></h6>
                            <p class="card-text">Stockage: <?php echo $laptop["stockage"]; ?></p>
                            <p class="card-text">Prix: <?php echo $laptop["prix"]; ?>$</p>
                        </div>
                    </div>
                </div>

                <?php
            }
        } else {
            echo "<p>Aucune PC disponible.</p>";
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>